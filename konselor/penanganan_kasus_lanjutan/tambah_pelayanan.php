	<?php
require_once ('../../login/connection.php');

if (isset($_POST['no_layanan'])&& ($_POST['no_reg'])){
    $id_layanan = $_POST['no_layanan'];
    $id_registrasi = $_POST['no_reg'];
    echo $id_layanan;
    switch ($id_layanan) {
        case '1' : 	$layanan = "tb_layanan_konseling_telp"; 
        			$judul ="Konseling Telp";
        			$input ="konseling_telp";
        			$id ="myDatepicker1";
        			$id_p = "id_konseling_telp";
            break;
        case '2' : 	$layanan = "tb_layanan_konsultasi_hukum";
        			$judul ="Konsultasi Hukum";
        			$input ="konsultasi_hukum";
        			$id ="myDatepicker2";
        			$id_p = "id_konsultasi_hukum";
            break;
        case '3' : 	$layanan = "tb_layanan_litigasi";  
        			$judul ="Litigasi";
        			$input ="litigasi";
        			$id ="myDatepicker7";
        			$id2 ="myDatepicker8";
        			$id_p = "id_litigasi";
            break;
        case '4' : 	$layanan = "tb_layanan_home_visite";
        			$judul ="Home Visite";
        			$input ="home_visite";
        			$id ="myDatepicker3";
        			$id_p = "id_home_visite";
            break;
        case '5' : 	$layanan = "tb_layanan_medis";
        			$judul ="Medis";
        			$input ="medis";
        			$id ="myDatepicker4";
        			$id_p = "id_medis";
            break;
        case '6' : 	$layanan = "tb_layanan_shelter";
        			$judul ="Shelter";
        			$input ="shelter";
        			$id ="myDatepicker9";
        			$id2 ="myDatepicker10";
        			$id_p = "id_shelter";
            break;
        case '8' : 	$layanan = "tb_layanan_support_group";
        			$judul ="Support Group";
        			$input = "support_group";
        			$id ="myDatepicker5";
        			$id_p = "id_support_group";
            break;
        case '10': 	$layanan = "tb_layanan_aspirasi";
        			$judul ="Aspirasi Lainnya";
        			$input ="aspirasi_lainnya";
        			$id ="myDatepicker6";
        			$id_p = "id_aspirasi";
            break;
    }
	if ($id_layanan == 3 || $id_layanan == 6){
			?>
			<!-- NAMA KONSELOR -->
			<form action="../penanganan_kasus_lanjutan/aksitambah.php" method="post">
				<div class="form-group field item row">
	                <label for="middle-name" class="col-form-label col-md-3 col-sm-3">Konselor<span class="required">*</span></label>
	                <div class="col-md-9 col-sm-9 ">
	                	<input type="hidden" name="judul" id="judul" value="Tambah Data <?=$judul?>">
	                	<input type="hidden" name="id_layanan" id="id_layanan" value="<?=$id_layanan?>">
	                	<input type="hidden" name="id_registrasi" id="id_registrasi" value="<?=$id_registrasi?>">
	                    <select class="form-control has-feedback-left" name="nama_konselor" id="nama_konselor" required="require">
	                        <option value="">-- Pilih Konselor --</option>
	                        '+<?php  
	                            $sql_konselor = mysqli_query($mysqli, "SELECT * FROM tb_konselor WHERE 1 ORDER BY id_konselor ASC") or die (mysqli_error($mysqli));
	                            while ($row = mysqli_fetch_array($sql_konselor)){
	                                echo '<option value="'.$row['id_konselor'].'">'.$row['nama_konselor'].'</option> ';
	                            }
	                        ?>+'
	                    </select>
	                    <span class="fa fa-user form-control-feedback left"></span>
	                </div>
	            </div>
	       	 	<!-- TANGGAL-->
				<div class="form-group  field item row">
					<label class="col-form-label col-md-3 col-sm-3"  for="<?=$judul?>">'Awal <?=$judul?><span class="required">*</span></label>
					<div class="col-sm-9 col-md-9">
						<div class="input-group date" id="<?=$id?>">
							<input type="text" class="form-control" name="tanggal_awal"  required="required">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
						</div>
					</div>
				</div>
				<div class="form-group field item row">
					<label class="col-form-label col-md-3 col-sm-3" for="<?=$judul?>">Akhir <?=$judul?><span class="required">*</span></label>
					<div class="col-sm-9 col-md-9">
						<div class="input-group date" id="<?=$id2?>">
							<input type="text" class="form-control" name="tanggal_akhir"  required="required">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
						</div>
					</div>
				</div>
				<!-- KEGIATAN -->
				<div class="form-group field item row">
					<label class="col-form-label col-md-3 col-sm-3" for="kegiatan">Kegiatan<span class="required">*</span></label>
					<div class="col-md-9 col-sm-9">
						<input type="text" name="kegiatan" class="form-control has-feedback-left" required="required">
						<span class="fa fa-calendar form-control-feedback left"></span>
					</div>
				</div>
				<div class="form-group field item row">
					<label class="col-form-label col-md-3 col-sm-3" for="informasi">Informasi dan Kesepakatan<span class="required">*</span></label>
					<div class="col-md-9 col-sm-9">
						<input type="text" name="inf_kesepakatan" class="form-control has-feedback-left" required="required">
						<span class="fa fa-gavel form-control-feedback left"></span>
					</div>
				</div>
				<div class="ln_solid">
                <div class="form-group">
                    <div class="col-md-6 offset-md-3">
                        <button type='reset'  class="btn btn-danger">Reset</button>
                        <button type="submit" id="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
           		</div>
			</form>
			<?php
	} else {
		
			?>
			<form action="../penanganan_kasus_lanjutan/aksitambah.php" method="post">
				<!-- NAMA KONSELOR -->
				<div class="form-group field item row">
	                <label for="middle-name" class="col-form-label col-md-3 col-sm-3">Konselor<span class="required">*</span></label>
	                <div class="col-md-9 col-sm-9 ">
	                	<input type="hidden" name="judul" id="judul" value="Tambah Data <?=$judul?>">
	                	<input type="hidden" name="id_registrasi" id="id_registrasi" value="<?=$id_registrasi?>">
	                	<input type="hidden" name="id_layanan" id="id_layanan" value="<?=$id_layanan?>">
	                    <select class="form-control has-feedback-left" name="nama_konselor" id="nama_konselor" required="required">
	                        <option value="">-- Pilih Konselor --</option>
	                        <?php  
	                            $sql_konselor = mysqli_query($mysqli, "SELECT * FROM tb_konselor WHERE 1 ORDER BY id_konselor ASC") or die (mysqli_error($mysqli));
	                            while ($row = mysqli_fetch_array($sql_konselor)){
	                                echo '<option value="'.$row['id_konselor'].'">'.$row['nama_konselor'].'</option> ';
	                            }
	                        ?>
	                    </select>
	                    <span class="fa fa-user form-control-feedback left"></span>
	                </div>
	            </div>
	       	 	<!-- TANGGAL-->
				<div class="form-group field item row">
					<label class="col-form-label col-md-3 col-sm-3"  for="<?=$judul?>"><?=$judul?><span class="required">*</span></label>
					<div class="col-sm-9 col-md-9">
						<div class="input-group date" id="<?=$id?>">
							<input type="text" class="form-control" name="tanggal" required="required">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
						</div>
					
					</div>
				</div>
				<!-- KEGIATAN -->
				<div class="form-group field item row">
					<label class="col-form-label col-md-3 col-sm-3" for="kegiatan">Kegiatan<span class="required">*</span></label>
					<div class="col-md-9 col-sm-9">
						<input type="text" name="kegiatan" class="form-control has-feedback-left" required="required">
						<span class="fa fa-calendar form-control-feedback left"></span>
					</div>
				</div>
				<div class="form-group field item row">
					<label class="col-form-label col-md-3 col-sm-3" for="informasi">Informasi dan Kesepakatan<span class="required">*</span></label>
					<div class="col-md-9 col-sm-9">
						<input type="text" name="inf_kesepakatan" class="form-control has-feedback-left" required="required">
						<span class="fa fa-gavel form-control-feedback left"></span>
					</div>
				</div>
				<div class="ln_solid">
	                <div class="form-group">
	                    <div class="col-md-6 offset-md-3">
	                        <button type='reset'  class="btn btn-danger">Reset</button>
	                        <button type="submit" id="submit" class="btn btn-success">Simpan</button>
	                    </div>
	                </div>
	            </div>
	        </form>
		<?php
	}
}
?>
<!-- bootstrap DateTimePicker JS -->
<script src="../../assets/vendors/moment/min/moment-with-locales.js"></script>
<script src="../../assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- Date Dropdown -->
<script src="../../assets/vendors/validator/multifield.js"></script>
<script src="../../assets/vendors/validator/validator.js"></script>
<script type="text/javascript">
$('#myDatepicker1,#myDatepicker2,#myDatepicker3,#myDatepicker4,#myDatepicker5,#myDatepicker6,#myDatepicker7,#myDatepicker8,#myDatepicker9,#myDatepicker10').datetimepicker({
        format: 'DD.MMMM.YYYY'
    })

// initialize a validator instance from the "FormValidator" constructor.
// A "<form>" element is optionally passed as an argument, but is not a must
    var validator = new FormValidator({ "events": ['blur', 'input', 'change'] }, document.forms[0]);
    // on form "submit" event
    document.forms[0].onsubmit = function (e) {
    var submit = true,
    validatorResult = validator.checkAll(this);
    console.log(validatorResult);
    return !!validatorResult.valid;
    };
    // on form "reset" event
    document.forms[0].onreset = function (e) {
    validator.reset();
    };
    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function () {
    validator.settings.alerts = !this.checked;
    if (this.checked)
    $('form .alert').remove();
    }).prop('checked', false);
</script>