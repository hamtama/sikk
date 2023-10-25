

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
                    <h2>INFORMASI PENANGANAN KASUS</h2>
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
                            <form role="form" id="form_penanganan"  action="aksitambah.php" method="post">  
                                 <!-- NO REGISRASI -->
                                <div class="form-group field item row">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">No. Registrasi</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control has-feedback-left" name="no_registrasi" id="no_registrasi" required>
                                            <option value="">-- Pilih No Registrasi --</option>
                                            <?php  
                                                $sql_konselor = mysqli_query($mysqli, "SELECT * FROM tb_identitas_survivor INNER JOIN tb_registrasi ON tb_registrasi.id_registrasi = tb_identitas_survivor.id_registrasi WHERE 1 ORDER BY no_registrasi ASC") or die (mysqli_error($mysqli));
                                                while ($row = mysqli_fetch_array($sql_konselor)){
                                                    echo '<option value="'.$row['id_registrasi'].'">'.$row['no_registrasi'].' </option> ';
                                                }
                                            ?>
                                        </select>
                                        <span class="fa fa-file-text form-control-feedback left"></span>
                                    </div>
                                </div>
                                 <!-- NAMA SURVIVOR -->
                                <div class="form-group field item row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_survivor">Nama Survivor<span class="required">*</span></label>
                                    	
                                    <div class="input-group col-md-6 col-sm-6 " id="nama_survivor">
         								<input type="text" class="form-control has-feedback-left">
         								<div class="input-group-append">   
                                    		<a href="#myModal" class="btn btn-outline-primary" >Lihat Data</a>
                                    	</div>
         								<span class="fa fa-user form-control-feedback left" required></span>
                                    </div>
                                </div>
                                
								<div class="modal fade bs-example-modal-lg"  id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" >Data Korban</h4>
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="fetched-data">
													
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
                                 <!-- NAMA KONSELOR -->
                                <div class="form-group field item row">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Konselor</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control has-feedback-left" name="nama_konselor" id="nama_konselor" required>
                                            <option value="">-- Pilih Konselor --</option>
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
                                <?php  
                                	include "tambah_serv_need.php";
                                	include "tambah_serv_get.php";
                                ?>
                                 <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='reset'  class="btn btn-danger">Reset</button>
                                            <button type="submit" id="submit" class="btn btn-success">Save changes</button>
                                            <button  class="btn btn-info" onclick="javascript:window.location=('penanganan_data.php')">Lihat Data </button>
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
<script src="../../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../../assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- bootstrap Validator JS -->
<script src="../../assets/vendors/validator/multifield.js"></script>
<script src="../../assets/vendors/validator/validator.js"></script>                                     
<script type="text/javascript">



$(document).ready(function() {
    $('#no_registrasi').change(function() {
        var no_registrasi = $(this).val();

        $.ajax({
            type: 'POST',
            url: 'nama_survivor.php',
            data: 'no_registrasi='+no_registrasi,
            success : function(response){
                $('#nama_survivor').html(response);
            }                       
        });
    })
});
$(document).ready(function(){

        $('#myModal').on('show.bs.modal', function(e){
        
        var rowid = $(e.relatedTarget).data('id');
        //Menggunakan fungsi Ajax untuk Pengambilan Data
        $.ajax({
            type: 'post',
            url : 'lihat_data.php',
            data: 'rowid=' + rowid,
            success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
    });
});


// FUNGSI TANGGAL
$('.date').datetimepicker({
    locale : 'id',
    format: 'YYYY-MM-DD'
});

// INFORMASI PENANGANAN KASUS (ASPIRASI LAINNYA)
$('.penanganan_kasus').click(function()  {
        idstatus = $(this).attr('id');
        if($(this).is(':checked')){
            if (idstatus === 'layanan10') {
                $('#hidden_penanganan').show('slow');
                $('#aspirasi_lainnya').attr('required', true)
            }
        } 
        if(!$(this).is(':checked')) {
            if (idstatus === 'layanan10') {
                $('#hidden_penanganan').hide('slow');
                $('#aspirasi_lainnya').removeAttr('required');
            }
        }
});
// LAYANAN YANG DIBERIKAN KONSELING TELP
$('.lyb1').click(function()  {
        idstatus = $(this).attr('id');
        if($(this).is(':checked')){
            if (idstatus === 'layanan1') {
                $('#hidden_konseling_telp').show('slow');
                $('#layanan1').attr('required', true);
            }
        } 
        if(!$(this).is(':checked')) {
            if (idstatus === 'layanan1') {
                $('#hidden_konseling_telp').hide('slow');
                $('#layanan1').removeAttr('required');
            }
        }
});

// LAYANAN YANG DIBERIKAN KONSELING HUKUM
$('.lyb2').click(function()  {
        idstatus = $(this).attr('id');
        if($(this).is(':checked')){
            if (idstatus === 'layanan2') {
                $('#hidden_konsultasi_hukum').show('slow');
                $('#layanan2').attr('required', true);
            }
        } 
        if(!$(this).is(':checked')) {
            if (idstatus === 'layanan2') {
                $('#hidden_konsultasi_hukum').hide('slow');
                $('#layanan2').removeAttr('required');
            }
        }
});

// LAYANAN YANG DIBERIKAN LITIGASI
$('.lyb3').click(function()  {
        idstatus = $(this).attr('id');
        if($(this).is(':checked')){
            if (idstatus === 'layanan3') {
                $('#hidden_litigasi').show('slow');
                $('#layanan3').attr('required', true);
            }
        } 
        if(!$(this).is(':checked')) {
            if (idstatus === 'layanan3') {
                $('#hidden_litigasi').hide('slow');
                $('#layanan3').removeAttr('required');
            }
        }
});

// LAYANAN YANG DIBERIKAN HOME VISITE
$('.lyb4').click(function()  {
        idstatus = $(this).attr('id');
        if($(this).is(':checked')){
            if (idstatus === 'layanan4') {
                $('#hidden_home_visite').show('slow');
                $('#layanan4').attr('required', true);
            }
        } 
        if(!$(this).is(':checked')) {
            if (idstatus === 'layanan4') {
                $('#hidden_home_visite').hide('slow');
                $('#layanan4').removeAttr('required');
            }
        }
});

// LAYANAN YANG DIBERIKAN MEDIS
$('.lyb5').click(function()  {
        idstatus = $(this).attr('id');
        if($(this).is(':checked')){
            if (idstatus === 'layanan5') {
                $('#hidden_medis').show('slow');
                $('#layanan5').attr('required', true);
            }
        } 
        if(!$(this).is(':checked')) {
            if (idstatus === 'layanan5') {
                $('#hidden_medis').hide('slow');
                $('#layanan5').removeAttr('required');
            }
        }
});

// LAYANAN YANG DIBERIKAN SHELTER
$('.lyb6').click(function()  {
        idstatus = $(this).attr('id');
        if($(this).is(':checked')){
            if (idstatus === 'layanan6') {
                $('#hidden_shelter').show('slow');
                $('#layanan6').attr('required', true);
            }
        } 
        if(!$(this).is(':checked')) {
            if (idstatus === 'layanan6') {
                $('#hidden_shelter').hide('slow');
                $('#layanan6').removeAttr('required');
            }
        }
});

// LAYANAN YANG DIBERIKAN LITIGASI
$('.lyb8').click(function()  {
        idstatus = $(this).attr('id');
        if($(this).is(':checked')){
            if (idstatus === 'layanan8') {
                $('#hidden_support_group').show('slow');
                $('#layanan8').attr('required', true);
            }
        } 
        if(!$(this).is(':checked')) {
            if (idstatus === 'layanan8') {
                $('#hidden_support_group').hide('slow');
                $('#layanan8').removeAttr('required');
            }
        }
});

// LAYANAN YANG DIBERIKAN LITIGASI
$('.lyb10').click(function()  {
        idstatus = $(this).attr('id');
        if($(this).is(':checked')){
            if (idstatus === 'layanan10') {
                $('#hidden_aspirasi_lainnya').show('slow');
                $('#layanan10').attr('required', true);
            }
        } 
        if(!$(this).is(':checked')) {
            if (idstatus === 'layanan10') {
                $('#hidden_aspirasi_lainnya').hide('slow');
                $('#layanan10').removeAttr('required');
            }
        }
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
include ('../../layout/wrapperadmin/footer.php');
?>
