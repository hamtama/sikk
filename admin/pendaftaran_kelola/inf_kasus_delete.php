<?php  
include '../../login/connection.php';



   	$id = $_POST['id_hapus'];
   	$id_reg = $_POST['id'];
    $id_kasus = $_POST['id_kasus'];
    $id_kdrt = $_POST['id_kdrt'];      
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

	$sql = $mysqli->query("DELETE FROM $table WHERE $id_database = '$id'");
	if ($sql){
		echo "<script>alert('Data ID Pelaku Berhasil Dihapus'); location.href='inf_kasus_detail.php?detail=$id_reg';</script>";
		echo  '<input type="hidden" name="id_kasus" value="'.$id_kasus.'">' ;
        echo  '<input type="hidden" name="id_kdrt" value="'.$id_kdrt.'">' ;
	} else {
		echo "<script>alert ('Gagal Hapus Data, Coba Lagi !!!');</script>". $mysqli->error;
	}

?>