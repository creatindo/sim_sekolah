
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light portlet-fit portlet-datatable bordered'>
        <div class='portlet-title'>
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">M SISWA  </span>
            </div>
            <div class="actions">
                <div class="btn-group" >
                        <?php echo anchor('m_siswa/create/','<i class="fa fa-pencil"></i> Create',array('class'=>'btn btn-circle btn-info btn-sm'));?>
                </div>
                <div class="btn-group">
                    <a class="btn red btn-circle" href="javascript:;" data-toggle="dropdown">
                        <i class="fa fa-share"></i>
                        <span class="hidden-xs"> Tools </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <?php echo anchor(site_url('m_siswa/excel'), ' Export to Excel', ''); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- /.box-header -->
        <div class='portlet-body table-container'>
        <div class="table-actions-wrapper">
            <span> </span>
            <select class="table-group-action-input form-control input-inline input-small input-sm">
                <option value="">Select...</option>
                <option value="delete">Delete</option>
            </select>
            <button class="btn btn-sm green table-group-action-submit">
                <i class="fa fa-check"></i> Submit</button>
        </div>
        <table class="table table-striped table-bordered table-hover" id="mytable">
            <thead>
                <tr role="row" class="heading">
                    <th width="2%"><input type="checkbox" class="group-checkable"> </th>
                    
                    <th>Siswa Nis</th>
                    <th>Siswa Nama</th>
                    <th>Siswa Jk</th>
                    <th>Siswa Tgl Lahir</th>
                    <th>Kota Id</th>
                    <th>Kecamatan Id</th>
                    <th>Siswa Alamat</th>
                    <th>Siswa Ayah</th>
                    <th>Siswa Ibu</th>
                    <th>Siswa Wali</th>
                    <th>Telp Ortu</th>
                    <th>Siswa Img</th>
                    <th>Action</th>
                </tr>
                <tr role="row" class="filter">
                    <td></td>
                    
                    <td><input type="text" class="form-control form-filter input-sm" name="siswa_nis"></td>
                    <td><input type="text" class="form-control form-filter input-sm" name="siswa_nama"></td>
                    <td>
                    <?php 
                      $ddajax = array(
                          'url' => site_url('form/dd/M_gender_model'), 
                          'name' =>'siswa_jk',
                          'class' => 'form-control form-filter input-sm',
                          );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                    ?>
                    </td>
                    <td>
                        <input class="form-control form-control form-filter input-sm date-decade " readonly name="siswa_tgl_lahir_start"  type="text" value="" />
                        <input class="form-control form-control form-filter input-sm date-decade " readonly name="siswa_tgl_lahir_end"  type="text" value="" />
                    </td>
                    <td>
                    <?php 
                      $ddajax = array(
                          'url' => site_url('form/dd/M_kota_model'), 
                          'name' =>'kota_id',
                          'class' => 'form-control form-filter input-sm',
                          );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                    ?>
                    </td>
                    <td>
                    <?php 
                      $ddajax = array(
                          'url' => site_url('form/dd/M_kecamatan_model'), 
                          'name' =>'kecamatan_id',
                          'class' => 'form-control form-filter input-sm',
                          );
                      $this->load->view('form/v_dropdown_ajax', array('ddajax' => $ddajax ), FALSE);
                    ?>
                    </td>
                    <td><input type="text" class="form-control form-filter input-sm" name="siswa_alamat"></td>
                    <td><input type="text" class="form-control form-filter input-sm" name="siswa_ayah"></td>
                    <td><input type="text" class="form-control form-filter input-sm" name="siswa_ibu"></td>
                    <td><input type="text" class="form-control form-filter input-sm" name="siswa_wali"></td>
                    <td><input type="text" class="form-control form-filter input-sm" name="telp_ortu"></td>
                    <td><input type="text" class="form-control form-filter input-sm" name="siswa_img"></td>
                    <td>
                        <div class="margin-bottom-5">
                            <button class="btn btn-sm green btn-outline filter-submit margin-bottom">
                            <i class="fa fa-search"></i> Search</button>
                        </div>
                        <button class="btn btn-sm red btn-outline filter-cancel">
                        <i class="fa fa-times"></i> Reset</button>
                    </td>
                </tr>
            </thead>
	    <tbody>
            </tbody>
        </table>
        <script type="text/javascript">
            var TableDatatablesAjax = function () {
                var grid = new Datatable();
                grid.init({
                    src: $("#mytable"),
                    dataTable: {  
                        "ajax": {
                            "url": "<?php echo site_url('m_siswa/getDatatable/') ?>", // ajax source
                        },
                        "order": [
                            [1, "asc"]
                        ]// set first column as a default sort by asc
                    }
                });
            }
            jQuery(document).ready(function() {
               TableDatatablesAjax();
            });
        </script>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->