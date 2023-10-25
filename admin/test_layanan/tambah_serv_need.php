<div class="card">
	<div class="card-header">
		1. LAYANAN YANG DIBUTUHKAN
	</div>
	<div class="card-body">
		<div class="col-sm-12 col-md-12">
			<?php  
				$sql_layanan = mysqli_query($mysqli, "SELECT * FROM tb_layanan WHERE 1 ORDER BY id_layanan ASC") or die (mysqli_error($mysqli));
				while ($row = mysqli_fetch_array($sql_layanan)){
					echo '
					<div class="col-sm-4 col-md-4">
						<div class="form-group row">
							<div class="icheck-greensea" data-validate-checked="checkbox">
								<input type="checkbox" class="penanganan_kasus lyb'.$row['id_layanan'].'" id="layanan'.$row['id_layanan'].'" data-id="penanganan_kasus"  name="penanganan_kasus[]" value="'.$row['id_layanan'].'">
								<label for="layanan'.$row['id_layanan'].'">'.$row['nama_layanan'].'</label>
							</div>
						</div>
					</div>
					';
				}
			?>
		<!-- ASPIRASI LAINNYA-->
		</div>
		<div class="form-group field item row" style="display: none;" id="hidden_penanganan">
			<div class="col-md-4 col-sm-4 ">
				<input type="text" id="aspirasi_lainnya"  name="aspirasi_lainnya" class="form-control has-feedback-left ">
				<span class="fa fa-file-text form-control-feedback left"></span>
			</div>
		</div>
	</div>
</div>