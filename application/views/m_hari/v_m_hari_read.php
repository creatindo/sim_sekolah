
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='portlet light'>
                <div class='portlet-title'>
                  <div class='caption font-green'>
                    <span class='caption-subject bold uppercase'>M_hari Read</span>
                  </div>
                </div><!-- /.title -->
                <div class='portlet-body'>
                  <table class="table table-bordered">
                    <tr><td>Hari Nama</td><td><?php echo $hari_nama; ?></td></tr>
                    <tr>
                      <td></td>
                      <td>
                        <a href="<?php echo site_url('m_hari') ?>" class="btn btn-default">Cancel</a>
                        <a href="<?php echo site_url('m_hari/update/'.$id) ?>" class="btn btn-default">Edit</a>
                      </td>
                    </tr>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.col -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->