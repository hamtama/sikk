<?php  
require_once ('../../login/connection.php');
require_once('../../assets/vendors/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$html = '<center><h2>DATA SURVIVOR P2TPAKK "REKSO DYAH UTAMI"</h2></center>';
$html .='
<table border="1" style="width:100%">
									<thead>
										<tr>
											<th>No</th>
											<th>No. Reg</th>
											<th>Nama</th>
											<th>Jenis Kelamin</th>
											<th>Tanggal lahir</th>
											<th>Pendidikan</th>
											<th>Pekerjaan</th>
											<th>Status Perk</th>
											<th>Jenis Kasus</th>
											<th>Lokasi Kasus</th>
											<th>Alamat</th>
											<th>Wilayah</th>
											<th>Pelayanan</th>
											<th>Rujukan</th>
											<th>Tanggal</th>	
											<th>Status</th>
										</tr>
									</thead>
									<tbody>';
										
										if(isset($_POST['pdf'])){
									            
									            	if(isset($_POST['triwulan'])){
														$id = $_POST['triwulan'];
									                	foreach($mysqli->query("SELECT * FROM tb_triwulan WHERE id_triwulan = '$id'") as $row ){
															$triwulan1 = $row['awal'];
															$triwulan2 = $row['akhir']; 
														}
													} else {
														$triwulan1 = '';
														$triwulan2 = ''; 
													}
									                $tahun = $_POST['tahun_cetak'];
									                $tanggal1 = $_POST['tanggal_awal'];
									                $tanggal2 = $_POST['tanggal_akhir'];
									                $triwulan = $_POST['triwulan'];
													switch (true) {
														case (empty($tahun) && empty($tanggal1) && empty($tanggal2) && empty($triwulan) && empty($triwulan1) && empty($triwulan2)):
															$salah= '<div class="alert alert-info" align="center" role="alert">Tidak Ada Pilihan, Silahkan Pilih Tanggal</div>';
															
															break;
														case (!empty($triwulan)):
															$salah = '';
															$query = "(hari_tanggal BETWEEN '".$triwulan1."' AND '".$triwulan2."')";
															break;
														
									                    case (!empty($tanggal1) && !empty($tanggal2)):
									                    	$salah = '';
									                    	$tanggal1 = strtotime($_POST['tanggal_awal']);
											                $tanggal1 = date("Y-m-d",$tanggal1);
											                $tanggal2 = strtotime($_POST['tanggal_akhir']);
											                $tanggal2 = date("Y-m-d",$tanggal2);
									                        $cari1 = $tanggal1;
									                        $cari2 = $tanggal2;
									                        $query = "(hari_tanggal BETWEEN '".$cari1."' AND '".$cari2."')";
									                        break;
									                    case (!empty($tahun)):
									                    	$salah = '';
									                        $cari = $tahun;
									                        $query = "hari_tanggal  LIKE '%".$cari."%'";
									                        break;
									                    case (!empty($tanggal1)):
									                    	$salah = '';
									                    	$tanggal1 = strtotime($_POST['tanggal_awal']);
											                $tanggal1 = date("Y-m-d",$tanggal1);
									                        $cari = $_POST['tanggal_awal'];
									                        $query = "hari_tanggal  LIKE '%".$cari."%'";
									                        break;
									                }
									                if(!empty($salah)){
									                	$html .= $salah;
									                } else {
									                	
									                	if(!empty($query)) {
									                    	$query_input = $query ;
										                } else {
										                    $query_input = 'hari_tanggal = ""';
										                }
														$no = 1;
														$query = "SELECT * FROM tb_identitas_survivor 
														INNER JOIN tb_registrasi ON tb_identitas_survivor.id_registrasi = tb_registrasi.id_registrasi 
														INNER JOIN tb_kabupaten ON tb_identitas_survivor.id_kabupaten = tb_kabupaten.id_kabupaten
														INNER JOIN tb_identitas_pelaku ON tb_identitas_pelaku.id_registrasi = tb_registrasi.id_registrasi
														LEFT JOIN tb_layanan_pasien ON tb_layanan_pasien.id_registrasi = tb_registrasi.id_registrasi
														WHERE 1 ORDER BY tb_registrasi.id_registrasi DESC";
														$sql_identitas_survivor = mysqli_query($mysqli, $query) or die(mysqli_error($query));
														if(mysqli_num_rows($sql_identitas_survivor) > 0) {
														while ($row = mysqli_fetch_array($sql_identitas_survivor)){
															$id_registrasi = $row['1'];
														$jenis_kasus = mysqli_query($mysqli, "SELECT DISTINCT id_registrasi,`*` FROM  tb_informasi_kasus
															LEFT JOIN tb_jenis_kasus ON tb_informasi_kasus.kasus = tb_jenis_kasus.id_jkas 
															LEFT JOIN tb_kdrt ON tb_informasi_kasus.id_kdrt = tb_kdrt.id_kdrt  WHERE id_registrasi ='$id_registrasi'");
														if(mysqli_num_rows($jenis_kasus) > 0){
															while($row_inf_kas  = mysqli_fetch_array($jenis_kasus)){
																$kasus = array();
																$inf_kdrt = array();

																if ($row_inf_kas['kdrt'] == NULL) {
																	$inf_kdrt[] = "-";
																} else {
																	$inf_kdrt[] = $row_inf_kas['kdrt'];
																}
																if ($row_inf_kas['jenis_kasus'] == NULL) {
																	$kasus[] = "Tidak Ada";
																} else {
																	$kasus[] = $row_inf_kas['jenis_kasus'];
																}
															}
														}
														$layanan = array();
														$sql_penanganan = "SELECT DISTINCT id_registrasi,`*` FROM tb_layanan_pasien 
															INNER JOIN tb_layanan ON tb_layanan_pasien.id_layanan = tb_layanan.id_layanan WHERE id_registrasi = '$id_registrasi'";
														$penanganan = mysqli_query($mysqli,$sql_penanganan);
														if(mysqli_num_rows($penanganan) > 0){
															while($row_penanganan  = mysqli_fetch_array($penanganan)){
																$layanan[] = $row_penanganan['7'];
															}
														} elseif (mysqli_num_rows($penanganan) == 0 ) {
															$layanan[] = "Tidak Ada";
														}
														if(!isset($inf_kdrt)){ $kdrt = "-"; } else { foreach ($inf_kdrt as $inf_kdrt){ $kdrt = substr($inf_kdrt,0,3);}}
														if($row['pekerjaan'] == "Lainnya"){$pekerjaan = $row['pekerjaan_lainnya'];} else {$pekerjaan= $row['pekerjaan'];}
														if($row['status_perkawinan'] == "Lainnya"){$status = $row['status_lainnya'];} else {$status = $row['status_perkawinan'];}
														if(empty($kasus)){ $kasus = "Tidak Ada"; } else { foreach ($kasus as $kasus){ $kasus = substr($kasus,0,4)."(".$kdrt.")";}}
														if($row['lokasi_kasus'] == "Lainnya") {$lokasi = $row['lokasi_lainnya'];} else {$lokasi = $row['lokasi_kasus'];}
														if($row['id_kabupaten'] == '7') {$kabupaten = $row['kabupaten_lain'];} else {$kabupaten = $row['kabupaten'];} 
														if(!empty($layanan)) {foreach ($layanan as $layanan){$layanan = $layanan.',';}} else {$layanan = $layanan;}
														if($row['status'] == 1) {$status = "Selesai";} else {$status = "Proses";}
														$html .="<tr>";
														$html .="	<td>".$no++.".</td>";
														$html .="	<td>".$row['no_registrasi']."</td>";
														$html .="	<td>".$row['nama']."</td>";
														$html .="	<td>".$row['jenis_kelamin']."</td>";
														$html .="	<td>".$row['tanggal_lahir']."</td>";
														$html .="	<td>".$row['pendidikan']."</td>";
														$html .="	<td>".$pekerjaan."</td>";
														$html .="	<td>".$status."</td>";
														$html .="	<td>".$kasus."</td>";
														$html .="	<td>".$lokasi."</td>";
														$html .="	<td>".$row[5]."</td>";
														$html .="	<td>".$kabupaten."</td>";
														$html .="	<td>".$layanan."</td>";
														$html .="	<td>".$row['dirujuk_oleh']."</td>";
														$html .="	<td>".$row['hari_tanggal']."</td>";
														$html .="	<td>".$status."</td>";
														}
														} else {
															$html .= "<tr><td colspan=\"16\" align=\"center\"> Data Tidak Ditemukan </td></tr>";
														}
													}
											}
									$html .="
									</tbody>
								</table>";
								$html .= "</html>";
$dompdf->loadHtml($html);
$dompdf->setPaper('legal','landscape');
$dompdf->render();
$dompdf->stream('Laporan_Survivor.pdf');
?>

