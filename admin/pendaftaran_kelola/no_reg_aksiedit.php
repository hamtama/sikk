<?php  
require_once ('../../login/connection.php');

$id 				= $_POST['id_registrasi'];
$no_registrasi 		= $_POST['no_registrasi'];
$tanggal 			= strtotime($_POST['tanggal']);
$tgl 				=  date("Y-m-d",$tanggal);
$nama_konselor 		= $_POST['nama_konselor'];
$media				= $_POST['media'];



if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$sql = $mysqli->query("UPDATE tb_registrasi SET 
			no_registrasi ='$no_registrasi',
			hari_tanggal = '$tgl',
			id_konselor = '$nama_konselor',
			media = '$media' WHERE id_registrasi='$id' ");
		if ($sql) {
		?>
			<script language="javascript">
				alert("Data Registrasi Berhasil Di Edit");
				document.location='no_reg_data.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}
?>