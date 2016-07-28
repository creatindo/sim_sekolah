
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>MENU</span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Name</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                            <span class='help-block'> <?php echo form_error('name') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Link</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="link" id="link" placeholder="Link" value="<?php echo $link; ?>" />
                            <span class='help-block'> <?php echo form_error('link') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Icon</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?php echo $icon; ?>" />
                            <span class='help-block'> <?php echo form_error('icon') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Is Active</label>
                        <div class='col-md-9'>
                            <?php echo form_dropdown('is_active', $status, $is_active, 'id="is_active" class="form-control"'); ?>
                            <span class='help-block'> <?php echo form_error('is_active') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Is Parent</label>
                        <div class='col-md-9'>
                            <?php $is_parent_dd = array(0=>'Parent')+$is_parent_dd ?>
                            <?php echo form_dropdown('is_parent', $is_parent_dd, $is_parent, 'id="is_parent" class="form-control"'); ?>
                            <span class='help-block'> <?php echo form_error('is_parent') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <input type="hidden" name="id" value="<?php echo $id; ?>" />
                </div>
                <div class='form-actions'>
                            <button type='submit' class='btn green'>Submit</button>
                            <a href="<?php echo site_url('menu') ?>" class="btn default">Cancel</a>
                </div>
                
              </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->