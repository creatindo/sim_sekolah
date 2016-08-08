<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gender extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_gender');
        $this->load->library('form_validation');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','gender/v_gender_list', $data);
    }

    public function getDatatable()
    {
        $customActionName=$this->input->post('customActionName');
        $records         = array();

        if ($customActionName == "delete") {
            $records=$this-> delete_checked();
        }

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayStart  = intval($_REQUEST['start']);
        $sEcho          = intval($_REQUEST['draw']);
        
        $t              = $this->M_gender->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d['gender_id'].'">';
                $view    = anchor(site_url('gender/read/'.$d['gender_id']),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('gender/update/'.$d['gender_id']),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('gender/delete/'.$d['gender_id']),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					$d['gender_nama'], 
					$d['gender_kode'], 
                    $view.$edit.$delete
                );
            }
        }
        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        $this->output->set_content_type('application/json')->set_output(json_encode($records));
    }

    public function read($id) 
    {
        $row = $this->M_gender->get($id);
        if ($row) {
            $data = array(
			'gender_id' => $row->gender_id,
			'gender_nama' => $row->gender_nama,
			'gender_kode' => $row->gender_kode,
		);
            $data['id'] = $id;
            $this->template->load('template','gender/v_gender_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gender'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('gender/create_action'),
			'gender_id' => set_value('gender_id'),
			'gender_nama' => set_value('gender_nama'),
			'gender_kode' => set_value('gender_kode'),
		);
        $this->template->load('template','gender/v_gender_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'gender_nama' => $this->input->post('gender_nama',TRUE),
				'gender_kode' => $this->input->post('gender_kode',TRUE),
			);

            $this->M_gender->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('gender'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_gender->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('gender/update_action'),
				'gender_id' => set_value('gender_id', $row->gender_id),
				'gender_nama' => set_value('gender_nama', $row->gender_nama),
				'gender_kode' => set_value('gender_kode', $row->gender_kode),
			);
            $this->template->load('template','gender/v_gender_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gender'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('gender_id', TRUE));
        } else {
            $data = array(
				'gender_nama' => $this->input->post('gender_nama',TRUE),
				'gender_kode' => $this->input->post('gender_kode',TRUE),
		    );

            $this->M_gender->update($data,$this->input->post('gender_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('gender'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_gender->get($id);

        if ($row) {
            $this->M_gender->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('gender'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gender'));
        }
    }

    public function delete_checked()
    {
        $id_array=$this->input->post('id[]');
        foreach ($id_array as $id) {
            $row = $this->Person_model->get($id);

            if ($row) {
                $this->Person_model->delete($id);
            } 
        }
        $result["customActionStatus"]="OK";
        $result["customActionMessage"]="Delete Record Success";
        return $result;
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('gender_nama', 'gender nama', 'trim|required');
		$this->form_validation->set_rules('gender_kode', 'gender kode', 'trim|required');

		$this->form_validation->set_rules('gender_id', 'gender_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_gender.xls";
        $judul = "m_gender";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Gender Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Gender Kode");

		foreach ($this->M_gender->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->gender_nama);
		    xlsWriteLabel($tablebody, $kolombody++, $data->gender_kode);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=gender.doc");

        $data = array(
            'gender_data' => $this->M_gender->get_all(),
            'start' => 0
        );
        
        $this->load->view('gender/v_gender_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'gender_data' => $this->M_gender->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('gender/v_gender_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('gender.pdf', 'D'); 
    }

}

/* End of file Gender.php */
/* Location: ./application/controllers/Gender.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-08-08 11:07:55 */
/* http://harviacode.com */