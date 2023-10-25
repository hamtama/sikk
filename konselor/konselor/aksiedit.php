<?php  
require_once ('../../login/connection.php');

$id 				= $_POST['id_konselor'];
$nama_konselor 		= $_POST['nama_konselor'];
$bidang_keahlian 	= $_POST['bidang_keahlian'];
$alamat 			= $_POST['alamat'];
$no_telp			= $_POST['no_telp'];


$cek = mysqli_num_rows($mysqli->query("SELECT nama_konselor FROM tb_konselor WHERE nama_konselor ='$nama_konselor'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($cek > 1){
		?> 
			<script language="javascript">
				alert('Nama Konselor Tidak Dapat digunakan !! Silahkan Ganti Nama Koselor');
				document.location='tambah.php';
			</script>
		<?php
	} else {
		$sql = $mysqli->query("UPDATE tb_konselor SET 
			nama_konselor ='$nama_konselor',
			bidang_keahlian = '$bidang_keahlian',
			alamat = '$alamat',
			no_telp = '$no_telp' WHERE id_konselor='$id' ");
		if ($sql) {
		?>
			<script language="javascript">
				alert("Data Konselor Berhasil Di Edit");
				document.location='data.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}
}


?>