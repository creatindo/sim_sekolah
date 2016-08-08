
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>T_PEGAWAI</span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Pagawai Id</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="pagawai_id" id="pagawai_id" placeholder="Pagawai Id" value="<?php echo $pagawai_id; ?>" />
                            <span class='help-block'> <?php echo form_error('pagawai_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Jabatan Id</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="jabatan_id" id="jabatan_id" placeholder="Jabatan Id" value="<?php echo $jabatan_id; ?>" />
                            <span class='help-block'> <?php echo form_error('jabatan_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Create Date</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="create_date" id="create_date" placeholder="Create Date" value="<?php echo $create_date; ?>" />
                            <span class='help-block'> <?php echo form_error('create_date') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>T Pegawai Active</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="t_pegawai_active" id="t_pegawai_active" placeholder="T Pegawai Active" value="<?php echo $t_pegawai_active; ?>" />
                            <span class='help-block'> <?php echo form_error('t_pegawai_active') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <input type="hidden" name="t_pegawai_id" value="<?php echo $t_pegawai_id; ?>" />
                </div>
                <div class='form-actions'>
                            <button type='submit' class='btn green'>Submit</button>
                            <a href="<?php echo site_url('t_pegawai') ?>" class="btn default">Cancel</a>
                </div>
                
              </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->