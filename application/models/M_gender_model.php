<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_gender_model extends MY_Model
{

    public $table = 'm_gender';
    public $primary_key = 'gender_id';
    public $label = 'gender_nama';
    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array('gender_id'); // ...Or you can set an array with the fields that cannot be filled by insert/update

    function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
    }
    
    // get total rows
    function get_limit_data($limit, $start) {
        $order            = $this->input->post('order');
        $dataorder = array();
        $where = array();

        $i=1;
        $dataorder[$i++] = 'gender_nama';
        $dataorder[$i++] = 'gender_kode';
        if(!empty($this->input->post('gender_nama'))){
            $where['LOWER(gender_nama) LIKE'] = '%'.strtolower($this->input->post('gender_nama')).'%';
        }
        if(!empty($this->input->post('gender_kode'))){
            $where['LOWER(gender_kode) LIKE'] = '%'.strtolower($this->input->post('gender_kode')).'%';
        }

        $this->where($where);
        $result['total_rows'] = $this->count_rows();
        
        $this->where($where);
        $this->order_by( $dataorder[$order[0]["column"]],  $order[0]["dir"]);
        $this->limit($start, $limit);
        $result['get_db']=$this
                            ->get_all();
        return $result;
    }

}

/* End of file M_gender_model.php */
/* Location: ./application/models/M_gender_model.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */