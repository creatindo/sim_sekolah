
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form USER </span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>User Nama</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="user_nama" id="user_nama" placeholder="User Nama" value="<?php echo $user_nama; ?>" />
                            <span class='help-block'> <?php echo form_error('user_nama') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>User Pass</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="user_pass" id="user_pass" placeholder="User Pass" value="<?php echo $user_pass; ?>" />
                            <span class='help-block'> <?php echo form_error('user_pass') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>User Pass Verif</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="user_pass_verif" id="user_pass_verif" placeholder="User Pass Verif" value="<?php echo $user_pass_verif; ?>" />
                            <span class='help-block'> <?php echo form_error('user_pass_verif') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                </div>
                <div class='form-actions'>
                  <div class='row'>
                      <div class='col-md-offset-5 col-md-7'>
                        <button type='submit' class='btn green'>Submit</button>
                        <a href="<?php echo site_url('user') ?>" class="btn default">Cancel</a>
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