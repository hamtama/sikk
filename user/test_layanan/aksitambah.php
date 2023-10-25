<?php  
require_once ('../../login/connection.php');


$no_registrasi = $_POST['no_registrasi'];
$nama_konselor = $_POST['nama_konselor'];

// PENANGANAN KASUS
if(empty($_POST['penanganan_kasus'])){
    
    ?>
    <script language="javascript">
            alert("Silahkan Isi Layanan");
            document.location='tambah.php';
        </script>
    <?php
} else {

    foreach($_POST['penanganan_kasus'] as $penanganan_kasus){ 
        $cek = mysqli_num_rows($mysqli->query("SELECT *  FROM tb_layanan_pasien WHERE id_registrasi ='$no_registrasi' AND id_layanan ='$penanganan_kasus'"));

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if ($cek >= 1){
                ?> 
                    <script language="javascript">
                        alert('No Registrasi Sudah Ada !! Silahkan Ganti No Registrasi');
                        document.location='tambah.php';
                    </script>
                <?php
            } else {
                // SQL LAYANAN UNTUK PASIEN
                $sql =$mysqli->query( "INSERT INTO tb_layanan_pasien SET 
                    id_registrasi 			= '".$no_registrasi."',
                    id_konselor 			= '".$nama_konselor."',
                    id_layanan          	= '".$penanganan_kasus."'
                    ;");
                // SQL KONSELING TELP
                if (!empty($_POST['tanggal_konseling'] && $_POST['kegiatan_konseling'] && $_POST['inf_kesepakatan_konseling'])) {
                       
                        $tanggal_konseling          = $_POST['tanggal_konseling'];
                        $kegiatan_konseling         = $_POST['kegiatan_konseling'];
                        $inf_kesepakatan_konseling  = $_POST['inf_kesepakatan_konseling'];

                        $sql_konseling = $mysqli->query("INSERT INTO tb_layanan_konseling_telp SET 
                            id_registrasi       ='".$no_registrasi."',
                            id_konselor         ='".$nama_konselor."',
                            tgl_kons_telp       ='".$tanggal_konseling."',
                            kegiatan_kons_telp  ='".$kegiatan_konseling."',
                            inf_kes_kons_telp   ='".$inf_kesepakatan_konseling."';
                            ");
                       $sql_konseling = TRUE;
                   }  else {
                        $sql_konseling = FALSE;
                   }
                   // SQL KONSULTASI HUKUM
                   if (!empty($_POST['tanggal_konsultasi'] && $_POST['kegiatan_konsultasi'] && $_POST['inf_kesepakatan_konsultasi'])) {
                        
                        $tanggal_konsultasi          = $_POST['tanggal_konsultasi'];
                        $kegiatan_konsultasi         = $_POST['kegiatan_konsultasi'];
                        $inf_kesepakatan_konsultasi  = $_POST['inf_kesepakatan_konsultasi'];

                        $sql_konsultasi = $mysqli->query("INSERT INTO tb_layanan_konsultasi_hukum SET 
                            id_registrasi       ='".$no_registrasi."',
                            id_konselor         ='".$nama_konselor."',
                            tgl_kons_hukum       ='".$tanggal_konsultasi."',
                            kegiatan_kons_hukum  ='".$kegiatan_konsultasi."',
                            inf_kes_kons_hukum   ='".$inf_kesepakatan_konsultasi."'
                            ;");
                       $sql_konsultasi = TRUE;
                   } else {
                        $sql_konsultasi = FALSE;
                   }

                   



                if (($sql) || ($sql_konseling)  || ($sql_konsultasi)) {
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
    }
}
?>