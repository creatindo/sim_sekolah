
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form M KOTA </span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kota Kode</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="kota_kode" id="kota_kode" placeholder="Kota Kode" value="<?php echo $kota_kode; ?>" />
                            <span class='help-block'> <?php echo form_error('kota_kode') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>M Propinsi Id</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="m_propinsi_id" id="m_propinsi_id" placeholder="M Propinsi Id" value="<?php echo $m_propinsi_id; ?>" />
                            <span class='help-block'> <?php echo form_error('m_propinsi_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kota Nama</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="kota_nama" id="kota_nama" placeholder="Kota Nama" value="<?php echo $kota_nama; ?>" />
                            <span class='help-block'> <?php echo form_error('kota_nama') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kota Aktif</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="kota_aktif" id="kota_aktif" placeholder="Kota Aktif" value="<?php echo $kota_aktif; ?>" />
                            <span class='help-block'> <?php echo form_error('kota_aktif') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kota Created By</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="kota_created_by" id="kota_created_by" placeholder="Kota Created By" value="<?php echo $kota_created_by; ?>" />
                            <span class='help-block'> <?php echo form_error('kota_created_by') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kota Revised</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="kota_revised" id="kota_revised" placeholder="Kota Revised" value="<?php echo $kota_revised; ?>" />
                            <span class='help-block'> <?php echo form_error('kota_revised') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kota Counter</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="kota_counter" id="kota_counter" placeholder="Kota Counter" value="<?php echo $kota_counter; ?>" />
                            <span class='help-block'> <?php echo form_error('kota_counter') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kota Kab</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="kota_kab" id="kota_kab" placeholder="Kota Kab" value="<?php echo $kota_kab; ?>" />
                            <span class='help-block'> <?php echo form_error('kota_kab') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                  <input type="hidden" name="kota_id" value="<?php echo $kota_id; ?>" />
                </div>
                <div class='form-actions'>
                  <div class='row'>
                      <div class='col-md-offset-5 col-md-7'>
                        <a href="<?php echo site_url('m_kota') ?>" class="btn default">Kembali</a>
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