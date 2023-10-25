<?php  
require_once ('../../login/connection.php');
$id = $_POST['id_triwulan'];
$kategori = $_POST['kategori'];
$tanggal_awal	= strtotime($_POST['tanggal_awal']);
$tgl_awal 		= date("Y-m-d",$tanggal_awal);
$tanggal_akhir	= strtotime($_POST['tanggal_akhir']);
$tgl_akhir 		= date("Y-m-d",$tanggal_akhir);


$cek = mysqli_num_rows($mysqli->query("SELECT kategori_bulan FROM tb_triwulan WHERE kategori_bulan ='$kategori'"));
$cek2 = mysqli_num_rows($mysqli->query("SELECT * FROM tb_triwulan WHERE awal = '$tgl_awal' AND akhir ='$tgl_akhir'"));
$cek3 = mysqli_num_rows($mysqli->query("SELECT * FROM tb_triwulan WHERE awal = '$tgl_awal'"));
$cek4 = mysqli_num_rows($mysqli->query("SELECT * FROM tb_triwulan WHERE akhir = '$tgl_akhir'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($cek > 1){
		?> 
			<script language="javascript">
				alert('Nama Kategor Sudah Ada!!');
				document.location='data.php';
			</script> 	
		<?php
	} elseif ($cek2 > 1) {
			?>
				<script language="javascript">
					alert('Tanggal Sudah Terdaftar !!');
					document.location="data.php";
				</script>
			<?php
	} elseif ($cek3 > 1) {
			?>
				<script language="javascript">
					alert('Tanggal Sudah Terdaftar !!');
					document.location="data.php";
				</script>
			<?php
	} elseif ($cek4 > 1) {
			?>
				<script language="javascript">
					alert('Tanggal Sudah Terdaftar!!');
					document.location="data.php";
				</script>
			<?php
		
	} else {
		$sql = $mysqli->query("UPDATE tb_triwulan SET 
			kategori_bulan ='$kategori',
			awal = '$tgl_awal',
			akhir = '$tgl_akhir' WHERE id_triwulan = '$id';");
		if ($sql) {
		?>
			<script language="javascript">
				alert("Data Triwulan Berhasil Diubah");
				document.location='data.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}
}

?>