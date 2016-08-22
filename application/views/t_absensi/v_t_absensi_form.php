
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form T ABSENSI </span>
          </div>
        </div>
        <div class='portlet-body form'>
          <form action="<?php echo $action; ?>" method="post">
            <div class='form-body'>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('jadwal_id')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>Jadwal Id</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_1 = '';
                      if (!empty($jadwal_id)) {                                
                        $v_name_1 = $this->T_jadwal_model->get($jadwal_id)->{$this->T_jadwal_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/T_jadwal_model'), 
                        'name' =>'jadwal_id',
                        'current_selected_id' => $jadwal_id, 
                        'current_selected_name' => $v_name_1, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('jadwal_id') ?> </span>
                    </div>
                  </div>
                </div>
                
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('t_siswa_id')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>T Siswa Id</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_2 = '';
                      if (!empty($t_siswa_id)) {                                
                        $v_name_2 = $this->T_siswa_model->get($t_siswa_id)->{$this->T_siswa_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/T_siswa_model'), 
                        'name' =>'t_siswa_id',
                        'current_selected_id' => $t_siswa_id, 
                        'current_selected_name' => $v_name_2, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('t_siswa_id') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('kehadiran')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>Kehadiran</label>
                    <div class='col-md-9'>
                      <input type="text" class="form-control" name="kehadiran" id="kehadiran" placeholder="Kehadiran" value="<?php echo $kehadiran; ?>" />
                      <span class='help-block'> <?php echo form_error('kehadiran') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
                <input type="hidden" name="absensi_id" value="<?php echo $absensi_id; ?>" />
              </div>
              <div class='form-actions'>
                <div class='row'>
                  <div class='col-md-offset-5 col-md-7'>
                    <a href="<?php echo site_url('t_absensi') ?>" class="btn default">Kembali</a>
                    <?php if ($button == 'Create'): ?>
                    <button type='submit' class='btn green' name='mode' value='new' >Simpan</button>
                    <?php endif ?>
                    <button type='submit' class='btn blue' >Selesai</button>
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