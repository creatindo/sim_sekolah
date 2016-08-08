
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='portlet light'>
                <div class='portlet-title'>
                  <div class='caption font-green'>
                    <span class='caption-subject bold uppercase'>Pegawai</span>
                  </div>
                </div><!-- /.title -->
                <div class='portlet-body'>
                  <table class="table table-bordered">
                    <tr><td>Pegawai Nip</td><td><?php echo $pegawai_nip; ?></td></tr>
                    <tr><td>Pegawai Nama</td><td><?php echo $pegawai_nama; ?></td></tr>
                    <tr><td>Pegawai Jk</td><td><?php echo $pegawai_jk; ?></td></tr>
                    <tr><td>Pegawai Tgl Lahir</td><td><?php echo $pegawai_tgl_lahir; ?></td></tr>
                    <tr><td>Pegawai Golongan</td><td><?php echo $pegawai_golongan; ?></td></tr>
                    <tr><td>Kota Id</td><td><?php echo $kota_id; ?></td></tr>
                    <tr><td>Kecamatan Id</td><td><?php echo $kecamatan_id; ?></td></tr>
                    <tr><td>Pegawai Alamat</td><td><?php echo $pegawai_alamat; ?></td></tr>
                    <tr><td>Pegawai Telp</td><td><?php echo $pegawai_telp; ?></td></tr>
                    <tr><td>Pegawai Foto</td><td><?php echo $pegawai_foto; ?></td></tr>
                    <tr><td>Jabatan</td><td><?php echo $jabatan; ?></td></tr>
                    <tr><td>User Id</td><td><?php echo $user_id; ?></td></tr>
                    <tr>
                      <td colspan='2'>
                        <div class='form-actions'>
                          <div class='row'>
                            <div class='col-md-offset-5 col-md-7'>
                                <a href="<?php echo site_url('pegawai') ?>" class="btn btn-default">Cancel</a>
                                <a href="<?php echo site_url('pegawai/update/'.$id) ?>" class="btn btn-info">Edit</a>
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