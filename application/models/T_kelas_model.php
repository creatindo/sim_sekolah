<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kelas_model extends MY_Model
{

    public $table = 't_kelas';
    public $primary_key = 't_kelas_id';
    public $label = 't_kelas_nama';
    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array('t_kelas_id'); // ...Or you can set an array with the fields that cannot be filled by insert/update

    function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->has_one['m_jurusan'] = array('M_jurusan_model','jurusan_id','jurusan_id');
        $this->has_one['m_semester'] = array('M_semester_model','semester_id','semester_id');
        $this->has_one['m_kelas'] = array('M_kelas_model','kelas_id','kelas_id');
    }
    
    // get total rows
    function get_limit_data($limit, $start) {
        $order            = $this->input->post('order');
        $dataorder = array();
        $where = array();

        $i=1;
        $dataorder[$i++] = 't_kelas_nama';
        $dataorder[$i++] = 'kelas_id';
        $dataorder[$i++] = 'jurusan_id';
        $dataorder[$i++] = 'semester_id';
        $dataorder[$i++] = 'tahun';
        if(!empty($this->input->post('t_kelas_nama'))){
            $where['LOWER(t_kelas_nama) LIKE'] = '%'.strtolower($this->input->post('t_kelas_nama')).'%';
        }
        if(!empty($this->input->post('kelas_id'))){
            $where['kelas_id'] = $this->input->post('kelas_id');
        }
        if(!empty($this->input->post('jurusan_id'))){
            $where['jurusan_id'] = $this->input->post('jurusan_id');
        }
        if(!empty($this->input->post('semester_id'))){
            $where['semester_id'] = $this->input->post('semester_id');
        }
        if(!empty($this->input->post('tahun_start'))){
            $where['tahun >='] = $this->input->post('tahun_start');
        }
        if(!empty($this->input->post('tahun_end'))){
            $where['tahun <='] = $this->input->post('tahun_end');
        }

        $this->where($where);
        $result['total_rows'] = $this->count_rows();
        
        $this->where($where);
        $this->order_by( $dataorder[$order[0]["column"]],  $order[0]["dir"]);
        $this->limit($start, $limit);
        $result['get_db']=$this
                            ->with_m_jurusan()
                            ->with_m_semester()
                            ->with_m_kelas()
                            ->get_all();
        return $result;
    }

}

/* End of file T_kelas_model.php */
/* Location: ./application/models/T_kelas_model.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */