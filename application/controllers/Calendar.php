<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

	public function index()
	{
		
	}

	public function get_data()
	{
		$get_data = array();
		$get_data[] =  array(
			'id' => '1', 
			'tgl_start' => '2016-08-01 01:09:36', 
			'tgl_end' => '2016-08-01 12:09:36', 
			'status' => 'masuk', 
			);
		$response = array();
		foreach ($get_data as $r) {
			$status=$r['status'];
			$absensi = array(
				"id"    => $r['id'],
				"title" => $r['status'], 
				"start" => $r['tgl_start'], 
				"end"   => $r['tgl_end'], 
				"backgroundColor"=> "green",
				// "allDay"=> "true",
			);
			$response[]=$absensi;
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function absensi()
	{
		$data = array();
        $this->template->load('template','v_calendar_absensi', $data);
	}

}

/* End of file Calendar.php */
/* Location: ./application/controllers/Calendar.php */