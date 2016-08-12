<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_siswa extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_siswa_model');
        $this->load->library('form_validation');
		$this->load->model('T_kelas_model');
		$this->load->model('M_siswa_model');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','t_siswa/v_t_siswa_list', $data);
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
        
        $t              = $this->T_siswa_model->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d->t_siswa_id.'">';
                $view    = anchor(site_url('t_siswa/read/'.$d->t_siswa_id),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('t_siswa/update/'.$d->t_siswa_id),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('t_siswa/delete/'.$d->t_siswa_id),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					$d->t_siswa_nama, 
					@$d->m_siswa->{$this->M_siswa_model->label}, 
					@$d->t_kelas->{$this->T_kelas_model->label}, 
					$d->t_siswa_active, 
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
        $row = $this->T_siswa_model
                    ->with_t_kelas()
                    ->with_m_siswa()
                    ->get($id);
        if ($row) {
            $data = array(
			't_siswa_id' => $row->t_siswa_id,
			't_siswa_nama' => $row->t_siswa_nama,
			'siswa_id' => @$row->m_siswa->{$this->M_siswa_model->label},
			't_kelas_id' => @$row->t_kelas->{$this->T_kelas_model->label},
			't_siswa_active' => $row->t_siswa_active,
		);
            $data['id'] = $id;
            $this->template->load('template','t_siswa/v_t_siswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_siswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_siswa/create_action'),
			't_siswa_id' => set_value('t_siswa_id'),
			't_siswa_nama' => set_value('t_siswa_nama'),
			'siswa_id' => set_value('siswa_id'),
			't_kelas_id' => set_value('t_kelas_id'),
			't_siswa_active' => set_value('t_siswa_active'),
		);
        $this->template->load('template','t_siswa/v_t_siswa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				't_siswa_nama' => $this->input->post('t_siswa_nama',TRUE),
				'siswa_id' => $this->input->post('siswa_id',TRUE),
				't_kelas_id' => $this->input->post('t_kelas_id',TRUE),
				't_siswa_active' => $this->input->post('t_siswa_active',TRUE),
			);

            $this->T_siswa_model->insert($data);
            if ($this->input->post('mode') == 'new') {
                redirect(site_url('t_siswa/create'));
                
            } else {
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('t_siswa'));
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_siswa_model->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_siswa/update_action'),
				't_siswa_id' => set_value('t_siswa_id', $row->t_siswa_id),
				't_siswa_nama' => set_value('t_siswa_nama', $row->t_siswa_nama),
				'siswa_id' => set_value('siswa_id', $row->siswa_id),
				't_kelas_id' => set_value('t_kelas_id', $row->t_kelas_id),
				't_siswa_active' => set_value('t_siswa_active', $row->t_siswa_active),
			);
            $this->template->load('template','t_siswa/v_t_siswa_form', $data);
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
				't_siswa_nama' => $this->input->post('t_siswa_nama',TRUE),
				'siswa_id' => $this->input->post('siswa_id',TRUE),
				't_kelas_id' => $this->input->post('t_kelas_id',TRUE),
				't_siswa_active' => $this->input->post('t_siswa_active',TRUE),
		    );

            $this->T_siswa_model->update($data,$this->input->post('t_siswa_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_siswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_siswa_model->get($id);

        if ($row) {
            $this->T_siswa_model->delete($id);
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
            $row = $this->T_siswa_model->get($id);

            if ($row) {
                $this->T_siswa_model->delete($id);
            } 
        }
        $result["customActionStatus"]="OK";
        $result["customActionMessage"]="Delete Record Success";
        return $result;
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('t_siswa_nama', 't siswa nama', 'trim|required');
		$this->form_validation->set_rules('siswa_id', 'siswa id', 'trim|required');
		$this->form_validation->set_rules('t_kelas_id', 't kelas id', 'trim|required');
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
		xlsWriteLabel($tablehead, $kolomhead++, "T Siswa Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Siswa Id");
		xlsWriteLabel($tablehead, $kolomhead++, "T Kelas Id");
		xlsWriteLabel($tablehead, $kolomhead++, "T Siswa Active");

		foreach ($this->T_siswa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->t_siswa_nama);
		    xlsWriteNumber($tablebody, $kolombody++, $data->siswa_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->t_kelas_id);
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
/* http://harviacode.com */