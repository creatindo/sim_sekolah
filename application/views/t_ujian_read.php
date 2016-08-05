
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='portlet light'>
                <div class='portlet-title'>
                  <div class='caption font-green'>
                    <span class='caption-subject bold uppercase'>T_ujian Read</span>
                  </div>
                </div><!-- /.title -->
                <div class='portlet-body'>
                  <table class="table table-bordered">
                    <tr><td>Ujian Id</td><td><?php echo $ujian_id; ?></td></tr>
                    <tr><td>T Jadwal Id</td><td><?php echo $t_jadwal_id; ?></td></tr>
                    <tr><td>T Ujian Active</td><td><?php echo $t_ujian_active; ?></td></tr>
                    <tr><td></td><td><a href="<?php echo site_url('t_ujian') ?>" class="btn btn-default">Cancel</a></td></tr>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.col -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->