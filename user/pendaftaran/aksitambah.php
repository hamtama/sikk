<?php  
require_once ('../../login/connection.php');
// FORM STEP 1 INPUT NO REGISTRASI
$nama_konselor      = $_POST['nama_konselor'];
$no_registrasi      = $_POST['no_registrasi'];
$tgl                = $_POST['tanggal'];
$tanggal            = strtotime($_POST['tanggal']);
$tgl                =  date("Y-m-d",$tanggal);
$media              = $_POST['media'];


// FORM STEP 2 INPUT IDENTITAS SURVIVOR
$nama_survivor      = $_POST['nama_survivor'];
$tempat_lahir       = $_POST['tempat_lahir'];
$tanggal_lahir      = $_POST['tanggal_lahir'];
$alamat_survivor    = $_POST['alamat_survivor'];
$kecamatan          = $_POST['kecamatan'];
$kabupaten          = $_POST['kabupaten'];
$kabupaten_lain     = $_POST['kabupaten_lain'];
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


// FORM STEP 5 INPUT DATA INFORMASI KETERANGAN KASUS
$sejak_kapan        = $_POST['sejak_kapan'];
$faktor_pemicu      = $_POST['faktor_pemicu'];
$seberapa_sering    = $_POST['seberapa_sering'];
$upaya              = $_POST['upaya_yg_dilakukan'];
$melibatkan_pihak   = $_POST['melibatkan_pihak'];
$hasilnya           = $_POST['hasilnya'];
$harapan_korban     = $_POST['harapan_korban'];
$narasi_kasus       = $_POST['narasi_kasus'];




