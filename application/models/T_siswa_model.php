<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_siswa_model extends MY_Model
{

    public $table = 't_siswa';
    public $primary_key = 't_siswa_id';
    public $label = 't_siswa_nama';
    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update

    function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->has_one['t_kelas'] = array('T_kelas_model','t_kelas_id','t_kelas_id');
        $this->has_one['m_siswa'] = array('M_siswa_model','siswa_id','siswa_id');
    }
    
    // get total rows
    function get_limit_data($limit, $start) {
        $order            = $this->input->post('order');
        $dataorder = array();
        $where = array();

        $i=1;
        
        $dataorder[$i++] = 't_siswa_nama';
        $dataorder[$i++] = 'siswa_id';
        $dataorder[$i++] = 't_kelas_id';
        $dataorder[$i++] = 't_siswa_active';
        if(!empty($this->input->post('t_siswa_nama'))){
            $where['LOWER(t_siswa_nama) LIKE'] = '%'.strtolower($this->input->post('t_siswa_nama')).'%';
        }
        if(!empty($this->input->post('siswa_id'))){
            $where['LOWER(siswa_id) LIKE'] = '%'.strtolower($this->input->post('siswa_id')).'%';
        }
        if(!empty($this->input->post('t_kelas_id'))){
            $where['LOWER(t_kelas_id) LIKE'] = '%'.strtolower($this->input->post('t_kelas_id')).'%';
        }
        if(!empty($this->input->post('t_siswa_active'))){
            $where['LOWER(t_siswa_active) LIKE'] = '%'.strtolower($this->input->post('t_siswa_active')).'%';
        }
        $this->where($where);
        $result['total_rows'] = $this->count_rows();
        
        $this->where($where);
        $this->order_by( $dataorder[$order[0]["column"]],  $order[0]["dir"]);
        $this->limit($start, $limit);
        $result['get_db']=$this
                            ->with_t_kelas()
                            ->with_m_siswa()
                            ->get_all();
        return $result;
    }

}

/* End of file T_siswa_model.php */
/* Location: ./application/models/T_siswa_model.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */