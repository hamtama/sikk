<?php  
require_once ('../../login/connection.php');


$no_registrasi = $_POST['no_registrasi'];
$nama_konselor = $_POST['nama_konselor'];
$kebutuhan_lainnya = $_POST['aspirasi_lainnya'];

// PENANGANAN KASUS
if (isset($_POST['penanganan_kasus']))  {
    $v_penanganan_kasus     = $_POST['penanganan_kasus'];
    $penanganan_kasus       = '';
    foreach($v_penanganan_kasus as $input_penanganan_kasus){ $penanganan_kasus.=$input_penanganan_kasus.","; }
} else {
    $penanganan_kasus       = '';
}

// KONSELING TELP
if (isset($_POST['konseling_telp']))  {
    $v_konseling_telp     = $_POST['konseling_telp'];
    $konseling_telp       = '';
    foreach($v_konseling_telp as $input_konseling_telp){ $konseling_telp.=$input_konseling_telp.","; }
} else {
    $konseling_telp       = '';
}

// KONSELING HUKUM
if (isset($_POST['konseling_hukum']))  {
    $v_konseling_hukum     = $_POST['konseling_hukum'];
    $konseling_hukum       = '';
    foreach($v_konseling_hukum as $input_konseling_hukum){ $konseling_hukum.=$input_konseling_hukum.","; }
} else {
    $konseling_hukum       = '';
}

// HOME VISITE
if (isset($_POST['home_visite']))  {
    $v_home_visite     = $_POST['home_visite'];
    $home_visite       = '';
    foreach($v_home_visite as $input_home_visite){ $home_visite.=$input_home_visite.","; }
} else {
    $home_visite       = '';
}

// PELAYANAN MEDIS
if (isset($_POST['medis']))  {
    $v_medis        = $_POST['medis'];
    $medis       	= '';
    foreach($v_medis as $input_medis){ $medis.=$input_medis.","; }
} else {
    $medis       	= '';
}

// SUPPORT GROUP
if (isset($_POST['support_group']))  {
    $v_support_group     = $_POST['support_group'];
    $support_group       = '';
    foreach($v_support_group as $input_support_group){ $support_group.=$input_support_group.","; }
} else {
    $support_group       = '';
}

// LAYANAN LAINNYA
if (isset($_POST['layanan_lainnya']))  {
    $v_layanan_lainnya     = $_POST['layanan_lainnya'];
    $layanan_lainnya       = '';
    foreach($v_layanan_lainnya as $input_layanan_lainnya){ $layanan_lainnya.=$input_layanan_lainnya.","; }
} else {
    $layanan_lainnya       = '';
}


// KONSELING LITIGASI
if (isset($_POST['litigasi']))  {
    $v_litigasi     = $_POST['litigasi'];
    $litigasi       = '';
    foreach($v_litigasi as $input_litigasi){ $litigasi.=$input_litigasi.","; }
} else {
    $litigasi       = '';
}

// KONSELING SHELTER
if (isset($_POST['shelter']))  {
    $v_shelter         = $_POST['shelter'];
    $shelter       = '';
    foreach($v_shelter as $input_shelter){ $shelter.=$input_shelter.","; }
} else {
    $shelter       = '';
}


$cek = mysqli_num_rows($mysqli->query("SELECT id_registrasi FROM tb_penanganan_kasus WHERE id_registrasi ='$no_registrasi'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($cek >= 1){
        ?> 
            <script language="javascript">
                alert('No Registrasi Sudah Ada !! Silahkan Ganti No Registrasi');
                document.location='tambah.php';
            </script>
        <?php
    } else {
        $sql =$mysqli->query( "INSERT INTO tb_penanganan_kasus SET 
            id_registrasi 			= '".$no_registrasi."',
            id_konselor 			= '".$nama_konselor."',
            layanan_yg_dibutuhkan 	= '".$penanganan_kasus."',
            kebutuhan_lainnya 		= '".$kebutuhan_lainnya."', 		
            konseling_telp			= '".$konseling_telp."',
            konseling_hukum			= '".$konseling_hukum."',
            home_visite				= '".$home_visite."',
            pelayanan_medis 		= '".$medis."',
            support_group			= '".$support_group."',
            litigasi 				= '".$litigasi."',
            shelter 				= '".$shelter."',
            layanan_lainnya 		= '".$layanan_lainnya."';");

        if ($sql) {
        ?>
            <script language="javascript">
                alert("Data Penanganan Kasus Berhasil Ditambahkan");
                document.location='tambah.php';
            </script>
        <?php
        } else {
            echo "Silahkan Input Data Lagi ",mysqli_error($mysqli);
        }
    }
}
?>