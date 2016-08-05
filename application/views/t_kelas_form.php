
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>T_KELAS</span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kelas Id</label>
                        <div class='col-md-9'>
                            <?php $kelas_id_dd = array(''=>'Pilih')+$kelas_id_dd ?>
                            <?php echo form_dropdown('kelas_id', $kelas_id_dd, $kelas_id, 'id="kelas_id" class="form-control"'); ?>
                            <span class='help-block'> <?php echo form_error('kelas_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Jurusan Id</label>
                        <div class='col-md-9'>
                            <?php $jurusan_id_dd = array(''=>'Pilih')+$jurusan_id_dd ?>
                            <?php echo form_dropdown('jurusan_id', $jurusan_id_dd, $jurusan_id, 'id="jurusan_id" class="form-control"'); ?>
                            <span class='help-block'> <?php echo form_error('jurusan_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Semester Id</label>
                        <div class='col-md-9'>
                            <?php $semester_id_dd = array(''=>'Pilih')+$semester_id_dd ?>
                            <?php echo form_dropdown('semester_id', $semester_id_dd, $semester_id, 'id="semester_id" class="form-control"'); ?>
                            <span class='help-block'> <?php echo form_error('semester_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>T Kelas Active</label>
                        <div class='col-md-9'>
                            <?php echo form_dropdown('t_kelas_active', $status, $t_kelas_active, 'id="t_kelas_active" class="form-control"'); ?>
                            <span class='help-block'> <?php echo form_error('t_kelas_active') ?> </span>
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
                  
                  <input type="hidden" name="t_kelas_id" value="<?php echo $t_kelas_id; ?>" />
                </div>
                <div class='form-actions'>
                            <button type='submit' class='btn green'>Submit</button>
                            <a href="<?php echo site_url('t_kelas') ?>" class="btn default">Cancel</a>
                </div>
                
              </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->