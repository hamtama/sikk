<?php  
include '../../login/connection.php';
if (isset($_GET['delete_id'])) {
	$sql = $mysqli->query("DELETE FROM tb_identitas_pelaku WHERE id_pelaku = ".$_GET['delete_id']);
	if ($sql){
		echo "<script>alert('Data ID Pelaku Berhasil Dihapus'); location.href='id_pelaku_data.php';</script>";
	} else {
		echo "<script>alert ('Gagal Hapus Data, Coba Lagi !!!');</script>". $mysqli->error;
	}
}
?>