<?php
require_once ('../../login/connection.php');
if ($_POST['rowid']){
$id = $_POST['rowid'];
$sql = "SELECT * FROM tb_ket_kasus INNER JOIN tb_registrasi  ON tb_ket_kasus.id_registrasi = tb_registrasi.id_registrasi WHERE id_ket_kasus = '$id'";
$result = $mysqli->query($sql);
foreach ($result as $baris){
?>
<form class="form-horizontal form-label-left"    action="ket_kasus_aksiedit.php" method="post" role="form"><
    
    <!-- No Registrasi -->
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="sejak_kapan">No Registrasi<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input type="hidden" name="id_ket_kasus" id="id_ket_kasus" class="form-control" value="<?php echo $baris['id_ket_kasus'] ?>">
            <input type='text' name="sejak_kapan" id="sejak_kapan" cols="30" rows="5" readonly class="form-control has-feedback-left" value="<?php echo $baris['no_registrasi'] ?>">
            <span class="fa fa-file-text form-control-feedback left"></span>
            
        </div>
    </div>
    <!-- Jenis Kasus -->
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="sejak_kapan">Sejak Kapan Terjadi Kekerasan<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <textarea name="sejak_kapan" id="sejak_kapan" cols="30" required="required" rows="5" class="form-control"><?php echo $baris['sejak_kapan'] ?></textarea>
            
        </div>
    </div>
    
    <!-- UKDRT Terhadap -->
    <div class="form-group field item row " id="hidden_kdrt">
        <label class="col-form-label col-md-3 col-sm-3 label-align"  for="faktor_pemicu">Faktor Pemicu<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            
            <textarea name="faktor_pemicu" id="faktor_pemicu" cols="30" rows="5" class="form-control"><?php echo $baris['faktor'] ?></textarea>
            
        </div>
    </div>
    <!-- JENIS KEKERASAN-->
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="serberapa_sering">Seberapa Sering Dilakukan<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <textarea name="seberapa_sering" id="serberapa_sering" cols="30" rows="5" class="form-control"><?php echo $baris['seberapa_sering'] ?></textarea>
            
        </div>
    </div>
    <!-- KETERANGAN KEKERASAN -->
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="upaya_yg_dilakukan">Upaya Yang Pernah Dilakukan<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <textarea id="upaya_yg_dilakukan" name="upaya_yg_dilakukan" cols="30" rows="5"  required="required" class="form-control"><?php echo $baris['upaya_yg_dilakukan'] ?></textarea>
        </div>
    </div>
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="melibatkan_pihak">Pihak Yang Pernah Dilibatkan<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <textarea id="melibatkan_pihak" name="melibatkan_pihak" cols="30" rows="5" required="required" class="form-control"><?php echo $baris['pihak_yg_dilibatkan'] ?></textarea>
        </div>
    </div>
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="hasilnya">Hasilnya<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <textarea id="hasilnya" name="hasilnya" required="required" cols="30" rows="5"  class="form-control"><?php echo $baris['hasilnya'] ?></textarea>
        </div>
    </div>
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="harapan_korban">Harapan Korban Apa yang Diinginkan<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <textarea id="harapan_korban" name="harapan_korban" cols="30" rows="5"  required="required" class="form-control"><?php echo $baris['harapan_korban'] ?></textarea>
        </div>
    </div>
    
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="harapan_korban">Narasi<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <textarea id="narasi_kasus" name="narasi_kasus" cols="50" rows="10"  required="required" class="form-control"><?php echo $baris['narasi'] ?></textarea>
        </div>
    </div>
        
        <br />
        <div class="ln_solid">
            <div class="form-group">
                <div class="col-md-6 offset-md-3">
                    
                    <button type='reset'  class="btn btn-success">Reset</button>
                    <button type="submit"  class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    
    
</form>
<!-- bootstrap Validator JS -->
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