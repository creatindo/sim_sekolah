
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>M_KELAS</span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kelas Nama</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="kelas_nama" id="kelas_nama" placeholder="Kelas Nama" value="<?php echo $kelas_nama; ?>" />
                            <span class='help-block'> <?php echo form_error('kelas_nama') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kelas Active</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="kelas_active" id="kelas_active" placeholder="Kelas Active" value="<?php echo $kelas_active; ?>" />
                            <span class='help-block'> <?php echo form_error('kelas_active') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>" />
                </div>
                <div class='form-actions'>
                            <button type='submit' class='btn green'>Submit</button>
                            <a href="<?php echo site_url('kelas') ?>" class="btn default">Cancel</a>
                </div>
                
              </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->