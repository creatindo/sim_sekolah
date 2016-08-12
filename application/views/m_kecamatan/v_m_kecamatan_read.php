
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='portlet light'>
                <div class='portlet-title'>
                  <div class='caption font-green'>
                    <span class='caption-subject bold uppercase'>M_kecamatan</span>
                  </div>
                </div><!-- /.title -->
                <div class='portlet-body'>
                  <table class="table table-bordered">
                    <tr><td>Kecamatan Kode</td><td><?php echo $kecamatan_kode; ?></td></tr>
                    <tr><td>M Kota Id</td><td><?php echo $m_kota_id; ?></td></tr>
                    <tr><td>Kecamatan Nama</td><td><?php echo $kecamatan_nama; ?></td></tr>
                    <tr><td>Kecamatan Aktif</td><td><?php echo $kecamatan_aktif; ?></td></tr>
                    <tr><td>Kecamatan Created By</td><td><?php echo $kecamatan_created_by; ?></td></tr>
                    <tr><td>Kecamatan Revised</td><td><?php echo $kecamatan_revised; ?></td></tr>
                    <tr>
                      <td colspan='2'>
                        <div class='form-actions'>
                          <div class='row'>
                            <div class='col-md-offset-5 col-md-7'>
                                <a href="<?php echo site_url('m_kecamatan') ?>" class="btn default">Kembali</a>
                                <a href="<?php echo site_url('m_kecamatan/update/'.$id) ?>" class="btn btn-success">Edit</a>
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