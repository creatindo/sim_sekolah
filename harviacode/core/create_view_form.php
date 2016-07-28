<?php

$string = "
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>".  strtoupper($table_name)."</span>
          </div>
        </div>
        <div class='portlet-body form'>";
$string .= "
            <form action=\"<?php echo \$action; ?>\" method=\"post\">";
$string .="
              <div class='form-body'>
                <div class='row'>";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text') {
        $string .= "
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>". label($row["column_name"]) . "</label>
                        <div class='col-md-9'>
                            <textarea class=\"form-control\" rows=\"3\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\"><?php echo $" . $row["column_name"] . "; ?></textarea>
                            <span class='help-block'> <?php echo form_error('" . $row["column_name"] . "') ?> </span>
                        </div>
                    </div>
                  </div>
                  ";
    } else {
        $string .= "
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>". label($row["column_name"]) . "</label>
                        <div class='col-md-9'>
                            <input type=\"text\" class=\"form-control\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\" value=\"<?php echo $" . $row["column_name"] . "; ?>\" />
                            <span class='help-block'> <?php echo form_error('" . $row["column_name"] . "') ?> </span>
                        </div>
                    </div>
                  </div>
                  ";
    }
}
$string .= "
                  <input type=\"hidden\" name=\"" . $pk . "\" value=\"<?php echo $" . $pk . "; ?>\" />
                </div>
                <div class='form-actions'>
                            <button type='submit' class='btn green'>Submit</button>
                            <a href=\"<?php echo site_url('" . $c_url . "') ?>\" class=\"btn default\">Cancel</a>
                </div>
                ";
$string .= "
              </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->";

$hasil_view_form = createFile($string, $target . "views/" . $v_form_file);
?>