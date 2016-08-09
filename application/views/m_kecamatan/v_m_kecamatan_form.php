
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form M_KECAMATAN </span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kecamatan Kode</label>
                        <div class='col-md-9'>
                            <span class='help-block'> <?php echo form_error('kecamatan_kode') ?> </span>
                            <input type="text" class="form-control" name="kecamatan_kode" id="kecamatan_kode" placeholder="Kecamatan Kode" value="<?php echo $kecamatan_kode; ?>" />
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>M Kota Id</label>
                        <div class='col-md-9'>
                            <span class='help-block'> <?php echo form_error('m_kota_id') ?> </span>
                            <input type="text" class="form-control" name="m_kota_id" id="m_kota_id" placeholder="M Kota Id" value="<?php echo $m_kota_id; ?>" />
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kecamatan Nama</label>
                        <div class='col-md-9'>
                            <span class='help-block'> <?php echo form_error('kecamatan_nama') ?> </span>
                            <input type="text" class="form-control" name="kecamatan_nama" id="kecamatan_nama" placeholder="Kecamatan Nama" value="<?php echo $kecamatan_nama; ?>" />
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kecamatan Aktif</label>
                        <div class='col-md-9'>
                            <span class='help-block'> <?php echo form_error('kecamatan_aktif') ?> </span>
                            <input type="text" class="form-control" name="kecamatan_aktif" id="kecamatan_aktif" placeholder="Kecamatan Aktif" value="<?php echo $kecamatan_aktif; ?>" />
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kecamatan Created By</label>
                        <div class='col-md-9'>
                            <span class='help-block'> <?php echo form_error('kecamatan_created_by') ?> </span>
                            <input type="text" class="form-control" name="kecamatan_created_by" id="kecamatan_created_by" placeholder="Kecamatan Created By" value="<?php echo $kecamatan_created_by; ?>" />
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kecamatan Revised</label>
                        <div class='col-md-9'>
                            <span class='help-block'> <?php echo form_error('kecamatan_revised') ?> </span>
                            <input type="text" class="form-control" name="kecamatan_revised" id="kecamatan_revised" placeholder="Kecamatan Revised" value="<?php echo $kecamatan_revised; ?>" />
                        </div>
                    </div>
                  </div>
                  
                </div>
                  <input type="hidden" name="kecamatan_id" value="<?php echo $kecamatan_id; ?>" />
                </div>
                <div class='form-actions'>
                  <div class='row'>
                      <div class='col-md-offset-5 col-md-7'>
                        <a href="<?php echo site_url('m_kecamatan') ?>" class="btn default">Cancel</a>
                        <button type='submit' class='btn green'>Submit</button>
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