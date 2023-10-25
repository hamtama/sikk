<?php
require_once ('../../layout/wrapperadmin/head.php');
require_once ('../../layout/wrapperadmin/sidebar.php');
require_once ('../../layout/wrapperadmin/header.php');
require_once ('../../layout/wrapperadmin/content.php');
?>
<div class="">
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>DATA INFORMASI KASUS </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class=" x_content" >
                <!-- Smart Wizard -->
                <p style="text-align: center; font-size: 15px;"><strong>PUSAT LAYANAN TERPADU PEREMPUAN DAN ANAK KORBAN KEKERASAN "REKSO DYAH UTAMI" DIY</strong></p>
                <form role="form" class="form-horizontal form-label-left" name="aksitambah" method="post" action="aksitambah.php">
                        <div id="wizard" class="form_wizard wizard_horizontal" >
                            <ul class="wizard_steps">
                                <!-- STEP 1 -->
                                <li>
                                    <a href="#step-1">
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            Step 1<br />
                                            <small>DATA REGISTER</small>
                                        </span>
                                    </a>
                                </li>
                                <!-- STEP 2 -->
                                <li>
                                    <a href="#step-2">
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Step 2<br />
                                            <small>IDENTITAS SURVIVOR</small>
                                        </span>
                                    </a>
                                </li>
                                <!-- STEP 3 -->
                                <li>
                                    <a href="#step-3">
                                        <span class="step_no">3</span>
                                        <span class="step_descr">
                                            Step 3<br />
                                            <small>IDENTITAS PELAKU</small>
                                        </span>
                                    </a>
                                </li>
                                <!-- STEP 4 -->
                                <li>
                                    <a href="#step-4">
                                        <span class="step_no">4</span>
                                        <span class="step_descr">
                                            Step 4<br />
                                            <small>INFORMASI KASUS</small>
                                        </span>
                                    </a>
                                </li>
                                <!-- STEP 5 -->
                                <li>
                                    <a href="#step-5">
                                        <span class="step_no">5</span>
                                        <span class="step_descr">
                                            Step 5<br />
                                            <small>KETERANGAN KASUS</small>
                                        </span>
                                    </a>
                                </li>

                            </ul>
                            <div class="stepContainer overflow-hidden">
                               
                            
                            
                            <?php
                                // STEP 1  
                                require_once ('step1_no_reg.php');
                                //STEP 2
                                require_once ('step2_id_surv.php');
                                // STEP 3
                                require_once ('step3_id_pelaku.php');
                                // STEP 4
                                require_once ('step4_inf_kasus.php');
                                // STEP 5
                                require_once ('step5_ket_kasus.php');
                            ?>
                            
                        </div>

                    </div>
                    <input class="btn btn-primary check" type="submit" value="Simpan" id="aksi">
                <!-- / FORM HOME PAGE -->
                
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Smart-Wizard -->
<script src="../../assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

<script src="../../assets/vendors/moment/min/moment-with-locales.js"></script>
<script src="../../assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- bootstrap Validator JS -->
<script src="../../assets/vendors/validator/multifield.js"></script>
<script src="../../assets/vendors/validator/validator.js"></script>

<script type="text/javascript">

   
    $('#myDatepicker').datetimepicker({
        format: 'DD.MMMM.YYYY'
    }); 
   
// KEKERASAN KTI
$('.kti').click(function()  {
    if($(this).is(':checked')){
        $('#kasus_kdrt').attr('checked', true);
        $('#kdrt_kti').attr('checked', true);
    }
});
// KEKERASAN KTA
$('.kta').click(function()  {
    if($(this).is(':checked')){
        $('#kasus_kdrt').attr('checked',true);
        $('#kdrt_kta').attr('checked', true);
    }
});

// KEKERASAN KTS
$('.kts').click(function()  {
    if($(this).is(':checked')){
        $('#kasus_kdrt').attr('checked',true);
        $('#kdrt_kts').attr('checked',true);
    }
});

// KEKERASAN LAIN
$('.kdrt_lain').click(function()  {
    if($(this).is(':checked')){
        $('#kasus_kdrt').attr('checked',true);
        $('#kdrt_lain').attr('checked',true);
    }
});
// KEKERASAN KTP
$('.ktp').click(function()  {
    if($(this).is(':checked')){
        $('#kasus_ktp').attr('checked',true);
    }
});
// KEKERASAN KTA
$('.kta2').click(function()  {
    if($(this).is(':checked')){
        $('#kasus_kta').attr('checked',true);
    }
});

