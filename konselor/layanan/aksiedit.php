<?php  
require_once ('../../login/connection.php');
$id_layanan = $_POST['id_layanan'];
$nama_layanan	= $_POST['nama_layanan'];


$cek = mysqli_num_rows($mysqli->query("SELECT nama_layanan FROM tb_layanan WHERE nama_layanan ='$nama_layanan'"));


if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($cek >= 1){
		?> 
			<script language="javascript">
				alert('Nama Layanan Sudah Ada!!');
				document.location='data.php';
			</script> 	
		<?php
		
	} else {
		$sql = $mysqli->query("UPDATE tb_layanan SET 
			nama_layanan ='$nama_layanan' WHERE id_layanan = '$id_layanan';");
		if ($sql) {
		?>
			<script language="javascript">
				alert("Data Layanan Berhasil Diubah");
				document.location='data.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}
}

?>