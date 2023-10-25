<?php  
require_once ('../../login/connection.php');

$id 				= $_POST['id_survivor'];

$nama_survivor      = $_POST['nama_survivor'];
$tempat_lahir       = $_POST['tempat_lahir'];
$tanggal_lahir      = $_POST['tanggal_lahir'];
$alamat_survivor    = $_POST['alamat_survivor'];
$kecamatan          = $_POST['kecamatan'];
$kabupaten          = $_POST['kabupaten'];
$no_telp_survivor   = $_POST['no_telp_survivor'];
$pendidikan_survivor = $_POST['pendidikan_survivor'];
$agama_survivor     = $_POST['agama_survivor'];
$pekerjaan_survivor = $_POST['pekerjaan_survivor'];
$pekerjaan_lain     = $_POST['pekerjaan_survivor_lainnya'];
$jenis_kelamin      = $_POST['jenis_kelamin'];
$hobby              = $_POST['hobby'];
$keterampilan       = $_POST['keterampilan'];
$status_perkawinan  = $_POST['status_perkawinan_survivor'];
$status_lainnya     = $_POST['status_perkawinan_survivor_lain'];
$lama_hubungan      = $_POST['lama_hubungan_survivor'];
$jumlah_anak        = $_POST['jumlah_anak'];
$perolehan_informasi= $_POST['perolehan_informasi_survivor'];			



if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$sql_survivor =$mysqli->query( "UPDATE tb_identitas_survivor SET 
            
            nama            	= '$nama_survivor',
            tempat_lahir    	= '$tempat_lahir',
            tanggal_lahir   	= '$tanggal_lahir',
            alamat          	='$alamat_survivor.',
            kecamatan       	='$kecamatan',
            id_kabupaten       	='$kabupaten',
            no_telp         	= '$no_telp_survivor',
            pendidikan      	= '$pendidikan_survivor',
            agama           	= '$agama_survivor',
            pekerjaan       	= '$pekerjaan_survivor',
            pekerjaan_lainnya 	= '$pekerjaan_lain',
            jenis_kelamin   	= '$jenis_kelamin',
            hobby           	= '$hobby',
            keterampilan    	= '$keterampilan',
            status_perkawinan  	= '$status_perkawinan',
            status_lainnnya  	='$status_lainnya',
            lama_perkawinan 	='$lama_hubungan',
            jumlah_anak     	='$jumlah_anak',
            dirujuk_oleh    	='$perolehan_informasi' WHERE id_survivor ='$id' ");
		if ($sql_survivor) {
		?>
			<script language="javascript">
				alert("Data Informasi Survivor Berhasil Di Edit");
				document.location='id_survivor_data.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}


?>