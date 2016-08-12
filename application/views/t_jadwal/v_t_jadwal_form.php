
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form T JADWAL </span>
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
                            <?php 
                              $v_name_1 = '';
                              if (!empty($jam_id)) {                                
                                $v_name_1 = $this->M_jam_model->get($jam_id)->{$this->M_jam_model->label};
                              }
                              $ddajax = array(
                                  'url' => site_url('form/dd/M_jam_model'), 
                                  'name' =>'jam_id',
                                  'current_selected_id' => $jam_id, 
                                  'current_selected_name' => $v_name_1, 
                                  );
                              $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                            ?> 
                            <span class='help-block'> <?php echo form_error('jam_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Hari Id</label>
                        <div class='col-md-9'>
                            <?php 
                              $v_name_2 = '';
                              if (!empty($hari_id)) {                                
                                $v_name_2 = $this->M_hari_model->get($hari_id)->{$this->M_hari_model->label};
                              }
                              $ddajax = array(
                                  'url' => site_url('form/dd/M_hari_model'), 
                                  'name' =>'hari_id',
                                  'current_selected_id' => $hari_id, 
                                  'current_selected_name' => $v_name_2, 
                                  );
                              $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                            ?> 
                            <span class='help-block'> <?php echo form_error('hari_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Mapel Id</label>
                        <div class='col-md-9'>
                            <?php 
                              $v_name_3 = '';
                              if (!empty($mapel_id)) {                                
                                $v_name_3 = $this->M_mapel_model->get($mapel_id)->{$this->M_mapel_model->label};
                              }
                              $ddajax = array(
                                  'url' => site_url('form/dd/M_mapel_model'), 
                                  'name' =>'mapel_id',
                                  'current_selected_id' => $mapel_id, 
                                  'current_selected_name' => $v_name_3, 
                                  );
                              $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                            ?> 
                            <span class='help-block'> <?php echo form_error('mapel_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>T Kelas Id</label>
                        <div class='col-md-9'>
                            <?php 
                              $v_name_4 = '';
                              if (!empty($t_kelas_id)) {                                
                                $v_name_4 = $this->T_kelas_model->get($t_kelas_id)->{$this->T_kelas_model->label};
                              }
                              $ddajax = array(
                                  'url' => site_url('form/dd/T_kelas_model'), 
                                  'name' =>'t_kelas_id',
                                  'current_selected_id' => $t_kelas_id, 
                                  'current_selected_name' => $v_name_4, 
                                  );
                              $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                            ?> 
                            <span class='help-block'> <?php echo form_error('t_kelas_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Pegawai Id</label>
                        <div class='col-md-9'>
                            <?php 
                              $v_name_5 = '';
                              if (!empty($pegawai_id)) {                                
                                $v_name_5 = $this->M_pegawai_model->get($pegawai_id)->{$this->M_pegawai_model->label};
                              }
                              $ddajax = array(
                                  'url' => site_url('form/dd/M_pegawai_model'), 
                                  'name' =>'pegawai_id',
                                  'current_selected_id' => $pegawai_id, 
                                  'current_selected_name' => $v_name_5, 
                                  );
                              $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                            ?> 
                            <span class='help-block'> <?php echo form_error('pegawai_id') ?> </span>
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
                  
                </div>
                  <input type="hidden" name="jadwal_id" value="<?php echo $jadwal_id; ?>" />
                </div>
                <div class='form-actions'>
                  <div class='row'>
                      <div class='col-md-offset-5 col-md-7'>
                        <a href="<?php echo site_url('t_jadwal') ?>" class="btn default">Kembali</a>
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