<?php  
require_once ('../../login/connection.php');

$id 				= $_POST['id_ket_kasus'];
$sejak_kapan        = $_POST['sejak_kapan'];
$faktor_pemicu      = $_POST['faktor_pemicu'];
$seberapa_sering    = $_POST['seberapa_sering'];
$upaya              = $_POST['upaya_yg_dilakukan'];
$melibatkan_pihak   = $_POST['melibatkan_pihak'];
$hasilnya           = $_POST['hasilnya'];
$harapan_korban     = $_POST['harapan_korban'];
$narasi_kasus       = $_POST['narasi_kasus'];


if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$sql = $mysqli->query("UPDATE tb_ket_kasus SET 
			
            sejak_kapan             ='$sejak_kapan',                 
            faktor                  ='$faktor_pemicu',
            seberapa_sering         ='$seberapa_sering',
            upaya_yg_dilakukan      ='$upaya',
            pihak_yg_dilibatkan     ='$melibatkan_pihak',
            hasilnya                ='$hasilnya',
            harapan_korban          ='$harapan_korban',
            narasi                  ='$narasi_kasus' WHERE id_ket_kasus='$id' ");
		if ($sql) {
		?>
			<script language="javascript">
				alert("Data Keterangan Kasus Berhasil Di Edit");
				document.location='ket_kasus_data.php';
			</script>
		<?php
		} else {
			echo "Silahkan Input Data Lagi";
		}
	}


?>