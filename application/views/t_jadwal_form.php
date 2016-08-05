
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>T_JADWAL</span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Jam Id</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="jam_id" id="jam_id" placeholder="Jam Id" value="<?php echo $jam_id; ?>" />
                            <span class='help-block'> <?php echo form_error('jam_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Hari Id</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="hari_id" id="hari_id" placeholder="Hari Id" value="<?php echo $hari_id; ?>" />
                            <span class='help-block'> <?php echo form_error('hari_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Mapel Id</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="mapel_id" id="mapel_id" placeholder="Mapel Id" value="<?php echo $mapel_id; ?>" />
                            <span class='help-block'> <?php echo form_error('mapel_id') ?> </span>
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
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Jadwal Active</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="jadwal_active" id="jadwal_active" placeholder="Jadwal Active" value="<?php echo $jadwal_active; ?>" />
                            <span class='help-block'> <?php echo form_error('jadwal_active') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Pegawai Id</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="pegawai_id" id="pegawai_id" placeholder="Pegawai Id" value="<?php echo $pegawai_id; ?>" />
                            <span class='help-block'> <?php echo form_error('pegawai_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <input type="hidden" name="jadwal_id" value="<?php echo $jadwal_id; ?>" />
                </div>
                <div class='form-actions'>
                            <button type='submit' class='btn green'>Submit</button>
                            <a href="<?php echo site_url('jadwal') ?>" class="btn default">Cancel</a>
                </div>
                
              </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->