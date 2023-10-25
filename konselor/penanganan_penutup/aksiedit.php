


<?php  
require_once ('../../login/connection.php');

$id 				= $_POST['id_registrasi'];
$evaluator_konselor	= $_POST['evaluator_konselor'];
$evaluasi_akhir 	= $_POST['evaluasi_akhir'];
$catatan 			= $_POST['catatan'];



$cek = mysqli_num_rows($mysqli->query("SELECT id_registrasi FROM tb_penutup WHERE id_registrasi ='$id'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($cek > 1){
		?> 
			<script language="javascript">
				alert('Id Registrasi Sudah Terdaftar !! Silahkan Ganti');
				document.location='tambah.php';
			</script>
		<?php
	} else {
		$sql = $mysqli->query("UPDATE tb_penutup SET 
			evaluator_konselor ='$evaluator_konselor',
			evaluasi_akhir = '$evaluasi_akhir',
			catatan = '$catatan'
			WHERE id_registrasi='$id' ");
		if ($sql) {
		?>
			<script language="javascript">
				alert("Data Konselor Berhasil Di Edit");
				document.location='data.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}
}


?>