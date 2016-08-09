<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_kelas extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_kelas_model');
        $this->load->library('form_validation');
		$this->load->model('m_status');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','m_kelas/v_m_kelas_list', $data);
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
        
        $t              = $this->M_kelas_model->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d->kelas_id.'">';
                $view    = anchor(site_url('m_kelas/read/'.$d->kelas_id),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('m_kelas/update/'.$d->kelas_id),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('m_kelas/delete/'.$d->kelas_id),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					$d->kelas_nama, 
					(isset($d->m_status->{$this->m_status->label})) ? $d->m_status->{$this->m_status->label} : '', 
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
        $row = $this->M_kelas_model->get($id);
        if ($row) {
            $data = array(
			'kelas_id' => $row->kelas_id,
			'kelas_nama' => $row->kelas_nama,
			'kelas_active' => $row->kelas_active,
		);
            $data['id'] = $id;
            $this->template->load('template','m_kelas/v_m_kelas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_kelas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_kelas/create_action'),
			'kelas_id' => set_value('kelas_id'),
			'kelas_nama' => set_value('kelas_nama'),
			'kelas_active' => set_value('kelas_active'),
		);
        $this->template->load('template','m_kelas/v_m_kelas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'kelas_nama' => $this->input->post('kelas_nama',TRUE),
				'kelas_active' => $this->input->post('kelas_active',TRUE),
			);

            $this->M_kelas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('m_kelas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_kelas_model->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_kelas/update_action'),
				'kelas_id' => set_value('kelas_id', $row->kelas_id),
				'kelas_nama' => set_value('kelas_nama', $row->kelas_nama),
				'kelas_active' => set_value('kelas_active', $row->kelas_active),
			);
            $this->template->load('template','m_kelas/v_m_kelas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_kelas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kelas_id', TRUE));
        } else {
            $data = array(
				'kelas_nama' => $this->input->post('kelas_nama',TRUE),
				'kelas_active' => $this->input->post('kelas_active',TRUE),
		    );

            $this->M_kelas_model->update($data,$this->input->post('kelas_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('m_kelas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_kelas_model->get($id);

        if ($row) {
            $this->M_kelas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('m_kelas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_kelas'));
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
		$this->form_validation->set_rules('kelas_nama', 'kelas nama', 'trim|required');
		$this->form_validation->set_rules('kelas_active', 'kelas active', 'trim|required');

		$this->form_validation->set_rules('kelas_id', 'kelas_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_kelas.xls";
        $judul = "m_kelas";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Kelas Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Kelas Active");

		foreach ($this->M_kelas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kelas_nama);
		    xlsWriteNumber($tablebody, $kolombody++, $data->kelas_active);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file M_kelas.php */
/* Location: ./application/controllers/M_kelas.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */