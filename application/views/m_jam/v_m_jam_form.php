
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form M_JAM </span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Jam Nama</label>
                        <div class='col-md-9'>
                            <span class='help-block'> <?php echo form_error('jam_nama') ?> </span>
                            <input type="text" class="form-control" name="jam_nama" id="jam_nama" placeholder="Jam Nama" value="<?php echo $jam_nama; ?>" />
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Jam Active</label>
                        <div class='col-md-9'>
                            <?php 
                              $v_name_2 = '';
                              if (!empty($jam_active)) {                                
                                $v_name_2 = $this->M_status_model->get($jam_active)->{$this->M_status_model->label};
                              }
                              $ddajax = array(
                                  'url' => site_url('form/dd/M_status_model'), 
                                  'name' =>'jam_active',
                                  'current_selected_id' => $jam_active, 
                                  'current_selected_name' => $v_name_2, 
                                  );
                              $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                            ?> 
                            <span class='help-block'> <?php echo form_error('jam_active') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                  <input type="hidden" name="jam_id" value="<?php echo $jam_id; ?>" />
                </div>
                <div class='form-actions'>
                  <div class='row'>
                      <div class='col-md-offset-5 col-md-7'>
                        <a href="<?php echo site_url('m_jam') ?>" class="btn default">Cancel</a>
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