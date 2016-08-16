<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_jadwal_model extends MY_Model
{

    public $table = 't_jadwal';
    public $primary_key = 'jadwal_id';
    public $label = 'jadwal_id';
    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array('jadwal_id'); // ...Or you can set an array with the fields that cannot be filled by insert/update

    function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->has_one['m_jam'] = array('M_jam_model','jam_id','jam_id');
        $this->has_one['m_hari'] = array('M_hari_model','hari_id','hari_id');
        $this->has_one['m_mapel'] = array('M_mapel_model','mapel_id','mapel_id');
        $this->has_one['t_kelas'] = array('T_kelas_model','t_kelas_id','t_kelas_id');
        $this->has_one['m_pegawai'] = array('M_pegawai_model','pegawai_id','pegawai_id');
    }
    
    // get total rows
    function get_limit_data($limit, $start) {
        $order            = $this->input->post('order');
        $dataorder = array();
        $where = array();

        $i=1;
        
        $dataorder[$i++] = 'jam_id';
        $dataorder[$i++] = 'hari_id';
        $dataorder[$i++] = 'mapel_id';
        $dataorder[$i++] = 't_kelas_id';
        $dataorder[$i++] = 'pegawai_id';
        $dataorder[$i++] = 'jadwal_active';
        if(!empty($this->input->post('jam_id'))){
            $where['jam_id'] = $this->input->post('jam_id');
        }
        if(!empty($this->input->post('hari_id'))){
            $where['hari_id'] = $this->input->post('hari_id');
        }
        if(!empty($this->input->post('mapel_id'))){
            $where['mapel_id'] = $this->input->post('mapel_id');
        }
        if(!empty($this->input->post('t_kelas_id'))){
            $where['t_kelas_id'] = $this->input->post('t_kelas_id');
        }
        if(!empty($this->input->post('pegawai_id'))){
            $where['pegawai_id'] = $this->input->post('pegawai_id');
        }
        if(!empty($this->input->post('jadwal_active'))){
            $where['LOWER(jadwal_active) LIKE'] = '%'.strtolower($this->input->post('jadwal_active')).'%';
        }
        $this->where($where);
        $result['total_rows'] = $this->count_rows();
        
        $this->where($where);
        $this->order_by( $dataorder[$order[0]["column"]],  $order[0]["dir"]);
        $this->limit($start, $limit);
        $result['get_db']=$this
                            ->with_m_jam()
                            ->with_m_hari()
                            ->with_m_mapel()
                            ->with_t_kelas()
                            ->with_m_pegawai()
                            ->get_all();
        return $result;
    }

}

/* End of file T_jadwal_model.php */
/* Location: ./application/models/T_jadwal_model.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */