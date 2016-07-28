<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_jurusan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','m_jurusan_list', $data);
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
        
        $t              = $this->M_jurusan->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d['jurusan_id'].'">';
                $view    = anchor(site_url('jurusan/read/'.$d['jurusan_id']),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('jurusan/update/'.$d['jurusan_id']),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('jurusan/delete/'.$d['jurusan_id']),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					$d['jurusan_nama'], 
					$d['jurusan_active'], 
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
        $row = $this->M_jurusan->get($id);
        if ($row) {
            $data = array(
			'jurusan_id' => $row->jurusan_id,
			'jurusan_nama' => $row->jurusan_nama,
			'jurusan_active' => $row->jurusan_active,
		);
            $this->template->load('template','m_jurusan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jurusan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jurusan/create_action'),
			'jurusan_id' => set_value('jurusan_id'),
			'jurusan_nama' => set_value('jurusan_nama'),
			'jurusan_active' => set_value('jurusan_active'),
		);
        $this->template->load('template','m_jurusan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'jurusan_nama' => $this->input->post('jurusan_nama',TRUE),
				'jurusan_active' => $this->input->post('jurusan_active',TRUE),
			);

            $this->M_jurusan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jurusan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_jurusan->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jurusan/update_action'),
				'jurusan_id' => set_value('jurusan_id', $row->jurusan_id),
				'jurusan_nama' => set_value('jurusan_nama', $row->jurusan_nama),
				'jurusan_active' => set_value('jurusan_active', $row->jurusan_active),
			);
            $this->template->load('template','m_jurusan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jurusan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jurusan_id', TRUE));
        } else {
            $data = array(
				'jurusan_nama' => $this->input->post('jurusan_nama',TRUE),
				'jurusan_active' => $this->input->post('jurusan_active',TRUE),
		    );

            $this->M_jurusan->update($data,$this->input->post('jurusan_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jurusan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_jurusan->get($id);

        if ($row) {
            $this->M_jurusan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jurusan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jurusan'));
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
		$this->form_validation->set_rules('jurusan_nama', 'jurusan nama', 'trim|required');
		$this->form_validation->set_rules('jurusan_active', 'jurusan active', 'trim|required');

		$this->form_validation->set_rules('jurusan_id', 'jurusan_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_jurusan.xls";
        $judul = "m_jurusan";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Jurusan Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Jurusan Active");

		foreach ($this->M_jurusan->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->jurusan_nama);
		    xlsWriteLabel($tablebody, $kolombody++, $data->jurusan_active);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Jurusan.php */
/* Location: ./application/controllers/Jurusan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-07-28 18:57:45 */
/* http://harviacode.com */