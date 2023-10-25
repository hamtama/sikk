<?php
require_once ('../../login/connection.php');

	$no_registrasi = $_POST['no_registrasi'];
	$sql_nama_survivor = mysqli_query($mysqli, "SELECT * FROM tb_identitas_survivor INNER JOIN tb_registrasi ON tb_registrasi.id_registrasi = tb_identitas_survivor.id_registrasi WHERE tb_identitas_survivor.id_registrasi = $no_registrasi") or die (mysql_error($mysqli));
$survivor = mysqli_fetch_array($sql_nama_survivor) ;
	echo '
	
	<input type="text" name="nama_survivor" value="'.$survivor['nama'].'" id="nama_survivor" class="form-control has-feedback-left">
	<span class="fa fa-user form-control-feedback left"></span>

	<div class="input-group-append">
		<a href="#myModal" data-toggle="modal" data-target="#myModal" class="btn btn-outline-primary lihat_data" data-id="'.$survivor['id_registrasi'].'" >Lihat Data</a>
	</div>
	
	';

?>
