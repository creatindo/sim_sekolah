<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_jabatan extends MY_Model
{

    public $table = 'm_jabatan';
    public $primary_key = 'jabatan_id';
    public $label = 'jabatan_id';
    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update

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
        
        $dataorder[$i++] = 'jabatan_nama';
        if(!empty($this->input->post('jabatan_nama'))){
            $where['LOWER(jabatan_nama) LIKE'] = '%'.strtolower($this->input->post('jabatan_nama')).'%';
        }
        $this->where($where);
        $result['total_rows'] = $this->count_rows();
        
        $this->where($where);
        $this->order_by( $dataorder[$order[0]["column"]],  $order[0]["dir"]);
        $this->limit($start, $limit);
        $result['get_db']=$this->as_array()->get_all();
        return $result;
    }

}

/* End of file M_jabatan.php */
/* Location: ./application/models/M_jabatan.php */
/* Please DO NOT modify this information : */
