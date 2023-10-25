<?php  
require_once ('../../login/connection.php');

// FORM STEP 4 INPUT DATA INFORMASI KASUS
$no_registrasi 		= $_POST['no_registrasi'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){

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
	    
        if(!empty($_POST['jenis_kdrt'])){
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
		}

        if (($sql_kasus || $sql_kasus2 || $sql_kti || $sql_kta || $sql_kts || $sql_lain || $sql_ktp || $sql_kta2)) {
        ?>
            <script language="javascript">
                alert("Data informasi kasus Berhasil Ditambahkan");
                document.location='test_step4.php';
            </script>
        <?php
        } else {
            echo "Silahkan Input Data Lagi ",mysqli_error($mysqli);
        }
    }


?>