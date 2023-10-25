<?php  
require_once ('../../login/connection.php');
$id_kabupaten = $_POST['id_kabupaten'];
$kode_kemendagri	= $_POST['kode_kemendagri'];
$kabupaten = $_POST['kabupaten'];


$cek = mysqli_num_rows($mysqli->query("SELECT kode_kemendagri FROM tb_kabupaten WHERE kode_kemendagri ='$kode_kemendagri'"));
$cek2 = mysqli_num_rows($mysqli->query("SELECT kabupaten FROM tb_kabupaten WHERE kabupaten = '$kabupaten'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($cek > 1){
		?> 
			<script language="javascript">
				alert('Kode Kemendagri Sudah Ada!!');
				document.location='data.php';
			</script> 	
		<?php
	} elseif ($cek2 > 1) {
			?>
				<script language="javascript">
					alert('kabupaten Sudah ada !!');
					document.location="data.php";
				</script>
			<?php
		
	} else {
		$sql = $mysqli->query("UPDATE tb_kabupaten SET 
			kode_kemendagri ='$kode_kemendagri',
			kabupaten = '$kabupaten' WHERE id_kabupaten = '$id_kabupaten';");
		if ($sql) {
		?>
			<script language="javascript">
				alert("Data Kabupaten Berhasil Diubah");
				document.location='data.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}
}

?>