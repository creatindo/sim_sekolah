<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pegawai extends MY_Model
{

    public $table = 'm_pegawai';
    public $primary_key = 'pegawai_id';
    public $label = 'pegawai_nama';
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
        
        $dataorder[$i++] = 'pegawai_nip';
        $dataorder[$i++] = 'pegawai_nama';
        $dataorder[$i++] = 'pegawai_jk';
        $dataorder[$i++] = 'pegawai_tgl_lahir';
        $dataorder[$i++] = 'pegawai_golongan';
        $dataorder[$i++] = 'kota_id';
        $dataorder[$i++] = 'kecamatan_id';
        $dataorder[$i++] = 'pegawai_alamat';
        $dataorder[$i++] = 'pegawai_telp';
        $dataorder[$i++] = 'pegawai_foto';
        $dataorder[$i++] = 'create_date';
        if(!empty($this->input->post('pegawai_nip'))){
            $where['LOWER(pegawai_nip) LIKE'] = '%'.strtolower($this->input->post('pegawai_nip')).'%';
        }
        if(!empty($this->input->post('pegawai_nama'))){
            $where['LOWER(pegawai_nama) LIKE'] = '%'.strtolower($this->input->post('pegawai_nama')).'%';
        }
        if(!empty($this->input->post('pegawai_jk'))){
            $where['LOWER(pegawai_jk) LIKE'] = '%'.strtolower($this->input->post('pegawai_jk')).'%';
        }
        if(!empty($this->input->post('pegawai_tgl_lahir'))){
            $where['LOWER(pegawai_tgl_lahir) LIKE'] = '%'.strtolower($this->input->post('pegawai_tgl_lahir')).'%';
        }
        if(!empty($this->input->post('pegawai_golongan'))){
            $where['LOWER(pegawai_golongan) LIKE'] = '%'.strtolower($this->input->post('pegawai_golongan')).'%';
        }
        if(!empty($this->input->post('kota_id'))){
            $where['LOWER(kota_id) LIKE'] = '%'.strtolower($this->input->post('kota_id')).'%';
        }
        if(!empty($this->input->post('kecamatan_id'))){
            $where['LOWER(kecamatan_id) LIKE'] = '%'.strtolower($this->input->post('kecamatan_id')).'%';
        }
        if(!empty($this->input->post('pegawai_alamat'))){
            $where['LOWER(pegawai_alamat) LIKE'] = '%'.strtolower($this->input->post('pegawai_alamat')).'%';
        }
        if(!empty($this->input->post('pegawai_telp'))){
            $where['LOWER(pegawai_telp) LIKE'] = '%'.strtolower($this->input->post('pegawai_telp')).'%';
        }
        if(!empty($this->input->post('pegawai_foto'))){
            $where['LOWER(pegawai_foto) LIKE'] = '%'.strtolower($this->input->post('pegawai_foto')).'%';
        }
        if(!empty($this->input->post('create_date'))){
            $where['LOWER(create_date) LIKE'] = '%'.strtolower($this->input->post('create_date')).'%';
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

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-08-08 08:05:50 */
/* http://harviacode.com */