<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_ujian extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_t_ujian');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','t_ujian_list', $data);
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
        
        $t              = $this->M_t_ujian->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d['t_ujian_id'].'">';
                $view    = anchor(site_url('t_ujian/read/'.$d['t_ujian_id']),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('t_ujian/update/'.$d['t_ujian_id']),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('t_ujian/delete/'.$d['t_ujian_id']),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					$d['ujian_id'], 
					$d['t_jadwal_id'], 
					$d['t_ujian_active'], 
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
        $row = $this->M_t_ujian->get($id);
        if ($row) {
            $data = array(
			't_ujian_id' => $row->t_ujian_id,
			'ujian_id' => $row->ujian_id,
			't_jadwal_id' => $row->t_jadwal_id,
			't_ujian_active' => $row->t_ujian_active,
		);
            $this->template->load('template','t_ujian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_ujian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_ujian/create_action'),
			't_ujian_id' => set_value('t_ujian_id'),
			'ujian_id' => set_value('ujian_id'),
			't_jadwal_id' => set_value('t_jadwal_id'),
			't_ujian_active' => set_value('t_ujian_active'),
		);
        $this->template->load('template','t_ujian_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'ujian_id' => $this->input->post('ujian_id',TRUE),
				't_jadwal_id' => $this->input->post('t_jadwal_id',TRUE),
				't_ujian_active' => $this->input->post('t_ujian_active',TRUE),
			);

            $this->M_t_ujian->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_ujian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_t_ujian->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_ujian/update_action'),
				't_ujian_id' => set_value('t_ujian_id', $row->t_ujian_id),
				'ujian_id' => set_value('ujian_id', $row->ujian_id),
				't_jadwal_id' => set_value('t_jadwal_id', $row->t_jadwal_id),
				't_ujian_active' => set_value('t_ujian_active', $row->t_ujian_active),
			);
            $this->template->load('template','t_ujian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_ujian'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('t_ujian_id', TRUE));
        } else {
            $data = array(
				'ujian_id' => $this->input->post('ujian_id',TRUE),
				't_jadwal_id' => $this->input->post('t_jadwal_id',TRUE),
				't_ujian_active' => $this->input->post('t_ujian_active',TRUE),
		    );

            $this->M_t_ujian->update($data,$this->input->post('t_ujian_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_ujian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_t_ujian->get($id);

        if ($row) {
            $this->M_t_ujian->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_ujian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_ujian'));
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
		$this->form_validation->set_rules('ujian_id', 'ujian id', 'trim|required');
		$this->form_validation->set_rules('t_jadwal_id', 't jadwal id', 'trim|required');
		$this->form_validation->set_rules('t_ujian_active', 't ujian active', 'trim|required');

		$this->form_validation->set_rules('t_ujian_id', 't_ujian_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_ujian.xls";
        $judul = "t_ujian";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Ujian Id");
		xlsWriteLabel($tablehead, $kolomhead++, "T Jadwal Id");
		xlsWriteLabel($tablehead, $kolomhead++, "T Ujian Active");

		foreach ($this->M_t_ujian->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteNumber($tablebody, $kolombody++, $data->ujian_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->t_jadwal_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->t_ujian_active);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file T_ujian.php */
/* Location: ./application/controllers/T_ujian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-07-31 04:38:37 */
/* http://harviacode.com */