<?php  
require_once ('../../login/connection.php');
if ($_POST['rowid']){
    $id = $_POST['rowid'];

    $sql = "SELECT *, COUNT(tb_informasi_kasus.kasus) AS jumlah_kasus FROM tb_informasi_kasus 
    INNER JOIN tb_registrasi  ON tb_informasi_kasus.id_registrasi = tb_registrasi.id_registrasi 
    INNER JOIN tb_identitas_survivor ON tb_identitas_survivor.id_registrasi = tb_registrasi.id_registrasi
    INNER JOIN tb_jenis_kasus ON tb_informasi_kasus.kasus = tb_jenis_kasus.id_jkas
    INNER JOIN tb_kabupaten ON tb_identitas_survivor.id_kabupaten =tb_kabupaten.id_kabupaten
    WHERE tb_informasi_kasus.id_registrasi = '$id'
    GROUP BY tb_informasi_kasus.id_registrasi
    ";
    $result = $mysqli->query($sql);
    foreach ($result as $baris){
        $kasus = $baris['kasus'];
        $kdrt = $baris['id_kdrt'];


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
    

<table class="table table-hover">
    <thead>
        <tr>
            <th>Nama Field</th>
            <th>Isi Data</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>No Registrasi</td>
            <td><?php echo $baris['no_registrasi']; ?></td>
        </tr>
        <tr>
            <td>Nama Korban</td>
            <td><?php echo $baris['nama'];?></td>
        </tr>
        <tr>
            <td>Kabupaten</td>
            <td><?php if($baris['id_kabupaten'] == '7') { echo $baris['kabupaten_lain'];} else { echo $baris['kabupaten'];} ?></td>
        </tr>
         <tr>
            <td>Jumlah Kasus</td>
            <td><?php echo $baris['jumlah_kasus']; ?></td>
        </tr>
        <tr>
            <td>KDRT KTI</td>
            <td><?php if(isset($kdrt_kti)){ foreach ($kdrt_kti as $kdrt_kti){ echo '<li>'.$kdrt_kti.'</li>';}} else {echo 'Tidak Ada';} ?></td>
        </tr>
        <tr>
            <td>KDRT KTA</td>
            <td><?php if(isset($kdrt_kta)){ foreach ($kdrt_kta as $kdrt_kta){ echo '<li>'.$kdrt_kta.'</li>';}} else {echo 'Tidak Ada';} ?></td>
        </tr>
        <tr>
            <td>KDRT KTS</td>
            <td><?php if(isset($kdrt_kts)){ foreach ($kdrt_kts as $kdrt_kts){ echo '<li>'.$kdrt_kts.'</li>';}} else {echo 'Tidak Ada';}?></td>
        </tr>
        <tr>
            <td>KDRT LAIN</td>
            <td><?php if(isset($kdrt_lain)){ foreach ($kdrt_lain as $kdrt_lain){ echo '<li>'.$kdrt_lain.'</li>';} } else {echo 'Tidak Ada';}?></td>
        </tr>
        <tr>
            <td>KTP</td>
            <td><?php if(isset($ktp)){ foreach ($ktp as $ktp){ echo '<li>'.$ktp.'</li>';} }else {echo 'Tidak Ada';}?></td>
        </tr>
        <tr>
            <td>KTA</td>
            <td><?php if(isset($kta2)){ foreach ($kta2 as $kta2){ echo '<li>'.$kta2.'</li>';} }else {echo 'Tidak Ada';} ?></td>
        </tr>
        <?php

        
        ?>

    </tbody>
</table>
       


<?php
    // Close Foreach $Sql
    }
    // Close If Rowid
    }

?>
