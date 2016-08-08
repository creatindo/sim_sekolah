<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kota extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_kota');
        $this->load->library('form_validation');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','kota/v_kota_list', $data);
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
        
        $t              = $this->M_kota->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d->kota_id.'">';
                $view    = anchor(site_url('kota/read/'.$d->kota_id),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('kota/update/'.$d->kota_id),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('kota/delete/'.$d->kota_id),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					$d->kota_kode, 
					$d->m_propinsi_id, 
					$d->kota_nama, 
					$d->kota_aktif, 
					$d->kota_created_by, 
					$d->kota_revised, 
					$d->kota_counter, 
					$d->kota_kab, 
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
        $row = $this->M_kota->get($id);
        if ($row) {
            $data = array(
			'kota_id' => $row->kota_id,
			'kota_kode' => $row->kota_kode,
			'm_propinsi_id' => $row->m_propinsi_id,
			'kota_nama' => $row->kota_nama,
			'kota_aktif' => $row->kota_aktif,
			'kota_created_by' => $row->kota_created_by,
			'kota_revised' => $row->kota_revised,
			'kota_counter' => $row->kota_counter,
			'kota_kab' => $row->kota_kab,
		);
            $data['id'] = $id;
            $this->template->load('template','kota/v_kota_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kota'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kota/create_action'),
			'kota_id' => set_value('kota_id'),
			'kota_kode' => set_value('kota_kode'),
			'm_propinsi_id' => set_value('m_propinsi_id'),
			'kota_nama' => set_value('kota_nama'),
			'kota_aktif' => set_value('kota_aktif'),
			'kota_created_by' => set_value('kota_created_by'),
			'kota_revised' => set_value('kota_revised'),
			'kota_counter' => set_value('kota_counter'),
			'kota_kab' => set_value('kota_kab'),
		);
        $this->template->load('template','kota/v_kota_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'kota_kode' => $this->input->post('kota_kode',TRUE),
				'm_propinsi_id' => $this->input->post('m_propinsi_id',TRUE),
				'kota_nama' => $this->input->post('kota_nama',TRUE),
				'kota_aktif' => $this->input->post('kota_aktif',TRUE),
				'kota_created_by' => $this->input->post('kota_created_by',TRUE),
				'kota_revised' => $this->input->post('kota_revised',TRUE),
				'kota_counter' => $this->input->post('kota_counter',TRUE),
				'kota_kab' => $this->input->post('kota_kab',TRUE),
			);

            $this->M_kota->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kota'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_kota->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kota/update_action'),
				'kota_id' => set_value('kota_id', $row->kota_id),
				'kota_kode' => set_value('kota_kode', $row->kota_kode),
				'm_propinsi_id' => set_value('m_propinsi_id', $row->m_propinsi_id),
				'kota_nama' => set_value('kota_nama', $row->kota_nama),
				'kota_aktif' => set_value('kota_aktif', $row->kota_aktif),
				'kota_created_by' => set_value('kota_created_by', $row->kota_created_by),
				'kota_revised' => set_value('kota_revised', $row->kota_revised),
				'kota_counter' => set_value('kota_counter', $row->kota_counter),
				'kota_kab' => set_value('kota_kab', $row->kota_kab),
			);
            $this->template->load('template','kota/v_kota_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kota'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kota_id', TRUE));
        } else {
            $data = array(
				'kota_kode' => $this->input->post('kota_kode',TRUE),
				'm_propinsi_id' => $this->input->post('m_propinsi_id',TRUE),
				'kota_nama' => $this->input->post('kota_nama',TRUE),
				'kota_aktif' => $this->input->post('kota_aktif',TRUE),
				'kota_created_by' => $this->input->post('kota_created_by',TRUE),
				'kota_revised' => $this->input->post('kota_revised',TRUE),
				'kota_counter' => $this->input->post('kota_counter',TRUE),
				'kota_kab' => $this->input->post('kota_kab',TRUE),
		    );

            $this->M_kota->update($data,$this->input->post('kota_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kota'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_kota->get($id);

        if ($row) {
            $this->M_kota->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kota'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kota'));
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
		$this->form_validation->set_rules('kota_kode', 'kota kode', 'trim|required');
		$this->form_validation->set_rules('m_propinsi_id', 'm propinsi id', 'trim|required');
		$this->form_validation->set_rules('kota_nama', 'kota nama', 'trim|required');
		$this->form_validation->set_rules('kota_aktif', 'kota aktif', 'trim|required');
		$this->form_validation->set_rules('kota_created_by', 'kota created by', 'trim|required');
		$this->form_validation->set_rules('kota_revised', 'kota revised', 'trim|required');
		$this->form_validation->set_rules('kota_counter', 'kota counter', 'trim|required');
		$this->form_validation->set_rules('kota_kab', 'kota kab', 'trim|required');

		$this->form_validation->set_rules('kota_id', 'kota_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_kota.xls";
        $judul = "m_kota";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Kota Kode");
		xlsWriteLabel($tablehead, $kolomhead++, "M Propinsi Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Kota Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Kota Aktif");
		xlsWriteLabel($tablehead, $kolomhead++, "Kota Created By");
		xlsWriteLabel($tablehead, $kolomhead++, "Kota Revised");
		xlsWriteLabel($tablehead, $kolomhead++, "Kota Counter");
		xlsWriteLabel($tablehead, $kolomhead++, "Kota Kab");

		foreach ($this->M_kota->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kota_kode);
		    xlsWriteLabel($tablebody, $kolombody++, $data->m_propinsi_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kota_nama);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kota_aktif);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kota_created_by);
		    xlsWriteNumber($tablebody, $kolombody++, $data->kota_revised);
		    xlsWriteNumber($tablebody, $kolombody++, $data->kota_counter);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kota_kab);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kota.doc");

        $data = array(
            'kota_data' => $this->M_kota->get_all(),
            'start' => 0
        );
        
        $this->load->view('kota/v_kota_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'kota_data' => $this->M_kota->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('kota/v_kota_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('kota.pdf', 'D'); 
    }

}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-08-08 15:03:42 */
/* http://harviacode.com */