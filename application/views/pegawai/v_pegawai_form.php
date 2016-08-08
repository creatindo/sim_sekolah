
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form PEGAWAI </span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Pegawai Nip</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="pegawai_nip" id="pegawai_nip" placeholder="Pegawai Nip" value="<?php echo $pegawai_nip; ?>" />
                            <span class='help-block'> <?php echo form_error('pegawai_nip') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
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
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Pegawai Jk</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="pegawai_jk" id="pegawai_jk" placeholder="Pegawai Jk" value="<?php echo $pegawai_jk; ?>" />
                            <span class='help-block'> <?php echo form_error('pegawai_jk') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Pegawai Tgl Lahir</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="pegawai_tgl_lahir" id="pegawai_tgl_lahir" placeholder="Pegawai Tgl Lahir" value="<?php echo $pegawai_tgl_lahir; ?>" />
                            <span class='help-block'> <?php echo form_error('pegawai_tgl_lahir') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Pegawai Golongan</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="pegawai_golongan" id="pegawai_golongan" placeholder="Pegawai Golongan" value="<?php echo $pegawai_golongan; ?>" />
                            <span class='help-block'> <?php echo form_error('pegawai_golongan') ?> </span>
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
                  
                </div>
                <div class='row'>
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
                        <label class='col-md-3 control-label'>Pegawai Alamat</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="pegawai_alamat" id="pegawai_alamat" placeholder="Pegawai Alamat" value="<?php echo $pegawai_alamat; ?>" />
                            <span class='help-block'> <?php echo form_error('pegawai_alamat') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Pegawai Telp</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="pegawai_telp" id="pegawai_telp" placeholder="Pegawai Telp" value="<?php echo $pegawai_telp; ?>" />
                            <span class='help-block'> <?php echo form_error('pegawai_telp') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Pegawai Foto</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="pegawai_foto" id="pegawai_foto" placeholder="Pegawai Foto" value="<?php echo $pegawai_foto; ?>" />
                            <span class='help-block'> <?php echo form_error('pegawai_foto') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Create Date</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="create_date" id="create_date" placeholder="Create Date" value="<?php echo $create_date; ?>" />
                            <span class='help-block'> <?php echo form_error('create_date') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                  <input type="hidden" name="pegawai_id" value="<?php echo $pegawai_id; ?>" />
                </div>
                <div class='form-actions'>
                  <div class='row'>
                      <div class='col-md-offset-5 col-md-7'>
                        <button type='submit' class='btn green'>Submit</button>
                        <a href="<?php echo site_url('pegawai') ?>" class="btn default">Cancel</a>
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