<?php  
require_once ('../../login/connection.php');
if ($_POST['rowid']){
    $id = $_POST['rowid'];

    $sql = "SELECT * FROM tb_dampak INNER JOIN tb_registrasi  ON tb_dampak.id_registrasi = tb_registrasi.id_registrasi 
    INNER JOIN tb_konselor ON tb_dampak.id_konselor = tb_konselor.id_konselor WHERE id_dampak = '$id'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris){

?>

<form role="form" class="form-horizontal form-label-left" method="post" action="dampak_aksiedit.php" >

        <!-- No Registrasi -->
        <div class="form-group field item row">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name_survivor">No Regisrasi<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <input type="hidden" name="id_dampak" id="id_dampak"  value=" <?php echo $baris['id_dampak'] ?>"/>
                <input type="text" id="no_registrasi" name="no_registrasi" required="required" readonly class="form-control has-feedback-left" value="<?php echo $baris['no_registrasi'] ?>">
                <span class="fa fa-file-text form-control-feedback left"></span>
            </div>
        </div>

        <div class="form-group field item row">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Konselor</label>
            <div class="col-md-6 col-sm-6 ">
                <select class="form-control has-feedback-left" name="nama_konselor" id="nama_konselor" required="required">
                    <option value="<?php echo $baris['id_konselor'] ?>"><?php echo $baris['nama_konselor'] ; ?></option>
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
    
        <!-- Jenis Kasus -->
        <div class="form-group field item row">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="kesehatan_fisik">Kesehatan Fisik<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <textarea name="kesehatan_fisik" id="kesehatan_fisik" required="required" cols="30" rows="5" class="form-control"><?php echo $baris['kesehatan_fisik'] ?></textarea>
                
            </div>
        </div>
        
        <!-- UKDRT Terhadap -->
        <div class="form-group field item row " id="hidden_kdrt">
            <label class="col-form-label col-md-3 col-sm-3 label-align"  for="kesehaan_jiwa">Kesehatan Jiwa<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                
                <textarea name="kesehatan_jiwa" id="kesehatan_jiwa" required="required" cols="30" rows="5" class="form-control"><?php echo $baris['kesehatan_jiwa'] ?></textarea>
                
            </div>
        </div>
        <!-- JENIS KEKERASAN-->
        <div class="form-group field item row">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="per_tdk_sehat">Perilaku Tidak Sehat<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <textarea name="per_tdk_sehat" id="per_tdk_sehat" cols="30" required="required" rows="5" class="form-control"><?php echo $baris['perilaku'] ?></textarea>
                
            </div>
        </div>
        <!-- KETERANGAN KEKERASAN -->
        <div class="form-group field item row">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="kesehatan_reproduksi">Kesehatan Reproduksi<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <textarea id="kesehatan_reproduksi" name="kesehatan_reproduksi" cols="30" rows="5"  required="required" class="form-control  "><?php echo $baris['kesehatan_reproduksi'] ?></textarea>
            </div>
        </div>
        <div class="form-group field item row">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="kondisi_kronis">Kondisi Kronis<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <textarea id="kondisi_kronis" name="kondisi_kronis" cols="30" rows="5" required="required" class="form-control  "><?php echo $baris['kondisi_kronis'] ?></textarea>
            </div>
        </div>
        <div class="form-group field item row">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="ekonomi">Ekonomi<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <textarea id="ekonomi" name="ekonomi" required="required" cols="30" rows="5"  class="form-control  "><?php echo $baris['ekonomi'] ?></textarea>
            </div>
        </div>
        <div class="form-group field item row">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="anak_keluarga">Anak / Keluarga<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <textarea id="anak_keluarga" name="anak_keluarga" cols="30" rows="5"  required="required" class="form-control  "><?php echo $baris['anak_keluarga'] ?></textarea>
            </div>
        </div>
        <div class="form-group field item row">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="lain_lain">Lain-Lain<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <textarea id="lain_lain" name="lain_lain" cols="30" rows="5"  required="required" class="form-control  "><?php echo $baris['lain_lain']; ?></textarea>
            </div>
        </div>
            <div class="ln_solid">
        <div class="form-group">
            <div class="col-md-6 offset-md-3">
                
                <button type='reset'  class="btn btn-danger">Reset</button>
                <button type="submit"  class="btn btn-primary">Edit Data</button>
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
}}
?>