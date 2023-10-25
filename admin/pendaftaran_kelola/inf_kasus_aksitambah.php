<?php  
require_once ('../../login/connection.php');

// FORM STEP 4 INPUT DATA INFORMASI KASUS
$no_registrasi 		= $_POST['no_registrasi'];

$cek1 = mysqli_num_rows($mysqli->query("SELECT id_registrasi FROM tb_informasi_kasus WHERE id_registrasi = ".$no_registrasi." AND kasus = 1 AND id_kdrt = 2"));
$cek2 = mysqli_num_rows($mysqli->query("SELECT * FROM tb_informasi_kasus WHERE id_registrasi = ".$no_registrasi." AND kasus = 1 AND id_kdrt = 3"));
$cek3 = mysqli_num_rows($mysqli->query("SELECT * FROM tb_informasi_kasus WHERE id_registrasi = ".$no_registrasi." AND kasus = 1 AND id_kdrt = 4"));
$cek4 = mysqli_num_rows($mysqli->query("SELECT * FROM tb_informasi_kasus WHERE id_registrasi = ".$no_registrasi." AND kasus = 1 AND id_kdrt = 7"));
$cek5 = mysqli_num_rows($mysqli->query("SELECT * FROM tb_informasi_kasus WHERE id_registrasi = ".$no_registrasi." AND kasus = 3"));
$cek6 = mysqli_num_rows($mysqli->query("SELECT * FROM tb_informasi_kasus WHERE id_registrasi = ".$no_registrasi." AND kasus = 4"));



