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
					<h2>Detail Layanan Pasien Penanganan Kasus</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown">
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<button class="btn btn-primary"  onclick="javascript:window.location=('tambah.php')" > <i class="fa fa-plus"> </i> Daftar Baru</button>
				<button class="btn btn-success"  onclick="javascript:window.location=('penanganan_data.php')" > <i class="fa fa-eye"> </i> Data Pasien</button>
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
											<th>Jenis Pelayanan</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										if (isset($_GET['detail'])) {
											$id = $_GET['detail'];	
										$query = "SELECT * FROM tb_layanan_pasien 
												INNER JOIN tb_registrasi ON tb_layanan_pasien.id_registrasi = tb_registrasi.id_registrasi
												INNER JOIN tb_layanan ON tb_layanan_pasien.id_layanan = tb_layanan.id_layanan 
												INNER JOIN tb_identitas_survivor ON tb_layanan_pasien.id_registrasi = tb_identitas_survivor.id_registrasi
												INNER JOIN tb_konselor ON tb_layanan_pasien.id_konselor = tb_konselor.id_konselor
												WHERE tb_layanan_pasien.id_registrasi = '$id'";
										$sql_detail_penanganan = mysqli_query($mysqli, $query) or die(mysqli_error($query));
										if(mysqli_num_rows($sql_detail_penanganan) > 0) {
										while ($row = mysqli_fetch_array($sql_detail_penanganan)){
											$id_layanan= $row['id_layanan'];

											if ($id_layanan == 9 || $id_layanan == 7) {
												$disable ='fa fa-eye-slash btn disabled p-0 m-0"';
												$disable_edit= 'fa fa-ban btn disabled p-0 m-0';
												$disable_plus= 'fa fa-ban btn disabled p-0 m-0';
											} else {
												$disable='fa fa-eye';
												$disable_plus='fa fa-plus';
												$disable_edit='fa fa-pencil';
											}
										?>
										<tr>
											<td >
												<a class="<?php echo $disable_edit?> edit_data" href="#" data-id="<?=$row['id_layanan'] ?>" ></a> |
												<a class="<?php echo $disable_plus?> tambah_data"  data-toggle="modal" href="#" id="custId" data-target="#add_data" data-id="<?=$row['id_layanan'] ?>" ></a> |
												<a class="lihat_data <?php echo $disable ?>"  data-toggle="modal" href="#myModal" data-id="<?=$id_layanan?>"  data-target="#myModal" ></a>
												
											</td>
											<td><?=$no++?>.</td>
											<td><?=$row['no_registrasi']?></td>
											<td><?=$row['nama']?></td>
											<td><?php echo $row['nama_konselor']?></td>
											<td><?php echo $row['nama_layanan']?></td>
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
												<h4 class="modal-title" >Kelola Data Layanan Yang Dibutuhkan</h4>
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
								<div class="modal fade bs-example-modal-lg"  id="add_data" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="judul_data"></h4>
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


$(document).ready(function(){
	$('.lihat_data').click( function (){
		var no_layanan = $(this).data('id');
		var no_reg = <?php echo $id ?>;
		//Menggunakan fungsi Ajax untuk Pengambilan Data
		$.ajax({
			type: 'post',
			url : 'penanganan_detail_lihat.php',
			data: {	no_layanan : no_layanan,
					no_reg : no_reg},
			success : function(data){
				$('.fetched-data').html(data);//menampilkan data ke dalam modal
				$('#myModal').modal('show');
			}
		});
	});
});

$(document).ready(function(){
	$('.tambah_data').click( function (){

		var no_layanan = $(this).data('id');
		var no_reg = <?php echo $id ?>;
		//Menggunakan fungsi Ajax untuk Pengambilan Data
		$.ajax({
			type: 'post',
			url : '../penanganan_kasus_lanjutan/tambah_pelayanan.php',
			data: {	no_layanan : no_layanan,
					no_reg : no_reg},
			success : function(data){
				$('.fetched-data').html(data);//menampilkan data ke dalam modal
				$('#add_data').modal('show');
				document.getElementById("judul_data").innerHTML = document.getElementById("judul").value;
			}
		});
	});
});

$(document).ready(function(){
	$('.edit_data').click( function (){
		
		var no = $(this).data('id');
		var reg = <?php echo $id ?>;
		//Menggunakan fungsi Ajax untuk Pengambilan Data
		window.location.href = "../penanganan_kasus_lanjutan/edit_pelayanan.php?no_layanan="+no+"&no_reg="+reg;
	});
});

function delete_id(id) {
	if(confirm ('Anda Serius Untuk Menghapus Data ?')){
		window.location.href='dampak_delete.php?delete_id=' + id;
	}
}

</script>
<?php
}
require_once ('../../layout/wrapperkonselor/footer.php');
?>