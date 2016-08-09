<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_ujian_model extends MY_Model
{

    public $table = 't_ujian';
    public $primary_key = 't_ujian_id';
    public $label = 't_ujian_nama';
    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update

    function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->has_one['t_jadwal'] = array('T_jadwal_model','jadwal_id','t_jadwal_id');
        $this->has_one['m_ujian'] = array('M_ujian_model','ujian_id','ujian_id');
        $this->has_one['m_status'] = array('M_status_model','status_id','t_ujian_active');
    }
    
    // get total rows
    function get_limit_data($limit, $start) {
        $order            = $this->input->post('order');
        $dataorder = array();
        $where = array();

        $i=1;
        
        $dataorder[$i++] = 't_ujian_nama';
        $dataorder[$i++] = 'ujian_id';
        $dataorder[$i++] = 't_jadwal_id';
        $dataorder[$i++] = 't_ujian_tanggal';
        $dataorder[$i++] = 't_ujian_active';
        if(!empty($this->input->post('t_ujian_nama'))){
            $where['LOWER(t_ujian_nama) LIKE'] = '%'.strtolower($this->input->post('t_ujian_nama')).'%';
        }
        if(!empty($this->input->post('ujian_id'))){
            $where['LOWER(ujian_id) LIKE'] = '%'.strtolower($this->input->post('ujian_id')).'%';
        }
        if(!empty($this->input->post('t_jadwal_id'))){
            $where['LOWER(t_jadwal_id) LIKE'] = '%'.strtolower($this->input->post('t_jadwal_id')).'%';
        }
        if(!empty($this->input->post('t_ujian_tanggal'))){
            $where['LOWER(t_ujian_tanggal) LIKE'] = '%'.strtolower($this->input->post('t_ujian_tanggal')).'%';
        }
        if(!empty($this->input->post('t_ujian_active'))){
            $where['LOWER(t_ujian_active) LIKE'] = '%'.strtolower($this->input->post('t_ujian_active')).'%';
        }
        $this->where($where);
        $result['total_rows'] = $this->count_rows();
        
        $this->where($where);
        $this->order_by( $dataorder[$order[0]["column"]],  $order[0]["dir"]);
        $this->limit($start, $limit);
        $result['get_db']=$this
                            ->with_t_jadwal()
                            ->with_m_ujian()
                            ->with_m_status()
                            ->get_all();
        return $result;
    }

}

/* End of file T_ujian_model.php */
/* Location: ./application/models/T_ujian_model.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */