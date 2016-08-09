<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_jadwal extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_jadwal_model');
        $this->load->library('form_validation');
		$this->load->model('M_jam_model');
		$this->load->model('M_hari_model');
		$this->load->model('M_mapel_model');
		$this->load->model('T_kelas_model');
		$this->load->model('M_pegawai_model');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','t_jadwal/v_t_jadwal_list', $data);
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
        
        $t              = $this->T_jadwal_model->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d->jadwal_id.'">';
                $view    = anchor(site_url('t_jadwal/read/'.$d->jadwal_id),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('t_jadwal/update/'.$d->jadwal_id),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('t_jadwal/delete/'.$d->jadwal_id),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					(isset($d->m_jam->{$this->M_jam_model->label})) ? $d->m_jam->{$this->M_jam_model->label} : '', 
					(isset($d->m_hari->{$this->M_hari_model->label})) ? $d->m_hari->{$this->M_hari_model->label} : '', 
					(isset($d->m_mapel->{$this->M_mapel_model->label})) ? $d->m_mapel->{$this->M_mapel_model->label} : '', 
					(isset($d->t_kelas->{$this->T_kelas_model->label})) ? $d->t_kelas->{$this->T_kelas_model->label} : '', 
					(isset($d->m_pegawai->{$this->M_pegawai_model->label})) ? $d->m_pegawai->{$this->M_pegawai_model->label} : '', 
					$d->jadwal_active, 
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
        $row = $this->T_jadwal_model->get($id);
        if ($row) {
            $data = array(
			'jadwal_id' => $row->jadwal_id,
			'jam_id' => $row->jam_id,
			'hari_id' => $row->hari_id,
			'mapel_id' => $row->mapel_id,
			't_kelas_id' => $row->t_kelas_id,
			'pegawai_id' => $row->pegawai_id,
			'jadwal_active' => $row->jadwal_active,
		);
            $data['id'] = $id;
            $this->template->load('template','t_jadwal/v_t_jadwal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_jadwal'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_jadwal/create_action'),
			'jadwal_id' => set_value('jadwal_id'),
			'jam_id' => set_value('jam_id'),
			'hari_id' => set_value('hari_id'),
			'mapel_id' => set_value('mapel_id'),
			't_kelas_id' => set_value('t_kelas_id'),
			'pegawai_id' => set_value('pegawai_id'),
			'jadwal_active' => set_value('jadwal_active'),
		);
        $this->template->load('template','t_jadwal/v_t_jadwal_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'jam_id' => $this->input->post('jam_id',TRUE),
				'hari_id' => $this->input->post('hari_id',TRUE),
				'mapel_id' => $this->input->post('mapel_id',TRUE),
				't_kelas_id' => $this->input->post('t_kelas_id',TRUE),
				'pegawai_id' => $this->input->post('pegawai_id',TRUE),
				'jadwal_active' => $this->input->post('jadwal_active',TRUE),
			);

            $this->T_jadwal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_jadwal'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_jadwal_model->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_jadwal/update_action'),
				'jadwal_id' => set_value('jadwal_id', $row->jadwal_id),
				'jam_id' => set_value('jam_id', $row->jam_id),
				'hari_id' => set_value('hari_id', $row->hari_id),
				'mapel_id' => set_value('mapel_id', $row->mapel_id),
				't_kelas_id' => set_value('t_kelas_id', $row->t_kelas_id),
				'pegawai_id' => set_value('pegawai_id', $row->pegawai_id),
				'jadwal_active' => set_value('jadwal_active', $row->jadwal_active),
			);
            $this->template->load('template','t_jadwal/v_t_jadwal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_jadwal'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jadwal_id', TRUE));
        } else {
            $data = array(
				'jam_id' => $this->input->post('jam_id',TRUE),
				'hari_id' => $this->input->post('hari_id',TRUE),
				'mapel_id' => $this->input->post('mapel_id',TRUE),
				't_kelas_id' => $this->input->post('t_kelas_id',TRUE),
				'pegawai_id' => $this->input->post('pegawai_id',TRUE),
				'jadwal_active' => $this->input->post('jadwal_active',TRUE),
		    );

            $this->T_jadwal_model->update($data,$this->input->post('jadwal_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_jadwal'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_jadwal_model->get($id);

        if ($row) {
            $this->T_jadwal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_jadwal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_jadwal'));
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
		$this->form_validation->set_rules('jam_id', 'jam id', 'trim|required');
		$this->form_validation->set_rules('hari_id', 'hari id', 'trim|required');
		$this->form_validation->set_rules('mapel_id', 'mapel id', 'trim|required');
		$this->form_validation->set_rules('t_kelas_id', 't kelas id', 'trim|required');
		$this->form_validation->set_rules('pegawai_id', 'pegawai id', 'trim|required');
		$this->form_validation->set_rules('jadwal_active', 'jadwal active', 'trim|required');

		$this->form_validation->set_rules('jadwal_id', 'jadwal_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_jadwal.xls";
        $judul = "t_jadwal";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Jam Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Hari Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Mapel Id");
		xlsWriteLabel($tablehead, $kolomhead++, "T Kelas Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Pegawai Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Jadwal Active");

		foreach ($this->T_jadwal_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteNumber($tablebody, $kolombody++, $data->jam_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->hari_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->mapel_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->t_kelas_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->pegawai_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->jadwal_active);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file T_jadwal.php */
/* Location: ./application/controllers/T_jadwal.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */