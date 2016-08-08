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
        <h2>M_siswa List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
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
		
            </tr><?php
            foreach ($siswa_data as $siswa)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $siswa->siswa_nis ?></td>
		      <td><?php echo $siswa->siswa_nama ?></td>
		      <td><?php echo $siswa->siswa_jk ?></td>
		      <td><?php echo $siswa->siswa_tgl_lahir ?></td>
		      <td><?php echo $siswa->kota_id ?></td>
		      <td><?php echo $siswa->kecamatan_id ?></td>
		      <td><?php echo $siswa->siswa_alamat ?></td>
		      <td><?php echo $siswa->siswa_ayah ?></td>
		      <td><?php echo $siswa->siswa_ibu ?></td>
		      <td><?php echo $siswa->siswa_wali ?></td>
		      <td><?php echo $siswa->telp_ortu ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>