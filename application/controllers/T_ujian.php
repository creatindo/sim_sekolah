<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_ujian extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_ujian_model');
        $this->load->library('form_validation');
		$this->load->model('T_jadwal_model');
		$this->load->model('M_ujian_model');
		$this->load->model('M_status_model');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','t_ujian/v_t_ujian_list', $data);
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
        
        $t              = $this->T_ujian_model->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d->t_ujian_id.'">';
                $view    = anchor(site_url('t_ujian/read/'.$d->t_ujian_id),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('t_ujian/update/'.$d->t_ujian_id),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('t_ujian/delete/'.$d->t_ujian_id),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					$d->t_ujian_nama, 
					@$d->m_ujian->{$this->M_ujian_model->label}, 
					@$d->t_jadwal->{$this->T_jadwal_model->label}, 
					$d->t_ujian_tanggal, 
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
        $row = $this->T_ujian_model
                    ->with_t_jadwal()
                    ->with_m_ujian()
                    ->with_m_status()
                    ->get($id);
        if ($row) {
            $data = array(
			't_ujian_id' => $row->t_ujian_id,
			't_ujian_nama' => $row->t_ujian_nama,
			'ujian_id' => @$row->m_ujian->{$this->M_ujian_model->label},
			't_jadwal_id' => @$row->t_jadwal->{$this->T_jadwal_model->label},
			't_ujian_tanggal' => $row->t_ujian_tanggal,
			't_ujian_active' => @$row->m_status->{$this->M_status_model->label},
		);
            $data['id'] = $id;
            $this->template->load('template','t_ujian/v_t_ujian_read', $data);
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
			't_ujian_nama' => set_value('t_ujian_nama'),
			'ujian_id' => set_value('ujian_id'),
			't_jadwal_id' => set_value('t_jadwal_id'),
			't_ujian_tanggal' => set_value('t_ujian_tanggal'),
			't_ujian_active' => set_value('t_ujian_active'),
		);
        $this->template->load('template','t_ujian/v_t_ujian_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				't_ujian_nama' => $this->input->post('t_ujian_nama',TRUE),
				'ujian_id' => $this->input->post('ujian_id',TRUE),
				't_jadwal_id' => $this->input->post('t_jadwal_id',TRUE),
				't_ujian_tanggal' => $this->input->post('t_ujian_tanggal',TRUE),
				't_ujian_active' => $this->input->post('t_ujian_active',TRUE),
			);

            $this->T_ujian_model->insert($data);
            if ($this->input->post('mode') == 'new') {
                redirect(site_url('t_ujian/create'));
                
            } else {
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('t_ujian'));
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_ujian_model->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_ujian/update_action'),
				't_ujian_id' => set_value('t_ujian_id', $row->t_ujian_id),
				't_ujian_nama' => set_value('t_ujian_nama', $row->t_ujian_nama),
				'ujian_id' => set_value('ujian_id', $row->ujian_id),
				't_jadwal_id' => set_value('t_jadwal_id', $row->t_jadwal_id),
				't_ujian_tanggal' => set_value('t_ujian_tanggal', $row->t_ujian_tanggal),
				't_ujian_active' => set_value('t_ujian_active', $row->t_ujian_active),
			);
            $this->template->load('template','t_ujian/v_t_ujian_form', $data);
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
				't_ujian_nama' => $this->input->post('t_ujian_nama',TRUE),
				'ujian_id' => $this->input->post('ujian_id',TRUE),
				't_jadwal_id' => $this->input->post('t_jadwal_id',TRUE),
				't_ujian_tanggal' => $this->input->post('t_ujian_tanggal',TRUE),
				't_ujian_active' => $this->input->post('t_ujian_active',TRUE),
		    );

            $this->T_ujian_model->update($data,$this->input->post('t_ujian_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_ujian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_ujian_model->get($id);

        if ($row) {
            $this->T_ujian_model->delete($id);
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
            $row = $this->T_ujian_model->get($id);

            if ($row) {
                $this->T_ujian_model->delete($id);
            } 
        }
        $result["customActionStatus"]="OK";
        $result["customActionMessage"]="Delete Record Success";
        return $result;
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('t_ujian_nama', 't ujian nama', 'trim|required');
		$this->form_validation->set_rules('ujian_id', 'ujian id', 'trim|required');
		$this->form_validation->set_rules('t_jadwal_id', 't jadwal id', 'trim|required');
		$this->form_validation->set_rules('t_ujian_tanggal', 't ujian tanggal', 'trim|required');
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
		xlsWriteLabel($tablehead, $kolomhead++, "T Ujian Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Ujian Id");
		xlsWriteLabel($tablehead, $kolomhead++, "T Jadwal Id");
		xlsWriteLabel($tablehead, $kolomhead++, "T Ujian Tanggal");
		xlsWriteLabel($tablehead, $kolomhead++, "T Ujian Active");

		foreach ($this->T_ujian_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->t_ujian_nama);
		    xlsWriteNumber($tablebody, $kolombody++, $data->ujian_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->t_jadwal_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->t_ujian_tanggal);
		    xlsWriteNumber($tablebody, $kolombody++, $data->t_ujian_active);

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
/* http://harviacode.com */