<?php  
require_once ('../../login/connection.php');
if ($_POST['no_layanan'] && $_POST['no_reg'] ){
    $id_layanan = $_POST['no_layanan'];
    $id_registrasi = $_POST['no_reg'];
    $layanan = '';
    $no = 1;
    ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>NO</th>
                <th>Tanggal</th>
                <th>Kegiatan</th>
                <th>Informasi & Kesepakatan</th>
            </tr>
        </thead>
        <?php 

       switch ($id_layanan) {
            case '1' : $layanan = "tb_layanan_konseling_telp";
                break;
            case '2' : $layanan = "tb_layanan_konsultasi_hukum";
                break;
            case '3' : $layanan = "tb_layanan_litigasi";  
                break;
            case '4' : $layanan = "tb_layanan_home_visite";
                break;
            case '5' : $layanan = "tb_layanan_medis";
                break;
            case '6' : $layanan = "tb_layanan_shelter";
                break;
            case '8' : $layanan = "tb_layanan_support_group";
                break;
            case '10' : $layanan = "tb_layanan_aspirasi";
                break;

        }
        ?>
        <tbody>
        <?php 
            $sql_layanan = "SELECT * FROM $layanan WHERE id_registrasi='$id_registrasi'";  
            $result = mysqli_query($mysqli, $sql_layanan)or die(mysqli_error($sql_layanan));
            if(mysqli_num_rows($result) > 0 ){
                while ($baris = mysqli_fetch_array($result)){
            ?>
                <tr>
                    <td><?=$no++ ?></td>
                    <td><?php echo $baris[3]; ?></td>
                    <td><?php if($layanan == 'tb_layanan_litigasi' || $layanan == 'tb_layanan_shelter' ){ echo $baris[5];} else {echo $baris[4]; } ?></td>
                    <td><?php if($layanan == 'tb_layanan_litigasi' || $layanan == 'tb_layanan_shelter' ){ echo $baris[6];} else {echo $baris[5]; } ?></td>
                </tr>
            <?php 
                }
                } else {
                    echo "<tr><td colspan=\"5\" align=\"center\"> Data Tidak Ditemukan </td></tr>";
                }
            ?>
        </tbody>
    </table>
    
    <?php
                
            }
                ?>
