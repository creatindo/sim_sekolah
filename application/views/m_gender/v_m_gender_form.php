
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form M_GENDER </span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Gender Nama</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="gender_nama" id="gender_nama" placeholder="Gender Nama" value="<?php echo $gender_nama; ?>" />
                            <span class='help-block'> <?php echo form_error('gender_nama') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Gender Kode</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="gender_kode" id="gender_kode" placeholder="Gender Kode" value="<?php echo $gender_kode; ?>" />
                            <span class='help-block'> <?php echo form_error('gender_kode') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                  <input type="hidden" name="gender_id" value="<?php echo $gender_id; ?>" />
                </div>
                <div class='form-actions'>
                  <div class='row'>
                      <div class='col-md-offset-5 col-md-7'>
                        <a href="<?php echo site_url('m_gender') ?>" class="btn default">Cancel</a>
                        <button type='submit' class='btn green'>Submit</button>
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