<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pegawai_model extends MY_Model
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
        $this->has_one['m_user'] = array('M_user_model','user_id','user_id');
        $this->has_one['m_gender'] = array('M_gender_model','gender_id','pegawai_jk');
        $this->has_one['m_kota'] = array('M_kota_model','kota_id','kota_id');
        $this->has_one['m_kecamatan'] = array('M_kecamatan_model','kecamatan_id','kecamatan_id');
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
        $dataorder[$i++] = 'foto_img';
        $dataorder[$i++] = 'jabatan';
        $dataorder[$i++] = 'user_id';
        if(!empty($this->input->post('pegawai_nip'))){
            $where['LOWER(pegawai_nip) LIKE'] = '%'.strtolower($this->input->post('pegawai_nip')).'%';
        }
        if(!empty($this->input->post('pegawai_nama'))){
            $where['LOWER(pegawai_nama) LIKE'] = '%'.strtolower($this->input->post('pegawai_nama')).'%';
        }
        if(!empty($this->input->post('pegawai_jk'))){
            $where['pegawai_jk'] = $this->input->post('pegawai_jk');
        }
        if(!empty($this->input->post('pegawai_tgl_lahir_start'))){
            $where['pegawai_tgl_lahir >='] = $this->input->post('pegawai_tgl_lahir_start');
        }
        if(!empty($this->input->post('pegawai_tgl_lahir_end'))){
            $where['pegawai_tgl_lahir <='] = $this->input->post('pegawai_tgl_lahir_end');
        }
        if(!empty($this->input->post('pegawai_golongan'))){
            $where['LOWER(pegawai_golongan) LIKE'] = '%'.strtolower($this->input->post('pegawai_golongan')).'%';
        }
        if(!empty($this->input->post('kota_id'))){
            $where['kota_id'] = $this->input->post('kota_id');
        }
        if(!empty($this->input->post('kecamatan_id'))){
            $where['kecamatan_id'] = $this->input->post('kecamatan_id');
        }
        if(!empty($this->input->post('pegawai_alamat'))){
            $where['LOWER(pegawai_alamat) LIKE'] = '%'.strtolower($this->input->post('pegawai_alamat')).'%';
        }
        if(!empty($this->input->post('pegawai_telp'))){
            $where['LOWER(pegawai_telp) LIKE'] = '%'.strtolower($this->input->post('pegawai_telp')).'%';
        }
        if(!empty($this->input->post('foto_img'))){
            $where['LOWER(foto_img) LIKE'] = '%'.strtolower($this->input->post('foto_img')).'%';
        }
        if(!empty($this->input->post('jabatan'))){
            $where['LOWER(jabatan) LIKE'] = '%'.strtolower($this->input->post('jabatan')).'%';
        }
        if(!empty($this->input->post('user_id'))){
            $where['user_id'] = $this->input->post('user_id');
        }
        $this->where($where);
        $result['total_rows'] = $this->count_rows();
        
        $this->where($where);
        $this->order_by( $dataorder[$order[0]["column"]],  $order[0]["dir"]);
        $this->limit($start, $limit);
        $result['get_db']=$this
                            ->with_m_user()
                            ->with_m_gender()
                            ->with_m_kota()
                            ->with_m_kecamatan()
                            ->get_all();
        return $result;
    }

}

/* End of file M_pegawai_model.php */
/* Location: ./application/models/M_pegawai_model.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */