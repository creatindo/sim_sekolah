<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_kota_model extends MY_Model
{

    public $table = 'm_kota';
    public $primary_key = 'kota_id';
    public $label = 'kota_nama';
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
        
        $dataorder[$i++] = 'kota_kode';
        $dataorder[$i++] = 'm_propinsi_id';
        $dataorder[$i++] = 'kota_nama';
        $dataorder[$i++] = 'kota_aktif';
        $dataorder[$i++] = 'kota_created_by';
        $dataorder[$i++] = 'kota_revised';
        $dataorder[$i++] = 'kota_counter';
        $dataorder[$i++] = 'kota_kab';
        if(!empty($this->input->post('kota_kode'))){
            $where['LOWER(kota_kode) LIKE'] = '%'.strtolower($this->input->post('kota_kode')).'%';
        }
        if(!empty($this->input->post('m_propinsi_id'))){
            $where['LOWER(m_propinsi_id) LIKE'] = '%'.strtolower($this->input->post('m_propinsi_id')).'%';
        }
        if(!empty($this->input->post('kota_nama'))){
            $where['LOWER(kota_nama) LIKE'] = '%'.strtolower($this->input->post('kota_nama')).'%';
        }
        if(!empty($this->input->post('kota_aktif'))){
            $where['LOWER(kota_aktif) LIKE'] = '%'.strtolower($this->input->post('kota_aktif')).'%';
        }
        if(!empty($this->input->post('kota_created_by'))){
            $where['LOWER(kota_created_by) LIKE'] = '%'.strtolower($this->input->post('kota_created_by')).'%';
        }
        if(!empty($this->input->post('kota_revised'))){
            $where['LOWER(kota_revised) LIKE'] = '%'.strtolower($this->input->post('kota_revised')).'%';
        }
        if(!empty($this->input->post('kota_counter'))){
            $where['LOWER(kota_counter) LIKE'] = '%'.strtolower($this->input->post('kota_counter')).'%';
        }
        if(!empty($this->input->post('kota_kab'))){
            $where['LOWER(kota_kab) LIKE'] = '%'.strtolower($this->input->post('kota_kab')).'%';
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

/* End of file M_kota_model.php */
/* Location: ./application/models/M_kota_model.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */