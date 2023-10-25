<?php  
require_once ('../../login/connection.php');

$no_registrasi = $_POST['no_registrasi'];
$nama_konselor = $_POST['nama_konselor'];
$v_penanganan_kasus = $_POST['penanganan_kasus'];

// PENANGANAN KASUS
if(empty($_POST['penanganan_kasus'])){
    ?>
    <script language="javascript">
            alert("Silahkan Isi Layanan");
            document.location='tambah.php';
        </script>
    <?php
} else {
    
        
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            
            	foreach($_POST['penanganan_kasus'] as $penanganan_kasus){ 
            		$cek = mysqli_num_rows($mysqli->query("SELECT *  FROM tb_layanan_pasien WHERE id_registrasi ='$no_registrasi' AND id_layanan ='$penanganan_kasus'"));
            		if ($cek >= 1){
		                ?> 
		                    <script language="javascript">
		                        alert('No Registrasi Sudah Ada !! Silahkan Ganti No Registrasi');
		                        document.location='tambah.php';
		                    </script>
		                <?php
		            } else {
	                $sql =$mysqli->query( "INSERT INTO tb_layanan_pasien SET 
	                    id_registrasi 			= '".$no_registrasi."',
	                    id_konselor 			    = '".$nama_konselor."',
	                    id_layanan          	= '".$penanganan_kasus."'
	                    ;");
	            	}
	            }
                // INPUT DATA LAYANAN KONSELING TELP
                if (!empty($_POST['tanggal_konseling'] && $_POST['kegiatan_konseling'] && $_POST['inf_kesepakatan_konseling'])) {
                        $tanggal_konseling          = strtotime($_POST['tanggal_konseling']);
                        $tgl_konseling              = date("Y-m-d",$tanggal_konseling);
                        $kegiatan_konseling         = $_POST['kegiatan_konseling'];
                        $inf_kesepakatan_konseling  = $_POST['inf_kesepakatan_konseling'];

                       	$sql_konseling = $mysqli->query("INSERT INTO tb_layanan_konseling_telp SET 
	                        id_registrasi       ='".$no_registrasi."',
	                        id_konselor         ='".$nama_konselor."',
	                        tgl_kons_telp       ='".$tgl_konseling."',
	                        kegiatan_kons_telp  ='".$kegiatan_konseling."',
	                        inf_kes_kons_telp   ='".$inf_kesepakatan_konseling."';
	                        ");
                       $sql_konseling = TRUE;
                   }  else {
                        $sql_konseling = FALSE;
                   }
                   // INPUT DATA LAYANAN KONSULTASI HUKUM
                   if (!empty($_POST['tanggal_konsultasi'] && $_POST['kegiatan_konsultasi'] && $_POST['inf_kesepakatan_konsultasi'])) {
                        $tanggal_konsultasi          = strtotime($_POST['tanggal_konsultasi']);
                        $tgl_konsultasi              =  date("Y-m-d",$tanggal_konsultasi);
                        $kegiatan_konsultasi         = $_POST['kegiatan_konsultasi'];
                        $inf_kesepakatan_konsultasi  = $_POST['inf_kesepakatan_konsultasi'];

                       	$sql_konsultasi = $mysqli->query("INSERT INTO tb_layanan_konsultasi_hukum SET 
	                        id_registrasi        ='".$no_registrasi."',
	                        id_konselor			     ='".$nama_konselor."',
	                        tgl_kons_hukum 		   ='".$tgl_konsultasi."',
	                        kegiatan_kons_hukum	 ='".$kegiatan_konsultasi."',
	                        inf_kes_kons_hukum	 ='".$inf_kesepakatan_konsultasi."'
	                        ;");
                       $sql_konsultasi = TRUE;
                   } else {
                        $sql_konsultasi = FALSE;
                   }
                   // INPUT DATA LAYANAN HOME VISITE
                   if (!empty($_POST['tanggal_home_visite'] && $_POST['kegiatan_home_visite'] && $_POST['inf_kesepakatan_home_visite'])) {
                        
                        $tanggal_home_visite          = strtotime($_POST['tanggal_home_visite']);
                        $tgl_home_visite              = date("Y-m-d",$tanggal_home_visite);
                        $kegiatan_home_visite         = $_POST['kegiatan_home_visite'];
                        $inf_kesepakatan_home_visite  = $_POST['inf_kesepakatan_home_visite'];

                       	$sql_home_visite = $mysqli->query("INSERT INTO tb_layanan_home_visite SET 
	                        id_registrasi			    ='".$no_registrasi."',
	                        id_konselor				    ='".$nama_konselor."',
	                        tgl_home_visite 		  ='".$tgl_home_visite."',
	                        kegiatan_home_visite  ='".$kegiatan_home_visite."',
	                        inf_kes_home_visite   ='".$inf_kesepakatan_home_visite."'
                        	;");
                       $sql_home_visite = TRUE;
                   } else {
                        $sql_home_visite = FALSE;
                   }
                   // INPUT DATA LAYANAN MEDIS
                    if (!empty($_POST['tanggal_medis'] && $_POST['kegiatan_medis'] && $_POST['inf_kesepakatan_medis'])) {
                        
                        $tanggal_medis			    = strtotime($_POST['tanggal_medis']);
                        $tgl_medis              = date("Y-m-d",$tanggal_medis);
                        $kegiatan_medis 		    = $_POST['kegiatan_medis'];
                        $inf_kesepakatan_medis  = $_POST['inf_kesepakatan_medis'];

                       	$sql_medis = $mysqli->query("INSERT INTO tb_layanan_medis SET 
	                        id_registrasi       ='".$no_registrasi."',
	                        id_konselor         ='".$nama_konselor."',
	                        tgl_medis      		  ='".$tgl_medis."',
	                        kegiatan_medis  	  ='".$kegiatan_medis."',
	                        inf_kes_medis  		  ='".$inf_kesepakatan_medis."'
                        	;");
                       $sql_medis= TRUE;
                   	} else {
                        $sql_medis = FALSE;
                   	}
                   	// INPUT DATA LAYANAN SUPPORT GROUP
                    if (!empty($_POST['tanggal_support_group'] && $_POST['kegiatan_support'] && $_POST['inf_kesepakatan_support'])) {
                        
                        $tanggal_support_group		= strtotime($_POST['tanggal_support_group']);
                        $tgl_support_group          =  date("Y-m-d",$tanggal_support_group);
                        $kegiatan_support			= $_POST['kegiatan_support'];
                        $inf_kesepakatan_support	= $_POST['inf_kesepakatan_support'];

                       	$sql_support_group = $mysqli->query("INSERT INTO tb_layanan_support_group SET 
	                        id_registrasi       	='".$no_registrasi."',
	                        id_konselor         	='".$nama_konselor."',
	                        tgl_support_group		='".$tgl_support_group."',
	                        kegiatan_support_group  ='".$kegiatan_support."',
	                        inf_kes_support_group	='".$inf_kesepakatan_support."'
                        	;");
                       $sql_support_group= TRUE;
                   	} else {
                        $sql_support_group = FALSE;
                   	}
                   	// INPUT DATA LAYANAN ASPIRASI LAINNYA
                   if (!empty($_POST['tanggal_aspirasi'] && $_POST['kegiatan_aspirasi'] && $_POST['inf_kesepakatan_aspirasi'])) {
                        
                        $tanggal_aspirasi 			= strtotime($_POST['tanggal_aspirasi']);
                        $tgl_aspirasi               =  date("Y-m-d",$tanggal_aspirasi);
                        $kegiatan_aspirasi			= $_POST['kegiatan_aspirasi'];
                        $inf_kesepakatan_aspirasi	= $_POST['inf_kesepakatan_aspirasi'];

                       	$sql_aspirasi = $mysqli->query("INSERT INTO tb_layanan_aspirasi SET 
	                        id_registrasi       	='".$no_registrasi."',
	                        id_konselor         	='".$nama_konselor."',
	                        tgl_aspirasi			='".$tgl_aspirasi."',
	                        kegiatan_aspirasi  		='".$kegiatan_aspirasi."',
	                        inf_kes_aspirasi		='".$inf_kesepakatan_aspirasi."'
                        	;");
                        $sql_aspirasi= TRUE;
                   	} else {
                        $sql_aspirasi = FALSE;
                   	}
                   	// INPUT DATA LAYANAN LITIGASI
                   if (!empty($_POST['litigasi_awal'] && $_POST['litigasi_akhir'] && $_POST['kegiatan_litigasi'] && $_POST['inf_kesepakatan_litigasi'])) {
                        
                        $litigasi_awal 				= strtotime($_POST['litigasi_awal']);
                        $tgl_litigasi_awal          = date("Y-m-d",$litigasi_awal);
                        $litigasi_akhir 			= strtotime($_POST['litigasi_akhir']);
                        $tgl_litigasi_akhir         = date("Y-m-d",$litigasi_akhir);
                        $kegiatan_litigasi			= $_POST['kegiatan_litigasi'];
                        $inf_kesepakatan_litigasi	= $_POST['inf_kesepakatan_litigasi'];

                       	$sql_litigasi = $mysqli->query("INSERT INTO tb_layanan_litigasi SET 
	                        id_registrasi       		='".$no_registrasi."',
	                        id_konselor         		='".$nama_konselor."',
	                        tgl_litigasi_awal			='".$tgl_litigasi_awal."',
	                        tgl_litigasi_akhir 			='".$tgl_litigasi_akhir."',
	                        kegiatan_litigasi  			='".$kegiatan_litigasi."',
	                        inf_kes_litigasi			='".$inf_kesepakatan_litigasi."'
                        	;");
                       $sql_litigasi= TRUE;
                   	} else {
                        $sql_litigasi = FALSE;
                   	}
                   	// INPUT DATA LAYANAN SHELTER
                   if (!empty($_POST['shelter_awal'] && $_POST['shelter_akhir'] && $_POST['kegiatan_shelter'] && $_POST['inf_kesepakatan_shelter'])) {
                        
                        $shelter_awal 				= strtotime($_POST['shelter_awal']);
                        $tgl_shelter_awal           = date("Y-m-d",$shelter_awal);
                        $shelter_akhir  			= $_POST['shelter_akhir'];
                        $tgl_shelter_akhir          = date("Y-m-d",$shelter_akhir);
                        $kegiatan_shelter			= $_POST['kegiatan_shelter'];
                        $inf_kesepakatan_shelter	= $_POST['inf_kesepakatan_shelter'];

                       	$sql_shelter = $mysqli->query("INSERT INTO tb_layanan_shelter SET 
	                        id_registrasi       		='".$no_registrasi."',
	                        id_konselor         		='".$nama_konselor."',
	                        tgl_shelter_awal			='".$tgl_shelter_awal."',
	                        tgl_shelter_akhir 			='".$tgl_shelter_akhir."',
	                        kegiatan_shelter  			='".$kegiatan_shelter."',
	                        inf_kes_shelter				='".$inf_kesepakatan_shelter."'
                        	;");
                       $sql_shelter= TRUE;
                   	} else {
                        $sql_shelter = FALSE;
                   	}

                if (($sql) || ($sql_konseling)  || ($sql_konsultasi || $sql_home_visite || $sql_medis || $sql_support_group || $sql_aspirasi || $sql_litigasi || $sql_shelter)) {
                ?>
                    <script language="javascript">
                        alert("Data Penanganan Kasus Berhasil Ditambahkan");
                        document.location='tambah.php';
                    </script>
                <?php
                } else {
                    echo "Silahkan Input Data Lagi ",mysqli_error($mysqli);
                }
            }
        }
?>