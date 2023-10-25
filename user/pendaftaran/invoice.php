<?php
require_once ('../../layout/wrapperuser/head.php');
require_once ('../../layout/wrapperuser/sidebar.php');
require_once ('../../layout/wrapperuser/header.php');
require_once ('../../layout/wrapperuser/content.php');


    $sql_all_data = mysqli_query($mysqli, "SELECT * FROM tb_registrasi 
        INNER JOIN tb_identitas_survivor    ON tb_registrasi.id_registrasi = tb_identitas_survivor.id_registrasi
        INNER JOIN tb_identitas_pelaku      ON tb_registrasi.id_registrasi = tb_identitas_pelaku.id_registrasi
        INNER JOIN tb_informasi_kasus       ON tb_registrasi.id_registrasi = tb_informasi_kasus.id_registrasi
        INNER JOIN tb_ket_kasus             ON tb_registrasi.id_registrasi = tb_ket_kasus.id_registrasi 
        INNER JOIN tb_jenis_kasus           ON tb_informasi_kasus.kasus = tb_jenis_kasus.id_jkas
        INNER JOIN tb_kabupaten             ON tb_identitas_survivor.id_kabupaten = tb_kabupaten.id_kabupaten
        WHERE 1 ORDER BY tb_registrasi.id_registrasi DESC LIMIT 1") or die (mysqli_error($mysqli));
    while ($row = mysqli_fetch_array($sql_all_data)){
        $id = $row['id_registrasi'];
        $tanggal = strtotime($row['hari_tanggal']);
        $tgl = date("d-M-Y",$tanggal);


        
                                        
                            
?>
<style>
h3 {
    font-family: times new roman;    
}
.rdu {
    font-size: 27px;
}
.daerah {
    font-size: 20px;
}
.jalan  {
    font-size: 15px;
}

@media print{
    /* Hide Every other element */
    body, footer, header, content, nav {
        visibility: hidden;
    }
    title * {
        visibility: hidden;
    }
    .x_title{
        display: none;
        margin: 0px;
        padding: 0px;
    }
    /*then displaying print x-content */
    .x_content , section *{
        visibility: visible;

    }
    .x_content{

        background-color: transparent !important:;
    }
    .x_panel, {
        background-color: transparent;
        margin: 2em;
        padding: 0px;
    }
    .clearfix {
        padding: 0px;
        margin: 0px;
    }
    @page{
        margin-top: 0px;
        margin-bottom: 0px;
    }
}

</style>
<div class="">

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="pr-3">Invoice Design <small>Form Pendaftaran</small></h2>
                        <button class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        
                        <li>
                            <a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <section class="content invoice">
                        
                        <!-- info row -->
                        
                        <div class="row invoice-info">
                         
                            <div class="col-sm-2 invoice-col">
                               <img class="mt-3 ml-5" src="../../assets/images/logo.png"  alt="..." style="height: 100px">     
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-8 invoice-col">
                                    <h3  class="text-center">
                                        <small>
                                            PUSAT LAYANAN TERPADU PEREMPUAN DAN ANAK
                                            <p class="mb-0">KORBAN KEKERASAN</p>
                                            <p class="text-danger mb-0 rdu" >P2TPAKK "REKSO DYAH UTAMI"</p>
                                            <p class="daerah mb-0">Daerah Istimewa Yogyakarta</p>
                                            <p class="jalan">Jl. Balirejo No.29 Muja-Muju Yogyakarta; Tlp/Fax. (024) 540529; Email : reksodyahutami@yahoo.com</p>
                                            
                                        </small >
                                    </h3> 
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-2 invoice-col">
                               <img class="mt-3" src="../../assets/images/logo-rdu.png"  alt="..." style="height: 100px">
                            </div>
                            <!-- /.col -->
                            
                        </div>
                        <div class="border border-dark"></div>
                        <!-- /.row -->
                        <!-- FROM  row -->
                        <div class="row pt-3">
                            <div class="col-sm-12">
                                <form role="form">
                                    <div class="col-sm-6 p">
                                        <div class="form-group">
                                            <label class="col-form-label col-md-6 col-sm-6" for="no_registrasi">No. Registrasi : </label>
                                            <div class="col-md-6 col-sm-6">
                                                <input type="text" class="form-control" value="<?php echo $row['no_registrasi']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-md-6 col-sm-6" for="hari_tanggal">Hari / Tanggal : </label>
                                            <div class="col-md-6 col-sm-6">
                                                <input type="text" class="form-control" value="<?php echo $tgl; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 pb-3">
                                        <div class="form-group">
                                            <label class="col-form-label col-md-6 col-sm-6" for="nama_konselor">Nama Konselor : </label>
                                            <div class="col-md-6 col-sm-6">
                                                <?php  
                                                $sql_konselor = mysqli_query($mysqli, "SELECT * FROM tb_registrasi 
                                                    INNER JOIN tb_konselor ON tb_konselor.id_konselor = tb_registrasi.id_konselor WHERE 1 ORDER BY tb_registrasi.id_registrasi DESC LIMIT 1") or die (mysqli_error($mysqli));
                                                while ($row_konselor = mysqli_fetch_array($sql_konselor)){
                                
                                               echo' <input type="text" class="form-control" value="'.$row_konselor['nama_konselor'].'">';
                                                  }?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-md-6 col-sm-6" for="media">Media : </label>
                                            <div class="col-md-6 col-sm-6">
                                                <input type="text" class="form-control" value="<?php echo $row['media']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            A. IDENITAS SURVIVOR
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3" for="nama_survivor">Nama  : </label>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" class="form-control" value="<?php echo $row['nama']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3" for="alamat_survivor">alamat  : </label>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" class="form-control" value="<?php echo $row['alamat']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3" for="kabupaten_survivor">Kabupaten  : </label>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" class="form-control" value="<?php if($row['id_kabupaten'] == '7') {echo $row['kabupaten_lain'];} else {echo $row['kabupaten'];} ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3" for="kabupaten_survivor">Status Perkawinan  : </label>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" class="form-control" value="<?php echo $row['status_perkawinan']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3" for="dirujuk_oleh">Dirujuk Oleh  : </label>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" class="form-control" value="<?php echo $row['dirujuk_oleh']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            B. IDENITAS PELAKU
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3" for="nama_pelaku">Nama  : </label>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" class="form-control" value="<?php echo $row['nama_pelaku']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3" for="alamat_survivor">alamat  : </label>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" class="form-control" value="<?php echo $row['alamat_pelaku']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3" for="hubungan_dengan_korban">Hubungan Dengan Korban : </label>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" class="form-control" value="<?php echo $row['hubungan_korban']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3" for="lokasi_kasus">Lokasi Kasus  : </label>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" class="form-control" value="<?php echo $row['lokasi_kasus']; ?>">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
    

<?php  
        $kekerasan= "SELECT DISTINCT kasus,id_kdrt FROM tb_informasi_kasus 
                INNER JOIN tb_jenis_kasus ON tb_informasi_kasus.kasus = tb_jenis_kasus.id_jkas 
                WHERE id_registrasi = ".$id."";

        $query_kekerasan = mysqli_query($mysqli,$kekerasan) or die (mysqli_error($kekerasan));
        if(mysqli_num_rows($query_kekerasan) > 0){
            while($row_k = mysqli_fetch_array($query_kekerasan)){
                $kasus= $row_k['kasus'];
                $kdrt = $row_k['id_kdrt'];
                // JENIS KEKERASAN KDRT KTI
                if ($kasus == 1 && $kdrt == 2){
                    $sql_kti = mysqli_query($mysqli, "SELECT * FROM tb_kdrt_kti 
                                            INNER JOIN tb_jenis_kekerasan ON tb_jenis_kekerasan.id_jk = tb_kdrt_kti.id_jk 
                                            WHERE id_registrasi = ".$id."");
                    if(mysqli_num_rows($sql_kti) > 0){
                        $kdrt_kti = array();
                        while($row_kdrt     = mysqli_fetch_array($sql_kti)){
                            $kdrt_kti[]   = $row_kdrt['jenis_kekerasan'];
                        }
                    }
                }
                
                // JENIS KEKERASAN KDRT KTA
                if ($kasus == 1 && $kdrt == 3){
                    $sql_kta = mysqli_query($mysqli, "SELECT * FROM tb_kdrt_kta
                                            INNER JOIN tb_jenis_kekerasan ON tb_jenis_kekerasan.id_jk = tb_kdrt_kta.id_jk 
                                            WHERE id_registrasi = ".$id."");
                    if(mysqli_num_rows($sql_kta) > 0){
                        $kdrt_kta = array();
                        while($row_kta     = mysqli_fetch_array($sql_kta)){
                          $kdrt_kta[]   = $row_kta['jenis_kekerasan'];
                        }
                    }   
                }

                // JENIS KEKERASAN KDRT KTS
                if ($kasus == 1 && $kdrt == 4){
                    $sql_kts = mysqli_query($mysqli, "SELECT * FROM tb_kdrt_kts
                                            INNER JOIN tb_jenis_kekerasan ON tb_jenis_kekerasan.id_jk = tb_kdrt_kts.id_jk 
                                            WHERE id_registrasi = ".$id."");
                    if(mysqli_num_rows($sql_kts) > 0){
                        $kdrt_kts = array();
                        while($row_kts     = mysqli_fetch_array($sql_kts)){
                           $kdrt_kts[]   = $row_kts['jenis_kekerasan'];
                        }
                    } 
                }

                // JENIS KEKERASAN KDRT LAIN
                if ($kasus == 1 && $kdrt == 7){
                    $sql_lain = mysqli_query($mysqli, "SELECT * FROM tb_kdrt_lain
                                            INNER JOIN tb_jenis_kekerasan ON tb_jenis_kekerasan.id_jk = tb_kdrt_lain.id_jk 
                                            WHERE id_registrasi = ".$id."");
                    if(mysqli_num_rows($sql_lain) > 0){
                        $kdrt_lain = array();
                        while($row_lain     = mysqli_fetch_array($sql_lain)){
                           $kdrt_lain[]   = $row_lain['jenis_kekerasan'];
                        }
                    }
                }

                // JENIS KEKERASAN KTP
                if ($kasus == 3){
                    $sql_ktp = mysqli_query($mysqli, "SELECT * FROM tb_ktp
                                            INNER JOIN tb_jenis_kekerasan ON tb_jenis_kekerasan.id_jk = tb_ktp.id_jk 
                                            WHERE id_registrasi = ".$id."");
                    if(mysqli_num_rows($sql_ktp) > 0){
                        $ktp = array();
                        while($row_ktp     = mysqli_fetch_array($sql_ktp)){
                           $ktp[]   = $row_ktp['jenis_kekerasan'];
                        }
                    }
                }

                // JENIS KEKERASAN KTA 2
                if ($kasus == 4){
                    $sql_kta2 = mysqli_query($mysqli, "SELECT * FROM tb_kta
                                            INNER JOIN tb_jenis_kekerasan ON tb_jenis_kekerasan.id_jk = tb_kta.id_jk 
                                            WHERE id_registrasi = ".$id."");
                    if(mysqli_num_rows($sql_kta2) > 0){
                        $kta2 = array();
                        while($row_kta2     = mysqli_fetch_array($sql_kta2)){
                           $kta2[]   = $row_kta2['jenis_kekerasan'];
                        }
                    }
                }


            //Close Row_k
            }
        // IF Close SQL Kekerasan
        }
?>


                                    <div class="card">
                                        <div class="card-header">
                                            C. INFORMASI KASUS
                                        </div>
                                        <div class="card-body">
                                            <div class="col-sm-6 col-md-6">   
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3 col-sm-3" for="kdrt_kti">KDRT KTI  : </label>
                                                    <div class="col-md-9 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php if(isset($kdrt_kti)){ foreach ($kdrt_kti as $kdrt_kti){ echo $kdrt_kti,', ';} } else { echo 'Tidak Ada';} ?>">
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3 col-sm-3" for="kdrt_kta">KDRT KTA  : </label>
                                                    <div class="col-md-9 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php if(isset($kdrt_kta)){ foreach ($kdrt_kta as $kdrt_kta){ echo $kdrt_kta,', ';} } else { echo 'Tidak Ada';} ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3 col-sm-3" for="kdrt_kts">KDRT KTS : </label>
                                                    <div class="col-md-9 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php if(isset($kdrt_kts)){ 
                                                            foreach ($kdrt_kts as $kdrt_kts){ echo $kdrt_kts,', ';} 
                                                        } else {
                                                            echo 'Tidak Ada';
                                                        }?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3 col-sm-3" for="kdrt_lain">KDRT Lain  : </label>
                                                    <div class="col-md-9 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php if(isset($kdrt_lain)){ foreach ($kdrt_lain as $kdrt_lain){ echo $kdrt_lain,', ';} } else { echo 'Tidak Ada';} ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3 col-sm-3" for="klrt_kta">KLRT KTA  : </label>
                                                    <div class="col-md-9 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php if(isset($kta2)){ foreach ($kta2 as $kta2){ echo $kta2,', ';} } else { echo 'Tidak Ada';} ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3 col-sm-3" for="klrt_ktp">KLRT KTP  : </label>
                                                    <div class="col-md-9 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php if(isset($ktp)){ foreach ($ktp as $ktp){ echo $ktp,', ';} } else { echo 'Tidak Ada';} ?>">
                                                    </div>
                                                </div>
                                                

                                            </div>

                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            D. KETERANGAN KASUS
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3" for="sejak_kapan">Sejak kapan  : </label>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" class="form-control" value="<?php echo $row['sejak_kapan']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3" for="faktor_pemicu">Faktor Pemicu  : </label>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" class="form-control" value="<?php echo $row['faktor']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3" for="hasilnya">Hasilnya : </label>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" class="form-control" value="<?php echo $row['hasilnya']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3" for="Harapan Korban">Harapan Korban  : </label>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" class="form-control" value="<?php echo $row['harapan_korban']; ?>">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- this row will not appear when printing -->
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
require_once ('../../layout/wrapperuser/footer.php');
?>