<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kelas extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_kelas_model');
        $this->load->library('form_validation');
		$this->load->model('M_jurusan_model');
		$this->load->model('M_semester_model');
		$this->load->model('M_kelas_model');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','t_kelas/v_t_kelas_list', $data);
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
        
        $t              = $this->T_kelas_model->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d->t_kelas_id.'">';
                $view    = anchor(site_url('t_kelas/read/'.$d->t_kelas_id),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('t_kelas/update/'.$d->t_kelas_id),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('t_kelas/delete/'.$d->t_kelas_id),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red', 'data-toggle'=>'confirm', 'data-title'=>$d->{$this->T_kelas_model->label}));

                $records["data"][] = array(
                    $checkbok,
                
					$d->t_kelas_nama, 
					@$d->m_kelas->{$this->M_kelas_model->label}, 
					@$d->m_jurusan->{$this->M_jurusan_model->label}, 
					@$d->m_semester->{$this->M_semester_model->label}, 
					$d->tahun, 
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
        $row = $this->T_kelas_model
                    ->with_m_jurusan()
                    ->with_m_semester()
                    ->with_m_kelas()
                    ->get($id);
        if ($row) {
            $data = array(
			't_kelas_id' => $row->t_kelas_id,
			't_kelas_nama' => $row->t_kelas_nama,
			'kelas_id' => @$row->m_kelas->{$this->M_kelas_model->label},
			'jurusan_id' => @$row->m_jurusan->{$this->M_jurusan_model->label},
			'semester_id' => @$row->m_semester->{$this->M_semester_model->label},
			'tahun' => $row->tahun,
		);
            $data['id'] = $id;
            $this->template->load('template','t_kelas/v_t_kelas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_kelas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_kelas/create_action'),
			't_kelas_id' => set_value('t_kelas_id'),
			't_kelas_nama' => set_value('t_kelas_nama'),
			'kelas_id' => set_value('kelas_id'),
			'jurusan_id' => set_value('jurusan_id'),
			'semester_id' => set_value('semester_id'),
			'tahun' => set_value('tahun'),
		);
        $this->template->load('template','t_kelas/v_t_kelas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				't_kelas_nama' => $this->input->post('t_kelas_nama',TRUE),
				'kelas_id' => $this->input->post('kelas_id',TRUE),
				'jurusan_id' => $this->input->post('jurusan_id',TRUE),
				'semester_id' => $this->input->post('semester_id',TRUE),
				'tahun' => $this->input->post('tahun',TRUE),
			);

            $this->T_kelas_model->insert($data);
            if ($this->input->post('mode') == 'new') {
                redirect(site_url('t_kelas/create'));
                
            } else {
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('t_kelas'));
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_kelas_model->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_kelas/update_action'),
				't_kelas_id' => set_value('t_kelas_id', $row->t_kelas_id),
				't_kelas_nama' => set_value('t_kelas_nama', $row->t_kelas_nama),
				'kelas_id' => set_value('kelas_id', $row->kelas_id),
				'jurusan_id' => set_value('jurusan_id', $row->jurusan_id),
				'semester_id' => set_value('semester_id', $row->semester_id),
				'tahun' => set_value('tahun', $row->tahun),
			);
            $this->template->load('template','t_kelas/v_t_kelas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_kelas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('t_kelas_id', TRUE));
        } else {
            $data = array(
				't_kelas_nama' => $this->input->post('t_kelas_nama',TRUE),
				'kelas_id' => $this->input->post('kelas_id',TRUE),
				'jurusan_id' => $this->input->post('jurusan_id',TRUE),
				'semester_id' => $this->input->post('semester_id',TRUE),
				'tahun' => $this->input->post('tahun',TRUE),
		    );

            $this->T_kelas_model->update($data,$this->input->post('t_kelas_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_kelas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_kelas_model->get($id);

        if ($row) {
            $this->T_kelas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_kelas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_kelas'));
        }
    }

    public function delete_checked()
    {
        $id_array=$this->input->post('id[]');
        foreach ($id_array as $id) {
            $row = $this->T_kelas_model->get($id);

            if ($row) {
                $this->T_kelas_model->delete($id);
            } 
        }
        $result["customActionStatus"]="OK";
        $result["customActionMessage"]="Delete Record Success";
        return $result;
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('t_kelas_nama', 't kelas nama', 'trim|required');
		$this->form_validation->set_rules('kelas_id', 'kelas id', 'trim|required');
		$this->form_validation->set_rules('jurusan_id', 'jurusan id', 'trim|required');
		$this->form_validation->set_rules('semester_id', 'semester id', 'trim|required');
		$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');

		$this->form_validation->set_rules('t_kelas_id', 't_kelas_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_kelas.xls";
        $judul = "t_kelas";
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
		xlsWriteLabel($tablehead, $kolomhead++, "T Kelas Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Kelas Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Jurusan Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Semester Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Tahun");

		foreach ($this->T_kelas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->t_kelas_nama);
		    xlsWriteNumber($tablebody, $kolombody++, $data->kelas_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->jurusan_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->semester_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->tahun);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file T_kelas.php */
/* Location: ./application/controllers/T_kelas.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */