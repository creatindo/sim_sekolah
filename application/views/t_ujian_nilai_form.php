
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>T_UJIAN_NILAI</span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>T Ujian Id</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="t_ujian_id" id="t_ujian_id" placeholder="T Ujian Id" value="<?php echo $t_ujian_id; ?>" />
                            <span class='help-block'> <?php echo form_error('t_ujian_id') ?> </span>
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
                        <label class='col-md-3 control-label'>Nilai</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="nilai" id="nilai" placeholder="Nilai" value="<?php echo $nilai; ?>" />
                            <span class='help-block'> <?php echo form_error('nilai') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <input type="hidden" name="nilai_id" value="<?php echo $nilai_id; ?>" />
                </div>
                <div class='form-actions'>
                            <button type='submit' class='btn green'>Submit</button>
                            <a href="<?php echo site_url('t_ujian_nilai') ?>" class="btn default">Cancel</a>
                </div>
                
              </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->