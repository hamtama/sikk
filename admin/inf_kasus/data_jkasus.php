<div class="col-md-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Kelola Data Jenis Kasus </h2>
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
		<button class="btn btn-primary tambah_data" id="1"> <i class="fa fa-plus"> </i> Tambah Data</button>
		<div class="x_content">
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box table-responsive">
						<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th  style="text-align: center; "><i class="fa fa-cog"></i></th>
									<th  style="text-align: center" >No </th>
									<th  style="text-align: center;">Jenis Kasus</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								$query = "SELECT * FROM tb_jenis_kasus";
								$sql_jenis_kasus = mysqli_query($mysqli, $query) or die(mysqli_error($query));
								if(mysqli_num_rows($sql_jenis_kasus) > 0) {
								while ($row = mysqli_fetch_array($sql_jenis_kasus)){
									
								?>
								<tr>
									<td >
										
										<a class="fa fa-edit edit_jkasus" href='#' data-id="<?=$row['id_jkas'] ?>"></a> |
										<a class="fa fa-trash" href="javascript:delete_jkasus(<?=$row['id_jkas']?>)" ></a>
									</td>
									<td style="text-align: center;"><?=$no++?>.</td>
									<td ><?=$row['jenis_kasus']?></td>
									
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