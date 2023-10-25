<?php
require_once ('../../layout/wrapperkonselor/head.php');
require_once ('../../layout/wrapperkonselor/sidebar.php');
require_once ('../../layout/wrapperkonselor/header.php');
require_once ('../../layout/wrapperkonselor/content.php');
$sql_all_data = mysqli_query($mysqli, "SELECT * FROM tb_registrasi 
        INNER JOIN tb_identitas_survivor    ON tb_registrasi.id_registrasi = tb_identitas_survivor.id_registrasi
        INNER JOIN tb_identitas_pelaku      ON tb_registrasi.id_registrasi = tb_identitas_pelaku.id_registrasi
        INNER JOIN tb_informasi_kasus       ON tb_registrasi.id_registrasi = tb_informasi_kasus.id_registrasi
        INNER JOIN tb_ket_kasus             ON tb_registrasi.id_registrasi = tb_ket_kasus.id_registrasi 
        WHERE 1 ORDER BY tb_registrasi.id_registrasi DESC LIMIT 1") or die (mysqli_error($mysqli));
    while ($row = mysqli_fetch_array($sql_all_data)){
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
<div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="x_panel">
                <form action="test.php?go" method="post">
                    <div class="x_title">
                        <h2 class="pr-3">Laporan Kekerasan Berdasarkan Bentuk dan Jenisnya</h2>
                            
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
                    <div class="card pb-3 pt-3">
                        <div class="card-header">
                            <strong>PENCARIAN DATA</strong>  
                        </div>
                        <div class="card-body">
                                <button class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                <button class="btn btn-info pl-4 pr-4" type="submit" name="submit" id="cari"><i class="fa fa-search"> Cari</i></button>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group field item row">
                                        <div class="col-md-12">
                                        <label class="col-form-label">Pilih Tahun<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12 p-0">
                                            <?php  
                                                $tanggal = date('Y');
                                                $mulai_tanggal = 2000;
                                                $hinggal_tanggal = date('Y');
                                                print '<select class="tahun form-control has-feedback-left" name="tahun_cetak">';
                                                print '<option value ="">-- Pilih Tahun --</option>';
                                                foreach (range($hinggal_tanggal, $mulai_tanggal) as $cetak_tahun) {
                                                    print '<option value="'.$cetak_tahun.'"'.($cetak_tahun === $tanggal ?' selected="selected"' : '').'>'.$cetak_tahun.'</option>';
                                                }
                                                print '</select>';
                                                print'<span class="fa fa-calendar form-control-feedback left"></span>';
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                
                    <div class="x_content">
                        <section class="content invoice">
                            <div class="row invoice-info">
                                <div class="col-sm-2 invoice-col">
                                    <img class="mt-3 ml-5" src="../../assets/images/logo.png"  alt="..." style="height: 100px">
                                </div>
                                <div class="col-sm-8 invoice-col">
                                        <h3  class="text-center">
                                            <small>
                                                DATA KORBAN KEKERASAN PUSAT PELAYANAN TERPADU
                                                <p class="mb-0">PEREMPUAN DAN ANAK KORBAN KEKERASAN (P2TPAKK)</p>
                                                <p class="mb-0">"REKSO DYAH UTAMI" D.I YOGYAKARTA</p>
                                                <p class="mb-0">BERDASARKAN WILAYAH</p>
                                                <p class="mb-0" id="tahun_tampil"></p>
                                            </small >
                                        </h3> 
                                </div>
                                <div class="col-sm-2 invoice-col">
                                   <img class="mt-3" src="../../assets/images/logo-rdu.png"  alt="..." style="height: 100px">
                                </div>
                            </div>
                            <div class="border border-dark"></div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center" rowspan="3">No </th>
                                                        <th style="text-align: center;" rowspan="3">Wilayah</th>
                                                        <th>
                                                            <div class="col-md-12 col-sm-12  p-0">
                                                                <?php  
                                                                    $tanggal = date('Y');
                                                                    $mulai_tanggal = 2000;
                                                                    $hinggal_tanggal = date('Y');
                                                                    print '<select class="form-control" name="tahun1">';
                                                                    print '<option value ="">'.(isset($_POST['tahun1'])?$_POST['tahun1']:"Tahun 1").'</option>';
                                                                    foreach (range($hinggal_tanggal, $mulai_tanggal) as $cetak_tahun) {
                                                                        print '<option value="'.$cetak_tahun.'"'.($cetak_tahun === $tanggal ?' selected="selected"' : '').'>'.$cetak_tahun.'</option>';
                                                                    }
                                                                    print '</select>';
                                                                ?>
                                                            </div>
                                                        </th >
                                                        <th>
                                                            <div class="col-md-12 col-sm-12 p-0">
                                                                <?php  
                                                                    $tanggal = date('Y');
                                                                    $mulai_tanggal = 2000;
                                                                    $hinggal_tanggal = date('Y');
                                                                    print '<select class="form-control" name="tahun2">';
                                                                    print '<option value ="">'.(isset($_POST['tahun2'])?$_POST['tahun2']:"Tahun 2").'</option>';
                                                                    foreach (range($hinggal_tanggal, $mulai_tanggal) as $cetak_tahun) {
                                                                        print '<option value="'.$cetak_tahun.'"'.($cetak_tahun === $tanggal ?' selected="selected"' : '').'>'.$cetak_tahun.'</option>';
                                                                    }
                                                                    print '</select>';
                                                                ?>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="col-md-12 col-sm-12 p-0">
                                                                <?php  
                                                                    $tanggal = date('Y');
                                                                    $mulai_tanggal = 2000;
                                                                    $hinggal_tanggal = date('Y');
                                                                    print '<select class="form-control" name="tahun3">';
                                                                    print '<option value ="">'.(isset($_POST['tahun3'])?$_POST['tahun3']:"Tahun 3").'</option>';
                                                                    foreach (range($hinggal_tanggal, $mulai_tanggal) as $cetak_tahun) {
                                                                        print '<option value="'.$cetak_tahun.'"'.($cetak_tahun === $tanggal ?' selected="selected"' : '').'>'.$cetak_tahun.'</option>';
                                                                    }
                                                                    print '</select>';
                                                                ?>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="col-md-12 col-sm-12 p-0">
                                                                <?php  
                                                                    $tanggal = date('Y');
                                                                    $mulai_tanggal = 2000;
                                                                    $hinggal_tanggal = date('Y');
                                                                    print '<select class="form-control" name="tahun4">';
                                                                    print '<option value ="">'.(isset($_POST['tahun4'])?$_POST['tahun4']:"Tahun 4").'</option>';
                                                                    foreach (range($hinggal_tanggal, $mulai_tanggal) as $cetak_tahun) {
                                                                        print '<option value="'.$cetak_tahun.'"'.($cetak_tahun === $tanggal ?' selected="selected"' : '').'>'.$cetak_tahun.'</option>';
                                                                    }
                                                                    print '</select>';
                                                                ?>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="col-md-12 col-sm-12 p-0">
                                                                <?php  
                                                                    $tanggal = date('Y');
                                                                    $mulai_tanggal = 2000;
                                                                    $hinggal_tanggal = date('Y');
                                                                    print '<select class="form-control" name="tahun5">';
                                                                    print '<option value="">'.(isset($_POST['tahun5'])?$_POST['tahun5']:"Tahun 5").'</option>';
                                                                    foreach (range($hinggal_tanggal, $mulai_tanggal) as $cetak_tahun) {
                                                                        print '<option value="'.$cetak_tahun.'"'.($cetak_tahun === $tanggal ?' selected="selected"' : '').'>'.$cetak_tahun.'</option>';
                                                                    }
                                                                    print '</select>';
                                                                ?>
                                                            </div>
                                                        </th>
                                                        <th style="text-align: center;" rowspan="3">Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $salah = array();
                                                    $array1 = array();
                                                    $array2 = array();
                                                    $array3 = array();
                                                    $array4 = array();
                                                    $array5 = array();
                                                    $array6 = array();
                                                    $query = "SELECT * FROM tb_kabupaten";
                                                    $sql_jenis_kekerasan = mysqli_query($mysqli, $query) or die(mysqli_error($query));
                                                    if(mysqli_num_rows($sql_jenis_kekerasan) > 0) {
                                                        while ($row = mysqli_fetch_array($sql_jenis_kekerasan)){
                                                            $kabupaten = $row['id_kabupaten'];
                                                            ?>
                                                            <tr>
                                                                <td style="text-align: center;"><?=$no++?>.</td>
                                                                <td ><?=$row['kabupaten']?></td>
                                                                <?php
                                                                if(isset($_POST['submit'])){
                                                                    if(isset($_GET['go'])){


                                                                        if(empty($_POST['tahun1'])){$tahun1 = '0000';} else { $tahun1 =$_POST['tahun1'];}
                                                                        if(empty($_POST['tahun2'])){$tahun2 = '0000';} else { $tahun2 =$_POST['tahun2'];}
                                                                        if(empty($_POST['tahun3'])){$tahun3 = '0000';} else { $tahun3 =$_POST['tahun3'];}
                                                                        if(empty($_POST['tahun4'])){$tahun4 = '0000';} else { $tahun4 =$_POST['tahun4'];}
                                                                        if(empty($_POST['tahun5'])){$tahun5 = "0000";} else { $tahun5 =$_POST['tahun5'];}

                                                                        switch (true) {
                                                                            case ($tahun1 === '0000') && ($tahun2 === '0000') && ($tahun3=== '0000') && ($tahun4 === '0000') && ($tahun5 === '0000'):
                                                                                $salah= '<div class="alert alert-info" align="center" role="alert">Tidak Ada Pilihan, Silahkan Pilih Tanggal</div>';
                                                                                $query = '';
                                                                                break;
                                                                        }

                                                                        if(!empty($salah)){
                                                                            echo $salah;
                                                                            break;
                                                                        } else {

                                                                            // TAMPIL DATA Tanggal 1
                                                                            $sql_data1 = "SELECT * FROM tb_identitas_survivor
                                                                            INNER JOIN tb_kabupaten ON tb_identitas_survivor.id_kabupaten = tb_kabupaten.id_kabupaten
                                                                            INNER JOIN tb_registrasi ON tb_identitas_survivor.id_registrasi = tb_registrasi.id_registrasi
                                                                            WHERE tb_identitas_survivor.id_kabupaten = '$kabupaten' AND hari_tanggal  LIKE '%$tahun1%' 
                                                                            GROUP BY tb_identitas_survivor.id_registrasi ORDER BY hari_tanggal";
                                                                            $sql_data_result1 = mysqli_query($mysqli, $sql_data1) or die(mysqli_error($sql_data1));
                                                                            $kdrt_kti = $sql_data_result1->num_rows;
                                                                            ?><td align="center"><?=$kdrt_kti?></td><?php
                                                                            $array1 = array_merge($array1, array_map('trim', explode(",", $kdrt_kti)));
                                                                            $sum1 = array_sum($array1);

                                                                            //TAMPIL DATA Tanggal 2
                                                                            $sql_data2 = "SELECT * FROM tb_identitas_survivor
                                                                            INNER JOIN tb_kabupaten ON tb_identitas_survivor.id_kabupaten = tb_kabupaten.id_kabupaten
                                                                            INNER JOIN tb_registrasi ON tb_identitas_survivor.id_registrasi = tb_registrasi.id_registrasi 
                                                                            WHERE tb_identitas_survivor.id_kabupaten = '$kabupaten' AND hari_tanggal  LIKE '%$tahun2%' 
                                                                            GROUP BY tb_identitas_survivor.id_registrasi ORDER BY hari_tanggal";
                                                                            $sql_data_result2 = mysqli_query($mysqli, $sql_data2) or die(mysqli_error($sql_data2));
                                                                            $kdrt_kta = $sql_data_result2->num_rows;
                                                                            ?><td align="center"><?=$kdrt_kta?></td><?php
                                                                            $array2 = array_merge($array2, array_map('trim', explode(",", $kdrt_kta)));
                                                                            $sum2 = array_sum($array2);

                                                                            // TAMPIL DATA Tanggal 3
                                                                            $sql_data3 = "SELECT * FROM tb_identitas_survivor
                                                                            INNER JOIN tb_kabupaten ON tb_identitas_survivor.id_kabupaten = tb_kabupaten.id_kabupaten
                                                                            INNER JOIN tb_registrasi ON tb_identitas_survivor.id_registrasi = tb_registrasi.id_registrasi 
                                                                            WHERE tb_identitas_survivor.id_kabupaten = '$kabupaten' AND hari_tanggal  LIKE '%$tahun3%'  GROUP BY tb_identitas_survivor.id_registrasi ORDER BY hari_tanggal";
                                                                            $sql_data_result3 = mysqli_query($mysqli, $sql_data3) or die(mysqli_error($sql_data3));
                                                                            $kdrt_kts = $sql_data_result3->num_rows;
                                                                            ?><td align="center"><?=$kdrt_kts?></td><?php
                                                                            $array3 = array_merge($array3, array_map('trim', explode(",", $kdrt_kts)));
                                                                            $sum3 = array_sum($array3);
                                                                            
                                                                             // TAMPIL DATA Tanggal 4
                                                                            $sql_data4 = "SELECT * FROM tb_identitas_survivor
                                                                            INNER JOIN tb_kabupaten ON tb_identitas_survivor.id_kabupaten = tb_kabupaten.id_kabupaten
                                                                            INNER JOIN tb_registrasi ON tb_identitas_survivor.id_registrasi = tb_registrasi.id_registrasi 
                                                                            WHERE tb_identitas_survivor.id_kabupaten = '$kabupaten' AND hari_tanggal  LIKE '%$tahun4%'  GROUP BY tb_identitas_survivor.id_registrasi ORDER BY hari_tanggal";
                                                                            $sql_data_result4 = mysqli_query($mysqli, $sql_data4) or die(mysqli_error($sql_data4));
                                                                            $kdrt_lain = $sql_data_result4->num_rows;   
                                                                            ?><td align="center"><?=$kdrt_lain?></td><?php  
                                                                            $array4 = array_merge($array4, array_map('trim', explode(",", $kdrt_lain)));
                                                                            $sum4 = array_sum($array4);

                                                                            // TAMPIL DATA Tanggal 5
                                                                            $sql_data5 = "SELECT * FROM tb_identitas_survivor
                                                                            INNER JOIN tb_kabupaten ON tb_identitas_survivor.id_kabupaten = tb_kabupaten.id_kabupaten
                                                                            INNER JOIN tb_registrasi ON tb_identitas_survivor.id_registrasi = tb_registrasi.id_registrasi 
                                                                            WHERE tb_identitas_survivor.id_kabupaten = '$kabupaten' AND hari_tanggal  LIKE '%$tahun5%'  GROUP BY tb_identitas_survivor.id_registrasi ORDER BY hari_tanggal";
                                                                            $sql_data_result5 = mysqli_query($mysqli, $sql_data5) or die(mysqli_error($sql_data5));
                                                                            $ktp = $sql_data_result5->num_rows;                                 
                                                                            ?><td align="center"><?=$ktp?></td><?php
                                                                            $array5 = array_merge($array5, array_map('trim', explode(",", $ktp)));
                                                                            $sum5 = array_sum($array5);
                                                                            

                                                                            $hitung =mysqli_query($mysqli, "SELECT SUM(id_kabupaten = '$kabupaten') AS bantul FROM tb_identitas_survivor INNER JOIN tb_registrasi ON tb_identitas_survivor.id_registrasi = tb_registrasi.id_registrasi WHERE hari_tanggal LIKE '%$tahun1%'");
                                                                            while ($row = mysqli_fetch_array($hitung)) {
                                                                                $jumlah1 = $row['bantul'];
                                                                            }

                                                                            $hitung2 =mysqli_query($mysqli, "SELECT SUM(id_kabupaten = '$kabupaten') AS bantul FROM tb_identitas_survivor INNER JOIN tb_registrasi ON tb_identitas_survivor.id_registrasi = tb_registrasi.id_registrasi WHERE hari_tanggal LIKE '%$tahun2%'");
                                                                            while ($row = mysqli_fetch_array($hitung2)) {
                                                                                $jumlah2 = $row['bantul'];
                                                                            }

                                                                            $hitung3 =mysqli_query($mysqli, "SELECT SUM(id_kabupaten = '$kabupaten') AS bantul FROM tb_identitas_survivor INNER JOIN tb_registrasi ON tb_identitas_survivor.id_registrasi = tb_registrasi.id_registrasi WHERE hari_tanggal LIKE '%$tahun3%'");
                                                                            while ($row = mysqli_fetch_array($hitung3)) {
                                                                                $jumlah3 = $row['bantul'];
                                                                            }

                                                                            $hitung4 =mysqli_query($mysqli, "SELECT SUM(id_kabupaten = '$kabupaten') AS bantul FROM tb_identitas_survivor INNER JOIN tb_registrasi ON tb_identitas_survivor.id_registrasi = tb_registrasi.id_registrasi WHERE hari_tanggal LIKE '%$tahun4%'");
                                                                            while ($row = mysqli_fetch_array($hitung4)) {
                                                                                $jumlah4 = $row['bantul'];
                                                                            }

                                                                            $hitung5 =mysqli_query($mysqli, "SELECT SUM(id_kabupaten = '$kabupaten') AS bantul FROM tb_identitas_survivor INNER JOIN tb_registrasi ON tb_identitas_survivor.id_registrasi = tb_registrasi.id_registrasi WHERE hari_tanggal LIKE '%$tahun5%'");
                                                                            while ($row = mysqli_fetch_array($hitung5)) {
                                                                                $jumlah5 = $row['bantul'];
                                                                            }
                                                                            $total = $jumlah1 + $jumlah2 + $jumlah3 + $jumlah4 + $jumlah5;
                                                                            ?>
                                                                            <td align="center"><?php echo $total; ?></td>
                                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td colspan="2" align="center"><b>TOTAL</b></td>
                                                            <td align="center"><b><?php if(empty($sum1)){echo'';}else{echo $sum1;}?></b></td>
                                                            <td align="center"><b><?php if(empty($sum2)){echo'';}else{echo $sum2;}?></b></td>
                                                            <td align="center"><b><?php if(empty($sum3)){echo'';}else{echo $sum3;}?></b></td>
                                                            <td align="center"><b><?php if(empty($sum4)){echo'';}else{echo $sum4;}?></b></td>
                                                            <td align="center"><b><?php if(empty($sum5)){echo'';}else{echo $sum5;}?></b></td>
                                                            
                                                            <td></td>
                                                        </tr>
                                                            <?php
                                                    } else {
                                                        echo "<tr><td colspan=\"5\" align=\"center\"> Data Tidak Ditemukan </td></tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- bootstrap DateTimePicker JS -->
<script src="../../assets/vendors/moment/min/moment-with-locales.js"></script>
<script src="../../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../../assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("select.tahun").change(function(){
            var tahun = $(this).children("option:selected").val();
            document.getElementById("tahun_tampil").innerHTML = "TAHUN "+tahun;
        });
    });
    $('#myDatepicker').datetimepicker({
        locale: 'id',
        format: 'DD.MMMM.YYYY'
    });
    $('#myDatepicker2').datetimepicker({
        locale: 'id',
        format: 'DD.MMMM.YYYY'
    }); 
</script>
<?php
}
    require_once ('../../layout/wrapperkonselor/footer.php');
?>

