<?php  
require_once ('../../login/connection.php');
if ($_POST['rowid']){
    $id = $_POST['rowid'];

    $sql = "SELECT * FROM tb_ket_kasus INNER JOIN tb_registrasi  ON tb_ket_kasus.id_registrasi = tb_registrasi.id_registrasi WHERE id_ket_kasus = '$id'";
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
            <td>Sejak Kapan</td>
            <td><?php echo $baris['sejak_kapan']; ?></td>
        </tr>
        <tr>
            <td>Faktor Pemicu</td>
            <td><?php echo $baris['faktor']; ?></td>
        </tr>
         <tr>
            <td>Seberapa Sering</td>
            <td><?php echo $baris['seberapa_sering']; ?></td>
        </tr>
        <tr>
            <td>Upaya Yang Dilakukan</td>
            <td><?php echo $baris['upaya_yg_dilakukan']; ?></td>
        </tr>
        <tr>
            <td>Pihak Yang Dilibatkan</td>
            <td><?php echo $baris['pihak_yg_dilibatkan']; ?></td>
        </tr>
        <tr>
            <td>Hasilnya</td>
            <td><?php echo $baris['hasilnya']; ?></td>
        </tr>
        <tr>
            <td>Harapan Korban</td>
            <td><?php echo $baris['harapan_korban']; ?></td>
        </tr>
        <tr>
            <td>Narasi</td>
            <td><?php echo $baris['narasi']; ?></td>
        </tr>
        

    </tbody>
</table>
    
    <?php
                }
                }
                ?>
