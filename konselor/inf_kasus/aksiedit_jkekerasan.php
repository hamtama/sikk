<?php  
require_once ('../../login/connection.php');

$id_jk		= $_POST['id_jk'];
$jenis_kekerasan	= $_POST['jenis_kekerasan'];


$cek = mysqli_num_rows($mysqli->query("SELECT jenis_kekerasan FROM tb_jenis_kekerasan WHERE jenis_kekerasan ='$jenis_kekerasan'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($cek >= 1){
		?> 
			<script language="javascript">
				alert('Jenis Kekerasan Tersebut Sudah Ada!!');
				document.location='data.php';
			</script>
		<?php
	} else {
		$sql = $mysqli->query("UPDATE tb_jenis_kekerasan SET 
			jenis_kekerasan ='$jenis_kekerasan' WHERE id_jk = '$id_jk' ");
		if ($sql) {
		?>
			<script language="javascript">
				alert("Data Jenis Kekerasan Berhasil Di Edit");
				document.location='data.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}
}

?>