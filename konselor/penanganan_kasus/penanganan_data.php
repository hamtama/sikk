<?php
require_once ('../../layout/wrapperkonselor/head.php');
require_once ('../../layout/wrapperkonselor/sidebar.php');
require_once ('../../layout/wrapperkonselor/header.php');
require_once ('../../layout/wrapperkonselor/content.php');
?>
<div class="">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
				<div class="x_title">
					<h2>Kelola Data Penanganan Kasus</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown">
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<button class="btn btn-primary"  onclick="javascript:window.location=('tambah.php')" > <i class="fa fa-plus"> </i> Daftar Baru</button>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box table-responsive">
								<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th style="text-align: center;"><i class="fa fa-file-text"></i></th>
											<th>No</th>
											<th>No. Reg</th>
											<th>Nama Korban</th>
											<th>Nama Konselor</th>
											<th>Jumlah Layanan</th>
											<th>Status</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$query = "SELECT *, COUNT(tb_layanan_pasien.id_layanan) AS jumlah_layanan FROM tb_layanan_pasien 
														
												INNER JOIN tb_registrasi ON tb_layanan_pasien.id_registrasi = tb_registrasi.id_registrasi
												INNER JOIN tb_identitas_survivor ON tb_layanan_pasien.id_registrasi = tb_identitas_survivor.id_registrasi
												INNER JOIN tb_konselor ON tb_layanan_pasien.id_konselor = tb_konselor.id_konselor 
												GROUP BY tb_layanan_pasien.id_registrasi 
												ORDER BY id_layanan_pasien DESC";
										$sql_penanganan = mysqli_query($mysqli, $query) or die(mysqli_error($query));
										if(mysqli_num_rows($sql_penanganan) > 0) {
										while ($row = mysqli_fetch_array($sql_penanganan)){

										?>
										<tr>
											<td>
												<?php 
												if ($row['status'] == 0) {
													echo '
													<a class="btn-sm btn-secondary" href="javascript:detail('.$row['id_registrasi'].')"  id="custId" ><i class="fa fa-eye"></i></a>
													<a class="btn-sm btn-primary" data-toggle="modal" href="#" id="'.$row['id_registrasi'].'" data-target="#myModal" data-id="'.$row['id_layanan'].'"><i class="fa fa-check-square-o"></i></a>
													';
												}  
												if ($row['status'] == 1) {
													echo '
														<a class="btn-sm btn-secondary"><i class="fa fa-eye-slash"></i></a>
														<a class="btn-sm btn-primary"><i class="fa fa-ban"></i></a>
														<a class="btn-sm  btn-danger" href="javascript:batal('.$row['id_registrasi'].')"><i class="fa fa-close"></i></a>
													';
												}
												?>
												
											</td>
											<td><?=$no++?>.</td>
											<td><?=$row['no_registrasi']?></td>
											<td><?=$row['nama']?></td>
											<td><?php echo $row['nama_konselor']?></td>
											<td><?php echo $row['jumlah_layanan']?></td>
											<td><?php 
											if ($row['status']== 1 ) { 
												echo '<button class="btn-sm  btn-success"><i class="fa fa-check-square-o"></i> Selesai</button>';
												echo '';
											} else {
												echo '<button class="btn-sm  btn-warning"><i class="fa fa-spinner"></i> Proses</button>';
											} 
												?></td>
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
												<h4 class="modal-title" >Penutup Data Penanganan</h4>
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
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function batal(id) {
	if(confirm ('Anda Serius Membuka Kasus Kembali ?')){
		window.location.href='../penanganan_penutup/delete.php?batal=' + id;
}
}
	function detail(id) {
		window.location.href='penanganan_detail.php?detail=' + id;
}

$(document).ready(function(){
	$('#myModal').on('show.bs.modal', function (e){
		var rowid = $(e.relatedTarget).attr('id');
		//Menggunakan fungsi Ajax untuk Pengambilan Data
		$.ajax({
			type: 'post',
			url : '../penanganan_penutup/tambah.php',
			data: 'rowid=' + rowid,
			success : function(data){
				$('.fetched-data').html(data);//menampilkan data ke dalam modal
			}
		});
	});
});
</script>
<?php
require_once ('../../layout/wrapperkonselor/footer.php');
?>