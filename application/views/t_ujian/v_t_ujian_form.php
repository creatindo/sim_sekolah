
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form T UJIAN </span>
          </div>
        </div>
        <div class='portlet-body form'>
          <form action="<?php echo $action; ?>" method="post">
            <div class='form-body'>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group'>
                    <label class='col-md-3 control-label'>T Ujian Nama</label>
                    <div class='col-md-9'>
                      <input type="text" class="form-control" name="t_ujian_nama" id="t_ujian_nama" placeholder="T Ujian Nama" value="<?php echo $t_ujian_nama; ?>" />
                      <span class='help-block'> <?php echo form_error('t_ujian_nama') ?> </span>
                    </div>
                  </div>
                </div>
                
                <div class='col-md-6'>
                  <div class='form-group'>
                    <label class='col-md-3 control-label'>Ujian Id</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_2 = '';
                      if (!empty($ujian_id)) {                                
                        $v_name_2 = $this->M_ujian_model->get($ujian_id)->{$this->M_ujian_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/M_ujian_model'), 
                        'name' =>'ujian_id',
                        'current_selected_id' => $ujian_id, 
                        'current_selected_name' => $v_name_2, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('ujian_id') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group'>
                    <label class='col-md-3 control-label'>T Jadwal Id</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_3 = '';
                      if (!empty($t_jadwal_id)) {                                
                        $v_name_3 = $this->T_jadwal_model->get($t_jadwal_id)->{$this->T_jadwal_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/T_jadwal_model'), 
                        'name' =>'t_jadwal_id',
                        'current_selected_id' => $t_jadwal_id, 
                        'current_selected_name' => $v_name_3, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('t_jadwal_id') ?> </span>
                    </div>
                  </div>
                </div>
                
                <div class='col-md-6'>
                  <div class='form-group'>
                    <label class='col-md-3 control-label'>T Ujian Tanggal</label>
                    <div class='col-md-9'>
                      <div class='input-group date date-decade' >
                        <input type='text' class='form-control ' readonly name="t_ujian_tanggal" value="<?php echo $t_ujian_tanggal; ?>">
                        <span class='input-group-btn'>
                          <button class='btn default' type='button'>
                            <i class='fa fa-calendar'></i>
                          </button>
                        </span>
                      </div>
                      <span class='help-block'> <?php echo form_error('t_ujian_tanggal') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group'>
                    <label class='col-md-3 control-label'>T Ujian Active</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_5 = '';
                      if (!empty($t_ujian_active)) {                                
                        $v_name_5 = $this->M_status_model->get($t_ujian_active)->{$this->M_status_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/M_status_model'), 
                        'name' =>'t_ujian_active',
                        'current_selected_id' => $t_ujian_active, 
                        'current_selected_name' => $v_name_5, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('t_ujian_active') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
                <input type="hidden" name="t_ujian_id" value="<?php echo $t_ujian_id; ?>" />
              </div>
              <div class='form-actions'>
                <div class='row'>
                  <div class='col-md-offset-5 col-md-7'>
                    <a href="<?php echo site_url('t_ujian') ?>" class="btn default">Kembali</a>
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