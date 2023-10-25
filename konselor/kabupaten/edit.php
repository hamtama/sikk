<?php  
require_once ('../../login/connection.php');
if ($_POST['rowid']){
    $id = $_POST['rowid'];

    $sql = "SELECT * FROM tb_kabupaten WHERE id_kabupaten = '$id'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris){

?>
<form role="form" class=""  action="aksiedit.php" method="post">
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">Kode Kemendagri<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
        	<input class="form-control" id="id_kabupaten" name="id_kabupaten" required="required" type="hidden" value="<?php echo $baris['id_kabupaten'] ?>" />
            <input class="form-control" id="kode_kemendagri" name="kode_kemendagri" required="required" type="text" value="<?php echo $baris['kode_kemendagri'] ?>" />
        </div>
    </div>
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">Kabupaten<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input class="form-control" id="kabupaten" name="kabupaten" required="required" type="text" value="<?php echo $baris['kabupaten'] ?>" />
        </div>
    </div>
    <div class="ln_solid">
        <div class="form-group">
            <div class="col-md-6 offset-md-3">
                
                <button type='reset'  class="btn btn-success">Reset</button>
                <button type="submit"  class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</form>

<!-- bootstrap-daterangepicker -->
<script src="../../assets/vendors/validator/multifield.js"></script>
<script src="../../assets/vendors/validator/validator.js"></script>

<script type="text/javascript">
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
}
?>