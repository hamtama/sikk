<?php  
include '../../login/connection.php';
if (isset($_GET['delete_id'])) {
	$sql = $mysqli->query("DELETE FROM tb_dampak WHERE id_dampak = ".$_GET['delete_id']);
	if ($sql){
		echo "<script>alert('Data Dampak / Akibat Berhasil Dihapus'); location.href='dampak_data.php';</script>";
	} else {
		echo "<script>alert ('Gagal Hapus Data, Coba Lagi !!!');</script>". $mysqli->error;
	}
}
?>