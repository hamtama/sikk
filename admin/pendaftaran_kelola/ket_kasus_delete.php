<?php  
include '../../login/connection.php';
if (isset($_GET['delete_id'])) {
	$sql = $mysqli->query("DELETE FROM tb_ket_kasus WHERE id_ket_kasus = ".$_GET['delete_id']);
	if ($sql){
		echo "<script>alert('Data Keterangan Kasus Berhasil Dihapus'); location.href='ket_kasus_data.php';</script>";
	} else {
		echo "<script>alert ('Gagal Hapus Data, Coba Lagi !!!');</script>". $mysqli->error;
	}
}
?>