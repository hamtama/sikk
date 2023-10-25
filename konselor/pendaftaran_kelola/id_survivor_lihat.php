<?php  
require_once ('../../login/connection.php');
if ($_POST['rowid']){
    $id = $_POST['rowid'];

    $sql = "SELECT * FROM tb_identitas_survivor 
    INNER JOIN tb_registrasi  ON tb_identitas_survivor.id_registrasi = tb_registrasi.id_registrasi 
    INNER JOIN tb_kabupaten ON tb_identitas_survivor.id_kabupaten = tb_kabupaten.id_kabupaten
    WHERE id_survivor = '$id'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris){


$pendidikan_survivor =$baris['pendidikan'];
$agama = $baris['agama'];
$pekerjaan = $baris['pekerjaan'];
$jenis_kelamin = $baris['jenis_kelamin'];
$status_perkawinan =$baris['status_perkawinan'];
$kabupaten = $baris['id_kabupaten'];

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
            <td>Nama Survivor</td>
            <td><?php echo $baris['nama']; ?></td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td><?php echo $baris['tempat_lahir']; ?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><?php echo $baris['tanggal_lahir']; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo $baris['alamat']; ?></td>
        </tr>
        <tr>
            <td>Kecamatan</td>
            <td><?php echo $baris['kecamatan']; ?></td>
        </tr>
        <tr>
            <td>Kabupaten</td>
            <td><?php if($kabupaten == '7') {echo $baris['kabupaten_lain'];} else {echo $baris['kabupaten'];} ?></td>
        </tr>

        <tr>
            <td>No Telp</td>
            <td><?php echo $baris['no_telp']; ?></td>
        </tr>
        <tr>
            <td>Pendidikan</td>
            <td><?php echo $baris['pendidikan']; ?></td>
        </tr>
        <tr>
            <td>Agama / Kepercayaan</td>
            <td><?php echo $baris['agama']; ?></td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td><?php if($pekerjaan == 'Lainnya') { echo $baris['pekerjaan_lainnya']; } else {echo $baris['pekerjaan'];} ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?php echo $baris['jenis_kelamin']; ?></td>
        </tr>
        <tr>
            <td>Hobby</td>
            <td><?php echo $baris['hobby']; ?></td>
        </tr>
        <tr>
            <td>Keterampilan</td>
            <td><?php echo $baris['keterampilan']; ?></td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td><?php if($status_perkawinan == 'Lainnya' ) {echo $baris['status_lainnnya']; } else { echo $baris['status_perkawinan']; } ?></td>
        </tr>
        <tr>
            <td>Lama Perkawinan</td>
            <td><?php echo $baris['lama_perkawinan']; ?></td>
        </tr>
        <tr>
            <td>Jumlah Anak</td>
            <td><?php echo $baris['jumlah_anak']; ?></td>
        </tr>
        <tr>
            <td>Dirujuk Oleh</td>
            <td><?php echo $baris['dirujuk_oleh']; ?></td>
        </tr>

    </tbody>
</table>
    
    <?php
                }
                }
                ?>
