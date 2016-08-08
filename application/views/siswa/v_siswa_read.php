
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='portlet light'>
                <div class='portlet-title'>
                  <div class='caption font-green'>
                    <span class='caption-subject bold uppercase'>Siswa</span>
                  </div>
                </div><!-- /.title -->
                <div class='portlet-body'>
                  <table class="table table-bordered">
                    <tr><td>Siswa Id</td><td><?php echo $siswa_id; ?></td></tr>
                    <tr><td>T Kelas Id</td><td><?php echo $t_kelas_id; ?></td></tr>
                    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
                    <tr><td>T Siswa Active</td><td><?php echo $t_siswa_active; ?></td></tr>
                    <tr>
                      <td></td>
                      <td>
                        <a href="<?php echo site_url('siswa') ?>" class="btn btn-default">Cancel</a>
                        <a href="<?php echo site_url('siswa/update/'.$id) ?>" class="btn btn-info">Edit</a>
                      </td>
                    </tr>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.col -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->