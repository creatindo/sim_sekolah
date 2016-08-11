
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='portlet light'>
                <div class='portlet-title'>
                  <div class='caption font-green'>
                    <span class='caption-subject bold uppercase'>T_siswa</span>
                  </div>
                </div><!-- /.title -->
                <div class='portlet-body'>
                  <table class="table table-bordered">
                    <tr><td>T Siswa Nama</td><td><?php echo $t_siswa_nama; ?></td></tr>
                    <tr><td>Siswa Id</td><td><?php echo $siswa_id; ?></td></tr>
                    <tr><td>T Kelas Id</td><td><?php echo $t_kelas_id; ?></td></tr>
                    <tr><td>T Siswa Active</td><td><?php echo $t_siswa_active; ?></td></tr>
                    <tr>
                      <td colspan='2'>
                        <div class='form-actions'>
                          <div class='row'>
                            <div class='col-md-offset-5 col-md-7'>
                                <a href="<?php echo site_url('t_siswa') ?>" class="btn default">Cancel</a>
                                <a href="<?php echo site_url('t_siswa/update/'.$id) ?>" class="btn btn-success">Edit</a>
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