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
					<h2>Data Detail Informasi Kasus</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown">
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>

				</div>
				<button class="btn btn-success"  onclick="javascript:window.location=('inf_kasus_data.php')" > <i class="fa fa-eye"> </i> Data Inf Kasus</button>
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
											<th style="text-align: center;">Nama Korban</th>
											<th style="text-align: center;">Kasus</th>
											<th style="text-align: center;">KDRT</th>
											
										</tr>
									</thead>
									<tbody>
										<?php

										if (isset($_GET['detail'])){
										    $id = $_GET['detail'];
										    $no = 1;
										    $sql = "SELECT * FROM tb_informasi_kasus 
										    INNER JOIN tb_registrasi ON tb_informasi_kasus.id_registrasi = tb_registrasi.id_registrasi
										    INNER JOIN tb_identitas_survivor ON tb_identitas_survivor.id_registrasi = tb_informasi_kasus.id_registrasi
										    INNER JOIN tb_jenis_kasus ON tb_jenis_kasus.id_jkas = tb_informasi_kasus.kasus 
										    LEFT JOIN tb_kdrt ON tb_kdrt.id_kdrt = tb_informasi_kasus.id_kdrt
										    WHERE tb_informasi_kasus.id_registrasi = '$id'";
										    $result = $mysqli->query($sql);
										    while($row = mysqli_fetch_array($result)){
										        $no_registrasi = $row['id_registrasi'];
										        $kasus = $row['kasus'];
										        $kdrt = $row[3];
										?>
										<tr>
											<td style="width:10%" >
												<a class="fa fa-edit edit_data" data-toggle="modal" href="#myModal" id="<?php if($kdrt == 0) { echo '1';} else {echo $kdrt;}?>" data-target="#myModal" data-id="<?=$row['kasus'] ?>">Edit Data</a> 
											</td>
											<td ><?=$no++?>.</td>
											<td ><?=$row['no_registrasi']?></td>
											<td><?=$row['nama']?></td>
											<td ><?=substr($row['jenis_kasus'],0,4)?></td>
											<td ><?php if($kdrt == '0') {echo '-';} else {echo substr($row['kdrt'],0,4);} ?></td>
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
												<h4 class="modal-title" >Edit Data Informasi Kasus</h4>
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
	$('.edit_data').click( function (){
		$('#myModal').modal('show');
		var id_kasus = $(this).data('id');
		var id_kdrt = $(this).attr('id');
		var id = <?php echo $id ?>;
		//Menggunakan fungsi Ajax untuk Pengambilan Data
		$.ajax({
			type: 'post',
			url : 'inf_kasus_edit.php',
			data: {id_kasus : id_kasus,
					id_kdrt : id_kdrt,
					id : id},
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