if ($_SERVER["REQUEST_METHOD"] == "POST"){

	if($cek1 > 1){
		?> 
			<script language="javascript">
				alert('Id Registrasi Sudah Terdaftar pada Tabel KDRT KTI');
				document.location='inf_kasus_data.php';
			</script>
		<?php
	} elseif ($cek2 > 1){
		?> 
			<script language="javascript">
				alert('Id Registrasi Sudah Terdaftar pada Tabel KDRT KTA');
				document.location='inf_kasus_data.php';
			</script>
		<?php
	} elseif ($cek3 > 1){
		?> 
			<script language="javascript">
				alert('Id Registrasi Sudah Terdaftar pada Tabel KDRT KTS');
				document.location='inf_kasus_data.php';
			</script>
		<?php
	} elseif($cek4 >1){
		?> 
			<script language="javascript">
				alert('Id Registrasi Sudah Terdaftar pada Tabel KDRT Lain');
				document.location='inf_kasus_data.php';
			</script>
		<?php
	} elseif($cek5 > 1){
		?> 
			<script language="javascript">
				alert('Id Registrasi Sudah Terdaftar pada Tabel KTP');
				document.location='inf_kasus_data.php';
			</script>
		<?php
	} elseif($cek6 > 1){
		?> 
			<script language="javascript">
				alert('Id Registrasi Sudah Terdaftar pada Tabel KTA');
				document.location='inf_kasus_data.php';
			</script>
		<?php
	} else {

    	if(!empty($_POST['klrt'])){
    		$kasus = $_POST['klrt'];
	    	foreach($kasus as $kasus){ 
		        $sql =$mysqli->query( "INSERT INTO tb_informasi_kasus SET 
		            id_registrasi 		='".$no_registrasi."',
		            kasus 		='".$kasus."'
		            ;");
		    }
		    $sql_kasus = TRUE;
		}else {
			$sql_kasus = FALSE;
		}
	    
        if(isset($_POST['jenis_kdrt'])){
        	$kasus_kdrt = $_POST['kasus_kdrt'];
	    	foreach($_POST['jenis_kdrt'] as $jenis_kdrt){ 
		        $sql2 =$mysqli->query( "INSERT INTO tb_informasi_kasus SET 
		            id_registrasi 		='".$no_registrasi."',
		            kasus 		='".$kasus_kdrt."',
		            id_kdrt 		='".$jenis_kdrt."'
		            ;");
		        
	    	}
	    	$sql_kasus2 = TRUE;
	    }else {
	    	$sql_kasus2  = FALSE;
	    }

    	
        // INPUT DATA KDRT KTI
        if(!empty($_POST['kti'])){
        	if (isset($_POST['ket_kti']))  {
    			$keterangan 		= $_POST['ket_kti'];
			} else {
			    $keterangan 		= '';
			}
        	foreach($_POST['kti'] as $kti){ 
        		$sql_kti =$mysqli->query( "INSERT INTO tb_kdrt_kti SET 
	                    id_registrasi 	= '".$no_registrasi."',
	                    id_jk	 		= '".$kti."',
	                    keterangan     	= '".$keterangan."'
	                    ;");
        	}
        	$sql_kti = TRUE;
        } else {
        	$sql_kti = FALSE;
        }
        // INPUT DATA KDRT KTA
        if(!empty($_POST['kta'])){
        	if (isset($_POST['ket_kta']))  {
    			$keterangan 		= $_POST['ket_kta'];
			} else {
			    $keterangan 		= '';
			}
        	foreach($_POST['kta'] as $kta){
		        $sql_kta =$mysqli->query( "INSERT INTO tb_kdrt_kta SET 
			                    id_registrasi	= '".$no_registrasi."',
			                    id_jk	 		= '".$kta."',
			                    keterangan     	= '".$keterangan."'
			                    ;");
		    }
		    $sql_kta = TRUE ;
		} else {
			$sql_kta = FALSE;
		}
		// INPUT DATA KDRT KTS
		if(!empty($_POST['kts'])){
			if (isset($_POST['ket_kts']))  {
    			$keterangan 		= $_POST['ket_kts'];
			} else {
			    $keterangan 		= '';
			}
        	foreach($_POST['kts'] as $kts){
		        $sql_kts =$mysqli->query( "INSERT INTO tb_kdrt_kts SET 
			                    id_registrasi	= '".$no_registrasi."',
			                    id_jk 			= '".$kts."',
			                    keterangan     	= '".$keterangan."'
			                    ;");
		    }
		    $sql_kts = TRUE;
		} else {
			$sql_kts = FALSE;
		}

		// INPUT DATA KDRT LAIN
		if(!empty($_POST['lain_lain'])){
			if (isset($_POST['ket_lain']))  {
    			$keterangan 		= $_POST['ket_lain'];
			} else {
			    $keterangan 		= '';
			}
        	foreach($_POST['lain_lain'] as $kdrt_lain){
		        $sql_lain =$mysqli->query( "INSERT INTO tb_kdrt_lain SET 
			                    id_registrasi 	= '".$no_registrasi."',
			                    id_jk	 		= '".$kdrt_lain."',
			                    keterangan     	= '".$keterangan."'
			                    ;");
		    }
		    $sql_lain = TRUE;
		} else {
			$sql_lain = FALSE;
		}
		// INPUT DATA KTP
		if(!empty($_POST['ktp'])){
			if (isset($_POST['ket_ktp']))  {
    			$keterangan 		= $_POST['ket_ktp'];
			} else {
			    $keterangan 		= '';
			}
        	foreach($_POST['ktp'] as $ktp){
		        $sql_ktp =$mysqli->query( "INSERT INTO tb_ktp SET 
			                    id_registrasi 	= '".$no_registrasi."',
			                    id_jk	 		= '".$ktp."',
			                    keterangan     	= '".$keterangan."'
			                    ;");
		    }
		    $sql_ktp = TRUE;
		} else {
			$sql_ktp = FALSE;
		}

		// INPUT DATA KTA
		if(!empty($_POST['kta2'])){
			if (isset($_POST['ket_kta2']))  {
    			$keterangan 		= $_POST['ket_kta2'];
			} else {
			    $keterangan 		= '';
			}
        	foreach($_POST['kta2'] as $kta2){
		        $sql_kta2 =$mysqli->query( "INSERT INTO tb_kta SET 
			                    id_registrasi 	= '".$no_registrasi."',
			                    id_jk 			= '".$kta2."',
			                    keterangan      = '".$keterangan."'
			                    ;");
		    }
		    $sql_kta2 = TRUE;
		} else {
			$sql_kta2 = FALSE;
		}

        if (($sql_kasus || $sql_kasus2 || $sql_kti || $sql_kta || $sql_kts || $sql_lain || $sql_ktp || $sql_kta2)) {
        ?>
            <script language="javascript">
                alert("Data informasi kasus Berhasil Ditambahkan");
                document.location='inf_kasus_data.php';
            </script>
        <?php
        } else {
            echo "Silahkan Input Data Lagi ",mysqli_error($mysqli);
        }
    }
}


?>