<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_siswa extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa_model');
        $this->load->library('form_validation');
		$this->load->model('M_gender_model');
		$this->load->model('M_kota_model');
		$this->load->model('M_kecamatan_model');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','m_siswa/v_m_siswa_list', $data);
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
        
        $t              = $this->M_siswa_model->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d->siswa_id.'">';
                $view    = anchor(site_url('m_siswa/read/'.$d->siswa_id),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('m_siswa/update/'.$d->siswa_id),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('m_siswa/delete/'.$d->siswa_id),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red', 'data-toggle'=>'confirm', 'data-title'=>$d->{$this->M_siswa_model->label}));

                $records["data"][] = array(
                    $checkbok,
                
					$d->siswa_nis, 
					$d->siswa_nama, 
					@$d->m_gender->{$this->M_gender_model->label}, 
					$d->siswa_tgl_lahir, 
					@$d->m_kota->{$this->M_kota_model->label}, 
					@$d->m_kecamatan->{$this->M_kecamatan_model->label}, 
					$d->siswa_alamat, 
					$d->siswa_ayah, 
					$d->siswa_ibu, 
					$d->siswa_wali, 
					$d->telp_ortu, 
					'<img style="width: 100px; height: 100px;" src="'. base_url("uploads/temp/".$d->foto_img).'" onerror="this.src=\''.base_url("assets/global/img/noimage.png").'\'"  alt="Image">' , 
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
        $row = $this->M_siswa_model
                    ->with_m_gender()
                    ->with_m_kota()
                    ->with_m_kecamatan()
                    ->get($id);
        if ($row) {
            $data = array(
				'siswa_id' => $row->siswa_id,
				'siswa_nis' => $row->siswa_nis,
				'siswa_nama' => $row->siswa_nama,
				'siswa_jk' => @$row->m_gender->{$this->M_gender_model->label},
				'siswa_tgl_lahir' => $row->siswa_tgl_lahir,
				'kota_id' => @$row->m_kota->{$this->M_kota_model->label},
				'kecamatan_id' => @$row->m_kecamatan->{$this->M_kecamatan_model->label},
				'siswa_alamat' => $row->siswa_alamat,
				'siswa_ayah' => $row->siswa_ayah,
				'siswa_ibu' => $row->siswa_ibu,
				'siswa_wali' => $row->siswa_wali,
				'telp_ortu' => $row->telp_ortu,
				'foto_img' => $row->foto_img,
			);
            $data['id'] = $id;
            $this->template->load('template','m_siswa/v_m_siswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_siswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_siswa/create_action'),
			'siswa_id' => set_value('siswa_id'),
			'siswa_nis' => set_value('siswa_nis'),
			'siswa_nama' => set_value('siswa_nama'),
			'siswa_jk' => set_value('siswa_jk'),
			'siswa_tgl_lahir' => set_value('siswa_tgl_lahir'),
			'kota_id' => set_value('kota_id'),
			'kecamatan_id' => set_value('kecamatan_id'),
			'siswa_alamat' => set_value('siswa_alamat'),
			'siswa_ayah' => set_value('siswa_ayah'),
			'siswa_ibu' => set_value('siswa_ibu'),
			'siswa_wali' => set_value('siswa_wali'),
			'telp_ortu' => set_value('telp_ortu'),
			'foto_img' => set_value('foto_img'),
		);
        $this->template->load('template','m_siswa/v_m_siswa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();


        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'siswa_nis' => $this->input->post('siswa_nis',TRUE),
				'siswa_nama' => $this->input->post('siswa_nama',TRUE),
				'siswa_jk' => $this->input->post('siswa_jk',TRUE),
				'siswa_tgl_lahir' => $this->input->post('siswa_tgl_lahir',TRUE),
				'kota_id' => $this->input->post('kota_id',TRUE),
				'kecamatan_id' => $this->input->post('kecamatan_id',TRUE),
				'siswa_alamat' => $this->input->post('siswa_alamat',TRUE),
				'siswa_ayah' => $this->input->post('siswa_ayah',TRUE),
				'siswa_ibu' => $this->input->post('siswa_ibu',TRUE),
				'siswa_wali' => $this->input->post('siswa_wali',TRUE),
				'telp_ortu' => $this->input->post('telp_ortu',TRUE),
				'foto_img' => $this->input->post('foto_img',TRUE),
			);

            $this->M_siswa_model->insert($data);
            if ($this->input->post('mode') == 'new') {
                redirect(site_url('m_siswa/create'));
                
            } else {
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('m_siswa'));
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_siswa_model->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_siswa/update_action'),
				'siswa_id' => set_value('siswa_id', $row->siswa_id),
				'siswa_nis' => set_value('siswa_nis', $row->siswa_nis),
				'siswa_nama' => set_value('siswa_nama', $row->siswa_nama),
				'siswa_jk' => set_value('siswa_jk', $row->siswa_jk),
				'siswa_tgl_lahir' => set_value('siswa_tgl_lahir', $row->siswa_tgl_lahir),
				'kota_id' => set_value('kota_id', $row->kota_id),
				'kecamatan_id' => set_value('kecamatan_id', $row->kecamatan_id),
				'siswa_alamat' => set_value('siswa_alamat', $row->siswa_alamat),
				'siswa_ayah' => set_value('siswa_ayah', $row->siswa_ayah),
				'siswa_ibu' => set_value('siswa_ibu', $row->siswa_ibu),
				'siswa_wali' => set_value('siswa_wali', $row->siswa_wali),
				'telp_ortu' => set_value('telp_ortu', $row->telp_ortu),
				'foto_img' => set_value('foto_img', $row->foto_img),
			);
            $this->template->load('template','m_siswa/v_m_siswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_siswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('siswa_id', TRUE));
        } else {
            $data = array(
				'siswa_nis' => $this->input->post('siswa_nis',TRUE),
				'siswa_nama' => $this->input->post('siswa_nama',TRUE),
				'siswa_jk' => $this->input->post('siswa_jk',TRUE),
				'siswa_tgl_lahir' => $this->input->post('siswa_tgl_lahir',TRUE),
				'kota_id' => $this->input->post('kota_id',TRUE),
				'kecamatan_id' => $this->input->post('kecamatan_id',TRUE),
				'siswa_alamat' => $this->input->post('siswa_alamat',TRUE),
				'siswa_ayah' => $this->input->post('siswa_ayah',TRUE),
				'siswa_ibu' => $this->input->post('siswa_ibu',TRUE),
				'siswa_wali' => $this->input->post('siswa_wali',TRUE),
				'telp_ortu' => $this->input->post('telp_ortu',TRUE),
				'foto_img' => $this->input->post('foto_img',TRUE),
		    );

            $this->M_siswa_model->update($data,$this->input->post('siswa_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('m_siswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_siswa_model->get($id);

        if ($row) {
            $this->M_siswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('m_siswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_siswa'));
        }
    }

    public function delete_checked()
    {
        $id_array=$this->input->post('id[]');
        foreach ($id_array as $id) {
            $row = $this->M_siswa_model->get($id);

            if ($row) {
                $this->M_siswa_model->delete($id);
            } 
        }
        $result["customActionStatus"]="OK";
        $result["customActionMessage"]="Delete Record Success";
        return $result;
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('siswa_nis', 'siswa nis', 'trim');
		$this->form_validation->set_rules('siswa_nama', 'siswa nama', 'trim');
		$this->form_validation->set_rules('siswa_jk', 'siswa jk', 'trim');
		$this->form_validation->set_rules('siswa_tgl_lahir', 'siswa tgl lahir', 'trim');
		$this->form_validation->set_rules('kota_id', 'kota id', 'trim');
		$this->form_validation->set_rules('kecamatan_id', 'kecamatan id', 'trim');
		$this->form_validation->set_rules('siswa_alamat', 'siswa alamat', 'trim');
		$this->form_validation->set_rules('siswa_ayah', 'siswa ayah', 'trim');
		$this->form_validation->set_rules('siswa_ibu', 'siswa ibu', 'trim');
		$this->form_validation->set_rules('siswa_wali', 'siswa wali', 'trim');
		$this->form_validation->set_rules('telp_ortu', 'telp ortu', 'trim');
		$this->form_validation->set_rules('foto_img', 'foto img', 'trim');

		$this->form_validation->set_rules('siswa_id', 'siswa_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_siswa.xls";
        $judul = "m_siswa";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Siswa Nis");
		xlsWriteLabel($tablehead, $kolomhead++, "Siswa Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Siswa Jk");
		xlsWriteLabel($tablehead, $kolomhead++, "Siswa Tgl Lahir");
		xlsWriteLabel($tablehead, $kolomhead++, "Kota Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Siswa Alamat");
		xlsWriteLabel($tablehead, $kolomhead++, "Siswa Ayah");
		xlsWriteLabel($tablehead, $kolomhead++, "Siswa Ibu");
		xlsWriteLabel($tablehead, $kolomhead++, "Siswa Wali");
		xlsWriteLabel($tablehead, $kolomhead++, "Telp Ortu");
		xlsWriteLabel($tablehead, $kolomhead++, "Foto Img");

		foreach ($this->M_siswa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_nis);
		    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_nama);
		    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_jk);
		    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_tgl_lahir);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kota_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_alamat);
		    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_ayah);
		    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_ibu);
		    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_wali);
		    xlsWriteLabel($tablebody, $kolombody++, $data->telp_ortu);
		    xlsWriteLabel($tablebody, $kolombody++, $data->foto_img);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file M_siswa.php */
/* Location: ./application/controllers/M_siswa.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */