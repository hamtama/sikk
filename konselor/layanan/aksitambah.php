<?php  
require_once ('../../login/connection.php');

$nama_layanan	= $_POST['nama_layanan'];


$cek = mysqli_num_rows($mysqli->query("SELECT nama_layanan FROM tb_layanan WHERE nama_layanan ='$nama_layanan'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($cek >= 1){
		?> 
			<script language="javascript">
				alert('Jenis Layanan Tersebut Sudah Ada!!');
				document.location='tambah.php';
			</script>
		<?php
	} else {
		$sql = $mysqli->query("INSERT INTO tb_layanan SET 
			nama_layanan ='".$nama_layanan."'");
		if ($sql) {
		?>
			<script language="javascript">
				alert("Data Jenis Layanan Berhasil Ditambahkan");
				document.location='tambah.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}
}

?>