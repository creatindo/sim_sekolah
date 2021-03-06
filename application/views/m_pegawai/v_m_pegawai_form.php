
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form M PEGAWAI </span>
          </div>
        </div>
        <div class='portlet-body form'>
          <form action="<?php echo $action; ?>" method="post">
            <div class='form-body'>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('pegawai_nip')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>Pegawai Nip</label>
                    <div class='col-md-9'>
                      <input type="text" class="form-control" name="pegawai_nip" id="pegawai_nip" placeholder="Pegawai Nip" value="<?php echo $pegawai_nip; ?>" />
                      <span class='help-block'> <?php echo form_error('pegawai_nip') ?> </span>
                    </div>
                  </div>
                </div>
                
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('pegawai_nama')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>Pegawai Nama</label>
                    <div class='col-md-9'>
                      <input type="text" class="form-control" name="pegawai_nama" id="pegawai_nama" placeholder="Pegawai Nama" value="<?php echo $pegawai_nama; ?>" />
                      <span class='help-block'> <?php echo form_error('pegawai_nama') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('pegawai_jk')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>Pegawai Jk</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_3 = '';
                      if (!empty($pegawai_jk)) {                                
                        $v_name_3 = $this->M_gender_model->get($pegawai_jk)->{$this->M_gender_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/M_gender_model'), 
                        'name' =>'pegawai_jk',
                        'current_selected_id' => $pegawai_jk, 
                        'current_selected_name' => $v_name_3, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('pegawai_jk') ?> </span>
                    </div>
                  </div>
                </div>
                
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('pegawai_tgl_lahir')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>Pegawai Tgl Lahir</label>
                    <div class='col-md-9'>
                      <div class='input-group date date-decade' >
                        <input type='text' class='form-control ' readonly name="pegawai_tgl_lahir" value="<?php echo $pegawai_tgl_lahir; ?>">
                        <span class='input-group-btn'>
                          <button class='btn default' type='button'>
                            <i class='fa fa-calendar'></i>
                          </button>
                        </span>
                      </div>
                      <span class='help-block'> <?php echo form_error('pegawai_tgl_lahir') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('pegawai_golongan')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>Pegawai Golongan</label>
                    <div class='col-md-9'>
                      <input type="text" class="form-control" name="pegawai_golongan" id="pegawai_golongan" placeholder="Pegawai Golongan" value="<?php echo $pegawai_golongan; ?>" />
                      <span class='help-block'> <?php echo form_error('pegawai_golongan') ?> </span>
                    </div>
                  </div>
                </div>
                
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('kota_id')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>Kota Id</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_6 = '';
                      if (!empty($kota_id)) {                                
                        $v_name_6 = $this->M_kota_model->get($kota_id)->{$this->M_kota_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/M_kota_model'), 
                        'name' =>'kota_id',
                        'current_selected_id' => $kota_id, 
                        'current_selected_name' => $v_name_6, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('kota_id') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('kecamatan_id')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>Kecamatan Id</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_7 = '';
                      if (!empty($kecamatan_id)) {                                
                        $v_name_7 = $this->M_kecamatan_model->get($kecamatan_id)->{$this->M_kecamatan_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/M_kecamatan_model'), 
                        'name' =>'kecamatan_id',
                        'current_selected_id' => $kecamatan_id, 
                        'current_selected_name' => $v_name_7, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('kecamatan_id') ?> </span>
                    </div>
                  </div>
                </div>
                
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('pegawai_alamat')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>Pegawai Alamat</label>
                    <div class='col-md-9'>
                      <textarea class="form-control" rows="3" name="pegawai_alamat" id="pegawai_alamat" placeholder="Pegawai Alamat"><?php echo $pegawai_alamat; ?></textarea>
                      <span class='help-block'> <?php echo form_error('pegawai_alamat') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('pegawai_telp')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>Pegawai Telp</label>
                    <div class='col-md-9'>
                      <input type="text" class="form-control" name="pegawai_telp" id="pegawai_telp" placeholder="Pegawai Telp" value="<?php echo $pegawai_telp; ?>" />
                      <span class='help-block'> <?php echo form_error('pegawai_telp') ?> </span>
                    </div>
                  </div>
                </div>
                
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('foto_img')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'> imgFoto Img</label>
                    <div class='col-md-9'>
                      <input type="hidden" class="form-control" name="foto_img" id="foto_img" placeholder="Foto Img" value="<?php echo $foto_img; ?>" />
                      <img class="btn no-space upload_img_single" id="foto_img_preview" style="width: 100px; height: 100px;" src="<?php echo base_url('uploads/temp/'.$foto_img); ?>" onerror="this.src='<?php echo base_url("assets/global/img/noimage.png") ?>'" alt="Image">
                      <span class='help-block'> <?php echo form_error('foto_img') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('jabatan')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>Jabatan</label>
                    <div class='col-md-9'>
                      <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
                      <span class='help-block'> <?php echo form_error('jabatan') ?> </span>
                    </div>
                  </div>
                </div>
                
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('user_id')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>User Id</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_12 = '';
                      if (!empty($user_id)) {                                
                        $v_name_12 = $this->M_user_model->get($user_id)->{$this->M_user_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/M_user_model'), 
                        'name' =>'user_id',
                        'current_selected_id' => $user_id, 
                        'current_selected_name' => $v_name_12, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('user_id') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
                <input type="hidden" name="pegawai_id" value="<?php echo $pegawai_id; ?>" />
              </div>
              <div class='form-actions'>
                <div class='row'>
                  <div class='col-md-offset-5 col-md-7'>
                    <a href="<?php echo site_url('m_pegawai') ?>" class="btn default">Kembali</a>
                    <?php if ($button == 'Create'): ?>
                    <button type='submit' class='btn green' name='mode' value='new' >Simpan</button>
                    <?php endif ?>
                    <button type='submit' class='btn blue' >Selesai</button>
                  </div>
                </div>
              </div>
              
            </div>
          </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->