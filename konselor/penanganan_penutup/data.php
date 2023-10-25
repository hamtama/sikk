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
					<h2>Data Penutup Kasus</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown">
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<button class="btn btn-primary"  onclick="javascript:window.location=('../penanganan_kasus/penanganan_data.php')" > <i class="fa fa-plus"> </i> Tutup Kasus</button>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box table-responsive">
								<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th style="text-align: center;"><i class="fa fa-cog"></i></th>
											<th>No </th>
											<th>No Registrasi</th>
											<th>Evaluator Konselor</th>
											<th>Evaluasi Akhir</th>
											<th>Catatan</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$query = "SELECT * FROM tb_penutup INNER JOIN tb_registrasi ON tb_registrasi.id_registrasi = tb_penutup.id_registrasi ORDER BY tb_penutup.id_penutup";
										$sql_penutup = mysqli_query($mysqli, $query) or die(mysqli_error($query));
										if(mysqli_num_rows($sql_penutup) > 0) {
										while ($row = mysqli_fetch_array($sql_penutup)){
											
										?>
										<tr>
											<td style="width:10%">
												
												<a class="fa fa-edit"  data-toggle="modal" href="#myModal" id="custId" data-target="#myModal" data-id="<?=$row['id_registrasi'] ?>"></a> |
												<a class="fa fa-trash" href="#" onclick="javascript:batal(<?=$row['id_registrasi']?>)" ></a>
											</td>
											<td><?=$no++?>.</td>
											<td><?=$row['no_registrasi']?></td>
											<td><?php echo $row['evaluator_konselor']?></td>
											<td><?php echo $row['evaluasi_akhir']?></td>
											<td><?php echo $row['catatan']?></td>
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
												<h4 class="modal-title" >Edit Data Penutup	</h4>
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
<!-- Bootstrap Validator -->
<script src="../../assets/vendors/validator/multifield.js"></script>
<script src="../../assets/vendors/validator/validator.js"></script>

<script type="text/javascript">
function batal(id) {
	if(confirm ('Menghapus Data Berarti Membuka Kasus Kembali ?')){
		window.location.href='delete.php?batal=' + id;
	}
}
$(document).ready(function(){
	$('#myModal').on('show.bs.modal', function (e){
		var rowid = $(e.relatedTarget).data('id');
		//Menggunakan fungsi Ajax untuk Pengambilan Data
		$.ajax({
			type: 'post',
			url : 'edit.php',
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
