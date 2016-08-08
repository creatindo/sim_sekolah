
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form SISWA </span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Nis</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="siswa_nis" id="siswa_nis" placeholder="Siswa Nis" value="<?php echo $siswa_nis; ?>" />
                            <span class='help-block'> <?php echo form_error('siswa_nis') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Nama</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="siswa_nama" id="siswa_nama" placeholder="Siswa Nama" value="<?php echo $siswa_nama; ?>" />
                            <span class='help-block'> <?php echo form_error('siswa_nama') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Jk</label>
                        <div class='col-md-9'>
                            <?php 
                              $v_name_3 = '';
                              if (!empty($siswa_jk)) {                                
                                $v_name_3 = $this->m_gender->get($siswa_jk)->{$this->m_gender->label};
                              }
                              $ddajax = array(
                                  'url' => site_url('form/dd/m_gender'), 
                                  'name' =>'siswa_jk',
                                  'current_selected_id' => $siswa_jk, 
                                  'current_selected_name' => $v_name_3, 
                                  );
                              $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                            ?> 
                            <span class='help-block'> <?php echo form_error('siswa_jk') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Tgl Lahir</label>
                        <div class='col-md-9'>
                            <div id = 'tanggal' class='input-group date date-picker' data-date-format='yyyy-mm-dd' data-date-startView='decade'>
                                <input type='text' class='form-control ' readonly name="siswa_tgl_lahir" value="<?php echo $siswa_tgl_lahir; ?>">
                                <span class='input-group-btn'>
                                    <button class='btn default' type='button'>
                                        <i class='fa fa-calendar'></i>
                                    </button>
                                </span>
                            </div>
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('#tanggal').datepicker({
                                      startView: 'decade' , 
                                      autoclose:true 
                                    });
                                })
                            </script>
                            <span class='help-block'> <?php echo form_error('siswa_tgl_lahir') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kota Id</label>
                        <div class='col-md-9'>
                            <?php 
                              $v_name_5 = '';
                              if (!empty($kota_id)) {                                
                                $v_name_5 = $this->m_kota->get($kota_id)->{$this->m_kota->label};
                              }
                              $ddajax = array(
                                  'url' => site_url('form/dd/m_kota'), 
                                  'name' =>'kota_id',
                                  'current_selected_id' => $kota_id, 
                                  'current_selected_name' => $v_name_5, 
                                  );
                              $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                            ?> 
                            <span class='help-block'> <?php echo form_error('kota_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Kecamatan Id</label>
                        <div class='col-md-9'>
                            <?php 
                              $v_name_6 = '';
                              if (!empty($kecamatan_id)) {                                
                                $v_name_6 = $this->m_kecamatan->get($kecamatan_id)->{$this->m_kecamatan->label};
                              }
                              $ddajax = array(
                                  'url' => site_url('form/dd/m_kecamatan'), 
                                  'name' =>'kecamatan_id',
                                  'current_selected_id' => $kecamatan_id, 
                                  'current_selected_name' => $v_name_6, 
                                  );
                              $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                            ?> 
                            <span class='help-block'> <?php echo form_error('kecamatan_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Alamat</label>
                        <div class='col-md-9'>
                            <textarea class="form-control" rows="3" name="siswa_alamat" id="siswa_alamat" placeholder="Siswa Alamat"><?php echo $siswa_alamat; ?></textarea>
                            <span class='help-block'> <?php echo form_error('siswa_alamat') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Ayah</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="siswa_ayah" id="siswa_ayah" placeholder="Siswa Ayah" value="<?php echo $siswa_ayah; ?>" />
                            <span class='help-block'> <?php echo form_error('siswa_ayah') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Ibu</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="siswa_ibu" id="siswa_ibu" placeholder="Siswa Ibu" value="<?php echo $siswa_ibu; ?>" />
                            <span class='help-block'> <?php echo form_error('siswa_ibu') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Siswa Wali</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="siswa_wali" id="siswa_wali" placeholder="Siswa Wali" value="<?php echo $siswa_wali; ?>" />
                            <span class='help-block'> <?php echo form_error('siswa_wali') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Telp Ortu</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="telp_ortu" id="telp_ortu" placeholder="Telp Ortu" value="<?php echo $telp_ortu; ?>" />
                            <span class='help-block'> <?php echo form_error('telp_ortu') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                  <input type="hidden" name="siswa_id" value="<?php echo $siswa_id; ?>" />
                </div>
                <div class='form-actions'>
                  <div class='row'>
                      <div class='col-md-offset-5 col-md-7'>
                        <button type='submit' class='btn green'>Submit</button>
                        <a href="<?php echo site_url('siswa') ?>" class="btn default">Cancel</a>
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