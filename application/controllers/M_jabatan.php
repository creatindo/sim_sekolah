<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_jabatan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_m_jabatan');
        $this->load->library('form_validation');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','m_jabatan/v_m_jabatan_list', $data);
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
        
        $t              = $this->M_m_jabatan->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d->jabatan_id.'">';
                $view    = anchor(site_url('m_jabatan/read/'.$d->jabatan_id),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('m_jabatan/update/'.$d->jabatan_id),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('m_jabatan/delete/'.$d->jabatan_id),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					$d->jabatan_nama, 
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
        $row = $this->M_m_jabatan->get($id);
        if ($row) {
            $data = array(
			'jabatan_id' => $row->jabatan_id,
			'jabatan_nama' => $row->jabatan_nama,
		);
            $data['id'] = $id;
            $this->template->load('template','m_jabatan/v_m_jabatan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_jabatan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_jabatan/create_action'),
			'jabatan_id' => set_value('jabatan_id'),
			'jabatan_nama' => set_value('jabatan_nama'),
		);
        $this->template->load('template','m_jabatan/v_m_jabatan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'jabatan_nama' => $this->input->post('jabatan_nama',TRUE),
			);

            $this->M_m_jabatan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('m_jabatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_m_jabatan->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_jabatan/update_action'),
				'jabatan_id' => set_value('jabatan_id', $row->jabatan_id),
				'jabatan_nama' => set_value('jabatan_nama', $row->jabatan_nama),
			);
            $this->template->load('template','m_jabatan/v_m_jabatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_jabatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jabatan_id', TRUE));
        } else {
            $data = array(
				'jabatan_nama' => $this->input->post('jabatan_nama',TRUE),
		    );

            $this->M_m_jabatan->update($data,$this->input->post('jabatan_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('m_jabatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_m_jabatan->get($id);

        if ($row) {
            $this->M_m_jabatan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('m_jabatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_jabatan'));
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
		$this->form_validation->set_rules('jabatan_nama', 'jabatan nama', 'trim|required');

		$this->form_validation->set_rules('jabatan_id', 'jabatan_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_jabatan.php */
/* Location: ./application/controllers/M_jabatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-08-08 19:49:52 */
/* http://harviacode.com */