$('.check').click(function()  {
    if(!$('.kti,.kta,.kts,.kdrt_lain').is(':checked')) {
            $('#kasus_kdrt').removeAttr('checked');
        }
    if(!$('.kta').is(':checked')) {
        $('#kdrt_kta').removeAttr('checked');
    }
    if(!$('.kti').is(':checked')) {
        $('#kdrt_kti').removeAttr('checked');
    } 
    if(!$('.kts').is(':checked')) {
        $('#kdrt_kts').removeAttr('checked');
    }
    if(!$('.kdrt_lain').is(':checked')) {
        $('#kdrt_lain').removeAttr('checked');
    }
    if(!$('.ktp').is(':checked')) {
        $('#kasus_ktp').removeAttr('checked');
    }
    if(!$('.kta2').is(':checked')) {
        $('#kasus_kta').removeAttr('checked');
    }
    alert('Data Benar');
});
// IDENTITAS SURVIVOR (STATUS PEKAWINAN)
$('.status_survivor').click(function()  {
        idstatus = $(this).attr('data-id');
        if($(this).is(':checked')){
            if( idstatus === 'status_survivor_lain'){
                $('#hidden_status_perkawinan').show('slow');
                $('#status_perkawinan_survivor_lain').attr('required', true);
            } 
            if (idstatus === 'status_survivor') {
                $('#hidden_status_perkawinan').hide('slow');
                $('#status_perkawinan_survivor_lain').removeAttr('required');
            }
        } 
});

// IDENTITAS SURVIVOR (PEKERJAAN)
$('.pekerjaan').click(function()  {
        idname = $(this).attr('data-id');
        if($(this).is(':checked')){
            if( idname === 'pekerjaan_lain'){
                $('#hidden_textbox').show('slow');
                $('#pekerjaan_lain').attr('required', true);
            } 
            if (idname === 'pekerjaan') {
                $('#hidden_textbox').hide('slow');
                $('#pekerjaan_lain').removeAttr('required');
            }
        }
});

// IDENTITAS SURVIVOR (KABUPATEN)
$(function(){
    $('.kabupaten_lain').change(function(){
        if($(this).val() == '7'){
            $('#hidden_kabupaten').show('slow');
            $('#kabupaten_lain').attr('required', true);
        } else {
            $('#hidden_kabupaten').hide('slow');
            $('#kabupaten_lain').removeAttr('required');
        }
    });
});

// IDENTITAS PELAKU (PEKERJAAN)
$('.pekerjaan_p').click(function()  {
        idname = $(this).attr('data-id');
        if($(this).is(':checked')){
            if( idname === 'pekerjaan_lain_p'){
                $('#hidden_pekerjaan_pelaku').show('slow');
                $('#pekerjaan_pelaku_lainnya').attr('required', true);
            } 
            if (idname === 'pekerjaan_p') {
                $('#hidden_pekerjaan_pelaku').hide('slow');
                $('#pekerjaan_pelaku_lainnya').removeAttr('required');
            }
        }
});

// IDENTITAS PELAKU (STATUS PERKAWINAN)
$('.status_pelaku').click(function()  {
        idname = $(this).attr('data-id');
        if($(this).is(':checked')){
            if( idname === 'status_pelaku_lain'){
                $('#hidden_status_perkawinan_p').show('slow');
                $('#status_perkawinan_pelaku_lain').attr('required', true)
            } 
            if (idname === 'status_pelaku') {
                $('#hidden_status_perkawinan_p').hide('slow');
                $('#status_perkawinan_pelaku_lain').removeAttr('required');
            }
        }
});
// IDENTITAS PELAKU (HUBUNGAN DENGAN KORBAN)
$('.hubungan').click(function()  {
        idname = $(this).attr('data-id');
        if($(this).is(':checked')){
            if( idname === 'hubungan_lainnya'){
                $('#hidden_hubungan_korban').show('slow');
                $('#hubungan_pelaku_lainnya').attr('required', true);
            } 
            if (idname === 'hubungan') {
                $('#hidden_hubungan_korban').hide('slow');
                $('#hubungan_pelaku_lainnya').removeAttr('required');
            }
        }
});

// IDENTITAS PELAKU (LOKASI KASUS)
$('.lokasi').click(function()  {
        idname = $(this).attr('data-id');
        if($(this).is(':checked')){
            if( idname === 'lokasi_lainnya'){
                $('#hidden_lokasi').show('slow');
                $('#lokasi_lainnya').attr('required', true);
            } 
            if (idname === 'lokasi') {
                $('#hidden_lokasi').hide('slow');
                $('#lokasi_lainnya').removeAttr('required');
            }
        }
});



    // $(document).ready(function(){
    //     $('#wizard').smartWizard({
    //         onFinish: submitform
    //     });
    //     function submitform(event, currentIndex){
    //             $('#aksi').submit();
    //         }
    // });



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
require_once ('../../layout/wrapperadmin/footer.php');
?>