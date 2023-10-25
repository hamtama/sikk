<?php
require_once ('../../login/connection.php');
if ($_POST['rowid']){
    $id = $_POST['rowid'];
    $sql_all_data = "SELECT * FROM tb_registrasi
                            INNER JOIN tb_identitas_survivor    ON tb_registrasi.id_registrasi = tb_identitas_survivor.id_registrasi
                            INNER JOIN tb_identitas_pelaku      ON tb_registrasi.id_registrasi = tb_identitas_pelaku.id_registrasi
                            INNER JOIN tb_informasi_kasus       ON tb_registrasi.id_registrasi = tb_informasi_kasus.id_registrasi
                            INNER JOIN tb_ket_kasus             ON tb_registrasi.id_registrasi = tb_ket_kasus.id_registrasi
                            INNER JOIN tb_konselor              ON tb_konselor.id_konselor     = tb_registrasi.id_konselor
                            INNER JOIN tb_kabupaten             ON tb_identitas_survivor.id_kabupaten = tb_kabupaten.id_kabupaten
                            WHERE tb_registrasi.id_registrasi = '$id' LIMIT 1";
    $result = $mysqli->query($sql_all_data);
    foreach ($result as $baris){
        $status_perkawinan  = $baris['status_perkawinan'];
        $pekerjaan          = $baris['pekerjaan'];
        $hubungan_korban    = $baris['hubungan_korban'];
        $alamat_pelaku      = $baris['alamat_pelaku'];
        $lokasi_kasus       = $baris['lokasi_kasus'];
        $pekerjaan_pelaku   = $baris['pekerjaan_pelaku'];
?>
<div class="x_content">
    <section class="content invoice">
        <!-- /.row -->
        <!-- FROM  row -->
        <div class="row pt-3">
            <div class="col-sm-12">
                <form role="form">
                    <div class="card">
                        <div class="card-header">
                            DATA REGISTRASI
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <tr>
                                    <th>Nama Konselor</th>
                                    <th>Hari/Tanggal</th>
                                    <th>Media</th>
                                    
                                </tr>
                                <tr>
                                    <td><?php echo $baris['nama_konselor'] ?></td>
                                    <td><?php echo $baris['hari_tanggal'] ?></td>
                                    <td><?php echo $baris['media'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            A. IDENITAS SURVIVOR
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <tr>
                                    <th>Alamat Survivor</th>
                                    <th>Kabupaten</th>
                                    <th>Pekerjaan</th>
                                    <th>Status Perkawinan</th>
                                </tr>
                                <tr>
                                    <td><?php echo $baris['alamat'] ?></td>
                                    <td><?php if($baris['kabupaten'] == 7 ){echo $$baris['kabupaten_lain'];} else {echo $baris['kabupaten'];} ?></td>
                                    <td><?php if($pekerjaan == 'Lainnya'){ echo $baris['pekerjaan_lainnya']; }else {echo $baris['pekerjaan'];} ?></td>
                                    <td><?php if($status_perkawinan == 'Lainnya'){ echo $baris['status_lainnnya']; }else {echo $baris['status_perkawinan'];} ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php  
                    $kekerasan= "SELECT DISTINCT kasus,id_kdrt FROM tb_informasi_kasus 
                            INNER JOIN tb_jenis_kasus ON tb_informasi_kasus.kasus = tb_jenis_kasus.id_jkas 
                            WHERE id_registrasi = '$id'" ;

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
                            <table class="table table-hover">
                                <tr>
                                    <th>KDRT KTI</th>
                                    <th>KDRT KTA</th>
                                    <th>KDRT KTS</th>
                                    <th>KLRT KTP</th>
                                    <th>KLRT KTA</th>
                                </tr>
                                <tr>
                                    <td><?php if(isset($kdrt_kti)){ foreach ($kdrt_kti as $kdrt_kti){ echo $kdrt_kti,', ';} } else { echo 'Tidak Ada';} ?></td>
                                    <td><?php if(isset($kdrt_kta)){ foreach ($kdrt_kta as $kdrt_kta){ echo $kdrt_kta,', ';} } else { echo 'Tidak Ada';} ?></td>
                                    <td><?php if(isset($kdrt_kts)){ foreach ($kdrt_kts as $kdrt_kts){ echo $kdrt_kts,', ';} } else {echo 'Tidak Ada';}?></td>
                                    <td><?php if(isset($kdrt_lain)){ foreach ($kdrt_lain as $kdrt_lain){ echo $kdrt_lain,', ';} } else { echo 'Tidak Ada';} ?></td>
                                    <td><?php if(isset($kta2)){ foreach ($kta2 as $kta2){ echo $kta2,', ';} } else { echo 'Tidak Ada';} ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            D. KETERANGAN KASUS
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3" for="sejak_kapan">Sejak kapan  : </label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" value="<?php echo $baris['sejak_kapan'] ?>" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3" for="faktor_pemicu">Faktor Pemicu  : </label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" value="<?php echo $baris['faktor'] ?>" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3" for="hasilnya">Hasilnya : </label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" value="<?php echo $baris['hasilnya'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3" for="Harapan Korban">Harapan Korban  : </label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" value="<?php echo $baris['harapan_korban'] ?>" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>
<?php
}
}
?>