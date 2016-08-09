<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_jam extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_jam_model');
        $this->load->library('form_validation');
		$this->load->model('M_status_model');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','m_jam/v_m_jam_list', $data);
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
        
        $t              = $this->M_jam_model->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d->jam_id.'">';
                $view    = anchor(site_url('m_jam/read/'.$d->jam_id),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('m_jam/update/'.$d->jam_id),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('m_jam/delete/'.$d->jam_id),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					$d->jam_nama, 
					@$d->m_status->{$this->M_status_model->label}, 
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
        $row = $this->M_jam_model
                    ->with_m_status()
                    ->get($id);
        if ($row) {
            $data = array(
			'jam_id' => $row->jam_id,
			'jam_nama' => $row->jam_nama,
			'jam_active' => @$row->m_status->{$this->M_status_model->label},
		);
            $data['id'] = $id;
            $this->template->load('template','m_jam/v_m_jam_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_jam'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_jam/create_action'),
			'jam_id' => set_value('jam_id'),
			'jam_nama' => set_value('jam_nama'),
			'jam_active' => set_value('jam_active'),
		);
        $this->template->load('template','m_jam/v_m_jam_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'jam_nama' => $this->input->post('jam_nama',TRUE),
				'jam_active' => $this->input->post('jam_active',TRUE),
			);

            $this->M_jam_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('m_jam'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_jam_model->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_jam/update_action'),
				'jam_id' => set_value('jam_id', $row->jam_id),
				'jam_nama' => set_value('jam_nama', $row->jam_nama),
				'jam_active' => set_value('jam_active', $row->jam_active),
			);
            $this->template->load('template','m_jam/v_m_jam_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_jam'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jam_id', TRUE));
        } else {
            $data = array(
				'jam_nama' => $this->input->post('jam_nama',TRUE),
				'jam_active' => $this->input->post('jam_active',TRUE),
		    );

            $this->M_jam_model->update($data,$this->input->post('jam_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('m_jam'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_jam_model->get($id);

        if ($row) {
            $this->M_jam_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('m_jam'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_jam'));
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
		$this->form_validation->set_rules('jam_nama', 'jam nama', 'trim|required');
		$this->form_validation->set_rules('jam_active', 'jam active', 'trim|required');

		$this->form_validation->set_rules('jam_id', 'jam_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_jam.xls";
        $judul = "m_jam";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Jam Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Jam Active");

		foreach ($this->M_jam_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->jam_nama);
		    xlsWriteNumber($tablebody, $kolombody++, $data->jam_active);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file M_jam.php */
/* Location: ./application/controllers/M_jam.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */