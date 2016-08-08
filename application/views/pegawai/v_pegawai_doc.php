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
        <h2>M_pegawai List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Pegawai Nip</th>
		<th>Pegawai Nama</th>
		<th>Pegawai Jk</th>
		<th>Pegawai Tgl Lahir</th>
		<th>Pegawai Golongan</th>
		<th>Kota Id</th>
		<th>Kecamatan Id</th>
		<th>Pegawai Alamat</th>
		<th>Pegawai Telp</th>
		<th>Pegawai Foto</th>
		<th>Jabatan</th>
		<th>User Id</th>
		
            </tr><?php
            foreach ($pegawai_data as $pegawai)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pegawai->pegawai_nip ?></td>
		      <td><?php echo $pegawai->pegawai_nama ?></td>
		      <td><?php echo $pegawai->pegawai_jk ?></td>
		      <td><?php echo $pegawai->pegawai_tgl_lahir ?></td>
		      <td><?php echo $pegawai->pegawai_golongan ?></td>
		      <td><?php echo $pegawai->kota_id ?></td>
		      <td><?php echo $pegawai->kecamatan_id ?></td>
		      <td><?php echo $pegawai->pegawai_alamat ?></td>
		      <td><?php echo $pegawai->pegawai_telp ?></td>
		      <td><?php echo $pegawai->pegawai_foto ?></td>
		      <td><?php echo $pegawai->jabatan ?></td>
		      <td><?php echo $pegawai->user_id ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>