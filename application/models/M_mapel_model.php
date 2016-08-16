<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_mapel_model extends MY_Model
{

    public $table = 'm_mapel';
    public $primary_key = 'mapel_id';
    public $label = 'mapel_nama';
    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array('mapel_id'); // ...Or you can set an array with the fields that cannot be filled by insert/update

    function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->has_one['m_status'] = array('M_status_model','status_id','mapel_active');
    }
    
    // get total rows
    function get_limit_data($limit, $start) {
        $order            = $this->input->post('order');
        $dataorder = array();
        $where = array();

        $i=1;
        
        $dataorder[$i++] = 'mapel_nama';
        $dataorder[$i++] = 'mapel_active';
        if(!empty($this->input->post('mapel_nama'))){
            $where['LOWER(mapel_nama) LIKE'] = '%'.strtolower($this->input->post('mapel_nama')).'%';
        }
        if(!empty($this->input->post('mapel_active'))){
            $where['mapel_active'] = $this->input->post('mapel_active');
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

/* End of file M_mapel_model.php */
/* Location: ./application/models/M_mapel_model.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */