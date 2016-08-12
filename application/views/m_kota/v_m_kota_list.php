
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-12'>
      <div class='portlet light portlet-fit portlet-datatable bordered'>
        <div class='portlet-title'>
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">M KOTA  </span>
            </div>
            <div class="actions">
                <div class="btn-group" >
                        <?php echo anchor('m_kota/create/','<i class="fa fa-pencil"></i> Create',array('class'=>'btn btn-circle btn-info btn-sm'));?>
                </div>
                <div class="btn-group">
                    <a class="btn red btn-circle" href="javascript:;" data-toggle="dropdown">
                        <i class="fa fa-share"></i>
                        <span class="hidden-xs"> Tools </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <?php echo anchor(site_url('m_kota/excel'), ' Export to Excel', ''); ?>
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
                    
                    <th>Kota Kode</th>
                    <th>M Propinsi Id</th>
                    <th>Kota Nama</th>
                    <th>Kota Aktif</th>
                    <th>Kota Created By</th>
                    <th>Kota Revised</th>
                    <th>Kota Counter</th>
                    <th>Kota Kab</th>
                    <th>Action</th>
                </tr>
                <tr role="row" class="filter">
                    <td></td>
                    
                    <td><input type="text" class="form-control form-filter input-sm" name="kota_kode"></td>
                    <td><input type="text" class="form-control form-filter input-sm" name="m_propinsi_id"></td>
                    <td><input type="text" class="form-control form-filter input-sm" name="kota_nama"></td>
                    <td><input type="text" class="form-control form-filter input-sm" name="kota_aktif"></td>
                    <td><input type="text" class="form-control form-filter input-sm" name="kota_created_by"></td>
                    <td><input type="text" class="form-control form-filter input-sm" name="kota_revised"></td>
                    <td><input type="text" class="form-control form-filter input-sm" name="kota_counter"></td>
                    <td><input type="text" class="form-control form-filter input-sm" name="kota_kab"></td>
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
                            "url": "<?php echo site_url('m_kota/getDatatable/') ?>", // ajax source
                        },
                        "order": [
                            [1, "asc"]
                        ],// set first column as a default sort by asc
                        fixedColumns:   {
                            leftColumns: 1,
                            rightColumns: 1
                        }
                    },
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