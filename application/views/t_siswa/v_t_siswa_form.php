
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form T SISWA </span>
          </div>
        </div>
        <div class='portlet-body form'>
          <form action="<?php echo $action; ?>" method="post">
            <div class='form-body'>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('t_siswa_nama')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>T Siswa Nama</label>
                    <div class='col-md-9'>
                      <input type="text" class="form-control" name="t_siswa_nama" id="t_siswa_nama" placeholder="T Siswa Nama" value="<?php echo $t_siswa_nama; ?>" />
                      <span class='help-block'> <?php echo form_error('t_siswa_nama') ?> </span>
                    </div>
                  </div>
                </div>
                
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('siswa_id')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>Siswa Id</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_2 = '';
                      if (!empty($siswa_id)) {                                
                        $v_name_2 = $this->M_siswa_model->get($siswa_id)->{$this->M_siswa_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/M_siswa_model'), 
                        'name' =>'siswa_id',
                        'current_selected_id' => $siswa_id, 
                        'current_selected_name' => $v_name_2, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('siswa_id') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('t_kelas_id')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>T Kelas Id</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_3 = '';
                      if (!empty($t_kelas_id)) {                                
                        $v_name_3 = $this->T_kelas_model->get($t_kelas_id)->{$this->T_kelas_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/T_kelas_model'), 
                        'name' =>'t_kelas_id',
                        'current_selected_id' => $t_kelas_id, 
                        'current_selected_name' => $v_name_3, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('t_kelas_id') ?> </span>
                    </div>
                  </div>
                </div>
                
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('t_siswa_active')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>T Siswa Active</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_4 = '';
                      if (!empty($t_siswa_active)) {                                
                        $v_name_4 = $this->M_status_model->get($t_siswa_active)->{$this->M_status_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/M_status_model'), 
                        'name' =>'t_siswa_active',
                        'current_selected_id' => $t_siswa_active, 
                        'current_selected_name' => $v_name_4, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('t_siswa_active') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
                <input type="hidden" name="t_siswa_id" value="<?php echo $t_siswa_id; ?>" />
              </div>
              <div class='form-actions'>
                <div class='row'>
                  <div class='col-md-offset-5 col-md-7'>
                    <a href="<?php echo site_url('t_siswa') ?>" class="btn default">Kembali</a>
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