
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='portlet light'>
                <div class='portlet-title'>
                  <div class='caption font-green'>
                    <span class='caption-subject bold uppercase'>T_pegawai Read</span>
                  </div>
                </div><!-- /.title -->
                <div class='portlet-body'>
                  <table class="table table-bordered">
                    <tr><td>Pagawai Id</td><td><?php echo $pagawai_id; ?></td></tr>
                    <tr><td>Jabatan Id</td><td><?php echo $jabatan_id; ?></td></tr>
                    <tr><td>Create Date</td><td><?php echo $create_date; ?></td></tr>
                    <tr><td>T Pegawai Active</td><td><?php echo $t_pegawai_active; ?></td></tr>
                    <tr><td></td><td><a href="<?php echo site_url('t_pegawai') ?>" class="btn btn-default">Cancel</a></td></tr>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.col -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->