<?php  
include '../../login/connection.php';
if (isset($_GET['delete_id'])) {
	$sql = $mysqli->query("DELETE FROM tb_identitas_survivor WHERE id_survivor = ".$_GET['delete_id']);
	if ($sql){
		echo "<script>alert('Data ID Survivor Berhasil Dihapus'); location.href='id_survivor_data.php';</script>";
	} else {
		echo "<script>alert ('Gagal Hapus Data, Coba Lagi !!!');</script>". $mysqli->error;
	}
}
?>