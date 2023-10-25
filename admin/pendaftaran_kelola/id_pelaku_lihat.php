<?php  
require_once ('../../login/connection.php');
if ($_POST['rowid']){
    $id = $_POST['rowid'];

    $sql = "SELECT * FROM tb_identitas_pelaku INNER JOIN tb_registrasi  ON tb_identitas_pelaku.id_registrasi = tb_registrasi.id_registrasi WHERE id_pelaku = '$id'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris){



$lokasi = $baris['lokasi_kasus'];
$pekerjaan = $baris['pekerjaan_pelaku'];
$status_perkawinan =$baris['status_perkawinan_pelaku'];
$hubungan   = $baris['hubungan_korban'];

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
            <td>Nama Pelaku</td>
            <td><?php echo $baris['nama_pelaku']; ?></td>
        </tr>
        <tr>
            <td>Umur Pelaku</td>
            <td><?php echo $baris['umur']; ?></td>
        </tr>
         <tr>
            <td>Alamat</td>
            <td><?php echo $baris['alamat_pelaku']; ?></td>
        </tr>
        <tr>
            <td>No Telepon</td>
            <td><?php echo $baris['no_telp_pelaku']; ?></td>
        </tr>
        <tr>
            <td>Pendidikan</td>
            <td><?php echo $baris['pendidikan_pelaku']; ?></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td><?php echo $baris['agama_pelaku']; ?></td>
        </tr>
        <tr>
            <td>Pekerjaan Pelaku</td>
            <td><?php if($pekerjaan =='Lainnya'){ echo $baris['pekerjaan_lainnya_pelaku'];} else { echo $baris['pekerjaan_pelaku']; } ?></td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td><?php if($status_perkawinan == 'Lainnya' ) {echo $baris['status_lainnya_pelaku']; } else { echo $baris['status_perkawinan_pelaku']; } ?></td>
        </tr>
        <tr>
            <td>Hubungan Korban</td>
             <td><?php if($hubungan == 'Lainnya' ) {echo $baris['hubungan_lainnya']; } else { echo $baris['hubungan_korban'];} ?></td>
        </tr>
        <tr>
            <td>Lokasi Kejadian</td>
             <td><?php if($lokasi == 'Lainnya' ) {echo $baris['lokasi_lainnya']; } else { echo $baris['lokasi_kasus']; } ?></td>
        </tr>

    </tbody>
</table>
    
    <?php
                }
                }
                ?>
