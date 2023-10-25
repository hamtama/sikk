<?php  
require_once ('../../login/connection.php');

$no_registrasi	= $_POST['id_registrasi'];
$evaluator_konselor = $_POST['evaluator_konselor'];
$evaluasi_ahkir = $_POST['evaluasi_ahkir'];
$catatan = $_POST['catatan'];


$cek = mysqli_num_rows($mysqli->query("SELECT id_registrasi FROM tb_penutup WHERE id_registrasi ='$no_registrasi'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($cek >= 1){
		?> 
			<script language="javascript">
				alert('No Registrasi Sudah Terselesaikan!!');
				document.location='../penanganan_kasus/penanganan_data.php';
			</script>
		<?php
	} else {
		$sql = $mysqli->query("INSERT INTO tb_penutup SET 
			id_registrasi 		='".$no_registrasi."',
			evaluator_konselor 	='".$evaluator_konselor."',
			evaluasi_akhir 		='".$evaluasi_ahkir."',
			catatan 			='".$catatan."'
			");
		$sql_edit = $mysqli->query("UPDATE tb_layanan_pasien SET 
			status 			='1' WHERE id_registrasi = '$no_registrasi';");

		if (($sql) && ($sql_edit)) {
		?>
			<script language="javascript">
				alert("Penanganan Kasus Telah Selesai");
				document.location='../penanganan_kasus/penanganan_data.php';
			</script>
		<?php
		} else {
			echo "Mohon Coba Lagi";
		}
	}
}

?>