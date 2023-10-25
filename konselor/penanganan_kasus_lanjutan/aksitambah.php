<?php  
require_once ('../../login/connection.php');


$id_layanan = $_POST['id_layanan'];
$id_registrasi = $_POST['id_registrasi'];
switch ($id_layanan) {
        case '1' :  $table ="tb_layanan_konseling_telp";
            $tanggal    = "tgl_kons_telp" ;
            $kegiatan   ="kegiatan_kons_telp";
            $inf_kes    ="inf_kes_kons_telp";
            break;
        case '2' :  $table ="tb_layanan_konsultasi_hukum";
            $tanggal    ="tgl_kons_hukum";
            $kegiatan   ="kegiatan_kons_hukum";
            $inf_kes    ="inf_kes_kons_hukum";
            break;
        case '3' :  $table ="tb_layanan_litigasi"; 
            $tanggal    ="tgl_litigasi_awal";  
            $tanggal2   ="tgl_litigasi_akhir";
            $kegiatan   ="kegiatan_litigasi";
            $inf_kes    ="inf_kes_litigasi";
            break;
        case '4' :  $table ="tb_layanan_home_visite";
            $tanggal    ="tgl_home_visite";
            $kegiatan   ="kegiatan_home_visite";
            $inf_kes    ="inf_kes_home_visite";
              
            break;
        case '5' :  $table ="tb_layanan_medis";
            $tanggal    ="tgl_medis";
            $kegiatan   ="kegiatan_medis";
            $inf_kes    ="inf_kes_medis";
             
            break;
        case '6' :  $table ="tb_layanan_shelter";
            $tanggal    ="tgl_shelter_awal";
            $tanggal2   ="tgl_shelter_akhir";
            $kegiatan   ="kegiatan_shelter";
            $inf_kes    ="inf_kes_shelter";
            
            break;
        case '8' :  $table ="tb_layanan_support_group";
            $tanggal    ="tgl_support_group";
            $kegiatan   ="kegiatan_support_group";
            $inf_kes    ="inf_kes_support_group";
            break;
        case '10':  $table ="tb_layanan_aspirasi";
            $tanggal ="tgl_aspirasi";
            $kegiatan ="kegiatan_aspirasi";
            $inf_kes ="inf_kes_aspirasi";
            break;
    }

if ($table == "tb_layanan_litigasi" || $id_layanan == "tb_layanan_shelter"){

    $nama_konselor  = $_POST['nama_konselor'];
    $tanggal_1      = strtotime($_POST['tanggal_awal']);
    $tanggal_awal   = date("Y-m-d",$tanggal1);
    $tanggal_2      = strtotime($_POST['tanggal_akhir']);
    $tanggal_akhir  = date("Y-m-d",$tanggal2);
    $kegiatan_value = $_POST['kegiatan'];
    $inf_kesepakatan = $_POST['inf_kesepakatan'];

    $cek = mysqli_num_rows($mysqli->query("SELECT $tanggal FROM $table WHERE $tanggal ='$tanggal_awal'"));
    $cek2 = mysqli_num_rows($mysqli->query("SELECT $tanggal2 FROM $table WHERE $tanggal2 ='$tanggal_akhir'"));
    $cek3 = mysqli_num_rows($mysqli->query("SELECT $tanggal FROM $table WHERE $tanggal ='$tanggal_akhir'"));
    $cek4 = mysqli_num_rows($mysqli->query("SELECT $tanggal2 FROM $table WHERE $tanggal2 ='$tanggal_awal'"));
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if ($cek >= 1){
            ?> 
                <script language="javascript">
                    alert('Tanggal Awal Sudah Terlaksana, Silahkan Ganti Tanggal');
                    document.location='<?php echo"../penanganan_kasus/penanganan_detail.php?detail=$id_registrasi"?>';
                </script>
            <?php
        } elseif ($cek2 >= 1){
             ?> 
                <script language="javascript">
                    alert('Tanggal Akhir Sudah Terlaksana, Silahkan Ganti Tanggal');
                    document.location='<?php echo"../penanganan_kasus/penanganan_detail.php?detail=$id_registrasi"?>';
                </script>
            <?php   
        } elseif ($cek3 >= 1){
             ?> 
                <script language="javascript">
                    alert('Tanggal Yang Diinputkan Tidak Benar, Silahkan Ganti Tanggal');
                    document.location='<?php echo"../penanganan_kasus/penanganan_detail.php?detail=$id_registrasi"?>';
                </script>
            <?php
        } elseif ($cek4 >= 1){
             ?> 
                <script language="javascript">
                    alert('Tanggal Yang Diinputkan Tidak Benar, Silahkan Ganti Tanggal');
                    document.location='<?php echo"../penanganan_kasus/penanganan_detail.php?detail=$id_registrasi"?>';
                </script>
            <?php
        } elseif ($tanggal_awal == $tanggal_akhir){
             ?> 
                <script language="javascript">
                    alert('Kedua Tanggal Sama, Silahkan Ganti Tanggal');
                    document.location='<?php echo"../penanganan_kasus/penanganan_detail.php?detail=$id_registrasi"?>';
                </script>
            <?php
        
        } else {
        $sql =$mysqli->query( "INSERT INTO $table SET 
            id_registrasi       = '".$id_registrasi."',
            id_konselor         = '".$nama_konselor."',
            $tanggal 			= '".$tanggal_awal."',
            $tanggal2 			= '".$tanggal_akhir."',
            $kegiatan          	= '".$kegiatan_value."',
            $inf_kes            = '".$inf_kesepakatan."'
            ;");
    	
            if ($sql) {
            ?>
                <script language="javascript">
                    alert("Data Penanganan Berhasil Ditambahkan");
                    document.location='<?php echo"../penanganan_kasus/penanganan_detail.php?detail=$id_registrasi"?>';
                </script>
            <?php
            } else {
                echo "Silahkan Input Data Lagi ",mysqli_error($mysqli);
            }
        }
    }
} else {
    $nama_konselor  = $_POST['nama_konselor'];
    $tanggal_1      = strtotime($_POST['tanggal']);
    $tanggal_kons   = date("Y-m-d",$tanggal_1);
    $kegiatan_value = $_POST['kegiatan'];
    $inf_kesepakatan = $_POST['inf_kesepakatan'];

    $cek = mysqli_num_rows($mysqli->query("SELECT $tanggal FROM $table WHERE $tanggal ='$tanggal_kons'"));

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if ($cek >= 1){
            ?> 
                <script language="javascript">
                    alert('Tanggal Awal Sudah Terlaksana, Silahkan Ganti Tanggal');
                    document.location='<?php echo"../penanganan_kasus/penanganan_detail.php?detail=$id_registrasi"?>';
                </script>
            <?php   
        
        } else {
        $sql =$mysqli->query( "INSERT INTO $table SET 
            id_registrasi       = '".$id_registrasi."',
            id_konselor         = '".$nama_konselor."',
            $tanggal            = '".$tanggal_kons."',
            $kegiatan           = '".$kegiatan_value."',
            $inf_kes            = '".$inf_kesepakatan."'
            ;");
        
            if ($sql) {
            ?>
                <script language="javascript">
                    alert("Data Penanganan Berhasil Ditambahkan");
                    document.location='<?php echo"../penanganan_kasus/penanganan_detail.php?detail=$id_registrasi"?>';
                </script>
            <?php
            } else {
                echo "Silahkan Input Data Lagi ",mysqli_error($mysqli);
            }
        }
    }
}
        
?>