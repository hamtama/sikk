<?php
require_once ('../../login/connection.php');
if (isset($_POST['rowid'])){
$response ='';
$id = $_POST['rowid'];

$sql = "SELECT * FROM tb_jenis_kekerasan WHERE id_jk = '$id'";
$result = $mysqli->query($sql);

$response .='<form role="form" class="" id="form" name="form2" action="aksiedit_jkekerasan.php" method="post">;';
while ($row = mysqli_fetch_array($result)) {


$response .='

    <div class="field item form-group">;
        <input type="hidden" name="id_jk" id="id_jk"  value="'.$row["id_jk"].'"/>;
        <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Kekerasan<span class="required">*</span></label>;
        <div class="col-md-6 col-sm-6">
            <input class="form-control" class="name" id="jenis_kekerasan" name="jenis_kekerasan" required="required" type="text" value="'.$row['jenis_kekerasan'].'" />
        </div>
    </div>
    <div class="ln_solid">
        <div class="form-group">
            <div class="col-md-6 offset-md-3">
                
                <button type="reset"  class="btn btn-success">Reset</button>
                <button type="submit"  class="btn btn-primary">Save changes</button>
                
            </div>
        </div>
    </div>';
   } 
$response .='</form>';

                
echo $response;
   }             
                             

?>
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
