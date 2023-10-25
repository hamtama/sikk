<?php  
require_once ('../../login/connection.php');

$jenis_kasus	= $_POST['jenis_kasus'];


$cek = mysqli_num_rows($mysqli->query("SELECT jenis_kasus FROM tb_jenis_kasus WHERE jenis_kasus ='$jenis_kasus'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($cek >= 1){
		?> 
			<script language="javascript">
				alert('Jenis Kasus Tersebut Sudah Ada!!');
				document.location='data.php';
			</script>
		<?php
	} else {
		$sql = $mysqli->query("INSERT INTO tb_jenis_kasus SET 
			jenis_kasus ='".$jenis_kasus."'");
		if ($sql) {
		?>
			<script language="javascript">
				alert("Data Jenis Kasus Berhasil Ditambahkan");
				document.location='data.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}
}

?>