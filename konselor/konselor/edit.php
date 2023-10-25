
<?php  
require_once ('../../login/connection.php');
if ($_POST['rowid']){
    $id = $_POST['rowid'];

    $sql = "SELECT * FROM tb_konselor WHERE id_konselor = '$id'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris){



?>
<form role="form" class=""  action="aksiedit.php" method="post">
    <div class="field item form-group">
        <input type="hidden" name="id_konselor" id="id_konselor"  value=" <?php echo $baris['id_konselor'] ?>"/>
        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Konselor<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input class="form-control" class='name' id="nama_konselor" name="nama_konselor" required="required" type="text" value="<?php echo $baris['nama_konselor'];?>" />
        </div>
    </div>
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">Bidang Keahlian<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input class="form-control" class='name' id="bidang_keahlian" name="bidang_keahlian" required="required" type="text" value="<?php echo $baris['bidang_keahlian'];?>" />
        </div>
    </div>
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input class="form-control" class='name' id="alamat" name="alamat" required="required" type="text" value="<?php echo $baris['alamat'];?>" />
        </div>
    </div>
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">No. Telp<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input class="form-control" class='tel' id="no_telp" maxlength="13"  name="no_telp" required="required" type="tel" value="<?php echo $baris['no_telp'];?>" />
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
<script src="../style/Jquery.min.js"></script>
<script src="../../assets/vendors/validator/multifield.js"></script>
<script src="../../assets/vendors/validator/validator.js"></script>
<script src="../../assets/vendors/bootstrap-toggle/bootstrap-toggle.js"></script>
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