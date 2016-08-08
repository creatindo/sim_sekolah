<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->library('form_validation');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','user/v_user_list', $data);
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
        
        $t              = $this->M_user->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d['user_id'].'">';
                $view    = anchor(site_url('user/read/'.$d['user_id']),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('user/update/'.$d['user_id']),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('user/delete/'.$d['user_id']),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					$d['user_nama'], 
					$d['user_pass'], 
					$d['user_pass_verif'], 
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
        $row = $this->M_user->get($id);
        if ($row) {
            $data = array(
			'user_id' => $row->user_id,
			'user_nama' => $row->user_nama,
			'user_pass' => $row->user_pass,
			'user_pass_verif' => $row->user_pass_verif,
		);
            $data['id'] = $id;
            $this->template->load('template','user/v_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
			'user_id' => set_value('user_id'),
			'user_nama' => set_value('user_nama'),
			'user_pass' => set_value('user_pass'),
			'user_pass_verif' => set_value('user_pass_verif'),
		);
        $this->template->load('template','user/v_user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'user_nama' => $this->input->post('user_nama',TRUE),
				'user_pass' => $this->input->post('user_pass',TRUE),
				'user_pass_verif' => $this->input->post('user_pass_verif',TRUE),
			);

            $this->M_user->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_user->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
				'user_id' => set_value('user_id', $row->user_id),
				'user_nama' => set_value('user_nama', $row->user_nama),
				'user_pass' => set_value('user_pass', $row->user_pass),
				'user_pass_verif' => set_value('user_pass_verif', $row->user_pass_verif),
			);
            $this->template->load('template','user/v_user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('user_id', TRUE));
        } else {
            $data = array(
				'user_nama' => $this->input->post('user_nama',TRUE),
				'user_pass' => $this->input->post('user_pass',TRUE),
				'user_pass_verif' => $this->input->post('user_pass_verif',TRUE),
		    );

            $this->M_user->update($data,$this->input->post('user_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_user->get($id);

        if ($row) {
            $this->M_user->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
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
		$this->form_validation->set_rules('user_nama', 'user nama', 'trim|required');
		$this->form_validation->set_rules('user_pass', 'user pass', 'trim|required');
		$this->form_validation->set_rules('user_pass_verif', 'user pass verif', 'trim|required');

		$this->form_validation->set_rules('user_id', 'user_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_user.xls";
        $judul = "m_user";
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
		xlsWriteLabel($tablehead, $kolomhead++, "User Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "User Pass");
		xlsWriteLabel($tablehead, $kolomhead++, "User Pass Verif");

		foreach ($this->M_user->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->user_nama);
		    xlsWriteLabel($tablebody, $kolombody++, $data->user_pass);
		    xlsWriteLabel($tablebody, $kolombody++, $data->user_pass_verif);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=user.doc");

        $data = array(
            'user_data' => $this->M_user->get_all(),
            'start' => 0
        );
        
        $this->load->view('user/v_user_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'user_data' => $this->M_user->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('user/v_user_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('user.pdf', 'D'); 
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-08-08 11:27:24 */
/* http://harviacode.com */