$cek = mysqli_num_rows($mysqli->query("SELECT no_registrasi FROM tb_registrasi WHERE no_registrasi ='$no_registrasi'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($cek >= 1){
        ?> 
            <script language="javascript">
                alert('No Registrasi Sudah Ada !! Silahkan Ganti No Registrasi');
                document.location='tambah.php';
            </script>
        <?php
    } else {
        $sql =$mysqli->query( "INSERT INTO tb_registrasi SET 
            id_konselor ='".$nama_konselor."',
            no_registrasi = '".$no_registrasi."',
            hari_tanggal = '".$tgl."',
            media = '".$media."';");

        $id_registrasi =$mysqli->insert_id;

        
        $sql_survivor =$mysqli->query( "INSERT INTO tb_identitas_survivor SET 
            id_registrasi   = '".$id_registrasi."',
            nama            = '".$nama_survivor."',
            tempat_lahir    = '".$tempat_lahir."',
            tanggal_lahir   = '".$tanggal_lahir."',
            alamat          ='".$alamat_survivor."',
            kecamatan       ='".$kecamatan."',
            id_kabupaten    ='".$kabupaten."',
            kabupaten_lain  ='".$kabupaten_lain."',
            no_telp         = '".$no_telp_survivor."',
            pendidikan      = '".$pendidikan_survivor."',
            agama           = '".$agama_survivor."',
            pekerjaan       = '".$pekerjaan_survivor."',
            pekerjaan_lainnya = '".$pekerjaan_lain."',
            jenis_kelamin   = '".$jenis_kelamin."',
            hobby           = '".$hobby."',
            keterampilan    = '".$keterampilan."',
            status_perkawinan  = '".$status_perkawinan."',
            status_lainnnya  ='".$status_lainnya."',
            lama_perkawinan ='".$lama_hubungan."',
            jumlah_anak     ='".$jumlah_anak."',
            dirujuk_oleh    ='".$perolehan_informasi."';");

        $sql_pelaku= $mysqli->query( "INSERT INTO tb_identitas_pelaku SET 
            id_registrasi               ='".$id_registrasi."' ,
            nama_pelaku                 ='".$nama_pelaku."',
            umur                        ='".$umur_pelaku."',
            alamat_pelaku               ='".$alamat_pelaku."',
            no_telp_pelaku              ='".$no_telp_pelaku."',
            pendidikan_pelaku           ='".$pendidikan_pelaku."',
            agama_pelaku                ='".$agama_pelaku."',
            pekerjaan_pelaku            ='".$pekerjaan_pelaku."',
            pekerjaan_lainnya_pelaku    ='".$pekerjaan_pelaku_lainnya."',
            status_perkawinan_pelaku    ='".$status_perkawinan_pelaku."',
            status_lainnya_pelaku       ='".$status_pp_lain."',
            hubungan_korban             ='".$hubungan_korban."',
            hubungan_lainnya            ='".$hubungan_pelaku_lainnya."',
            lokasi_kasus                ='".$lokasi_kasus."',
            lokasi_lainnya              ='".$lokasi_lainnya."';");

        if(!empty($_POST['klrt'])){
            $kasus = $_POST['klrt'];
            foreach($kasus as $kasus){ 
                $sql =$mysqli->query( "INSERT INTO tb_informasi_kasus SET 
                    id_registrasi       ='".$id_registrasi."',
                    kasus       ='".$kasus."'
                    ;");
            }
            $sql_kasus = TRUE;
        }else {
            $sql_kasus = FALSE;
        }
        
        if(!empty($_POST['jenis_kdrt'])){
            $kasus_kdrt = $_POST['kasus_kdrt'];
            foreach($_POST['jenis_kdrt'] as $jenis_kdrt){ 
                $sql2 =$mysqli->query( "INSERT INTO tb_informasi_kasus SET 
                    id_registrasi       ='".$id_registrasi."',
                    kasus       ='".$kasus_kdrt."',
                    id_kdrt        ='".$jenis_kdrt."'
                    ;");
                
            }
            $sql_kasus2 = TRUE;
        }else {
            $sql_kasus2  = FALSE;
        }

        
        // INPUT DATA KDRT KTI
        if(!empty($_POST['kti'])){
            if (isset($_POST['ket_kti']))  {
                $keterangan         = $_POST['ket_kti'];
            } else {
                $keterangan         = '';
            }
            foreach($_POST['kti'] as $kti){ 
                $sql_kti =$mysqli->query( "INSERT INTO tb_kdrt_kti SET 
                        id_registrasi   = '".$id_registrasi."',
                        id_jk           = '".$kti."',
                        keterangan      = '".$keterangan."'
                        ;");
            }
            $sql_kti = TRUE;
        }else {
            $sql_kti  = FALSE;
        }
        // INPUT DATA KDRT KTA
        if(!empty($_POST['kta'])){
            if (isset($_POST['ket_kta']))  {
                $keterangan         = $_POST['ket_kta'];
            } else {
                $keterangan         = '';
            }
            foreach($_POST['kta'] as $kta){
                $sql_kta =$mysqli->query( "INSERT INTO tb_kdrt_kta SET 
                                id_registrasi   = '".$id_registrasi."',
                                id_jk           = '".$kta."',
                                keterangan      = '".$keterangan."'
                                ;");
            }
            $sql_kta = TRUE;
        }else {
            $sql_kta  = FALSE;
        }
        // INPUT DATA KDRT KTS
        if(!empty($_POST['kts'])){
            if (isset($_POST['ket_kts']))  {
                $keterangan         = $_POST['ket_kts'];
            } else {
                $keterangan         = '';
            }
            foreach($_POST['kts'] as $kts){
                $sql_kts =$mysqli->query( "INSERT INTO tb_kdrt_kts SET 
                                id_registrasi   = '".$id_registrasi."',
                                id_jk           = '".$kts."',
                                keterangan      = '".$keterangan."'
                                ;");
            }
            $sql_kts = TRUE;
        }else {
            $sql_kts  = FALSE;
        }

        // INPUT DATA KDRT LAIN
        if(!empty($_POST['lain_lain'])){
            if (isset($_POST['ket_lain']))  {
                $keterangan         = $_POST['ket_lain'];
            } else {
                $keterangan         = '';
            }
            foreach($_POST['lain_lain'] as $kdrt_lain){
                $sql_lain =$mysqli->query( "INSERT INTO tb_kdrt_lain SET 
                                id_registrasi   = '".$id_registrasi."',
                                id_jk           = '".$kdrt_lain."',
                                keterangan      = '".$keterangan."'
                                ;");
            }
        
            $sql_lain = TRUE;
        }else {
            $sql_lain  = FALSE;
        }
        // INPUT DATA KTP
        if(!empty($_POST['ktp'])){
            if (isset($_POST['ket_ktp']))  {
                $keterangan         = $_POST['ket_ktp'];
            } else {
                $keterangan         = '';
            }
            foreach($_POST['ktp'] as $ktp){
                $sql_ktp =$mysqli->query( "INSERT INTO tb_ktp SET 
                                id_registrasi   = '".$id_registrasi."',
                                id_jk           = '".$ktp."',
                                keterangan      = '".$keterangan."'
                                ;");
            }
            $sql_ktp = TRUE;
        }else {
            $sql_ktp  = FALSE;
        }

        // INPUT DATA KTA
        if(!empty($_POST['kta2'])){
            if (isset($_POST['ket_kta2']))  {
                $keterangan         = $_POST['ket_kta2'];
            } else {
                $keterangan         = '';
            }
            foreach($_POST['kta2'] as $kta2){
                $sql_kta2 =$mysqli->query( "INSERT INTO tb_kta SET 
                                id_registrasi   = '".$id_registrasi."',
                                id_jk           = '".$kta2."',
                                keterangan      = '".$keterangan."'
                                ;");
            }
            $sql_kta2 = TRUE;
        }else {
            $sql_kta2 = FALSE;
        }

        
        $sql_keterangan=$mysqli->query( "INSERT INTO tb_ket_kasus SET 
            id_registrasi           ='".$id_registrasi."',
            sejak_kapan             ='".$sejak_kapan."',                 
            faktor                  ='".$faktor_pemicu."',
            seberapa_sering         ='".$seberapa_sering."',
            upaya_yg_dilakukan      ='".$upaya."',
            pihak_yg_dilibatkan     ='".$melibatkan_pihak."',
            hasilnya                ='".$hasilnya."',
            harapan_korban          ='".$harapan_korban."',
            narasi                  ='".$narasi_kasus."';");



        
        if (($sql) && ($sql_survivor) && ($sql_pelaku) && ($sql_kasus) && ($sql_keterangan) && ($sql_kasus) || ($sql_kasus2) || ($sql_kti) || ($sql_kta) || ($sql_kts) || ($sql_lain) || ($sql_ktp) || ($sql_kta2) ) {
        ?>
            <script language="javascript">
                alert("Data Registrasi Berhasil Ditambahkan");
                document.location='invoice.php';
            </script>
        <?php
        } else {
            echo "Silahkan Input Data Lagi ",mysqli_error($mysqli);
        }
    }
}

?>