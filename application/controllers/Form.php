<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function index()
	{
			
	}

	public function dd($m='')
	{

		$this->load->model($m);
		$limit=$this->input->post('limit');
		$page=$this->input->post('page')-1;
		$this->db->limit($limit,($page*$limit));
		$data_db=$this->{$m}->get_all();
		$output=array();
		if ($data_db) {
			foreach ($data_db as $r) {
				$item=array();
				$item['id']    = $r->{$this->$m->primary_key};
				$item['title'] = $r->{$this->$m->label};

				$res[] = $item;
			}
		}
		$output["items"]=$res;
		$output["total_count"]=$this->{$m}->count_rows();
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

}

/* End of file Form.php */
/* Location: ./application/controllers/Form.php */