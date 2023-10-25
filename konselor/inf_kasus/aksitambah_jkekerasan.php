<?php  
require_once ('../../login/connection.php');

$jenis_kekerasan	= $_POST['jenis_kekerasan'];


$cek = mysqli_num_rows($mysqli->query("SELECT jenis_kekerasan FROM tb_jenis_kekerasan WHERE jenis_kekerasan ='$jenis_kekerasan'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($cek >= 1){
		?> 
			<script language="javascript">
				alert('Jenis kekerasan Sudah Ada!!');
				document.location='data.php';
			</script>
		<?php
	} else {
		$sql = $mysqli->query("INSERT INTO tb_jenis_kekerasan SET 
			jenis_kekerasan ='".$jenis_kekerasan."'");
		if ($sql) {
		?>
			<script language="javascript">
				alert("Data Kekerasan  Berhasil Ditambahkan");
				document.location='data.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}
}

?>