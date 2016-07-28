
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>M_JAM</span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Jam Ke</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="jam_ke" id="jam_ke" placeholder="Jam Ke" value="<?php echo $jam_ke; ?>" />
                            <span class='help-block'> <?php echo form_error('jam_ke') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Jam-active</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="jam-active" id="jam-active" placeholder="Jam-active" value="<?php echo $jam-active; ?>" />
                            <span class='help-block'> <?php echo form_error('jam-active') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <input type="hidden" name="jam_id" value="<?php echo $jam_id; ?>" />
                </div>
                <div class='form-actions'>
                            <button type='submit' class='btn green'>Submit</button>
                            <a href="<?php echo site_url('jam') ?>" class="btn default">Cancel</a>
                </div>
                
              </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->