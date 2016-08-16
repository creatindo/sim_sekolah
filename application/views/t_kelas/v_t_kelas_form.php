
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form T KELAS </span>
          </div>
        </div>
        <div class='portlet-body form'>
          <form action="<?php echo $action; ?>" method="post">
            <div class='form-body'>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group'>
                    <label class='col-md-3 control-label'>T Kelas Nama</label>
                    <div class='col-md-9'>
                      <input type="text" class="form-control" name="t_kelas_nama" id="t_kelas_nama" placeholder="T Kelas Nama" value="<?php echo $t_kelas_nama; ?>" />
                      <span class='help-block'> <?php echo form_error('t_kelas_nama') ?> </span>
                    </div>
                  </div>
                </div>
                
                <div class='col-md-6'>
                  <div class='form-group'>
                    <label class='col-md-3 control-label'>Kelas Id</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_2 = '';
                      if (!empty($kelas_id)) {                                
                        $v_name_2 = $this->M_kelas_model->get($kelas_id)->{$this->M_kelas_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/M_kelas_model'), 
                        'name' =>'kelas_id',
                        'current_selected_id' => $kelas_id, 
                        'current_selected_name' => $v_name_2, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('kelas_id') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group'>
                    <label class='col-md-3 control-label'>Jurusan Id</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_3 = '';
                      if (!empty($jurusan_id)) {                                
                        $v_name_3 = $this->M_jurusan_model->get($jurusan_id)->{$this->M_jurusan_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/M_jurusan_model'), 
                        'name' =>'jurusan_id',
                        'current_selected_id' => $jurusan_id, 
                        'current_selected_name' => $v_name_3, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('jurusan_id') ?> </span>
                    </div>
                  </div>
                </div>
                
                <div class='col-md-6'>
                  <div class='form-group'>
                    <label class='col-md-3 control-label'>Semester Id</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_4 = '';
                      if (!empty($semester_id)) {                                
                        $v_name_4 = $this->M_semester_model->get($semester_id)->{$this->M_semester_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/M_semester_model'), 
                        'name' =>'semester_id',
                        'current_selected_id' => $semester_id, 
                        'current_selected_name' => $v_name_4, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('semester_id') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group'>
                    <label class='col-md-3 control-label'>Tahun</label>
                    <div class='col-md-9'>
                      <div class='input-group date date-year' >
                        <input type='text' class='form-control ' readonly name="tahun" value="<?php echo $tahun; ?>">
                        <span class='input-group-btn'>
                          <button class='btn default' type='button'>
                            <i class='fa fa-calendar'></i>
                          </button>
                        </span>
                      </div>
                      <span class='help-block'> <?php echo form_error('tahun') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
                <input type="hidden" name="t_kelas_id" value="<?php echo $t_kelas_id; ?>" />
              </div>
              <div class='form-actions'>
                <div class='row'>
                  <div class='col-md-offset-5 col-md-7'>
                    <a href="<?php echo site_url('t_kelas') ?>" class="btn default">Kembali</a>
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