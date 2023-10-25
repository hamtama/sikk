<?php
require_once ('../../layout/wrapperkonselor/head.php');
require_once ('../../layout/wrapperkonselor/sidebar.php');
require_once ('../../layout/wrapperkonselor/header.php');
require_once ('../../layout/wrapperkonselor/content.php');
?>
<div class="">
	
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 ">
			<div class="x_panel">
				<div class="x_title">
					<h2>Kelola Data Kabupaten </h2>
					<ul class="nav navbar-right panel_toolbox">
						<li>
							<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						</li>
						<li>
							<a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<button class="btn btn-primary"  onclick="javascript:window.location=('tambah.php')" > <i class="fa fa-plus"> </i> Tambah Data</button>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-6">
							<div class="card-box table-responsive">
								<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th  style="text-align: center; "><i class="fa fa-cog"></i></th>
											<th  style="text-align: center" >No </th>
											<th  style="text-align: center;">Kode Kemendagri</th>
											<th  style="text-align: center;">Kabupaten</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$query = "SELECT * FROM tb_kabupaten";
										$sql_kabupaten = mysqli_query($mysqli, $query) or die(mysqli_error($query));
										if(mysqli_num_rows($sql_kabupaten) > 0) {
										while ($row = mysqli_fetch_array($sql_kabupaten)){
											
										?>
										<tr>
											<td >
												
												<a class="fa fa-edit edit_data"  data-toggle="modal" href="#myModal" id="custId" data-target="#myModal" data-id="<?=$row['id_kabupaten'] ?>"></a> | 
												<a class="fa fa-trash" href="javascript:delete_id(<?=$row['id_kabupaten']?>)" ></a>
											</td>
											<td style="text-align: center;"><?=$no++?>.</td>
											<td ><?=$row['kode_kemendagri']?></td>
											<td><?= $row['kabupaten'] ?></td>
											
										</tr>
										<?php
										}
										} else {
											echo "<tr><td colspan=\"5\" align=\"center\"> Data Tidak Ditemukan </td></tr>";
										}
										?>
									</tbody>
								</table>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade bs-example-modal-lg"  id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" >Edit Data Kabupaten</h4>
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
<script src="../../assets/vendors/validator/multifield.js"></script>
<script src="../../assets/vendors/validator/validator.js"></script>

<script type="text/javascript">
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

function delete_id(id) {
	if(confirm ('Anda Serius Untuk Menghapus Data ?')){
		window.location.href='delete.php?delete_id=' + id;
	}
}

</script>
<?php
	require_once ('../../layout/wrapperkonselor/footer.php');
?>

