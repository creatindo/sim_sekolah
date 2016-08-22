
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form T UJIAN NILAI </span>
          </div>
        </div>
        <div class='portlet-body form'>
          <form action="<?php echo $action; ?>" method="post">
            <div class='form-body'>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('t_ujian_id')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>T Ujian Id</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_1 = '';
                      if (!empty($t_ujian_id)) {                                
                        $v_name_1 = $this->T_ujian_model->get($t_ujian_id)->{$this->T_ujian_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/T_ujian_model'), 
                        'name' =>'t_ujian_id',
                        'current_selected_id' => $t_ujian_id, 
                        'current_selected_name' => $v_name_1, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('t_ujian_id') ?> </span>
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
                  <div class='form-group <?php if(form_error('nilai')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>Nilai</label>
                    <div class='col-md-9'>
                      <input type="text" class="form-control mask-number" name="nilai" id="nilai" placeholder="Nilai" value="<?php echo $nilai; ?>" />
                      <span class='help-block'> <?php echo form_error('nilai') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
                <input type="hidden" name="nilai_id" value="<?php echo $nilai_id; ?>" />
              </div>
              <div class='form-actions'>
                <div class='row'>
                  <div class='col-md-offset-5 col-md-7'>
                    <a href="<?php echo site_url('t_ujian_nilai') ?>" class="btn default">Kembali</a>
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