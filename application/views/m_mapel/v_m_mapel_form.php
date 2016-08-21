
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form M MAPEL </span>
          </div>
        </div>
        <div class='portlet-body form'>
          <form action="<?php echo $action; ?>" method="post">
            <div class='form-body'>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('mapel_nama')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>Mapel Nama</label>
                    <div class='col-md-9'>
                      <input type="text" class="form-control" name="mapel_nama" id="mapel_nama" placeholder="Mapel Nama" value="<?php echo $mapel_nama; ?>" />
                      <span class='help-block'> <?php echo form_error('mapel_nama') ?> </span>
                    </div>
                  </div>
                </div>
                
                <div class='col-md-6'>
                  <div class='form-group <?php if(form_error('mapel_active')){echo 'has-error';} ?>'>
                    <label class='col-md-3 control-label'>Mapel Active</label>
                    <div class='col-md-9'>
                      <?php 
                      $v_name_2 = '';
                      if (!empty($mapel_active)) {                                
                        $v_name_2 = $this->M_status_model->get($mapel_active)->{$this->M_status_model->label};
                      }
                      $ddajax = array(
                        'url' => site_url('form/dd/M_status_model'), 
                        'name' =>'mapel_active',
                        'current_selected_id' => $mapel_active, 
                        'current_selected_name' => $v_name_2, 
                        );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE); ?>
                      <span class='help-block'> <?php echo form_error('mapel_active') ?> </span>
                    </div>
                  </div>
                </div>
                
              </div>
                <input type="hidden" name="mapel_id" value="<?php echo $mapel_id; ?>" />
              </div>
              <div class='form-actions'>
                <div class='row'>
                  <div class='col-md-offset-5 col-md-7'>
                    <a href="<?php echo site_url('m_mapel') ?>" class="btn default">Kembali</a>
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