<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function index()
	{
			
	}

	public function dd($dd='')
	{
		$this->load->model($dd);
		$data_db=$this->{$dd}->as_dropdown('jabatan_nama')->get_all();
		$output=array();
		foreach ($data_db as $key=>$v) {
			$res[$key]['id'] = $key;
			$res[$key]['title'] = $v;
			// $res[$key]['desc'] = $v['pegawai_no'];
			// $res[$key]['img'] = get_tenagamedis_gambar($v['pegawai_img']);
		}
		$output["items"]=$res;
		$output["total_count"]=$this->{$dd}->count_rows();
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

}

/* End of file Form.php */
/* Location: ./application/controllers/Form.php */