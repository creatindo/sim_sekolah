
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form T_UJIAN_NILAI </span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Nilai Nama</label>
                        <div class='col-md-9'>
                            <span class='help-block'> <?php echo form_error('nilai_nama') ?> </span>
                            <input type="text" class="form-control" name="nilai_nama" id="nilai_nama" placeholder="Nilai Nama" value="<?php echo $nilai_nama; ?>" />
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>T Ujian Id</label>
                        <div class='col-md-9'>
                            <?php 
                              $v_name_2 = '';
                              if (!empty($t_ujian_id)) {                                
                                $v_name_2 = $this->t_ujian->get($t_ujian_id)->{$this->t_ujian->label};
                              }
                              $ddajax = array(
                                  'url' => site_url('form/dd/t_ujian'), 
                                  'name' =>'t_ujian_id',
                                  'current_selected_id' => $t_ujian_id, 
                                  'current_selected_name' => $v_name_2, 
                                  );
                              $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                            ?> 
                            <span class='help-block'> <?php echo form_error('t_ujian_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>T Siswa Id</label>
                        <div class='col-md-9'>
                            <?php 
                              $v_name_3 = '';
                              if (!empty($t_siswa_id)) {                                
                                $v_name_3 = $this->t_siswa->get($t_siswa_id)->{$this->t_siswa->label};
                              }
                              $ddajax = array(
                                  'url' => site_url('form/dd/t_siswa'), 
                                  'name' =>'t_siswa_id',
                                  'current_selected_id' => $t_siswa_id, 
                                  'current_selected_name' => $v_name_3, 
                                  );
                              $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                            ?> 
                            <span class='help-block'> <?php echo form_error('t_siswa_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Nilai</label>
                        <div class='col-md-9'>
                            <span class='help-block'> <?php echo form_error('nilai') ?> </span>
                            <input type="text" class="form-control" name="nilai" id="nilai" placeholder="Nilai" value="<?php echo $nilai; ?>" />
                        </div>
                    </div>
                  </div>
                  
                </div>
                  <input type="hidden" name="nilai_id" value="<?php echo $nilai_id; ?>" />
                </div>
                <div class='form-actions'>
                  <div class='row'>
                      <div class='col-md-offset-5 col-md-7'>
                        <a href="<?php echo site_url('t_ujian_nilai') ?>" class="btn default">Cancel</a>
                        <button type='submit' class='btn green'>Submit</button>
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