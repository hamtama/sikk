<?php  
require_once ('../../login/connection.php');

// FORM STEP 4 INPUT DATA INFORMASI KASUS

    $id = $_POST['id']; 
    $keterangan         = $_POST['ket'];
    $id_kasus = $_POST['id_kasus'];
    $id_kdrt = $_POST['id_kdrt'];  
    $id_edit = $_POST['id_edit'];
    $count = count($id_edit);     
    switch(($id_kasus)AND($id_kdrt)){
        case (($id_kasus == '1')AND($id_kdrt == '2')) :   
            $jenis_kekerasan = "KTI (KEKERASAN TERHADAP ISTRI)";    
            $table = "tb_kdrt_kti";
            $id_database = 'id_kdrt_kti';
            break ;
        case (($id_kasus == '1'AND $id_kdrt == '3')) :
            $jenis_kekerasan = 'KTA (KEKERASAN TERHADAP ANAK)';
            $table = 'tb_kdrt_kta';
            $id_database = 'id_kdrt_kta';
            break ;
        case (($id_kasus == '1'AND $id_kdrt == '4')) :
            $jenis_kekerasan = 'KTS (KEKERASAN TERHADAP SUAMI)';
            $table = 'tb_kdrt_ktS';
            $id_database = 'id_kdrt_kts';
            break ;
        case (($id_kasus == '1'AND $id_kdrt == '7')) :
            $jenis_kekerasan = 'KDRT LAIN-LAIN';
            $table = 'tb_kdrt_lain';
            $id_database = 'id_kdrt_lain';
            break ;
        case (($id_kasus == '3'AND $id_kdrt == '1')) :  
            $jenis_kekerasan = 'KEKERARASAN TERHADAP PEREMPUAN';
            $table = 'tb_ktp';
            $id_database = 'id_ktp';
            break ;

        case (($id_kasus == '4'AND $id_kdrt == '1')) :
            $jenis_kekerasan = 'KEKERASAN TERHADAP ANAK';
            $table = 'tb_kta';
            $id_database = 'id_kta';
            break ;    
    }
for($i=0; $i<$count; $i++){ 

    $kdrt = $_POST['kti'][$i];
    $id_edit = $_POST['id_edit'][$i];
       
    $cek1 = mysqli_num_rows($mysqli->query("SELECT * FROM $table WHERE id_registrasi = '$id' AND id_jk = '$kdrt' "));


    if ($_SERVER["REQUEST_METHOD"] == "POST"){


        if($cek1[$i] > 1){
            ?> 
                <script language="javascript">
                    alert('Id Registrasi Sudah Terdaftar pada '<?=$jenis_kekerasan?>);
                    document.location='<?php echo "inf_kasus_detail.php?detail=$id"?>';
                </script>
            <?php
            echo  '<input type="hidden" name="id_kasus" value="'.$id_kasus.'">' ;
            echo  '<input type="hidden" name="id_kdrt" value="'.$id_kdrt.'">' ;
        } else {
            $sql =$mysqli->query( "UPDATE $table SET 
                    id_registrasi   = '$id',
                    id_jk           = '$kdrt',
                    keterangan      = '$keterangan'
                    WHERE $id_database = '$id_edit';");
            if ($sql) {
            ?>
                <script language="javascript">
                    alert("Data informasi kasus Berhasil Diedit");
                    document.location='<?php echo "inf_kasus_detail.php?detail=$id"?>';
                </script>

            <?php
            echo  '<input type="hidden" name="id_kasus" value="'.$id_kasus.'">' ;
            echo  '<input type="hidden" name="id_kdrt" value="'.$id_kdrt.'">' ;
            } else {
                echo "Silahkan Input Data Lagi ",mysqli_error($mysqli);
            }
            
        }
    }
}


?>