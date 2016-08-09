<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_ujian_model extends MY_Model
{

    public $table = 'm_ujian';
    public $primary_key = 'ujian_id';
    public $label = 'ujian_nama';
    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update

    function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->has_one['m_status'] = array('M_status_model','status_id','ujian_active');
    }
    
    // get total rows
    function get_limit_data($limit, $start) {
        $order            = $this->input->post('order');
        $dataorder = array();
        $where = array();

        $i=1;
        
        $dataorder[$i++] = 'ujian_nama';
        $dataorder[$i++] = 'ujian_active';
        if(!empty($this->input->post('ujian_nama'))){
            $where['LOWER(ujian_nama) LIKE'] = '%'.strtolower($this->input->post('ujian_nama')).'%';
        }
        if(!empty($this->input->post('ujian_active'))){
            $where['LOWER(ujian_active) LIKE'] = '%'.strtolower($this->input->post('ujian_active')).'%';
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

/* End of file M_ujian_model.php */
/* Location: ./application/models/M_ujian_model.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */