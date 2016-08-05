
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>T_SISWA</span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Id</label>
                        <div class='col-md-9'>
                            <?php $siswa_id_dd = array(''=>'Pilih')+$siswa_id_dd ?>
                            <?php echo form_dropdown('siswa_id', $siswa_id_dd, $siswa_id, 'id="siswa_id" class="form-control"'); ?>
                            <span class='help-block'> <?php echo form_error('siswa_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>T Kelas Id</label>
                        <div class='col-md-9'>
                            <?php $t_kelas_id_dd = array(''=>'Pilih')+$t_kelas_id_dd ?>
                            <?php echo form_dropdown('t_kelas_id', $t_kelas_id_dd, $t_kelas_id, 'id="t_kelas_id" class="form-control"'); ?>
                            <span class='help-block'> <?php echo form_error('t_kelas_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Tahun</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
                            <span class='help-block'> <?php echo form_error('tahun') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>T Siswa Active</label>
                        <div class='col-md-9'>
                            <?php $t_siswa_active_dd = array(''=>'Pilih')+$t_siswa_active_dd ?>
                            <?php echo form_dropdown('t_siswa_active', $t_siswa_active_dd, $t_siswa_active, 'id="t_siswa_active" class="form-control"'); ?>
                            <span class='help-block'> <?php echo form_error('t_siswa_active') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <input type="hidden" name="t_siswa_id" value="<?php echo $t_siswa_id; ?>" />
                </div>
                <div class='form-actions'>
                            <button type='submit' class='btn green'>Submit</button>
                            <a href="<?php echo site_url('t_siswa') ?>" class="btn default">Cancel</a>
                </div>
                
              </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->