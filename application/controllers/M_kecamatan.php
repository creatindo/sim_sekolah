<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_kecamatan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_kecamatan_model');
        $this->load->library('form_validation');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','m_kecamatan/v_m_kecamatan_list', $data);
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
        
        $t              = $this->M_kecamatan_model->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d->kecamatan_id.'">';
                $view    = anchor(site_url('m_kecamatan/read/'.$d->kecamatan_id),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('m_kecamatan/update/'.$d->kecamatan_id),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('m_kecamatan/delete/'.$d->kecamatan_id),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red', 'data-toggle'=>'confirm', 'data-title'=>$d->{$this->M_kecamatan_model->label}));

                $records["data"][] = array(
                    $checkbok,
                
					$d->kecamatan_kode, 
					$d->m_kota_id, 
					$d->kecamatan_nama, 
					$d->kecamatan_aktif, 
					$d->kecamatan_created_by, 
					$d->kecamatan_revised, 
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
        $row = $this->M_kecamatan_model
                    ->get($id);
        if ($row) {
            $data = array(
				'kecamatan_id' => $row->kecamatan_id,
				'kecamatan_kode' => $row->kecamatan_kode,
				'm_kota_id' => $row->m_kota_id,
				'kecamatan_nama' => $row->kecamatan_nama,
				'kecamatan_aktif' => $row->kecamatan_aktif,
				'kecamatan_created_by' => $row->kecamatan_created_by,
				'kecamatan_revised' => $row->kecamatan_revised,
			);
            $data['id'] = $id;
            $this->template->load('template','m_kecamatan/v_m_kecamatan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_kecamatan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_kecamatan/create_action'),
			'kecamatan_id' => set_value('kecamatan_id'),
			'kecamatan_kode' => set_value('kecamatan_kode'),
			'm_kota_id' => set_value('m_kota_id'),
			'kecamatan_nama' => set_value('kecamatan_nama'),
			'kecamatan_aktif' => set_value('kecamatan_aktif'),
			'kecamatan_created_by' => set_value('kecamatan_created_by'),
			'kecamatan_revised' => set_value('kecamatan_revised'),
		);
        $this->template->load('template','m_kecamatan/v_m_kecamatan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();


        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'kecamatan_kode' => $this->input->post('kecamatan_kode',TRUE),
				'm_kota_id' => $this->input->post('m_kota_id',TRUE),
				'kecamatan_nama' => $this->input->post('kecamatan_nama',TRUE),
				'kecamatan_aktif' => $this->input->post('kecamatan_aktif',TRUE),
				'kecamatan_created_by' => $this->input->post('kecamatan_created_by',TRUE),
				'kecamatan_revised' => $this->input->post('kecamatan_revised',TRUE),
			);

            $this->M_kecamatan_model->insert($data);
            if ($this->input->post('mode') == 'new') {
                redirect(site_url('m_kecamatan/create'));
                
            } else {
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('m_kecamatan'));
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_kecamatan_model->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_kecamatan/update_action'),
				'kecamatan_id' => set_value('kecamatan_id', $row->kecamatan_id),
				'kecamatan_kode' => set_value('kecamatan_kode', $row->kecamatan_kode),
				'm_kota_id' => set_value('m_kota_id', $row->m_kota_id),
				'kecamatan_nama' => set_value('kecamatan_nama', $row->kecamatan_nama),
				'kecamatan_aktif' => set_value('kecamatan_aktif', $row->kecamatan_aktif),
				'kecamatan_created_by' => set_value('kecamatan_created_by', $row->kecamatan_created_by),
				'kecamatan_revised' => set_value('kecamatan_revised', $row->kecamatan_revised),
			);
            $this->template->load('template','m_kecamatan/v_m_kecamatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_kecamatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kecamatan_id', TRUE));
        } else {
            $data = array(
				'kecamatan_kode' => $this->input->post('kecamatan_kode',TRUE),
				'm_kota_id' => $this->input->post('m_kota_id',TRUE),
				'kecamatan_nama' => $this->input->post('kecamatan_nama',TRUE),
				'kecamatan_aktif' => $this->input->post('kecamatan_aktif',TRUE),
				'kecamatan_created_by' => $this->input->post('kecamatan_created_by',TRUE),
				'kecamatan_revised' => $this->input->post('kecamatan_revised',TRUE),
		    );

            $this->M_kecamatan_model->update($data,$this->input->post('kecamatan_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('m_kecamatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_kecamatan_model->get($id);

        if ($row) {
            $this->M_kecamatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('m_kecamatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_kecamatan'));
        }
    }

    public function delete_checked()
    {
        $id_array=$this->input->post('id[]');
        foreach ($id_array as $id) {
            $row = $this->M_kecamatan_model->get($id);

            if ($row) {
                $this->M_kecamatan_model->delete($id);
            } 
        }
        $result["customActionStatus"]="OK";
        $result["customActionMessage"]="Delete Record Success";
        return $result;
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('kecamatan_kode', 'kecamatan kode', 'trim');
		$this->form_validation->set_rules('m_kota_id', 'm kota id', 'trim|required');
		$this->form_validation->set_rules('kecamatan_nama', 'kecamatan nama', 'trim|required');
		$this->form_validation->set_rules('kecamatan_aktif', 'kecamatan aktif', 'trim');
		$this->form_validation->set_rules('kecamatan_created_by', 'kecamatan created by', 'trim');
		$this->form_validation->set_rules('kecamatan_revised', 'kecamatan revised', 'trim|numeric');

		$this->form_validation->set_rules('kecamatan_id', 'kecamatan_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_kecamatan.xls";
        $judul = "m_kecamatan";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan Kode");
		xlsWriteLabel($tablehead, $kolomhead++, "M Kota Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan Aktif");
		xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan Created By");
		xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan Revised");

		foreach ($this->M_kecamatan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan_kode);
		    xlsWriteLabel($tablebody, $kolombody++, $data->m_kota_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan_nama);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan_aktif);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan_created_by);
		    xlsWriteNumber($tablebody, $kolombody++, $data->kecamatan_revised);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file M_kecamatan.php */
/* Location: ./application/controllers/M_kecamatan.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */