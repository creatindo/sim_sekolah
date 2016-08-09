<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');        
    }

    public function index()
    {
        $data = array(
        );

        $this->template->load('template','menu/v_menu_list', $data);
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
        
        $t              = $this->Menu_model->get_limit_data($iDisplayStart, $iDisplayLength);
        $iTotalRecords  = $t['total_rows'];
        $get_data       = $t['get_db'];

        $records["data"] = array(); 

        $i=$iDisplayStart+1;
        if ($get_data) {
            foreach ($get_data as $d) {
                $checkbok= '<input type="checkbox" name="id[]" value="'.$d->id.'">';
                $view    = anchor(site_url('menu/read/'.$d->id),'<i class="fa fa-eye fa-lg"></i>',array('title'=>'detail','class'=>'btn btn-outline btn-icon-only green'));
                $edit    = anchor(site_url('menu/update/'.$d->id),'<i class="fa fa-pencil-square-o fa-lg"></i>',array('title'=>'edit','class'=>'btn btn-outline btn-icon-only blue'));
                $delete  = anchor(site_url('menu/delete/'.$d->id),'<i class="fa fa-trash-o fa-lg"></i>',array('title'=>'delete','class'=>'btn btn-outline btn-icon-only red'));

                $records["data"][] = array(
                    $checkbok,
                
					$d->menu_nama, 
					$d->link, 
					$d->icon, 
					$d->is_active, 
					$d->is_parent, 
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
        $row = $this->Menu_model->get($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'menu_nama' => $row->menu_nama,
			'link' => $row->link,
			'icon' => $row->icon,
			'is_active' => $row->is_active,
			'is_parent' => $row->is_parent,
		);
            $data['id'] = $id;
            $this->template->load('template','menu/v_menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menu/create_action'),
			'id' => set_value('id'),
			'menu_nama' => set_value('menu_nama'),
			'link' => set_value('link'),
			'icon' => set_value('icon'),
			'is_active' => set_value('is_active'),
			'is_parent' => set_value('is_parent'),
		);
        $this->template->load('template','menu/v_menu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'menu_nama' => $this->input->post('menu_nama',TRUE),
				'link' => $this->input->post('link',TRUE),
				'icon' => $this->input->post('icon',TRUE),
				'is_active' => $this->input->post('is_active',TRUE),
				'is_parent' => $this->input->post('is_parent',TRUE),
			);

            $this->Menu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Menu_model->get($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menu/update_action'),
				'id' => set_value('id', $row->id),
				'menu_nama' => set_value('menu_nama', $row->menu_nama),
				'link' => set_value('link', $row->link),
				'icon' => set_value('icon', $row->icon),
				'is_active' => set_value('is_active', $row->is_active),
				'is_parent' => set_value('is_parent', $row->is_parent),
			);
            $this->template->load('template','menu/v_menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'menu_nama' => $this->input->post('menu_nama',TRUE),
				'link' => $this->input->post('link',TRUE),
				'icon' => $this->input->post('icon',TRUE),
				'is_active' => $this->input->post('is_active',TRUE),
				'is_parent' => $this->input->post('is_parent',TRUE),
		    );

            $this->Menu_model->update($data,$this->input->post('id', TRUE));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Menu_model->get($id);

        if ($row) {
            $this->Menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
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
		$this->form_validation->set_rules('menu_nama', 'menu nama', 'trim|required');
		$this->form_validation->set_rules('link', 'link', 'trim|required');
		$this->form_validation->set_rules('icon', 'icon', 'trim|required');
		$this->form_validation->set_rules('is_active', 'is active', 'trim|required');
		$this->form_validation->set_rules('is_parent', 'is parent', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "menu.xls";
        $judul = "menu";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Menu Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Link");
		xlsWriteLabel($tablehead, $kolomhead++, "Icon");
		xlsWriteLabel($tablehead, $kolomhead++, "Is Active");
		xlsWriteLabel($tablehead, $kolomhead++, "Is Parent");

		foreach ($this->Menu_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->menu_nama);
		    xlsWriteLabel($tablebody, $kolombody++, $data->link);
		    xlsWriteLabel($tablebody, $kolombody++, $data->icon);
		    xlsWriteNumber($tablebody, $kolombody++, $data->is_active);
		    xlsWriteNumber($tablebody, $kolombody++, $data->is_parent);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */