<?php  
require_once ('../../login/connection.php');

$kekerasan_kdrt	= $_POST['kekerasan_kdrt'];


$cek = mysqli_num_rows($mysqli->query("SELECT kdrt FROM tb_kdrt WHERE kdrt ='$kekerasan_kdrt'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($cek >= 1){
		?> 
			<script language="javascript">
				alert('Jenis kekerasan KDRT Sudah Ada!!');
				document.location='data.php';
			</script>
		<?php
	} else {
		$sql = $mysqli->query("INSERT INTO tb_kdrt SET 
			kdrt ='".$kekerasan_kdrt."'");
		if ($sql) {
		?>
			<script language="javascript">
				alert("Data Kekerasan KDRT Berhasil Ditambahkan");
				document.location='data.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}
}

?>