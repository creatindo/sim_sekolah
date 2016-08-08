
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form T_PEGAWAI </span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Pagawai Id</label>
                        <div class='col-md-9'>
                            <?php 
                              $v_name_1 = '';
                              if (!empty($pagawai_id)) {                                
                                $v_name_1 = $this->m_pegawai->get($pagawai_id)->{$this->m_pegawai->label};
                              }
                              $ddajax = array(
                                  'url' => site_url('form/dd/m_pegawai'), 
                                  'name' =>'pagawai_id',
                                  'current_selected_id' => $pagawai_id, 
                                  'current_selected_name' => $v_name_1, 
                                  );
                              $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                            ?> 
                            <span class='help-block'> <?php echo form_error('pagawai_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Jabatan Id</label>
                        <div class='col-md-9'>
                            <?php 
                              $v_name_2 = '';
                              if (!empty($jabatan_id)) {                                
                                $v_name_2 = $this->m_jabatan->get($jabatan_id)->{$this->m_jabatan->label};
                              }
                              $ddajax = array(
                                  'url' => site_url('form/dd/m_jabatan'), 
                                  'name' =>'jabatan_id',
                                  'current_selected_id' => $jabatan_id, 
                                  'current_selected_name' => $v_name_2, 
                                  );
                              $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                            ?> 
                            <span class='help-block'> <?php echo form_error('jabatan_id') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Create Date</label>
                        <div class='col-md-9'>
                            <div id = 'tanggal' class='input-group date date-picker' data-date-format='dd-mm-yyyy' data-date-startView='decade'>
                                <input type='text' class='form-control ' readonly name="create_date" value="<?php echo $create_date; ?>">
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
                            <span class='help-block'> <?php echo form_error('create_date') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>T Pegawai Active</label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="t_pegawai_active" id="t_pegawai_active" placeholder="T Pegawai Active" value="<?php echo $t_pegawai_active; ?>" />
                            <span class='help-block'> <?php echo form_error('t_pegawai_active') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                  <input type="hidden" name="t_pegawai_id" value="<?php echo $t_pegawai_id; ?>" />
                </div>
                <div class='form-actions'>
                  <div class='row'>
                      <div class='col-md-offset-5 col-md-7'>
                        <button type='submit' class='btn green'>Submit</button>
                        <a href="<?php echo site_url('t_pegawai') ?>" class="btn default">Cancel</a>
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