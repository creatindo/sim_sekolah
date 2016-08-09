
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form M_JURUSAN </span>
          </div>
        </div>
        <div class='portlet-body form'>
            <form action="<?php echo $action; ?>" method="post">
              <div class='form-body'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Jurusan Nama</label>
                        <div class='col-md-9'>
                            <span class='help-block'> <?php echo form_error('jurusan_nama') ?> </span>
                            <input type="text" class="form-control" name="jurusan_nama" id="jurusan_nama" placeholder="Jurusan Nama" value="<?php echo $jurusan_nama; ?>" />
                        </div>
                    </div>
                  </div>
                  
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Jurusan Active</label>
                        <div class='col-md-9'>
                            <?php 
                              $v_name_2 = '';
                              if (!empty($jurusan_active)) {                                
                                $v_name_2 = $this->m_status->get($jurusan_active)->{$this->m_status->label};
                              }
                              $ddajax = array(
                                  'url' => site_url('form/dd/m_status'), 
                                  'name' =>'jurusan_active',
                                  'current_selected_id' => $jurusan_active, 
                                  'current_selected_name' => $v_name_2, 
                                  );
                              $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                            ?> 
                            <span class='help-block'> <?php echo form_error('jurusan_active') ?> </span>
                        </div>
                    </div>
                  </div>
                  
                </div>
                  <input type="hidden" name="jurusan_id" value="<?php echo $jurusan_id; ?>" />
                </div>
                <div class='form-actions'>
                  <div class='row'>
                      <div class='col-md-offset-5 col-md-7'>
                        <a href="<?php echo site_url('m_jurusan') ?>" class="btn default">Cancel</a>
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