<?php  
require_once ('../../login/connection.php');
if ($_POST['rowid']){
    $id = $_POST['rowid'];

    $sql = "SELECT * FROM tb_registrasi INNER JOIN tb_konselor ON tb_registrasi.id_konselor = tb_konselor.id_konselor WHERE id_registrasi = '$id'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris){
     $tgl =   strtotime($baris['hari_tanggal']);
     $tanggal = date("d-M-Y",$tgl);

?>
<!-- FORM HOME PAGE -->
<form role="form" class="" method="post" action="no_reg_aksiedit.php" >  
        <div class="form-group field item row">
            <input type="hidden" name="id_registrasi" id="id_registrasi"  value=" <?php echo $baris['id_registrasi'] ?>"/>
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_registrasi">No. Registrasi <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="no_registrasi" name="no_registrasi" required='required' class="form-control has-feedback-left" readonly required="required" value="<?php echo $baris['no_registrasi']; ?>"  >
                 <span class="fa fa-file-text form-control-feedback left"></span>
            </div>
        </div>
        <!-- TANGGAL REGISTRASI -->
        <div class="form-group field item  row" >
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal">Tanggal <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 " >
                <div class="input-group date" id="myDatepicker" >
                    <input type="text"  name="tanggal" required="required" class="form-control has-feedback-left" value="<?php echo $tanggal;?>" >
                    <span class="fa fa-calendar form-control-feedback left"></span>
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                </div>
            </div>
        </div>
        <!-- KONSELOR HOME PAGE -->
        <div class="form-group field item row">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Konselor</label>
            <div class="col-md-6 col-sm-6 ">
                <select class="form-control has-feedback-left" name="nama_konselor" id="nama_konselor" required="required">
                    <option value="<?php echo $baris['id_konselor'];?>"><?php echo $baris['nama_konselor'];?>"</option>
                    <?php  
                        $sql_konselor = mysqli_query($mysqli, "SELECT * FROM tb_konselor WHERE 1 ORDER BY id_konselor ASC") or die (mysqli_error($mysqli));
                        while ($row = mysqli_fetch_array($sql_konselor)){
                            echo '<option value="'.$row['id_konselor'].'">'.$row['nama_konselor'].'</option> ';
                            $nama_konselor = $_POST['nama_konselor'];
                        }
                    ?>
                </select>
                <span class="fa fa-user form-control-feedback left"></span>
            </div>
        </div>
        <!-- MEDIA HOME PAGE -->
        <div class="form-group field item row">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Media<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <select class="form-control has-feedback-left" name="media" id="media" required="required">
                    <option value="<?php echo $baris['media'];?>"><?php echo $baris['media'];?>"</option>
                    <option value="Tatap Muka">Tatap Muka</option>
                    <option value="Surat">Surat</option>
                    <option value="Telepon">Telepon</option>
                    <option value="Outreach">Outreach</option>
                    <option value="Email">Email</option>
                </select>
                <span class="fa fa-video-camera form-control-feedback left"></span>
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
        <!-- / MEDIA HOME PAGE -->
    </form>
<!-- jQuery -->
<script src="../../assets/vendors/jquery/dist/jquery.min.js"></script>

<!-- bootstrap DateTimePicker JS -->
<script src="../../assets/vendors/moment/min/moment-with-locales.js"></script>
<script src="../../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../../assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<!-- bootstrap Validator JS -->
<script src="../../assets/vendors/validator/multifield.js"></script>
<script src="../../assets/vendors/validator/validator.js"></script>
<script type="text/javascript">

    $('#myDatepicker').datetimepicker({
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
    <?php
                }
                }
                ?>