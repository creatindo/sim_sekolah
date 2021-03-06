<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_absensi_model extends MY_Model
{

    public $table = 't_absensi';
    public $primary_key = 'absensi_id';
    public $label = 'absensi_id';
    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array('absensi_id'); // ...Or you can set an array with the fields that cannot be filled by insert/update

    function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->has_one['t_jadwal'] = array('T_jadwal_model','jadwal_id','jadwal_id');
        $this->has_one['t_siswa'] = array('T_siswa_model','t_siswa_id','t_siswa_id');
    }
    
    // get total rows
    function get_limit_data($limit, $start) {
        $order            = $this->input->post('order');
        $dataorder = array();
        $where = array();

        $i=1;
        $dataorder[$i++] = 'jadwal_id';
        $dataorder[$i++] = 't_siswa_id';
        $dataorder[$i++] = 'kehadiran';
        if(!empty($this->input->post('jadwal_id'))){
            $where['jadwal_id'] = $this->input->post('jadwal_id');
        }
        if(!empty($this->input->post('t_siswa_id'))){
            $where['t_siswa_id'] = $this->input->post('t_siswa_id');
        }
        if(!empty($this->input->post('kehadiran'))){
            $where['LOWER(kehadiran) LIKE'] = '%'.strtolower($this->input->post('kehadiran')).'%';
        }

        $this->where($where);
        $result['total_rows'] = $this->count_rows();
        
        $this->where($where);
        $this->order_by( $dataorder[$order[0]["column"]],  $order[0]["dir"]);
        $this->limit($start, $limit);
        $result['get_db']=$this
                            ->with_t_jadwal()
                            ->with_t_siswa()
                            ->get_all();
        return $result;
    }

}

/* End of file T_absensi_model.php */
/* Location: ./application/models/T_absensi_model.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */