<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pegawai extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pegawai_model');
        $this->load->library('form_validation');
		$this->load->model('M_user_model');
		$this->load->model('M_gender_model');
		$this->load->model('M_kota_model');
		$this->load->model('M_kecamatan_model');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','m_pegawai/v_m_pegawai_list', $data);
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
        
        $t              = $this->M_pegawai_model->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d->pegawai_id.'">';
                $view    = anchor(site_url('m_pegawai/read/'.$d->pegawai_id),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('m_pegawai/update/'.$d->pegawai_id),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('m_pegawai/delete/'.$d->pegawai_id),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					$d->pegawai_nip, 
					$d->pegawai_nama, 
					@$d->m_gender->{$this->M_gender_model->label}, 
					$d->pegawai_tgl_lahir, 
					$d->pegawai_golongan, 
					@$d->m_kota->{$this->M_kota_model->label}, 
					@$d->m_kecamatan->{$this->M_kecamatan_model->label}, 
					$d->pegawai_alamat, 
					$d->pegawai_telp, 
					$d->pegawai_foto, 
					$d->jabatan, 
					@$d->m_user->{$this->M_user_model->label}, 
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
        $row = $this->M_pegawai_model
                    ->with_m_user()
                    ->with_m_gender()
                    ->with_m_kota()
                    ->with_m_kecamatan()
                    ->get($id);
        if ($row) {
            $data = array(
			'pegawai_id' => $row->pegawai_id,
			'pegawai_nip' => $row->pegawai_nip,
			'pegawai_nama' => $row->pegawai_nama,
			'pegawai_jk' => @$row->m_gender->{$this->M_gender_model->label},
			'pegawai_tgl_lahir' => $row->pegawai_tgl_lahir,
			'pegawai_golongan' => $row->pegawai_golongan,
			'kota_id' => @$row->m_kota->{$this->M_kota_model->label},
			'kecamatan_id' => @$row->m_kecamatan->{$this->M_kecamatan_model->label},
			'pegawai_alamat' => $row->pegawai_alamat,
			'pegawai_telp' => $row->pegawai_telp,
			'pegawai_foto' => $row->pegawai_foto,
			'jabatan' => $row->jabatan,
			'user_id' => @$row->m_user->{$this->M_user_model->label},
		);
            $data['id'] = $id;
            $this->template->load('template','m_pegawai/v_m_pegawai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_pegawai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_pegawai/create_action'),
			'pegawai_id' => set_value('pegawai_id'),
			'pegawai_nip' => set_value('pegawai_nip'),
			'pegawai_nama' => set_value('pegawai_nama'),
			'pegawai_jk' => set_value('pegawai_jk'),
			'pegawai_tgl_lahir' => set_value('pegawai_tgl_lahir'),
			'pegawai_golongan' => set_value('pegawai_golongan'),
			'kota_id' => set_value('kota_id'),
			'kecamatan_id' => set_value('kecamatan_id'),
			'pegawai_alamat' => set_value('pegawai_alamat'),
			'pegawai_telp' => set_value('pegawai_telp'),
			'pegawai_foto' => set_value('pegawai_foto'),
			'jabatan' => set_value('jabatan'),
			'user_id' => set_value('user_id'),
		);
        $this->template->load('template','m_pegawai/v_m_pegawai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'pegawai_nip' => $this->input->post('pegawai_nip',TRUE),
				'pegawai_nama' => $this->input->post('pegawai_nama',TRUE),
				'pegawai_jk' => $this->input->post('pegawai_jk',TRUE),
				'pegawai_tgl_lahir' => $this->input->post('pegawai_tgl_lahir',TRUE),
				'pegawai_golongan' => $this->input->post('pegawai_golongan',TRUE),
				'kota_id' => $this->input->post('kota_id',TRUE),
				'kecamatan_id' => $this->input->post('kecamatan_id',TRUE),
				'pegawai_alamat' => $this->input->post('pegawai_alamat',TRUE),
				'pegawai_telp' => $this->input->post('pegawai_telp',TRUE),
				'pegawai_foto' => $this->input->post('pegawai_foto',TRUE),
				'jabatan' => $this->input->post('jabatan',TRUE),
				'user_id' => $this->input->post('user_id',TRUE),
			);

            $this->M_pegawai_model->insert($data);
            if ($this->input->post('mode') == 'new') {
                redirect(site_url('m_pegawai/create'));
                
            } else {
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('m_pegawai'));
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_pegawai_model->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_pegawai/update_action'),
				'pegawai_id' => set_value('pegawai_id', $row->pegawai_id),
				'pegawai_nip' => set_value('pegawai_nip', $row->pegawai_nip),
				'pegawai_nama' => set_value('pegawai_nama', $row->pegawai_nama),
				'pegawai_jk' => set_value('pegawai_jk', $row->pegawai_jk),
				'pegawai_tgl_lahir' => set_value('pegawai_tgl_lahir', $row->pegawai_tgl_lahir),
				'pegawai_golongan' => set_value('pegawai_golongan', $row->pegawai_golongan),
				'kota_id' => set_value('kota_id', $row->kota_id),
				'kecamatan_id' => set_value('kecamatan_id', $row->kecamatan_id),
				'pegawai_alamat' => set_value('pegawai_alamat', $row->pegawai_alamat),
				'pegawai_telp' => set_value('pegawai_telp', $row->pegawai_telp),
				'pegawai_foto' => set_value('pegawai_foto', $row->pegawai_foto),
				'jabatan' => set_value('jabatan', $row->jabatan),
				'user_id' => set_value('user_id', $row->user_id),
			);
            $this->template->load('template','m_pegawai/v_m_pegawai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_pegawai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pegawai_id', TRUE));
        } else {
            $data = array(
				'pegawai_nip' => $this->input->post('pegawai_nip',TRUE),
				'pegawai_nama' => $this->input->post('pegawai_nama',TRUE),
				'pegawai_jk' => $this->input->post('pegawai_jk',TRUE),
				'pegawai_tgl_lahir' => $this->input->post('pegawai_tgl_lahir',TRUE),
				'pegawai_golongan' => $this->input->post('pegawai_golongan',TRUE),
				'kota_id' => $this->input->post('kota_id',TRUE),
				'kecamatan_id' => $this->input->post('kecamatan_id',TRUE),
				'pegawai_alamat' => $this->input->post('pegawai_alamat',TRUE),
				'pegawai_telp' => $this->input->post('pegawai_telp',TRUE),
				'pegawai_foto' => $this->input->post('pegawai_foto',TRUE),
				'jabatan' => $this->input->post('jabatan',TRUE),
				'user_id' => $this->input->post('user_id',TRUE),
		    );

            $this->M_pegawai_model->update($data,$this->input->post('pegawai_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('m_pegawai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_pegawai_model->get($id);

        if ($row) {
            $this->M_pegawai_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('m_pegawai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_pegawai'));
        }
    }

    public function delete_checked()
    {
        $id_array=$this->input->post('id[]');
        foreach ($id_array as $id) {
            $row = $this->M_pegawai_model->get($id);

            if ($row) {
                $this->M_pegawai_model->delete($id);
            } 
        }
        $result["customActionStatus"]="OK";
        $result["customActionMessage"]="Delete Record Success";
        return $result;
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('pegawai_nip', 'pegawai nip', 'trim|required');
		$this->form_validation->set_rules('pegawai_nama', 'pegawai nama', 'trim|required');
		$this->form_validation->set_rules('pegawai_jk', 'pegawai jk', 'trim|required');
		$this->form_validation->set_rules('pegawai_tgl_lahir', 'pegawai tgl lahir', 'trim|required');
		$this->form_validation->set_rules('pegawai_golongan', 'pegawai golongan', 'trim|required');
		$this->form_validation->set_rules('kota_id', 'kota id', 'trim|required');
		$this->form_validation->set_rules('kecamatan_id', 'kecamatan id', 'trim|required');
		$this->form_validation->set_rules('pegawai_alamat', 'pegawai alamat', 'trim|required');
		$this->form_validation->set_rules('pegawai_telp', 'pegawai telp', 'trim|required');
		$this->form_validation->set_rules('pegawai_foto', 'pegawai foto', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		$this->form_validation->set_rules('user_id', 'user id', 'trim|required');

		$this->form_validation->set_rules('pegawai_id', 'pegawai_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_pegawai.xls";
        $judul = "m_pegawai";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Pegawai Nip");
		xlsWriteLabel($tablehead, $kolomhead++, "Pegawai Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Pegawai Jk");
		xlsWriteLabel($tablehead, $kolomhead++, "Pegawai Tgl Lahir");
		xlsWriteLabel($tablehead, $kolomhead++, "Pegawai Golongan");
		xlsWriteLabel($tablehead, $kolomhead++, "Kota Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Pegawai Alamat");
		xlsWriteLabel($tablehead, $kolomhead++, "Pegawai Telp");
		xlsWriteLabel($tablehead, $kolomhead++, "Pegawai Foto");
		xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
		xlsWriteLabel($tablehead, $kolomhead++, "User Id");

		foreach ($this->M_pegawai_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->pegawai_nip);
		    xlsWriteLabel($tablebody, $kolombody++, $data->pegawai_nama);
		    xlsWriteLabel($tablebody, $kolombody++, $data->pegawai_jk);
		    xlsWriteLabel($tablebody, $kolombody++, $data->pegawai_tgl_lahir);
		    xlsWriteLabel($tablebody, $kolombody++, $data->pegawai_golongan);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kota_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->pegawai_alamat);
		    xlsWriteLabel($tablebody, $kolombody++, $data->pegawai_telp);
		    xlsWriteLabel($tablebody, $kolombody++, $data->pegawai_foto);
		    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan);
		    xlsWriteNumber($tablebody, $kolombody++, $data->user_id);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file M_pegawai.php */
/* Location: ./application/controllers/M_pegawai.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */