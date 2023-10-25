<?php  
require_once ('../../login/connection.php');
if ($_POST['rowid']){
    $id = $_POST['rowid'];

    $sql = "SELECT * FROM tb_triwulan WHERE id_triwulan = '$id'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris){
        $tanggal_awal   = strtotime($baris['awal']);
        $tgl_awal       = date("d-M-Y",$tanggal_awal);
        $tanggal_akhir  = strtotime($baris['akhir']);
        $tgl_akhir      = date("d-M-Y",$tanggal_akhir);

?>

                            <form role="form" class=""  action="aksiedit.php" method="post">
                                <div class="field item row form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Kategori Bulan<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="hidden" name="id_triwulan" value="<?=$baris['id_triwulan']?>">
                                        <input class="form-control has-feedback-left" name="kategori" required="required" type="text" value="<?=$baris['kategori_bulan'] ?>" />
                                        <span class="fa fa-calendar form-control-feedback left"></span>
                                    </div>
                                </div>
                                <div class="field item row form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Awal<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="input-group date" id="myDatepicker2">
                                            <input type="text"  id="myDatepicker2" value="<?=$tgl_awal ?>" name="tanggal_awal" required="required" class="form-control has-feedback-left ml-0">
                                            <span class="fa fa-calendar form-control-feedback left"></span>
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="field item row form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Akhir<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="input-group date" id="myDatepicker" >
                                            <input type="text"  id="myDatepicker" value="<?=$tgl_akhir ?>" name="tanggal_akhir" required="required" class="form-control has-feedback-left ml-0">
                                            <span class="fa fa-calendar form-control-feedback left"></span>
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            
                                            <button type='reset'  class="btn btn-success">Reset</button>
                                            <button type="submit"  class="btn btn-primary">Simpan</button>
                                            <button  class="btn btn-info" onclick="javascript:window.location=('data.php')">Lihat Data</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
<?php }} ?>

<!-- bootstrap DateTimePicker JS -->
<script src="../../assets/vendors/moment/min/moment-with-locales.js"></script>

<script src="../../assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- bootstrap-Validator -->
<script src="../../assets/vendors/validator/multifield.js"></script>
<script src="../../assets/vendors/validator/validator.js"></script>

<script type="text/javascript">
    $('#myDatepicker').datetimepicker({
        format: 'DD.MMMM.YYYY'
    });
    $('#myDatepicker2').datetimepicker({
        format: 'DD.MMMM.YYYY'
    }); 
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