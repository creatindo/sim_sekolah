
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>M_SISWA</span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Nis</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="siswa_nis" id="siswa_nis" placeholder="Siswa Nis" value="<?php echo $siswa_nis; ?>" />
                            <span class='help-block'> <?php echo form_error('siswa_nis') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Nama</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="siswa_nama" id="siswa_nama" placeholder="Siswa Nama" value="<?php echo $siswa_nama; ?>" />
                            <span class='help-block'> <?php echo form_error('siswa_nama') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Jk</label>
                        <div class='col-md-9'>
                            <select class="form-control" name="siswa_jk" id="siswa_jk" placeholder="Siswa Jk">
                                <option value="" >Pilih</option>                              
                                <option value="l" <?php echo $siswa_jk == 'l' ?'selected':''; ?>>Laki-laki</option>                              
                                <option value="p" <?php echo $siswa_jk == 'p' ?'selected':''; ?>>Perempuan</option>                              
                            </select>
                            <span class='help-block'> <?php echo form_error('siswa_jk') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Tgl Lahir</label>
                        <div class='col-md-9'>
                            <?php if (isset($siswa_tgl_lahir)) {
                                $time = strtotime($siswa_tgl_lahir);
                                $time_format = date('d/m/Y', $time); 
                                $value=$time_format;
                            }else{
                                $value = '';
                            }?>
                            <input class="form-control form-control-inline date-picker" size="16" type="text" name="siswa_tgl_lahir" id="siswa_tgl_lahir" readonly value="<?php echo $value ?>"/>
                            <span class='help-block'> <?php echo form_error('siswa_tgl_lahir') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kota Id</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="kota_id" id="kota_id" placeholder="Kota Id" value="<?php echo $kota_id; ?>" />
                            <span class='help-block'> <?php echo form_error('kota_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kecamatan Id</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="kecamatan_id" id="kecamatan_id" placeholder="Kecamatan Id" value="<?php echo $kecamatan_id; ?>" />
                            <span class='help-block'> <?php echo form_error('kecamatan_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Alamat</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="siswa_alamat" id="siswa_alamat" placeholder="Siswa Alamat" value="<?php echo $siswa_alamat; ?>" />
                            <span class='help-block'> <?php echo form_error('siswa_alamat') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Ayah</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="siswa_ayah" id="siswa_ayah" placeholder="Siswa Ayah" value="<?php echo $siswa_ayah; ?>" />
                            <span class='help-block'> <?php echo form_error('siswa_ayah') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Ibu</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="siswa_ibu" id="siswa_ibu" placeholder="Siswa Ibu" value="<?php echo $siswa_ibu; ?>" />
                            <span class='help-block'> <?php echo form_error('siswa_ibu') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Wali</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="siswa_wali" id="siswa_wali" placeholder="Siswa Wali" value="<?php echo $siswa_wali; ?>" />
                            <span class='help-block'> <?php echo form_error('siswa_wali') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Telp Ortu</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="telp_ortu" id="telp_ortu" placeholder="Telp Ortu" value="<?php echo $telp_ortu; ?>" />
                            <span class='help-block'> <?php echo form_error('telp_ortu') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <input type="hidden" name="siswa_id" value="<?php echo $siswa_id; ?>" />
                </div>
                <div class='form-actions'>
                            <button type='submit' class='btn green'>Submit</button>
                            <a href="<?php echo site_url('siswa') ?>" class="btn default">Cancel</a>
                </div>
                
              </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->