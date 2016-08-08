<?php 

$string = "
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='portlet light'>
                <div class='portlet-title'>
                  <div class='caption font-green'>
                    <span class='caption-subject bold uppercase'>".ucfirst($table_name)." Read</span>
                  </div>
                </div><!-- /.title -->
                <div class='portlet-body'>
                  <table class=\"table table-bordered\">";
                    foreach ($non_pk as $row) {
                      $string .= "
                    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
                    }
                      $string .= "
                    <tr>
                      <td></td>
                      <td>
                        <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a>
                        <a href=\"<?php echo site_url('".$c_url."/update/'.\$id) ?>\" class=\"btn btn-info\">Edit</a>
                      </td>
                    </tr>";
                      $string .= "
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.col -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->";



$hasil_view_read = createFile($string, $target_view. $v_read_file);

?>
