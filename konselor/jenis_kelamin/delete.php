<?php  
include '../../login/connection.php';
if (isset($_GET['delete_id'])) {
	$sql = $mysqli->query("DELETE FROM tb_jenis_kelamin WHERE id_jenis_kelamin = ".$_GET['delete_id']);
	if ($sql){
		echo "<script>alert('Data Jenis Kelamin Berhasil Dihapus'); location.href='data.php';</script>";
	} else {
		echo "<script>alert ('Gagal Hapus Data, Coba Lagi !!!');</script>". $mysqli->error;
	}
}
?>