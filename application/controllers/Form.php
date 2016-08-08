<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function index()
	{
			
	}

	public function dd($dd='')
	{
		$this->load->model($dd);
		$this->{$dd}->as_dropdown('title')->get_all();
		$output=array();
		foreach ($data_db as $key=>$v) {
			$res[$key]['id'] = $v['pegawai_id'];
			$res[$key]['title'] = $v['pegawai_nama'];
			// $res[$key]['desc'] = $v['pegawai_no'];
			// $res[$key]['img'] = get_tenagamedis_gambar($v['pegawai_img']);
		}
		$output["items"]=$res;
		$output["total_count"]=$this->m_pegawai->get_pegawai_byNama_count_all();
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

}

/* End of file Form.php */
/* Location: ./application/controllers/Form.php */