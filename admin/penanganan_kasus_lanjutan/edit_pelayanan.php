<?php
require_once ('../../layout/wrapperadmin/head.php');
require_once ('../../layout/wrapperadmin/sidebar.php');
require_once ('../../layout/wrapperadmin/header.php');
require_once ('../../layout/wrapperadmin/content.php');

if (isset($_GET['no_layanan'])&& ($_GET['no_reg'] )){
    $id_layanan = $_GET['no_layanan'];
    $id_registrasi = $_GET['no_reg'];

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

?>

 <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    

                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown"></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>

                    <div class="clearfix"></div>
                    <button  class="btn btn-info" onclick="javascript:history.go(-1)">Lihat Data</button>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <form role="form" class=""  action="../penanganan_kasus_lanjutan/aksiedit.php" method="post">
                                <div class="card pt-3 pb-3">
                                    <div class="card-header">
                                        <h2 align="center">Konsultasi Berkala Layanan <?=$judul?> </h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-2 label-align">No Registrasi<span class="required">*</span></label>
                                            <div class="col-md-4 col-sm-4">
        					                	<input type="hidden" style="display: none" name="id_layanan" id="id_layanan" value="<?=$id_layanan?>">
        					                	<input type="hidden" style="display: none" name="id_registrasi" id="id_registrasi" value="<?=$id_registrasi?>">
                                                <input class="form-control" readonly class='name' id="no_registrasi[]" name="id_registrasi[]" required="required" type="text" value="<?php echo $id_registrasi; ?>" />
                                            </div>
                                        </div>
                                        <?php
                                        	if ($layanan == 'tb_layanan_litigasi' || $layanan == 'tb_layanan_shelter') {
                                        		$sql_layanan = "SELECT * FROM $layanan 
        	                                	INNER JOIN tb_konselor ON $layanan.id_konselor = tb_konselor.id_konselor 
        	                                	WHERE id_registrasi='$id_registrasi' "; 
        	                                	$result = mysqli_query($mysqli, $sql_layanan)or die(mysqli_error($sql_layanan));
        									    if(mysqli_num_rows($result) > 0 ){
        									        while ($baris = mysqli_fetch_array($result)){
                                                        $tanggal = strtotime($baris[3]);
                                                        $tanggal = date("d-M-Y",$tanggal);
                                                        $tanggal1 = strtotime($baris[4]);
                                                        $tanggal1 = date("d-M-Y",$tanggal1);
        									        	?>
        									        	<div class="col-sm-6 col-md-6" id="hidden_home_visite" >
        									        		<div class="shadow-sm bg-light p-3 m-2">
        										        		<!-- NAMA KONSELOR -->
        														<div class="form-group field item row">
        						                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3">Konselor<span class="required">*</span></label>
        						                                    <div class="col-md-9 col-sm-9 ">
        						                                    	<input type="text" style="display: none;" name="id[]" value="<?=$baris[$id_p];?>">
        						                                        <select class="form-control has-feedback-left" name="nama_konselor[]" id="nama_konselor" required>
        						                                            <option value="<?= $baris['id_konselor'];?>"><?=$baris['nama_konselor'];?></option>
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
        														<div class="form-group  field item row">
        															<label class="col-form-label col-md-3 col-sm-3"  for="<?=$judul?>">Awal <?=$judul?><span class="required">*</span></label>
        															<div class="col-sm-9 col-md-9">
                                                                        <div class="input-group date" id="<?=$id?>" >
        																    <input type="text" class="form-control" name="tanggal_awal[]" value="<?=$tanggal;?>" required>
                                                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                                        </div>                                                            
        															</div>
        														</div>
        														<div class="form-group field item row">
        															<label class="col-form-label col-md-3 col-sm-3" for="<?=$judul?>">Akhir <?=$judul?><span class="required">*</span></label>
        															<div class="col-sm-9 col-md-9">
                                                                        <div class="input-group date" id="<?=$id2?>" >
        																    <input type="text" class="form-control" name="tanggal_akhir[]" value="<?=$tanggal1;?>">
                                                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                                        </div>
        															</div>
        														</div>
        														<!-- KEGIATAN -->
        														<div class="form-group field item row">
        															<label class="col-form-label col-md-3 col-sm-3" for="kegiatan">Kegiatan<span class="required">*</span></label>
        															<div class="col-md-9 col-sm-9">
        																<input type="text" name="kegiatan[]" id="keg_<?=$input?>" required  class="form-control has-feedback-left" value="<?=$baris[5]; ?>">
        																<span class="fa fa-calendar form-control-feedback left"></span>
        															</div>
        														</div>
        														<div class="form-group field item row">
        															<label class="col-form-label col-md-3 col-sm-3" for="informasi">Informasi dan Kesepakatan<span class="required">*</span></label>
        															<div class="col-md-9 col-sm-9">
        																<input type="text" name="inf_kesepakatan[]" id="inf_<?=$input?>" required class="form-control has-feedback-left" value="<?=$baris[6];?>" >
        																<span class="fa fa-gavel form-control-feedback left"></span>
        															</div>
        														</div>
        													</div>
        												</div>
        												<?php
        											}
        											
        										} else {
        											echo "Data Tidak Ditemukan";
        									 	}
                                        	} else {
                                        		$sql_layanan = "SELECT * FROM $layanan 
        	                                	INNER JOIN tb_konselor ON $layanan.id_konselor = tb_konselor.id_konselor 
        	                                	WHERE id_registrasi='$id_registrasi' ";  
        									    $result = mysqli_query($mysqli, $sql_layanan)or die(mysqli_error($sql_layanan));
        									    if(mysqli_num_rows($result) > 0 ){
        									        while ($baris = mysqli_fetch_array($result)){
                                                        $tanggal = strtotime($baris[3]);
                                                        $tanggal = date("d-M-Y",$tanggal);
            	                                        ?>
            	                                	      <!-- TANGGAL-->
                										<div class="col-sm-6 col-md-6">
                											<div class="shadow-sm bg-light p-3 m-2">
                											     <!-- NAMA KONSELOR -->
                												<div class="form-group field item row">
                				                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3">Konselor<span class="required">*</span></label>
                				                                    <div class="col-md-9 col-sm-9 ">
                				                                    	<input type="text" style="display: none;" name="id[]" value="<?=$baris[$id_p];?>">
                				                                        <select class="form-control has-feedback-left" name="nama_konselor[]" id="nama_konselor" required>
                				                                            <option value="<?=$baris['id_konselor'];?>"><?=$baris['nama_konselor'];?></option>
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
                												<div class="form-group  field item row">
                													<label class="col-form-label col-md-3 col-sm-3"  for="<?=$judul?>"><?=$judul?><span class="required">*</span></label>
                													<div class="col-sm-9 col-md-9">
                                                                        <div class="input-group date" id="<?=$id?>">
                													       <input type="text"  class="form-control" name="tanggal[]"  value="<?=$tanggal?>">
                                                                           <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                                        </div>
                													</div>
                												</div>
                												<!-- KEGIATAN -->
                												<div class="form-group field item row">
                													<label class="col-form-label col-md-3 col-sm-3" for="kegiatan">Kegiatan<span class="required">*</span></label>
                													<div class="col-md-9 col-sm-9">
                														<input type="text" name="kegiatan[]" id="keg_<?=$input?>[]"  class="form-control has-feedback-left" value="<?=$baris[4];?>">
                														<span class="fa fa-calendar form-control-feedback left"></span>
                													</div>
                												</div>
                												<div class="form-group field item row">
                													<label class="col-form-label col-md-3 col-sm-3" for="informasi">Informasi dan Kesepakatan<span class="required">*</span></label>
                													<div class="col-md-9 col-sm-9">
                														<input type="text" name="inf_kesepakatan[]" id="inf_<?=$input?>" class="form-control has-feedback-left" value="<?=$baris[5];?>" >
                                                                        
                														<span class="fa fa-gavel form-control-feedback left"></span>
                													</div>
                												</div>
                											</div>
                										</div>
            										    <?php
        											}
    											} else {
    												echo "Data Tidak Ditemukan";
    										 	}	
                                        	}
        									?>
                                    </div>
                                    <div class="card-footer" align="center">
                                        <div class="form-group">
                                            <div class="col-md-6 offset-md-3">
                                                <button type='reset'  class="btn btn-danger">Reset</button>
                                                <button type="submit"  class="btn btn-primary">Edit Data</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
<?php
}
	require_once ('../../layout/wrapperadmin/footer.php');
?>
