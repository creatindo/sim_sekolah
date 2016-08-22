<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_ujian_nilai extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_ujian_nilai_model');
        $this->load->library('form_validation');
		$this->load->model('T_ujian_model');
		$this->load->model('T_siswa_model');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','t_ujian_nilai/v_t_ujian_nilai_list', $data);
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
        
        $t              = $this->T_ujian_nilai_model->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d->nilai_id.'">';
                $view    = anchor(site_url('t_ujian_nilai/read/'.$d->nilai_id),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('t_ujian_nilai/update/'.$d->nilai_id),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('t_ujian_nilai/delete/'.$d->nilai_id),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red', 'data-toggle'=>'confirm', 'data-title'=>$d->{$this->T_ujian_nilai_model->label}));

                $records["data"][] = array(
                    $checkbok,
                
					@$d->t_ujian->{$this->T_ujian_model->label}, 
					@$d->t_siswa->{$this->T_siswa_model->label}, 
					$d->nilai, 
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
        $row = $this->T_ujian_nilai_model
                    ->with_t_ujian()
                    ->with_t_siswa()
                    ->get($id);
        if ($row) {
            $data = array(
				'nilai_id' => $row->nilai_id,
				't_ujian_id' => @$row->t_ujian->{$this->T_ujian_model->label},
				't_siswa_id' => @$row->t_siswa->{$this->T_siswa_model->label},
				'nilai' => $row->nilai,
			);
            $data['id'] = $id;
            $this->template->load('template','t_ujian_nilai/v_t_ujian_nilai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_ujian_nilai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_ujian_nilai/create_action'),
			'nilai_id' => set_value('nilai_id'),
			't_ujian_id' => set_value('t_ujian_id'),
			't_siswa_id' => set_value('t_siswa_id'),
			'nilai' => set_value('nilai'),
		);
        $this->template->load('template','t_ujian_nilai/v_t_ujian_nilai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();


        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				't_ujian_id' => $this->input->post('t_ujian_id',TRUE),
				't_siswa_id' => $this->input->post('t_siswa_id',TRUE),
				'nilai' => $this->input->post('nilai',TRUE),
			);

            $this->T_ujian_nilai_model->insert($data);
            if ($this->input->post('mode') == 'new') {
                redirect(site_url('t_ujian_nilai/create'));
                
            } else {
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('t_ujian_nilai'));
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_ujian_nilai_model->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_ujian_nilai/update_action'),
				'nilai_id' => set_value('nilai_id', $row->nilai_id),
				't_ujian_id' => set_value('t_ujian_id', $row->t_ujian_id),
				't_siswa_id' => set_value('t_siswa_id', $row->t_siswa_id),
				'nilai' => set_value('nilai', $row->nilai),
			);
            $this->template->load('template','t_ujian_nilai/v_t_ujian_nilai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_ujian_nilai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nilai_id', TRUE));
        } else {
            $data = array(
				't_ujian_id' => $this->input->post('t_ujian_id',TRUE),
				't_siswa_id' => $this->input->post('t_siswa_id',TRUE),
				'nilai' => $this->input->post('nilai',TRUE),
		    );

            $this->T_ujian_nilai_model->update($data,$this->input->post('nilai_id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_ujian_nilai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_ujian_nilai_model->get($id);

        if ($row) {
            $this->T_ujian_nilai_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_ujian_nilai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_ujian_nilai'));
        }
    }

    public function delete_checked()
    {
        $id_array=$this->input->post('id[]');
        foreach ($id_array as $id) {
            $row = $this->T_ujian_nilai_model->get($id);

            if ($row) {
                $this->T_ujian_nilai_model->delete($id);
            } 
        }
        $result["customActionStatus"]="OK";
        $result["customActionMessage"]="Delete Record Success";
        return $result;
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('t_ujian_id', 't ujian id', 'trim|numeric');
		$this->form_validation->set_rules('t_siswa_id', 't siswa id', 'trim|numeric');
		$this->form_validation->set_rules('nilai', 'nilai', 'trim|numeric');

		$this->form_validation->set_rules('nilai_id', 'nilai_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_ujian_nilai.xls";
        $judul = "t_ujian_nilai";
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
		xlsWriteLabel($tablehead, $kolomhead++, "T Ujian Id");
		xlsWriteLabel($tablehead, $kolomhead++, "T Siswa Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Nilai");

		foreach ($this->T_ujian_nilai_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteNumber($tablebody, $kolombody++, $data->t_ujian_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->t_siswa_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->nilai);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file T_ujian_nilai.php */
/* Location: ./application/controllers/T_ujian_nilai.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */