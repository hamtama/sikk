<?php  
require_once ('../../login/connection.php');

// FORM STEP 2 INPUT IDENTITAS SURVIVOR
$id 				= $_POST['id_pelaku'];	
//FOMR STEP 3 INPUT DATA IDENTITAS PELAKU

$nama_pelaku        = $_POST['nama_pelaku'];
$umur_pelaku        = $_POST['umur_pelaku'];
$alamat_pelaku      = $_POST['alamat_pelaku'];
$no_telp_pelaku     = $_POST['no_telp_pelaku'];
$pendidikan_pelaku  = $_POST['pendidikan_pelaku'];
$agama_pelaku       = $_POST['agama_pelaku'];
$pekerjaan_pelaku   = $_POST['pekerjaan_pelaku'];
$pekerjaan_pelaku_lainnya   = $_POST['pekerjaan_pelaku_lainnya'];
$status_perkawinan_pelaku   = $_POST['status_perkawinan_pelaku'];
$status_pp_lain             = $_POST['status_perkawinan_pelaku_lain'];
$hubungan_korban            = $_POST['hubungan_korban'];
$hubungan_pelaku_lainnya    = $_POST['hubungan_pelaku_lainnya'];
$lokasi_kasus               = $_POST['lokasi_kasus'];
$lokasi_lainnya             = $_POST['lokasi_lainnya'];


if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$sql_pelaku= $mysqli->query( "UPDATE  tb_identitas_pelaku SET 
           
            nama                ='$nama_pelaku',
            umur                ='$umur_pelaku',
            alamat              ='$alamat_pelaku',
            no_telp             ='$no_telp_pelaku',
            pendidikan          ='$pendidikan_pelaku',
            agama               ='$agama_pelaku',
            pekerjaan           ='$pekerjaan_pelaku',
            pekerjaan_lainnya   ='$pekerjaan_pelaku_lainnya',
            status_perkawinan   ='$status_perkawinan_pelaku',
            status_lainnya      ='$status_pp_lain',
            hubungan_korban     ='$hubungan_korban',
            hubungan_lainnya    ='$hubungan_pelaku_lainnya',
            lokasi_kasus            ='$lokasi_kasus',
            lokasi_lainnya          ='$lokasi_lainnya' WHERE id_pelaku='$id'   ;");
		if ($sql_pelaku ) {
		?>
			<script language="javascript">
				alert("Data Identitas Pelaku Berhasil Di Edit");
				document.location='id_pelaku_data.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}


?>