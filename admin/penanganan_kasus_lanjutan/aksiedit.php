<?php  
require_once ('../../login/connection.php');


$id_layanan = $_POST['id_layanan'];
$id = $_POST['id'];
$count = count($id);
switch ($id_layanan) {
        case '1' :  $table ="tb_layanan_konseling_telp";
            $tanggal   = "tgl_kons_telp" ;
            $kegiatan   ="kegiatan_kons_telp";
            $inf_kes    ="inf_kes_kons_telp";
            $id_p = "id_konseling_telp";
            break;
        case '2' :  $table ="tb_layanan_konsultasi_hukum";
            $tanggal    ="tgl_kons_hukum";
            $kegiatan   ="kegiatan_kons_hukum";
            $inf_kes    ="inf_kes_kons_hukum";
            $id_p = "id_konsultasi_hukum";
            break;
        case '3' :  $table ="tb_layanan_litigasi"; 
            $tanggal    ="tgl_litigasi_awal";  
            $tanggal2   ="tgl_litigasi_akhir";
            $kegiatan   ="kegiatan_litigasi";
            $inf_kes    ="inf_kes_litigasi";
            $id_p = "id_litigasi";
            break;
        case '4' :  $table ="tb_layanan_home_visite";
            $tanggal    ="tgl_home_visite";
            $kegiatan   ="kegiatan_home_visite";
            $inf_kes    ="inf_kes_home_visite";
            $id_p = "id_home_visite";
            break;
        case '5' :  $table ="tb_layanan_medis";
            $tanggal    ="tgl_medis";
            $kegiatan   ="kegiatan_medis";
            $inf_kes    ="inf_kes_medis";
            $id_p = "id_medis";
             
            break;
        case '6' :  $table ="tb_layanan_shelter";
            $tanggal    ="tgl_shelter_awal";
            $tanggal2   ="tgl_shelter_akhir";
            $kegiatan   ="kegiatan_shelter";
            $inf_kes    ="inf_kes_shelter";
            $id_p = "id_shelter";
            
            break;
        case '8' :  $table ="tb_layanan_support_group";
            $tanggal    ="tgl_support_group";
            $kegiatan   ="kegiatan_support_group";
            $inf_kes    ="inf_kes_support_group";
            $id_p = "id_support_group";
            break;
        case '10':  $table ="tb_layanan_aspirasi";
            $tanggal ="tgl_aspirasi";
            $kegiatan ="kegiatan_aspirasi";
            $inf_kes ="inf_kes_aspirasi";
            $id_p = "id_aspirasi";
            break;
    }

