 <?php  
require_once ('../../login/connection.php');

// FORM STEP 6 INPUT DATA DAMPAK YANG DIAKIBATKAN
$no_registrasi          = $_POST['no_registrasi'];
$nama_konselor          = $_POST['nama_konselor'];
$kesehatan_fisik        = $_POST['kesehatan_fisik'];
$kesehatan_jiwa         = $_POST['kesehatan_jiwa'];
$per_tdk_sehat          = $_POST['per_tdk_sehat'];
$kesehatan_reproduksi   = $_POST['kesehatan_reproduksi'];
$kondisi_kronis         = $_POST['kondisi_kronis'];
$ekonomi                = $_POST['ekonomi'];
$anak_keluarga          = $_POST['anak_keluarga'];
$lain_lain              = $_POST['lain_lain'];

$cek = mysqli_num_rows($mysqli->query("SELECT id_registrasi FROM tb_dampak WHERE id_registrasi ='$no_registrasi'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($cek >= 1){
        ?> 
            <script language="javascript">
                alert('No Registrasi Sudah Ada !! Silahkan Ganti No Registrasi');
                document.location='tambah.php';
            </script>
        <?php
    } else {
            $sql_dampak = $mysqli->query("INSERT INTO tb_dampak SET 
                  id_registrasi           ='".$no_registrasi."',
                  id_konselor             ='".$nama_konselor."',
                  kesehatan_fisik         ='".$kesehatan_fisik."',
                  kesehatan_jiwa          ='".$kesehatan_jiwa."',
                  perilaku                ='".$per_tdk_sehat."',
                  kesehatan_reproduksi    ='".$kesehatan_reproduksi."',
                  kondisi_kronis          ='".$kondisi_kronis."',
                  ekonomi                 ='".$ekonomi."',
                  anak_keluarga           ='".$anak_keluarga."',
                  lain_lain               ='".$lain_lain."'; ");


                if ($sql_dampak) {
        ?>
            <script language="javascript">
                alert("Data Dampak Berhasil Ditambahkan");
                document.location='tambah.php';
            </script>
        <?php
        } else {
            echo "Silahkan Input Data Lagi ",mysqli_error($mysqli);
        }
    }
}

?>