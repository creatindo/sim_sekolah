
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>M_SEMESTER</span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Semester Nama</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="semester_nama" id="semester_nama" placeholder="Semester Nama" value="<?php echo $semester_nama; ?>" />
                            <span class='help-block'> <?php echo form_error('semester_nama') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <input type="hidden" name="semester_id" value="<?php echo $semester_id; ?>" />
                </div>
                <div class='form-actions'>
                            <button type='submit' class='btn green'>Submit</button>
                            <a href="<?php echo site_url('semester') ?>" class="btn default">Cancel</a>
                </div>
                
              </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->