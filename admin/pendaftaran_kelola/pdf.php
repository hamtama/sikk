<?php  
require_once ('../../login/connection.php');
require_once('../../assets/vendors/dompdf/autoload.inc.php');
?>
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
									<thead>
										<tr>
											<th>No</th>
											<th>No Registrasi</th>
											<th>Nama Pelaku</th>
											<th>Tanggal Lahir</th>
											<th>Pendidikan</th>
											<th>Pekerjaan</th>
											<th>Status Perk</th>
											<th>Hub. Dgn Korban</th>
											<th>Jenis Kasus</th>
											<th>Lokasi Kasus</th>
											<th>Alamat</th>
											<th>Wilayah</th>
											<th>Pelayanan</th>
											<th>Tanggal</th>
										</tr>
									</thead>
									<tbody>
										<?php
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
									                	echo $salah;
									                } else {
									                	
									                	if(!empty($query)) {
									                    	$query_input = $query ;
										                } else {
										                    $query_input = 'hari_tanggal = ""';
										                }
														$no = 1;
														$query = "SELECT * FROM tb_identitas_pelaku
																	INNER JOIN tb_registrasi ON tb_registrasi.id_registrasi = tb_identitas_pelaku.id_registrasi
																	INNER JOIN tb_identitas_survivor ON tb_identitas_survivor.id_registrasi = tb_registrasi.id_registrasi
																	INNER JOIN tb_kabupaten ON tb_identitas_survivor.id_kabupaten = tb_kabupaten.id_kabupaten
																	LEFT JOIN tb_layanan_pasien ON tb_layanan_pasien.id_registrasi = tb_registrasi.id_registrasi WHERE $query_input ORDER BY tb_registrasi.id_registrasi DESC";
														$sql_id_pelaku = mysqli_query($mysqli, $query) or die(mysqli_error($query));
														if(mysqli_num_rows($sql_id_pelaku) > 0) {
														while ($row = mysqli_fetch_array($sql_id_pelaku)){
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
															if(empty($kasus)){ $kasus= "Tidak Ada"; } else { foreach ($kasus as $kasus){ $kasus = substr($kasus,0,4)."(".$kasus.")";}} 
															if(!empty($layanan)) {foreach ($layanan as $layanan){$layanan = $layanan.',';}} else {echo $layanan;}  
														?>
														<tr>
														<td><?=$no++?>.</td>
														<td><?=$row['no_registrasi']?></td>
														<td><?=$row['nama_pelaku']?></td>
														<td><?=$row['umur']?></td>
														<td><?=$row['pendidikan_pelaku']?></td>
														<td><?=($row['pekerjaan_pelaku'] == 'Lainnya')?$row['pekerjaan_lainnya_pelaku']: $row['pekerjaan_pelaku']?></td>
														<td><?=($row['status_perkawinan_pelaku'] == 'Lainnya')? $row['status_lainnya_pelaku']: $row['status_perkawinan_pelaku']?></td>
														<td><?=($row['hubungan_korban'] == 'Lainnya')?$row['hubungan_lainnya']:$row['hubungan_korban']?></td>
														<td><?=$kasus?></td>
														<td><?=($row['lokasi_kasus'] == 'Lainnya')?['lokasi_lainnya']: $row['lokasi_kasus']?></td>
														<td><?=$row['alamat_pelaku']?></td>
														<td><?=($row['id_kabupaten'] == '7')?$row['kabupaten_lain']:$row['kabupaten']?></td>
														<td><?=$layanan?></td>
														<td><?=$row['hari_tanggal']?></td>
														</tr>
														<?php
														}
														} else {
															echo "<tr><td colspan=\"5\" align=\"center\"> Data Tidak Ditemukan </td></tr>";
														}
													}
											}
										
							?>
									</tbody>
								</table>";
							




