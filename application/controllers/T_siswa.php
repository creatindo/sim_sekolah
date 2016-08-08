<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_siswa extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_siswa');
        $this->load->model('m_status');
        $this->load->model('m_t_kelas');
        $this->load->model('M_t_siswa');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','t_siswa_list', $data);
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
        
        $t              = $this->M_t_siswa->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d['t_siswa_id'].'">';
                $view    = anchor(site_url('t_siswa/read/'.$d['t_siswa_id']),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('t_siswa/update/'.$d['t_siswa_id']),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('t_siswa/delete/'.$d['t_siswa_id']),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					$d['siswa_id'], 
					$d['t_kelas_id'], 
					$d['tahun'], 
					$d['t_siswa_active'], 
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
        $row = $this->M_t_siswa->get($id);
        if ($row) {
            $data = array(
			't_siswa_id' => $row->t_siswa_id,
			'siswa_id' => $row->siswa_id,
			't_kelas_id' => $row->t_kelas_id,
			'tahun' => $row->tahun,
			't_siswa_active' => $row->t_siswa_active,
		);
            $this->template->load('template','t_siswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_siswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button'            => 'Create',
            'action'            => site_url('t_siswa/create_action'),
            't_siswa_id'        => set_value('t_siswa_id'),
            'siswa_id'          => set_value('siswa_id'),
            't_kelas_id'        => set_value('t_kelas_id'),
            'tahun'             => set_value('tahun'),
            't_siswa_active'    => set_value('t_siswa_active'),
            'siswa_id_dd'       => $this->m_siswa->as_dropdown('siswa_nama')->get_all(),
            't_kelas_id_dd'     => $this->m_t_kelas->as_dropdown('kelas_id')->get_all(),
            't_siswa_active_dd' => $this->m_status->as_dropdown('status_nama')->get_all(),
		);
        $this->template->load('template','t_siswa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'siswa_id' => $this->input->post('siswa_id',TRUE),
				't_kelas_id' => $this->input->post('t_kelas_id',TRUE),
				'tahun' => $this->input->post('tahun',TRUE),
				't_siswa_active' => $this->input->post('t_siswa_active',TRUE),
			);

            $this->M_t_siswa->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_siswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_t_siswa->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_siswa/update_action'),
				't_siswa_id' => set_value('t_siswa_id', $row->t_siswa_id),
				'siswa_id' => set_value('siswa_id', $row->siswa_id),
				't_kelas_id' => set_value('t_kelas_id', $row->t_kelas_id),
				'tahun' => set_value('tahun', $row->tahun),
				't_siswa_active' => set_value('t_siswa_active', $row->t_siswa_active),
                'siswa_id_dd'       => $this->m_siswa->as_dropdown('siswa_nama')->get_all(),
                't_kelas_id_dd'     => $this->m_t_kelas->as_dropdown('kelas_id')->get_all(),
                't_siswa_active_dd' => $this->m_status->as_dropdown('status_nama')->get_all(),

			);
            $this->template->load('template','t_siswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_siswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('t_siswa_id', TRUE));
        } else {
            $data = array(
				'siswa_id' => $this->input->post('siswa_id',TRUE),
				't_kelas_id' => $this->input->post('t_kelas_id',TRUE),
				'tahun' => $this->input->post('tahun',TRUE),
				't_siswa_active' => $this->input->post('t_siswa_active',TRUE),
		    );

            $this->M_t_siswa->update($data,$this->input->post('t_siswa_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_siswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_t_siswa->get($id);

        if ($row) {
            $this->M_t_siswa->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_siswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_siswa'));
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
		$this->form_validation->set_rules('siswa_id', 'siswa id', 'trim|required');
		$this->form_validation->set_rules('t_kelas_id', 't kelas id', 'trim|required');
		$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
		$this->form_validation->set_rules('t_siswa_active', 't siswa active', 'trim|required');

		$this->form_validation->set_rules('t_siswa_id', 't_siswa_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_siswa.xls";
        $judul = "t_siswa";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Siswa Id");
		xlsWriteLabel($tablehead, $kolomhead++, "T Kelas Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
		xlsWriteLabel($tablehead, $kolomhead++, "T Siswa Active");

		foreach ($this->M_t_siswa->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteNumber($tablebody, $kolombody++, $data->siswa_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->t_kelas_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->tahun);
		    xlsWriteLabel($tablebody, $kolombody++, $data->t_siswa_active);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file T_siswa.php */
/* Location: ./application/controllers/T_siswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-07-31 04:36:23 */
/* http://harviacode.com */