
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='portlet light'>
                <div class='portlet-title'>
                  <div class='caption font-green'>
                    <span class='caption-subject bold uppercase'>M_jurusan Read</span>
                  </div>
                </div><!-- /.title -->
                <div class='portlet-body'>
                  <table class="table table-bordered">
                    <tr><td>Jurusan Nama</td><td><?php echo $jurusan_nama; ?></td></tr>
                    <tr><td>Jurusan Active</td><td><?php echo $jurusan_active; ?></td></tr>
                    <tr><td></td><td><a href="<?php echo site_url('jurusan') ?>" class="btn btn-default">Cancel</a></td></tr>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.col -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->