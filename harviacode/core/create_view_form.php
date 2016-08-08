<?php

$string = "
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light'>
        <div class='portlet-title'>
          <div class='caption font-green'>
            <span class='caption-subject bold uppercase'>Form ".  strtoupper($c)." </span>
          </div>
        </div>
        <div class='portlet-body form'>";
$string .= "
            <form action=\"<?php echo \$action; ?>\" method=\"post\">";
$string .="
              <div class='form-body'>";
$i=0;
foreach ($non_pk as $row) {
    $i++;
    if ($i % 2 == 1) {
        $string .="
                <div class='row'>";
    } 
    
    if ($row["data_type"] == 'text') {
        $string .= "
                  <div class='col-md-12'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>". label($row["column_name"]) . "</label>
                        <div class='col-md-9'>
                            <textarea class=\"form-control\" rows=\"3\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\"><?php echo $" . $row["column_name"] . "; ?></textarea>
                            <span class='help-block'> <?php echo form_error('" . $row["column_name"] . "') ?> </span>
                        </div>
                    </div>
                  </div>
                  ";
    } else if(array_key_exists($row["column_name"], $reference) ) {
        $string .= "
                  <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>". label($row["column_name"]) . "</label>
                        <div class='col-md-9'>
                            <?php 
                              \$v_name_".$i." = '';
                              if (!empty($".$row["column_name"].")) {                                
                                \$v_name_".$i." = \$this->".$reference[$row["column_name"]]["r_table"]."->get($" . $row["column_name"] . ")->{\$this->".$reference[$row["column_name"]]["r_table"]."->label};
                              }
                              \$ddajax = array(
                                  'url' => site_url('form/dd/".$reference[$row["column_name"]]["r_table"]."'), 
                                  'name' =>'".$row["column_name"]."',
                                  'current_selected_id' => $" . $row["column_name"] . ", 
                                  'current_selected_name' => \$v_name_".$i.", 
                                  );
                              \$this->load->view('form/v_dropdown_ajax', array('ddajax' => \$ddajax ), FALSE);
                            ?> 
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
    if ($i % 2 == 0) {
        $string .="
                </div>";
    }
    
}
  if ($i % 2 == 1) {
      $string .="
                </div>";
  }
$string .= "
                  <input type=\"hidden\" name=\"" . $pk . "\" value=\"<?php echo $" . $pk . "; ?>\" />
                </div>
                <div class='form-actions'>
                  <div class='row'>
                      <div class='col-md-offset-5 col-md-7'>
                        <button type='submit' class='btn green'>Submit</button>
                        <a href=\"<?php echo site_url('" . $c_url . "') ?>\" class=\"btn default\">Cancel</a>
                    </div>
                  </div>
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

$hasil_view_form = createFile($string, $target_view . $v_form_file);
?>