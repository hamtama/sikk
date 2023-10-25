<?php  
include '../../login/connection.php';
if (isset($_GET['batal'])) {
	$id = $_GET['batal'];
	$sql = $mysqli->query("DELETE FROM tb_penutup WHERE id_registrasi = '$id'");
	$sql_edit = $mysqli->query("UPDATE tb_layanan_pasien SET 
			status 			='0' WHERE id_registrasi = '$id'");
	if ($sql && $sql_edit){
		echo "<script>alert('Data Berhasil Diubah'); location.href='../penanganan_kasus/penanganan_data.php';</script>";
	} else {
		echo "<script>alert ('Gagal Hapus Data, Coba Lagi !!!');</script>". $mysqli->error;
	}
}
?>