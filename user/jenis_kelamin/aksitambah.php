
<?php  
require_once ('../../login/connection.php');

$jenis_kelamin	= $_POST['jenis_kelamin'];


$cek = mysqli_num_rows($mysqli->query("SELECT jenis_kelamin FROM tb_jenis_kelamin WHERE jenis_kelamin ='$jenis_kelamin'"));


if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($cek >= 1){
		?> 
			<script language="javascript">
				alert('Jenis Kelamin Sudah Ada!!');
				document.location='tambah.php';
			</script>
		<?php
	} else {
		$sql = $mysqli->query("INSERT INTO tb_jenis_kelamin SET 
			jenis_kelamin ='".$jenis_kelamin."';");
		if ($sql) {
		?>
			<script language="javascript">
				alert("Data Jenis Kelamin Berhasil Ditambahkan");
				document.location='tambah.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}
}

?>