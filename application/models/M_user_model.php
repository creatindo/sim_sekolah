<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_user_model extends MY_Model
{

    public $table = 'm_user';
    public $primary_key = 'user_id';
    public $label = 'user_nama';
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
        
        $dataorder[$i++] = 'user_nama';
        $dataorder[$i++] = 'user_pass';
        $dataorder[$i++] = 'user_pass_verif';
        if(!empty($this->input->post('user_nama'))){
            $where['LOWER(user_nama) LIKE'] = '%'.strtolower($this->input->post('user_nama')).'%';
        }
        if(!empty($this->input->post('user_pass'))){
            $where['LOWER(user_pass) LIKE'] = '%'.strtolower($this->input->post('user_pass')).'%';
        }
        if(!empty($this->input->post('user_pass_verif'))){
            $where['LOWER(user_pass_verif) LIKE'] = '%'.strtolower($this->input->post('user_pass_verif')).'%';
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

/* End of file M_user_model.php */
/* Location: ./application/models/M_user_model.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */