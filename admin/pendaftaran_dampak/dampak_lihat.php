<?php  
require_once ('../../login/connection.php');
if ($_POST['rowid']){
    $id = $_POST['rowid'];

    $sql = "SELECT * FROM tb_dampak INNER JOIN tb_registrasi  ON tb_dampak.id_registrasi = tb_registrasi.id_registrasi 
    INNER JOIN tb_konselor ON tb_dampak.id_konselor = tb_konselor.id_konselor WHERE id_dampak = '$id'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris){

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
            <td>Nama Konselor</td>
            <td><?php echo $baris['nama_konselor']; ?></td>
        </tr>
        <tr>
            <td>Kesehatan Fisik</td>
            <td><?php echo $baris['kesehatan_fisik']; ?></td>
        </tr>
        <tr>
            <td>Kesehatan Jiwa</td>
            <td><?php echo $baris['kesehatan_jiwa']; ?></td>
        </tr>
         <tr>
            <td>Perilaku</td>
            <td><?php echo $baris['perilaku']; ?></td>
        </tr>
        <tr>
            <td>Kesehatan Reproduksi</td>
            <td><?php echo $baris['kesehatan_reproduksi']; ?></td>
        </tr>
        <tr>
            <td>Kondisi Kronis</td>
            <td><?php echo $baris['kondisi_kronis']; ?></td>
        </tr>
        <tr>
            <td>Ekonomi</td>
            <td><?php echo $baris['ekonomi']; ?></td>
        </tr>
        <tr>
            <td>Anak / Keluarga</td>
            <td><?php echo $baris['anak_keluarga']; ?></td>
        </tr>
        <tr>
            <td>Lain Lain</td>
            <td><?php echo $baris['lain_lain']; ?></td>
        </tr>
        

    </tbody>
</table>
    
    <?php
                }
                }
                ?>
