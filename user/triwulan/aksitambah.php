<?php  
require_once ('../../login/connection.php');

$kategori		= $_POST['kategori'];
$tanggal_awal	= strtotime($_POST['tanggal_awal']);
$tgl_awal 		= date("Y-m-d",$tanggal_awal);
$tanggal_akhir	= strtotime($_POST['tanggal_akhir']);
$tgl_akhir 		= date("Y-m-d",$tanggal_akhir);

$cek = mysqli_num_rows($mysqli->query("SELECT kategori_bulan FROM tb_triwulan WHERE kategori_bulan ='$kategori'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($cek >= 1){
		?> 
			<script language="javascript">
				alert('Kategori Tidak Dapat digunakan !! Silahkan Ganti');
				document.location='tambah.php';
			</script>
		<?php
	} else {
		$sql = $mysqli->query("INSERT INTO tb_triwulan SET 
			kategori_bulan ='".$kategori."',
			awal = '".$tgl_awal."',
			akhir = '".$tgl_akhir."'
			");
		if ($sql) {
		?>
			<script language="javascript">
				alert("Data Triwulan Berhasil Ditambahkan");
				document.location='tambah.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}
}

?>