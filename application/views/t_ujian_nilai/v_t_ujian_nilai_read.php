
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='portlet light'>
                <div class='portlet-title'>
                  <div class='caption font-green'>
                    <span class='caption-subject bold uppercase'>T_ujian_nilai</span>
                  </div>
                </div><!-- /.title -->
                <div class='portlet-body'>
                  <table class="table table-bordered">
                    <tr><td>Nilai Nama</td><td><?php echo $nilai_nama; ?></td></tr>
                    <tr><td>T Ujian Id</td><td><?php echo $t_ujian_id; ?></td></tr>
                    <tr><td>T Siswa Id</td><td><?php echo $t_siswa_id; ?></td></tr>
                    <tr><td>Nilai</td><td><?php echo $nilai; ?></td></tr>
                    <tr>
                      <td colspan='2'>
                        <div class='form-actions'>
                          <div class='row'>
                            <div class='col-md-offset-5 col-md-7'>
                                <a href="<?php echo site_url('t_ujian_nilai') ?>" class="btn default">Kembali</a>
                                <a href="<?php echo site_url('t_ujian_nilai/update/'.$id) ?>" class="btn btn-success">Edit</a>
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