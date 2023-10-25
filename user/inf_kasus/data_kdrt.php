<div class="col-md-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Kelola Informasi Kasus KDRT</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
				<li class="dropdown">
				</li>
				<li><a class="close-link"><i class="fa fa-close"></i></a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<button class="btn btn-primary tambah_data" id="2"> <i class="fa fa-plus"> </i> Tambah Data</button>
		<div class="x_content">
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box table-responsive">
						
						<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th style="text-align: center; "><i class="fa fa-cog"></i></th>
									<th>No </th>
									<th>Jenis Kasus</th>
									
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								$query = "SELECT * FROM tb_kdrt";
								$sql_inf_kasus_kdrt = mysqli_query($mysqli, $query) or die(mysqli_error($query));
								if(mysqli_num_rows($sql_inf_kasus_kdrt) > 0) {
								while ($row = mysqli_fetch_array($sql_inf_kasus_kdrt)){
									
								?>
								<tr>
									<td >
										
										<a class="fa fa-edit edit_kdrt" href="#" data-id="<?=$row['id_kdrt'] ?>"></a> |
										<a class="fa fa-trash" href="javascript:delete_kdrt(<?=$row['id_kdrt']?>)" ></a>
									</td>
									<td><?=$no++?>.</td>
									<td><?=$row['kdrt']?></td>
									
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