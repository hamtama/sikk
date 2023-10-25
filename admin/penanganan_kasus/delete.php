<?php  
include '../../login/connection.php';
if (isset($_GET['delete_id'])) {
	$sql = $mysqli->query("DELETE FROM tb_penanganan_kasus WHERE id_penanganan = ".$_GET['delete_id']);
	if ($sql){
		echo "<script>alert('Data Penanganan Kasus Berhasil Dihapus'); location.href='penanganan_data.php';</script>";
	} else {
		echo "<script>alert ('Gagal Hapus Data, Coba Lagi !!!');</script>". $mysqli->error;
	}
}
?>