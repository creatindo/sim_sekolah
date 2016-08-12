
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='portlet light'>
                <div class='portlet-title'>
                  <div class='caption font-green'>
                    <span class='caption-subject bold uppercase'>T_absensi</span>
                  </div>
                </div><!-- /.title -->
                <div class='portlet-body'>
                  <table class="table table-bordered">
                    <tr><td>Absensi Nama</td><td><?php echo $absensi_nama; ?></td></tr>
                    <tr><td>Jadwal Id</td><td><?php echo $jadwal_id; ?></td></tr>
                    <tr><td>T Siswa Id</td><td><?php echo $t_siswa_id; ?></td></tr>
                    <tr><td>Siswa</td><td><?php echo $siswa; ?></td></tr>
                    <tr>
                      <td colspan='2'>
                        <div class='form-actions'>
                          <div class='row'>
                            <div class='col-md-offset-5 col-md-7'>
                                <a href="<?php echo site_url('t_absensi') ?>" class="btn default">Kembali</a>
                                <a href="<?php echo site_url('t_absensi/update/'.$id) ?>" class="btn btn-success">Edit</a>
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