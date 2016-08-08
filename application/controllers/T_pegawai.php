<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_pegawai extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_t_pegawai');
        $this->load->library('form_validation');
		$this->load->model('m_jabatan');
		$this->load->model('m_pegawai');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','t_pegawai/v_t_pegawai_list', $data);
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
        
        $t              = $this->M_t_pegawai->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d->t_pegawai_id.'">';
                $view    = anchor(site_url('t_pegawai/read/'.$d->t_pegawai_id),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('t_pegawai/update/'.$d->t_pegawai_id),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('t_pegawai/delete/'.$d->t_pegawai_id),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					$d->m_pegawai->{$this->m_pegawai->label}, 
					$d->m_jabatan->{$this->m_jabatan->label}, 
					$d->create_date, 
					$d->t_pegawai_active, 
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
        $row = $this->M_t_pegawai->get($id);
        if ($row) {
            $data = array(
			't_pegawai_id' => $row->t_pegawai_id,
			'pagawai_id' => $row->pagawai_id,
			'jabatan_id' => $row->jabatan_id,
			'create_date' => $row->create_date,
			't_pegawai_active' => $row->t_pegawai_active,
		);
            $data['id'] = $id;
            $this->template->load('template','t_pegawai/v_t_pegawai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_pegawai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_pegawai/create_action'),
			't_pegawai_id' => set_value('t_pegawai_id'),
			'pagawai_id' => set_value('pagawai_id'),
			'jabatan_id' => set_value('jabatan_id'),
			'create_date' => set_value('create_date'),
			't_pegawai_active' => set_value('t_pegawai_active'),
		);
        $this->template->load('template','t_pegawai/v_t_pegawai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'pagawai_id' => $this->input->post('pagawai_id',TRUE),
				'jabatan_id' => $this->input->post('jabatan_id',TRUE),
				'create_date' => $this->input->post('create_date',TRUE),
				't_pegawai_active' => $this->input->post('t_pegawai_active',TRUE),
			);

            $this->M_t_pegawai->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_pegawai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_t_pegawai->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_pegawai/update_action'),
				't_pegawai_id' => set_value('t_pegawai_id', $row->t_pegawai_id),
				'pagawai_id' => set_value('pagawai_id', $row->pagawai_id),
				'jabatan_id' => set_value('jabatan_id', $row->jabatan_id),
				'create_date' => set_value('create_date', $row->create_date),
				't_pegawai_active' => set_value('t_pegawai_active', $row->t_pegawai_active),
			);
            $this->template->load('template','t_pegawai/v_t_pegawai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_pegawai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('t_pegawai_id', TRUE));
        } else {
            $data = array(
				'pagawai_id' => $this->input->post('pagawai_id',TRUE),
				'jabatan_id' => $this->input->post('jabatan_id',TRUE),
				'create_date' => $this->input->post('create_date',TRUE),
				't_pegawai_active' => $this->input->post('t_pegawai_active',TRUE),
		    );

            $this->M_t_pegawai->update($data,$this->input->post('t_pegawai_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_pegawai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_t_pegawai->get($id);

        if ($row) {
            $this->M_t_pegawai->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_pegawai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_pegawai'));
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
		$this->form_validation->set_rules('pagawai_id', 'pagawai id', 'trim|required');
		$this->form_validation->set_rules('jabatan_id', 'jabatan id', 'trim|required');
		$this->form_validation->set_rules('create_date', 'create date', 'trim|required');
		$this->form_validation->set_rules('t_pegawai_active', 't pegawai active', 'trim|required');

		$this->form_validation->set_rules('t_pegawai_id', 't_pegawai_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T_pegawai.php */
/* Location: ./application/controllers/T_pegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-08-08 19:51:42 */
/* http://harviacode.com */