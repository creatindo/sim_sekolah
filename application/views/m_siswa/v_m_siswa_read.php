
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='portlet light'>
                <div class='portlet-title'>
                  <div class='caption font-green'>
                    <span class='caption-subject bold uppercase'>M_siswa</span>
                  </div>
                </div><!-- /.title -->
                <div class='portlet-body'>
                  <table class="table table-bordered">
                    <tr><td>Siswa Nis</td><td><?php echo $siswa_nis; ?></td></tr>
                    <tr><td>Siswa Nama</td><td><?php echo $siswa_nama; ?></td></tr>
                    <tr><td>Siswa Jk</td><td><?php echo $siswa_jk; ?></td></tr>
                    <tr><td>Siswa Tgl Lahir</td><td><?php echo $siswa_tgl_lahir; ?></td></tr>
                    <tr><td>Kota Id</td><td><?php echo $kota_id; ?></td></tr>
                    <tr><td>Kecamatan Id</td><td><?php echo $kecamatan_id; ?></td></tr>
                    <tr><td>Siswa Alamat</td><td><?php echo $siswa_alamat; ?></td></tr>
                    <tr><td>Siswa Ayah</td><td><?php echo $siswa_ayah; ?></td></tr>
                    <tr><td>Siswa Ibu</td><td><?php echo $siswa_ibu; ?></td></tr>
                    <tr><td>Siswa Wali</td><td><?php echo $siswa_wali; ?></td></tr>
                    <tr><td>Telp Ortu</td><td><?php echo $telp_ortu; ?></td></tr>
                    <tr><td>Foto Img</td><td><?php echo $foto_img; ?></td></tr>
                    <tr>
                      <td colspan='2'>
                        <div class='form-actions'>
                          <div class='row'>
                            <div class='col-md-offset-5 col-md-7'>
                                <a href="<?php echo site_url('m_siswa') ?>" class="btn default">Kembali</a>
                                <a href="<?php echo site_url('m_siswa/update/'.$id) ?>" class="btn btn-success">Edit</a>
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