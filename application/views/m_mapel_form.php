
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>M_MAPEL</span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Mapel Nama</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="mapel_nama" id="mapel_nama" placeholder="Mapel Nama" value="<?php echo $mapel_nama; ?>" />
                            <span class='help-block'> <?php echo form_error('mapel_nama') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Mapel Active</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="mapel_active" id="mapel_active" placeholder="Mapel Active" value="<?php echo $mapel_active; ?>" />
                            <span class='help-block'> <?php echo form_error('mapel_active') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <input type="hidden" name="mapel_id" value="<?php echo $mapel_id; ?>" />
                </div>
                <div class='form-actions'>
                            <button type='submit' class='btn green'>Submit</button>
                            <a href="<?php echo site_url('mapel') ?>" class="btn default">Cancel</a>
                </div>
                
              </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->