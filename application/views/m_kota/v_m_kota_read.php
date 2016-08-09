
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='portlet light'>
                <div class='portlet-title'>
                  <div class='caption font-green'>
                    <span class='caption-subject bold uppercase'>M_kota</span>
                  </div>
                </div><!-- /.title -->
                <div class='portlet-body'>
                  <table class="table table-bordered">
                    <tr><td>Kota Kode</td><td><?php echo $kota_kode; ?></td></tr>
                    <tr><td>M Propinsi Id</td><td><?php echo $m_propinsi_id; ?></td></tr>
                    <tr><td>Kota Nama</td><td><?php echo $kota_nama; ?></td></tr>
                    <tr><td>Kota Aktif</td><td><?php echo $kota_aktif; ?></td></tr>
                    <tr><td>Kota Created By</td><td><?php echo $kota_created_by; ?></td></tr>
                    <tr><td>Kota Revised</td><td><?php echo $kota_revised; ?></td></tr>
                    <tr><td>Kota Counter</td><td><?php echo $kota_counter; ?></td></tr>
                    <tr><td>Kota Kab</td><td><?php echo $kota_kab; ?></td></tr>
                    <tr>
                      <td colspan='2'>
                        <div class='form-actions'>
                          <div class='row'>
                            <div class='col-md-offset-5 col-md-7'>
                                <a href="<?php echo site_url('m_kota') ?>" class="btn default">Cancel</a>
                                <a href="<?php echo site_url('m_kota/update/'.$id) ?>" class="btn btn-success">Edit</a>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.col -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->