<?php  
require_once ('../../login/connection.php');

$id_kdrt		= $_POST['id_kdrt'];
$jenis_kdrt		= $_POST['jenis_kdrt'];


$cek = mysqli_num_rows($mysqli->query("SELECT kdrt FROM tb_kdrt WHERE kdrt ='$jenis_kdrt'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($cek >= 1){
		?> 
			<script language="javascript">
				alert('Jenis KDRT Tersebut Sudah Ada!!');
				document.location='data.php';
			</script>
		<?php
	} else {
		$sql = $mysqli->query("UPDATE tb_kdrt SET 
			kdrt ='$jenis_kdrt' WHERE id_kdrt = '$id_kdrt' ");
		if ($sql) {
		?>
			<script language="javascript">
				alert("Data Jenis KDRT Berhasil Di Edit");
				document.location='data.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}
}

?>