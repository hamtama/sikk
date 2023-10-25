<?php
require_once ('../../layout/wrapperadmin/head.php');
require_once ('../../layout/wrapperadmin/sidebar.php');
require_once ('../../layout/wrapperadmin/header.php');
require_once ('../../layout/wrapperadmin/content.php');
?>
<div class="">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
				<div class="x_title">
					<h2>Data Kelola Identitas Survivor Pendaftaran</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown">
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<button class="btn btn-primary" onclick="javascript:window.location=('../pendaftaran/tambah.php')" > <i class="fa fa-plus"> </i> Registrasi Data</button>
				<button class="btn btn-success" data-toggle="modal" data-target="#export" ><i class="fa fa-print"></i> Export</button>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th style="text-align: center;"><i class="fa fa-cog"></i></th>
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
									</thead>
									<tbody>
										<?php
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
										?>
										<tr>
											<td class="">
												<a class="fa fa-edit edit_data"  data-toggle="modal" href="#myModal" id="custId" data-target="#myModal" data-id="<?=$row['id_survivor'] ?>"></a> |
												<a class="fa fa-eye lihat_data"  data-toggle="modal" href="#myModal" id="custId" data-target="#myModal" data-id="<?=$row['id_survivor'] ?>"></a> |
											</td>
											<td><?=$no++?>.</td>
											<td><?=$row['no_registrasi']?></td>
											<td><?php echo $row['nama']?></td>
											<td><?php echo $row['jenis_kelamin']?></td>
											<td><?php echo $row['tanggal_lahir']?></td>
											<td><?php echo $row['pendidikan'] ?></td>
											<td><?php if($row['pekerjaan'] == "Lainnya"){echo $row['pekerjaan_lainnya'];} else {echo $row['pekerjaan'];} ?></td>
											<td><?php if($row['status_perkawinan'] == "Lainnya"){echo $row['status_lainnya'];} else {echo $row['status_perkawinan'];} ?></td>
											<?php  
											if(!isset($inf_kdrt)){ $kdrt = "-"; } else { foreach ($inf_kdrt as $inf_kdrt){ $kdrt = substr($inf_kdrt,0,3);}} 
											?>
											<td><?php if(empty($kasus)){ echo "Tidak Ada"; } else { foreach ($kasus as $kasus){ echo substr($kasus,0,4),"(".$kdrt.")";}} ?></td>
											<td><?php if($row['lokasi_kasus'] == "Lainnya") {echo $row['lokasi_lainnya'];} else {echo $row['lokasi_kasus'];}?></td>
											<td><?php echo $row[5];?></td>
											<td><?php if($row['id_kabupaten'] == '7') {echo $row['kabupaten_lain'];} else {echo $row['kabupaten'];} ?></td>
											<td><?php if(!empty($layanan)) {foreach ($layanan as $layanan){echo $layanan,',';}} else {echo $layanan;}  ?></td>
											<td><?php echo $row['dirujuk_oleh']?></td>
											<td><?php echo $row['hari_tanggal'] ?></td>
											<td><?php if($row['status'] == 1) {echo "Selesai";} else {echo "Proses";} ?></td>
										<?php
										}
										} else {
											echo "<tr><td colspan=\"5\" align=\"center\"> Data Tidak Ditemukan </td></tr>";
										}
										?>
									</tbody>
								</table>
								<div class="modal fade bs-example-modal-lg"  id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" >Kelola Data Identitas Survivor</h4>
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="fetched-data">
													
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<div class="modal fade bs-example-modal-lg"  id="export" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" >Cetal Data Sirvivor</h4>
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="fetched-data">
													<form id="action" action="" method="post">
														<div class="col-md-12">
															<div class="col-md-6">
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
												            <div class="col-md-6">
													            <div class="form-group field item row">
													            	<div class="col-md-12">
											                        	<label class="col-form-label">Pilih Triwulan</label>
												                        <div class="col-md-12 col-sm-12 p-0">
																			<select class="form-control has-feedback-left" name="triwulan">
																				<option value="">Pilih Triwulan</option>
																				<?php  
															                        $sql_triwulan = mysqli_query($mysqli, "SELECT * FROM tb_triwulan WHERE 1 ORDER BY id_triwulan ASC") or die (mysqli_error($mysqli));
															                        while ($row = mysqli_fetch_array($sql_triwulan)){
															                            echo '<option value="'.$row['id_triwulan'].'">'.$row['kategori_bulan'].'</option>';
															                        }
															                    ?>
																			</select>
																			<span class="fa fa-calendar form-control-feedback left"></span>
																			<?php
																			?>
												                        </div>
												                    </div>
											                    </div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="col-md-6">
																<div class="field item form-group row">
																	<div class="col-md-12">
											                            <label class="col-form-label">Tanggal Awal<span class="required">*</span></label>
											                            <div class="input-group date p-0" id="myDatepicker2">
										                                    <input type="text"  id="myDatepicker2" name="tanggal_awal" class="form-control">
										                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
											                            </div>
											                        </div>
										                        </div>
										                    </div>
										                    <div class="col-md-6">
										                        <div class="field item form-group row">
										                        	<div class="col-md-12">
											                            <label class="col-form-label">Tanggal Akhir<span class="required">*</span></label>
											                            <div class="input-group date p-0" id="myDatepicker">
										                                    <input type="text"  id="myDatepicker" name="tanggal_akhir" class="form-control">
										                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
											                            </div>
											                        </div>
										                        </div>
										                    </div>
										                    <div class="col-md-12" align="center">
										                    	<button class="btn btn-outline-info btn-lg" id="excel" name="excel" type="submit"><i class="fa fa-table"></i> Excel</button>
										                    	<button class="btn btn-outline-info btn-lg" id="pdf"name="pdf" type="submit"><i class="fa fa-file-text"></i>  PDF</button>
										                    </div>
									                	</div>
									                </form>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script src="../../assets/vendors/moment/min/moment-with-locales.js"></script>	
<script src="../../assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
	$('#myDatepicker').datetimepicker({
        locale: 'id',
        format: 'DD.MMMM.YYYY'
    });
    $('#myDatepicker2').datetimepicker({
        locale: 'id',
        format: 'DD.MMMM.YYYY'
    });
function delete_id(id) {
	if(confirm ('Anda Serius Untuk Menghapus Data ?')){
		window.location.href='id_survivor_delete.php?delete_id=' + id;
	}
}
$(document).ready(function(){
	$('.edit_data').click( function (){
		$('#myModal').modal('show');
		var rowid = $(this).data('id');
		//Menggunakan fungsi Ajax untuk Pengambilan Data
		$.ajax({
			type: 'post',
			url : 'id_survivor_edit.php',
			data: 'rowid=' + rowid,
			success : function(response){
				$('.fetched-data').html(response);//menampilkan data ke dalam modal
			}
		});
	});
});
$(document).ready(function(){
	$('.lihat_data').click( function (){
		$('#myModal').modal('show');
		var rowid = $(this).data('id');
		//Menggunakan fungsi Ajax untuk Pengambilan Data
		$.ajax({
			type: 'post',
			url : 'id_survivor_lihat.php',
			data: 'rowid=' + rowid,
			success : function(response){
				$('.fetched-data').html(response);//menampilkan data ke dalam modal
			}
		});
	});
});
$(document).ready(function(){
	$('#excel').click(function(){
		$('#action').attr('action','excel_survivor.php');
	});
	$('#pdf').click(function(){
		$('#action').attr('action','pdf_survivor.php');
	});
});
</script>
<?php
include ('../../layout/wrapperadmin/footer.php');
?>



