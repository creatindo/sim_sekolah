<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_siswa_model extends MY_Model
{

    public $table = 'm_siswa';
    public $primary_key = 'siswa_id';
    public $label = 'siswa_nama';
    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update

    function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->has_one['m_gender'] = array('M_gender_model','gender_id','siswa_jk');
        $this->has_one['m_kota'] = array('M_kota_model','kota_id','kota_id');
        $this->has_one['m_kecamatan'] = array('M_kecamatan_model','kecamatan_id','kecamatan_id');
    }
    
    // get total rows
    function get_limit_data($limit, $start) {
        $order            = $this->input->post('order');
        $dataorder = array();
        $where = array();

        $i=1;
        
        $dataorder[$i++] = 'siswa_nis';
        $dataorder[$i++] = 'siswa_nama';
        $dataorder[$i++] = 'siswa_jk';
        $dataorder[$i++] = 'siswa_tgl_lahir';
        $dataorder[$i++] = 'kota_id';
        $dataorder[$i++] = 'kecamatan_id';
        $dataorder[$i++] = 'siswa_alamat';
        $dataorder[$i++] = 'siswa_ayah';
        $dataorder[$i++] = 'siswa_ibu';
        $dataorder[$i++] = 'siswa_wali';
        $dataorder[$i++] = 'telp_ortu';
        $dataorder[$i++] = 'siswa_img';
        if(!empty($this->input->post('siswa_nis'))){
            $where['LOWER(siswa_nis) LIKE'] = '%'.strtolower($this->input->post('siswa_nis')).'%';
        }
        if(!empty($this->input->post('siswa_nama'))){
            $where['LOWER(siswa_nama) LIKE'] = '%'.strtolower($this->input->post('siswa_nama')).'%';
        }
        if(!empty($this->input->post('siswa_jk'))){
            $where['siswa_jk'] = $this->input->post('siswa_jk');
        }
        if(!empty($this->input->post('siswa_tgl_lahir_start'))){
            $where['siswa_tgl_lahir >='] = $this->input->post('siswa_tgl_lahir_start');
        }
        if(!empty($this->input->post('siswa_tgl_lahir_end'))){
            $where['siswa_tgl_lahir <='] = $this->input->post('siswa_tgl_lahir_end');
        }
        if(!empty($this->input->post('kota_id'))){
            $where['kota_id'] = $this->input->post('kota_id');
        }
        if(!empty($this->input->post('kecamatan_id'))){
            $where['kecamatan_id'] = $this->input->post('kecamatan_id');
        }
        if(!empty($this->input->post('siswa_alamat'))){
            $where['LOWER(siswa_alamat) LIKE'] = '%'.strtolower($this->input->post('siswa_alamat')).'%';
        }
        if(!empty($this->input->post('siswa_ayah'))){
            $where['LOWER(siswa_ayah) LIKE'] = '%'.strtolower($this->input->post('siswa_ayah')).'%';
        }
        if(!empty($this->input->post('siswa_ibu'))){
            $where['LOWER(siswa_ibu) LIKE'] = '%'.strtolower($this->input->post('siswa_ibu')).'%';
        }
        if(!empty($this->input->post('siswa_wali'))){
            $where['LOWER(siswa_wali) LIKE'] = '%'.strtolower($this->input->post('siswa_wali')).'%';
        }
        if(!empty($this->input->post('telp_ortu'))){
            $where['LOWER(telp_ortu) LIKE'] = '%'.strtolower($this->input->post('telp_ortu')).'%';
        }
        if(!empty($this->input->post('siswa_img'))){
            $where['LOWER(siswa_img) LIKE'] = '%'.strtolower($this->input->post('siswa_img')).'%';
        }
        $this->where($where);
        $result['total_rows'] = $this->count_rows();
        
        $this->where($where);
        $this->order_by( $dataorder[$order[0]["column"]],  $order[0]["dir"]);
        $this->limit($start, $limit);
        $result['get_db']=$this
                            ->with_m_gender()
                            ->with_m_kota()
                            ->with_m_kecamatan()
                            ->get_all();
        return $result;
    }

}

/* End of file M_siswa_model.php */
/* Location: ./application/models/M_siswa_model.php */
/* Please DO NOT modify this information : */
/* http://harviacode.com */