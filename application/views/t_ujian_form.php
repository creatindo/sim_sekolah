
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>T_UJIAN</span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Ujian Id</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="ujian_id" id="ujian_id" placeholder="Ujian Id" value="<?php echo $ujian_id; ?>" />
                            <span class='help-block'> <?php echo form_error('ujian_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>T Jadwal Id</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="t_jadwal_id" id="t_jadwal_id" placeholder="T Jadwal Id" value="<?php echo $t_jadwal_id; ?>" />
                            <span class='help-block'> <?php echo form_error('t_jadwal_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>T Ujian Active</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="t_ujian_active" id="t_ujian_active" placeholder="T Ujian Active" value="<?php echo $t_ujian_active; ?>" />
                            <span class='help-block'> <?php echo form_error('t_ujian_active') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <input type="hidden" name="t_ujian_id" value="<?php echo $t_ujian_id; ?>" />
                </div>
                <div class='form-actions'>
                            <button type='submit' class='btn green'>Submit</button>
                            <a href="<?php echo site_url('t_ujian') ?>" class="btn default">Cancel</a>
                </div>
                
              </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->