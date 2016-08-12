
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='portlet light'>
                <div class='portlet-title'>
                  <div class='caption font-green'>
                    <span class='caption-subject bold uppercase'>T_kelas</span>
                  </div>
                </div><!-- /.title -->
                <div class='portlet-body'>
                  <table class="table table-bordered">
                    <tr><td>T Kelas Nama</td><td><?php echo $t_kelas_nama; ?></td></tr>
                    <tr><td>Kelas Id</td><td><?php echo $kelas_id; ?></td></tr>
                    <tr><td>Jurusan Id</td><td><?php echo $jurusan_id; ?></td></tr>
                    <tr><td>Semester Id</td><td><?php echo $semester_id; ?></td></tr>
                    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
                    <tr>
                      <td colspan='2'>
                        <div class='form-actions'>
                          <div class='row'>
                            <div class='col-md-offset-5 col-md-7'>
                                <a href="<?php echo site_url('t_kelas') ?>" class="btn default">Kembali</a>
                                <a href="<?php echo site_url('t_kelas/update/'.$id) ?>" class="btn btn-success">Edit</a>
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