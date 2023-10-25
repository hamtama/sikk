<?php  
require_once ('../../login/connection.php');
// FORM STEP 6 INPUT DATA DAMPAK YANG DIAKIBATKAN
$id 				= $_POST['id_dampak'];
$nama_konselor			= $_POST['nama_konselor'];
$kesehatan_fisik        = $_POST['kesehatan_fisik'];
$kesehatan_jiwa         = $_POST['kesehatan_jiwa'];
$per_tdk_sehat          = $_POST['per_tdk_sehat'];
$kesehatan_reproduksi   = $_POST['kesehatan_reproduksi'];
$kondisi_kronis         = $_POST['kondisi_kronis'];
$ekonomi                = $_POST['ekonomi'];
$anak_keluarga          = $_POST['anak_keluarga'];
$lain_lain              = $_POST['lain_lain'];


if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$sql = $mysqli->query("UPDATE tb_dampak SET 
			
            id_konselor				='$nama_konselor',
            kesehatan_fisik         ='$kesehatan_fisik',
            kesehatan_jiwa          ='$kesehatan_jiwa',
            perilaku                ='$per_tdk_sehat',
            kesehatan_reproduksi    ='$kesehatan_reproduksi',
            kondisi_kronis          ='$kondisi_kronis',
            ekonomi                 ='$ekonomi',
            anak_keluarga           ='$anak_keluarga',
            lain_lain               ='$lain_lain' WHERE id_dampak='$id'; ");
		if ($sql) {
		?>
			<script language="javascript">
				alert("Data Dampak Berhasil Di Edit");
				document.location='dampak_data.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}


?>