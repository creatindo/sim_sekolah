
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>T_ABSENSI</span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Jadwal Id</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="jadwal_id" id="jadwal_id" placeholder="Jadwal Id" value="<?php echo $jadwal_id; ?>" />
                            <span class='help-block'> <?php echo form_error('jadwal_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>T Siswa Id</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="t_siswa_id" id="t_siswa_id" placeholder="T Siswa Id" value="<?php echo $t_siswa_id; ?>" />
                            <span class='help-block'> <?php echo form_error('t_siswa_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="siswa" id="siswa" placeholder="Siswa" value="<?php echo $siswa; ?>" />
                            <span class='help-block'> <?php echo form_error('siswa') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <input type="hidden" name="absensi_id" value="<?php echo $absensi_id; ?>" />
                </div>
                <div class='form-actions'>
                            <button type='submit' class='btn green'>Submit</button>
                            <a href="<?php echo site_url('t_absensi') ?>" class="btn default">Cancel</a>
                </div>
                
              </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->