<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_kecamatan_model extends MY_Model
{

    public $table = 'm_kecamatan';
    public $primary_key = 'kecamatan_id';
    public $label = 'kecamatan_nama';
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
        
        $dataorder[$i++] = 'kecamatan_kode';
        $dataorder[$i++] = 'm_kota_id';
        $dataorder[$i++] = 'kecamatan_nama';
        $dataorder[$i++] = 'kecamatan_aktif';
        $dataorder[$i++] = 'kecamatan_created_by';
        $dataorder[$i++] = 'kecamatan_revised';
        if(!empty($this->input->post('kecamatan_kode'))){
            $where['LOWER(kecamatan_kode) LIKE'] = '%'.strtolower($this->input->post('kecamatan_kode')).'%';
        }
        if(!empty($this->input->post('m_kota_id'))){
            $where['LOWER(m_kota_id) LIKE'] = '%'.strtolower($this->input->post('m_kota_id')).'%';
        }
        if(!empty($this->input->post('kecamatan_nama'))){
            $where['LOWER(kecamatan_nama) LIKE'] = '%'.strtolower($this->input->post('kecamatan_nama')).'%';
        }
        if(!empty($this->input->post('kecamatan_aktif'))){
            $where['LOWER(kecamatan_aktif) LIKE'] = '%'.strtolower($this->input->post('kecamatan_aktif')).'%';
        }
        if(!empty($this->input->post('kecamatan_created_by'))){
            $where['LOWER(kecamatan_created_by) LIKE'] = '%'.strtolower($this->input->post('kecamatan_created_by')).'%';
        }
        if(!empty($this->input->post('kecamatan_revised'))){
            $where['LOWER(kecamatan_revised) LIKE'] = '%'.strtolower($this->input->post('kecamatan_revised')).'%';
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

/* End of file M_kecamatan_model.php */
/* Location: ./application/models/M_kecamatan_model.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */