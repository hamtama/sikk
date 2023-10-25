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
					<h2>Data Kelola Dampak Yang Diakibatkan</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown">
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<button class="btn btn-primary"  onclick="javascript:window.location=('tambah.php')" > <i class="fa fa-plus"> </i> Tambah Data</button>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box table-responsive">
								<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th style="text-align: center;"><i class="fa fa-cog"></i></th>
											<th>No</th>
											<th>No. Reg</th>
											<th>Kesehatan Fisik</th>
											<th>Kesehatan Jiwa</th>
											<th>Perilaku</th>
											<th>Kesehatan Reproduksi</th>
											
											
										
									</thead>
									<tbody>
										<?php
										$no = 1;
										$query = "SELECT * FROM tb_dampak 
										INNER JOIN tb_registrasi ON tb_dampak.id_registrasi = tb_registrasi.id_registrasi
										INNER JOIN tb_konselor ON tb_dampak.id_konselor = tb_konselor.id_konselor WHERE 1 ORDER BY id_dampak DESC";
										$sql_dampak = mysqli_query($mysqli, $query) or die(mysqli_error($query));
										if(mysqli_num_rows($sql_dampak) > 0) {
										while ($row = mysqli_fetch_array($sql_dampak)){
											
										?>
										<tr>
											<td class="">
												
												<a class="fa fa-edit edit_data"  data-toggle="modal" href="#myModal" id="custId" data-target="#myModal" data-id="<?=$row['id_dampak'] ?>"></a> |
												<a class="fa fa-eye lihat_data"  data-toggle="modal" href="#myModal" id="custId" data-target="#myModal" data-id="<?=$row['id_dampak'] ?>"></a> |
												<a class="fa fa-trash" href="javascript:delete_id(<?=$row['id_dampak']?>)" ></a> 
												
											</td>
											<td><?=$no++?>.</td>
											<td><?=$row['no_registrasi']?></td>
											<td><?php echo $row['nama_konselor']?></td>
											<td><?php echo $row['kesehatan_fisik']?></td>
											<td><?php echo $row['kesehatan_jiwa']?></td>
											<td><?php echo $row['perilaku'] ?></td>
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
												<h4 class="modal-title" >Kelola Data Dampak Yang Diakibatkan</h4>
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
function delete_id(id) {
	if(confirm ('Anda Serius Untuk Menghapus Data ?')){
		window.location.href='dampak_delete.php?delete_id=' + id;
	}
}
$(document).ready(function(){
	$('.edit_data').click( function (){
		$('#myModal').modal('show');
		
		var rowid = $(this).data('id');
		//Menggunakan fungsi Ajax untuk Pengambilan Data
		$.ajax({
			type: 'post',
			url : 'dampak_edit.php',
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
			url : 'dampak_lihat.php',
			data: 'rowid=' + rowid,
			success : function(response){
				$('.fetched-data').html(response);//menampilkan data ke dalam modal
			}
		});
	});
});
</script>
<?php
require_once ('../../layout/wrapperkonselor/footer.php');
?>