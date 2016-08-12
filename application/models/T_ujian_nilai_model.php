<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_ujian_nilai_model extends MY_Model
{

    public $table = 't_ujian_nilai';
    public $primary_key = 'nilai_id';
    public $label = 'nilai_nama';
    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update

    function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->has_one['t_siswa'] = array('T_siswa_model','t_siswa_id','t_siswa_id');
        $this->has_one['t_ujian'] = array('T_ujian_model','t_ujian_id','t_ujian_id');
    }
    
    // get total rows
    function get_limit_data($limit, $start) {
        $order            = $this->input->post('order');
        $dataorder = array();
        $where = array();

        $i=1;
        
        $dataorder[$i++] = 'nilai_nama';
        $dataorder[$i++] = 't_ujian_id';
        $dataorder[$i++] = 't_siswa_id';
        $dataorder[$i++] = 'nilai';
        if(!empty($this->input->post('nilai_nama'))){
            $where['LOWER(nilai_nama) LIKE'] = '%'.strtolower($this->input->post('nilai_nama')).'%';
        }
        if(!empty($this->input->post('t_ujian_id'))){
            $where['t_ujian_id'] = $this->input->post('t_ujian_id');
        }
        if(!empty($this->input->post('t_siswa_id'))){
            $where['t_siswa_id'] = $this->input->post('t_siswa_id');
        }
        if(!empty($this->input->post('nilai'))){
            $where['LOWER(nilai) LIKE'] = '%'.strtolower($this->input->post('nilai')).'%';
        }
        $this->where($where);
        $result['total_rows'] = $this->count_rows();
        
        $this->where($where);
        $this->order_by( $dataorder[$order[0]["column"]],  $order[0]["dir"]);
        $this->limit($start, $limit);
        $result['get_db']=$this
                            ->with_t_siswa()
                            ->with_t_ujian()
                            ->get_all();
        return $result;
    }

}

/* End of file T_ujian_nilai_model.php */
/* Location: ./application/models/T_ujian_nilai_model.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */