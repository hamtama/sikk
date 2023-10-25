<?php  
include '../../login/connection.php';
if (isset($_GET['delete_id'])) {
	$sql1 = $mysqli->query("DELETE FROM tb_registrasi WHERE id_registrasi = ".$_GET['delete_id']);
	$sql2 = $mysqli->query("DELETE FROM tb_identitas_survivor WHERE id_registrasi = ".$_GET['delete_id']);
	$sql3 = $mysqli->query("DELETE FROM tb_identitas_pelaku WHERE id_registrasi = ".$_GET['delete_id']);
	$sql4 = $mysqli->query("DELETE FROM tb_informasi_kasus WHERE id_registrasi = ".$_GET['delete_id']);
	$sql5 = $mysqli->query("DELETE FROM tb_kdrt_kti WHERE id_registrasi = ".$_GET['delete_id']);
	$sql6 = $mysqli->query("DELETE FROM tb_kdrt_kta WHERE id_registrasi = ".$_GET['delete_id']);
	$sql7 = $mysqli->query("DELETE FROM tb_kdrt_kts WHERE id_registrasi = ".$_GET['delete_id']);
	$sql8 = $mysqli->query("DELETE FROM tb_kdrt_lain WHERE id_registrasi = ".$_GET['delete_id']);
	$sql9 = $mysqli->query("DELETE FROM tb_ktp WHERE id_registrasi = ".$_GET['delete_id']);
	$sql10 = $mysqli->query("DELETE FROM tb_kta WHERE id_registrasi = ".$_GET['delete_id']);
	$sql11 = $mysqli->query("DELETE FROM tb_layanan_pasien WHERE id_registrasi = ".$_GET['delete_id']);
	$sql12 = $mysqli->query("DELETE FROM tb_layanan_shelter WHERE id_registrasi = ".$_GET['delete_id']);
	$sql13 = $mysqli->query("DELETE FROM tb_layanan_litigasi WHERE id_registrasi = ".$_GET['delete_id']);
	$sql14 = $mysqli->query("DELETE FROM tb_layanan_medis WHERE id_registrasi = ".$_GET['delete_id']);
	$sql15 = $mysqli->query("DELETE FROM tb_layanan_aspirasi WHERE id_registrasi = ".$_GET['delete_id']);
	$sql16 = $mysqli->query("DELETE FROM tb_layanan_support_group WHERE id_registrasi = ".$_GET['delete_id']);
	$sql17 = $mysqli->query("DELETE FROM tb_layanan_home_visite WHERE id_registrasi = ".$_GET['delete_id']);
	$sql18 = $mysqli->query("DELETE FROM tb_layanan_konsultasi_hukum WHERE id_registrasi = ".$_GET['delete_id']);
	$sql19 = $mysqli->query("DELETE FROM tb_layanan_konseling_telp WHERE id_registrasi = ".$_GET['delete_id']);
	$sql20 = $mysqli->query("DELETE FROM tb_penutup WHERE id_registrasi = ".$_GET['delete_id']);
	if ($sql1 && $sql2 && $sql3 && $sql4 && $sql5 && $sql6 && $sql7 && $sql8 && $sql9 && $sql10 && $sql11 && $sql12 && $sql13 && $sql14 && $sql15 && $sql16 && $sql17 && $sql18 && $sql19 && $sql20){
		echo "<script>alert('Data Registrasi Berhasil Dihapus'); location.href='no_reg_data.php';</script>";
	} else {
		echo "<script>alert ('Gagal Hapus Data, Coba Lagi !!!');</script>". $mysqli->error;
	}
}
?>