if ($table == "tb_layanan_litigasi" || $table == "tb_layanan_shelter"){

    for($i=0; $i<$count; $i++){
        $id = $_POST['id'][$i];
        $nama_konselor  = $_POST['nama_konselor'][$i];
        $tanggal_1      = strtotime($_POST['tanggal_awal'][$i]);
        $tanggal_awal   = date("Y-m-d",$tanggal_1);
        $tanggal_2      = strtotime($_POST['tanggal_akhir'][$i]);
        $tanggal_akhir  = date("Y-m-d",$tanggal_2);
        $kegiatan_value = $_POST['kegiatan'][$i];
        $inf_kesepakatan = $_POST['inf_kesepakatan'][$i];
        $id_registrasi = $_POST['id_registrasi'];

        $cek = mysqli_num_rows($mysqli->query("SELECT $tanggal FROM $table WHERE $tanggal ='$tanggal_awal'"));
        $cek2 = mysqli_num_rows($mysqli->query("SELECT $tanggal2 FROM $table WHERE $tanggal2 ='$tanggal_akhir'"));
        $cek3 = mysqli_num_rows($mysqli->query("SELECT $tanggal FROM $table WHERE $tanggal ='$tanggal_akhir'"));
        $cek4 = mysqli_num_rows($mysqli->query("SELECT $tanggal2 FROM $table WHERE $tanggal2 ='$tanggal_awal'"));
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
    		if ($cek[$i] >= 1){
                ?> 
                    <script language="javascript">
                        alert('Tanggal Awal Sudah Terlaksana, Silahkan Ganti Tanggal');
                        document.location='<?php echo"../penanganan_kasus/penanganan_detail.php?detail=$id_registrasi[$i]"?>';
                    </script>
                <?php
            } elseif ($cek2[$i] >= 1){
                 ?> 
                    <script language="javascript">
                        alert('Tanggal Akhir Sudah Terlaksana, Silahkan Ganti Tanggal');
                        document.location='<?php echo"../penanganan_kasus/penanganan_detail.php?detail=$id_registrasi[$i]"?>';
                    </script>
                <?php   
            } elseif ($cek3[$i] >= 1){
                 ?> 
                    <script language="javascript">
                        alert('Tanggal Yang Diinputkan Tidak Benar, Silahkan Ganti Tanggal');
                        document.location='<?php echo"../penanganan_kasus/penanganan_detail.php?detail=$id_registrasi[$i]"?>';
                    </script>
                <?php
            } elseif ($cek4[$i] >= 1){
                 ?> 
                    <script language="javascript">
                        alert('Tanggal Yang Diinputkan Tidak Benar, Silahkan Ganti Tanggal');
                        document.location='<?php echo"../penanganan_kasus/penanganan_detail.php?detail=$id_registrasi[$i]"?>';
                    </script>
                <?php
            } elseif ($tanggal_awal == $tanggal_akhir){
                 ?> 
                    <script language="javascript">
                        alert('Kedua Tanggal Sama, Silahkan Ganti Tanggal');
                        document.location='<?php echo"../penanganan_kasus/penanganan_detail.php?detail=$id_registrasi[$i]"?>';
                    </script>
                <?php
            } else {
                
                $sql = $mysqli->query( "UPDATE $table SET 
                    id_konselor         = '$nama_konselor',
                    $tanggal 			= '$tanggal_awal',
                    $tanggal2 			= '$tanggal_akhir',
                    $kegiatan          	= '$kegiatan_value',
                    $inf_kes            = '$inf_kesepakatan'
                    WHERE $id_p='$id';");

                if ($sql) {
                    ?>
                    <script language="javascript">
                        alert("Data Penanganan Berhasil DiUbah");
                        document.location='<?php echo"../penanganan_kasus/penanganan_detail.php?detail=$id_registrasi[$i]"?>';
                    </script>
                <?php
                } else {
                    echo "Silahkan Input Data Lagi ",mysqli_error($mysqli);
                }

            }
        }
    }
    

} else {
    for($i=0; $i<$count; $i++){
        $id = $_POST['id'][$i];
        $nama_konselor  = $_POST['nama_konselor'][$i];
        $tanggal_1      = strtotime($_POST['tanggal'][$i]);
        $tanggal_kons   = date("Y-m-d",$tanggal_1);
        $kegiatan_value = $_POST['kegiatan'][$i];
        $inf_kesepakatan = $_POST['inf_kesepakatan'][$i];
        $id_registrasi = $_POST['id_registrasi'];

        $cek = mysqli_num_rows($mysqli->query("SELECT $tanggal FROM $table WHERE $tanggal ='$tanggal_kons'"));

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if ($cek[$i] >= 1){
                ?> 
                    <script language="javascript">
                        alert('Tanggal Awal Sudah Terlaksana, Silahkan Ganti Tanggal');
                        document.location='<?php echo"../penanganan_kasus/penanganan_detail.php?detail=$id_registrasi[$i]"?>';
                    </script>
                <?php   
            
            } else {
                $sql =$mysqli->query( "UPDATE $table SET 
                    id_konselor         = '$nama_konselor',
                    $tanggal            = '$tanggal_kons',
                    $kegiatan           = '$kegiatan_value',
                    $inf_kes            = '$inf_kesepakatan'
                    WHERE $id_p='$id';");
                if ($sql) {
                    ?>
                    <script language="javascript">
                        alert("Data Penanganan Berhasil Diubah");
                        document.location='<?php echo"../penanganan_kasus/penanganan_detail.php?detail=$id_registrasi[$i]"?>';
                    </script>
                    <?php
                } else {
                    echo "Silahkan Input Data Lagi ",mysqli_error($mysqli);
                    echo $id_p ,"<br>";
                    echo $nama_konselor,"<br>";
                    echo $id, "<br>";
                    echo $count;
                }
            }
        }
    }
    
}
        
?>