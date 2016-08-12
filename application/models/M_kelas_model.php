<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_kelas_model extends MY_Model
{

    public $table = 'm_kelas';
    public $primary_key = 'kelas_id';
    public $label = 'kelas_nama';
    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update

    function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->has_one['m_status'] = array('M_status_model','status_id','kelas_active');
    }
    
    // get total rows
    function get_limit_data($limit, $start) {
        $order            = $this->input->post('order');
        $dataorder = array();
        $where = array();

        $i=1;
        
        $dataorder[$i++] = 'kelas_nama';
        $dataorder[$i++] = 'kelas_active';
        if(!empty($this->input->post('kelas_nama'))){
            $where['LOWER(kelas_nama) LIKE'] = '%'.strtolower($this->input->post('kelas_nama')).'%';
        }
        if(!empty($this->input->post('kelas_active'))){
            $where['kelas_active'] = $this->input->post('kelas_active');
        }
        $this->where($where);
        $result['total_rows'] = $this->count_rows();
        
        $this->where($where);
        $this->order_by( $dataorder[$order[0]["column"]],  $order[0]["dir"]);
        $this->limit($start, $limit);
        $result['get_db']=$this
                            ->with_m_status()
                            ->get_all();
        return $result;
    }

}

/* End of file M_kelas_model.php */
/* Location: ./application/models/M_kelas_model.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */