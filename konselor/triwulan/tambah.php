<?php
require_once ('../../layout/wrapperkonselor/head.php');
require_once ('../../layout/wrapperkonselor/sidebar.php');
require_once ('../../layout/wrapperkonselor/header.php');
require_once ('../../layout/wrapperkonselor/content.php');
?>
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tambah Data Triwulan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown"></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <form role="form" class=""  action="aksitambah.php?go" method="post">
                                <div class="field item row form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Kategori Bulan<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                    
                                        <input class="form-control has-feedback-left" name="kategori" required="required" type="text" value="" />
                                        <span class="fa fa-calendar form-control-feedback left"></span>
                                    </div>
                                </div>
                                <div class="field item row form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Awal<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="input-group date" id="myDatepicker2">
                                            <input type="text"  id="myDatepicker2" name="tanggal_awal" required="required" class="form-control has-feedback-left ml-0">
                                            <span class="fa fa-calendar form-control-feedback left"></span>
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="field item row form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Akhir<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="input-group date" id="myDatepicker" >
                                            <input type="text"  id="myDatepicker" name="tanggal_akhir" required="required" class="form-control has-feedback-left ml-0">
                                            <span class="fa fa-calendar form-control-feedback left"></span>
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='reset'  class="btn btn-danger">Reset</button>
                                            <button type="submit"  class="btn btn-primary">Simpan</button>
                                            <button  class="btn btn-info" onclick="javascript:window.location=('data.php')">Lihat Data</button>
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
</div>

<!-- bootstrap DateTimePicker JS -->
<script src="../../assets/vendors/moment/min/moment-with-locales.js"></script>
<script src="../../assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- bootstrap-Validator -->
<script src="../../assets/vendors/validator/multifield.js"></script>
<script src="../../assets/vendors/validator/validator.js"></script>

<script type="text/javascript">
    $('#myDatepicker,#myDatepicker2').datetimepicker({
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
require_once ('../../layout/wrapperkonselor/footer.php');
?>
