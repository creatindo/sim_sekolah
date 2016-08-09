<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_absensi extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_absensi_model');
        $this->load->library('form_validation');
		$this->load->model('T_jadwal_model');
		$this->load->model('T_siswa_model');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','t_absensi/v_t_absensi_list', $data);
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
        
        $t              = $this->T_absensi_model->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d->absensi_id.'">';
                $view    = anchor(site_url('t_absensi/read/'.$d->absensi_id),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('t_absensi/update/'.$d->absensi_id),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('t_absensi/delete/'.$d->absensi_id),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					$d->absensi_nama, 
					(isset($d->t_jadwal->{$this->T_jadwal_model->label})) ? $d->t_jadwal->{$this->T_jadwal_model->label} : '', 
					(isset($d->t_siswa->{$this->T_siswa_model->label})) ? $d->t_siswa->{$this->T_siswa_model->label} : '', 
					$d->siswa, 
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
        $row = $this->T_absensi_model->get($id);
        if ($row) {
            $data = array(
			'absensi_id' => $row->absensi_id,
			'absensi_nama' => $row->absensi_nama,
			'jadwal_id' => $row->jadwal_id,
			't_siswa_id' => $row->t_siswa_id,
			'siswa' => $row->siswa,
		);
            $data['id'] = $id;
            $this->template->load('template','t_absensi/v_t_absensi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_absensi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_absensi/create_action'),
			'absensi_id' => set_value('absensi_id'),
			'absensi_nama' => set_value('absensi_nama'),
			'jadwal_id' => set_value('jadwal_id'),
			't_siswa_id' => set_value('t_siswa_id'),
			'siswa' => set_value('siswa'),
		);
        $this->template->load('template','t_absensi/v_t_absensi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'absensi_nama' => $this->input->post('absensi_nama',TRUE),
				'jadwal_id' => $this->input->post('jadwal_id',TRUE),
				't_siswa_id' => $this->input->post('t_siswa_id',TRUE),
				'siswa' => $this->input->post('siswa',TRUE),
			);

            $this->T_absensi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_absensi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_absensi_model->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_absensi/update_action'),
				'absensi_id' => set_value('absensi_id', $row->absensi_id),
				'absensi_nama' => set_value('absensi_nama', $row->absensi_nama),
				'jadwal_id' => set_value('jadwal_id', $row->jadwal_id),
				't_siswa_id' => set_value('t_siswa_id', $row->t_siswa_id),
				'siswa' => set_value('siswa', $row->siswa),
			);
            $this->template->load('template','t_absensi/v_t_absensi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_absensi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('absensi_id', TRUE));
        } else {
            $data = array(
				'absensi_nama' => $this->input->post('absensi_nama',TRUE),
				'jadwal_id' => $this->input->post('jadwal_id',TRUE),
				't_siswa_id' => $this->input->post('t_siswa_id',TRUE),
				'siswa' => $this->input->post('siswa',TRUE),
		    );

            $this->T_absensi_model->update($data,$this->input->post('absensi_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_absensi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_absensi_model->get($id);

        if ($row) {
            $this->T_absensi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_absensi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_absensi'));
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
		$this->form_validation->set_rules('absensi_nama', 'absensi nama', 'trim|required');
		$this->form_validation->set_rules('jadwal_id', 'jadwal id', 'trim|required');
		$this->form_validation->set_rules('t_siswa_id', 't siswa id', 'trim|required');
		$this->form_validation->set_rules('siswa', 'siswa', 'trim|required');

		$this->form_validation->set_rules('absensi_id', 'absensi_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_absensi.xls";
        $judul = "t_absensi";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Absensi Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Jadwal Id");
		xlsWriteLabel($tablehead, $kolomhead++, "T Siswa Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Siswa");

		foreach ($this->T_absensi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->absensi_nama);
		    xlsWriteNumber($tablebody, $kolombody++, $data->jadwal_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->t_siswa_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->siswa);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file T_absensi.php */
/* Location: ./application/controllers/T_absensi.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */