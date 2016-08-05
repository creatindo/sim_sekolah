
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>M_UJIAN</span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Ujian Kode</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="ujian_kode" id="ujian_kode" placeholder="Ujian Kode" value="<?php echo $ujian_kode; ?>" />
                            <span class='help-block'> <?php echo form_error('ujian_kode') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Ujian Nama</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="ujian_nama" id="ujian_nama" placeholder="Ujian Nama" value="<?php echo $ujian_nama; ?>" />
                            <span class='help-block'> <?php echo form_error('ujian_nama') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Ujian Active</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="ujian_active" id="ujian_active" placeholder="Ujian Active" value="<?php echo $ujian_active; ?>" />
                            <span class='help-block'> <?php echo form_error('ujian_active') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <input type="hidden" name="ujian_id" value="<?php echo $ujian_id; ?>" />
                </div>
                <div class='form-actions'>
                            <button type='submit' class='btn green'>Submit</button>
                            <a href="<?php echo site_url('ujian') ?>" class="btn default">Cancel</a>
                </div>
                
              </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->