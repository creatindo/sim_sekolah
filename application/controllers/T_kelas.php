<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kelas extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_status');
        $this->load->model('m_semester');
        $this->load->model('m_jurusan');
        $this->load->model('m_kelas');
        $this->load->model('M_t_kelas');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','t_kelas_list', $data);
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
        
        $t              = $this->M_t_kelas->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d['t_kelas_id'].'">';
                $view    = anchor(site_url('t_kelas/read/'.$d['t_kelas_id']),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('t_kelas/update/'.$d['t_kelas_id']),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('t_kelas/delete/'.$d['t_kelas_id']),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					$d['kelas_nama'], 
					$d['jurusan_nama'], 
					$d['semester_nama'], 
					$d['status_nama'], 
					$d['tahun'], 
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
        $row = $this->M_t_kelas->get($id);
        if ($row) {
            $data = array(
			't_kelas_id' => $row->t_kelas_id,
			'kelas_id' => $row->kelas_id,
			'jurusan_id' => $row->jurusan_id,
			'semester_id' => $row->semester_id,
			't_kelas_active' => $row->t_kelas_active,
			'tahun' => $row->tahun,
		);
            $this->template->load('template','t_kelas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_kelas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button'         => 'Create',
            'action'         => site_url('t_kelas/create_action'),
            't_kelas_id'     => set_value('t_kelas_id'),
            'kelas_id'       => set_value('kelas_id'),
            'kelas_id_dd'    => $this->m_kelas->as_dropdown('kelas_nama')->get_all(),
            'jurusan_id'     => set_value('jurusan_id'),
            'jurusan_id_dd'  => $this->m_jurusan->as_dropdown('jurusan_nama')->get_all(),
            'semester_id'    => set_value('semester_id'),
            'semester_id_dd' => $this->m_semester->as_dropdown('semester_nama')->get_all(),
            't_kelas_active' => set_value('t_kelas_active'),
            'status'         => $this->m_status->as_dropdown('status_nama')->get_all(),
            'tahun'          => set_value('tahun'),

		);
        $this->template->load('template','t_kelas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'kelas_id' => $this->input->post('kelas_id',TRUE),
				'jurusan_id' => $this->input->post('jurusan_id',TRUE),
				'semester_id' => $this->input->post('semester_id',TRUE),
				't_kelas_active' => $this->input->post('t_kelas_active',TRUE),
				'tahun' => $this->input->post('tahun',TRUE),
			);

            $this->M_t_kelas->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_kelas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_t_kelas->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_kelas/update_action'),
				't_kelas_id' => set_value('t_kelas_id', $row->t_kelas_id),
                'kelas_id'       => set_value('kelas_id', $row->kelas_id),
                'kelas_id_dd'    => $this->m_kelas->as_dropdown('kelas_nama')->get_all(),
                'jurusan_id'     => set_value('jurusan_id', $row->jurusan_id),
                'jurusan_id_dd'  => $this->m_jurusan->as_dropdown('jurusan_nama')->get_all(),
                'semester_id'    => set_value('semester_id', $row->semester_id),
                'semester_id_dd' => $this->m_semester->as_dropdown('semester_nama')->get_all(),
                't_kelas_active' => set_value('t_kelas_active', $row->t_kelas_active),
                'status'         => $this->m_status->as_dropdown('status_nama')->get_all(),
				'tahun' => set_value('tahun', $row->tahun),
			);
            $this->template->load('template','t_kelas_form', $data);
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
				'kelas_id' => $this->input->post('kelas_id',TRUE),
				'jurusan_id' => $this->input->post('jurusan_id',TRUE),
				'semester_id' => $this->input->post('semester_id',TRUE),
				't_kelas_active' => $this->input->post('t_kelas_active',TRUE),
				'tahun' => $this->input->post('tahun',TRUE),
		    );

            $this->M_t_kelas->update($data,$this->input->post('t_kelas_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_kelas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_t_kelas->get($id);

        if ($row) {
            $this->M_t_kelas->delete($id);
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
		$this->form_validation->set_rules('kelas_id', 'kelas id', 'trim|required');
		$this->form_validation->set_rules('jurusan_id', 'jurusan id', 'trim|required');
		$this->form_validation->set_rules('semester_id', 'semester id', 'trim|required');
		$this->form_validation->set_rules('t_kelas_active', 't kelas active', 'trim|required');
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
		xlsWriteLabel($tablehead, $kolomhead++, "Kelas Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Jurusan Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Semester Id");
		xlsWriteLabel($tablehead, $kolomhead++, "T Kelas Active");
		xlsWriteLabel($tablehead, $kolomhead++, "Tahun");

		foreach ($this->M_t_kelas->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteNumber($tablebody, $kolombody++, $data->kelas_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->jurusan_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->semester_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->t_kelas_active);
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
/* Generated by Harviacode Codeigniter CRUD Generator 2016-07-31 05:28:03 */
/* http://harviacode.com */