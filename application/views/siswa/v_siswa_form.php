
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form SISWA </span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Id</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="siswa_id" id="siswa_id" placeholder="Siswa Id" value="<?php echo $siswa_id; ?>" />
                            <span class='help-block'> <?php echo form_error('siswa_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>T Kelas Id</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="t_kelas_id" id="t_kelas_id" placeholder="T Kelas Id" value="<?php echo $t_kelas_id; ?>" />
                            <span class='help-block'> <?php echo form_error('t_kelas_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Tahun</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
                            <span class='help-block'> <?php echo form_error('tahun') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>T Siswa Active</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="t_siswa_active" id="t_siswa_active" placeholder="T Siswa Active" value="<?php echo $t_siswa_active; ?>" />
                            <span class='help-block'> <?php echo form_error('t_siswa_active') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                  <input type="hidden" name="t_siswa_id" value="<?php echo $t_siswa_id; ?>" />
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