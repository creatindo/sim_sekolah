<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>M_kecamatan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kecamatan Kode</th>
		<th>M Kota Id</th>
		<th>Kecamatan Nama</th>
		<th>Kecamatan Aktif</th>
		<th>Kecamatan Created By</th>
		<th>Kecamatan Created Date</th>
		<th>Kecamatan Updated By</th>
		<th>Kecamatan Updated Date</th>
		<th>Kecamatan Revised</th>
		
            </tr><?php
            foreach ($kecamatan_data as $kecamatan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kecamatan->kecamatan_kode ?></td>
		      <td><?php echo $kecamatan->m_kota_id ?></td>
		      <td><?php echo $kecamatan->kecamatan_nama ?></td>
		      <td><?php echo $kecamatan->kecamatan_aktif ?></td>
		      <td><?php echo $kecamatan->kecamatan_created_by ?></td>
		      <td><?php echo $kecamatan->kecamatan_created_date ?></td>
		      <td><?php echo $kecamatan->kecamatan_updated_by ?></td>
		      <td><?php echo $kecamatan->kecamatan_updated_date ?></td>
		      <td><?php echo $kecamatan->kecamatan_revised ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>