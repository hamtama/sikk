<?php
require_once ('../../layout/wrapperuser/head.php');
require_once ('../../layout/wrapperuser/sidebar.php');
require_once ('../../layout/wrapperuser/header.php');
require_once ('../../layout/wrapperuser/content.php');
?>
<div class="">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
				<div class="x_title">
					<h2>Data Kelola Informasi Kasus</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown">
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<button class="btn btn-primary"  onclick="javascript:window.location=('../pendaftaran/tambah.php')" > <i class="fa fa-plus"> </i> Registrasi Data</button>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box table-responsive">
								<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th style="text-align: center;"><i class="fa fa-cog"></i></th>
											<th style="text-align: center;">No</th>
											<th style="text-align: center;">No Registrasi</th>
											<th style="text-align: center;">Nama</th>
											<th style="text-align: center;">Kabupaten</th>
											<th style="text-align: center;">Jumlah Kasus</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$query = "SELECT * ,COUNT(tb_informasi_kasus.kasus) AS jumlah_kasus FROM tb_informasi_kasus
													INNER JOIN tb_identitas_survivor ON tb_informasi_kasus.id_registrasi = tb_identitas_survivor.id_registrasi
													INNER JOIN tb_registrasi ON tb_informasi_kasus.id_registrasi = tb_registrasi.id_registrasi
													INNER JOIN tb_kabupaten ON tb_identitas_survivor.id_kabupaten = tb_kabupaten.id_kabupaten
													GROUP BY tb_informasi_kasus.id_registrasi
													ORDER BY tb_informasi_kasus.id_registrasi DESC
													";
										$sql_inf_kasus = mysqli_query($mysqli, $query) or die(mysqli_error($query));
										if(mysqli_num_rows($sql_inf_kasus) > 0) {
										while ($row = mysqli_fetch_array($sql_inf_kasus)){
										?>
										<tr>
											<td style="width:10%" >
												<a class="fa fa-plus tambah_data" data-toggle="modal" href="#myModal" id="custId" data-target="#add_data" data-id="<?=$row['id_registrasi'] ?>"></a> |
												<a class="fa fa-edit" href="javascript:detail(<?=$row['id_registrasi']?>)" id="custId"></a> |
												<a class="fa fa-eye lihat_data" data-toggle="modal" href="#myModal" id="custId" data-target="#myModal" data-id="<?=$row['id_registrasi'] ?>"></a>
												 
											</td>
											<td ><?=$no++?>.</td>
											<td ><?=$row['no_registrasi']?></td>
											<td ><?=$row['nama']?></td>
											<td ><?php if($row['id_kabupaten'] == '7') {echo $row['kabupaten_lain'];} else {echo $row['kabupaten'];} ?></td>
											<td ><?=$row['jumlah_kasus']?></td>
										</tr>
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
												<h4 class="modal-title" id="judul_data">Tambah Data Informasi Kasus</h4>
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="fetched-data">
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
function detail(id) {
		window.location.href='inf_kasus_detail.php?detail=' + id;
}

$(document).ready(function(){
	$('.tambah_data').click( function (){
		$('#myModal').modal('show');
		var no_reg = $(this).data('id');
		//Menggunakan fungsi Ajax untuk Pengambilan Data
		$.ajax({
			type: 'post',
			url : 'inf_kasus_tambah.php',
			data: 'no_reg=' + no_reg,
			success : function(response){
				$('.fetched-data').html(response);//menampilkan data ke dalam modal
				
				document.getElementById("judul_data").innerHTML = document.getElementById("judul").value;
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
			url : 'inf_kasus_lihat.php',
			data: 'rowid=' + rowid,
			success : function(response){
				$('.fetched-data').html(response);//menampilkan data ke dalam modal
			}
		});
	});
});


    

</script>
<?php
require_once ('../../layout/wrapperuser/footer.php');
?>

