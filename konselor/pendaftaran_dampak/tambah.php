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
                    <h2>Tambah Data Dampak / Akiba Yang Dialami</h2>
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
                            <form role="form" class=""  action="aksitambah.php" method="post">  
                                 <!-- NO REGISRASI -->
                                <div class="form-group field item row">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">No. Registrasi</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control has-feedback-left" name="no_registrasi" id="no_registrasi" required="required">
                                            <option value="">-- Pilih No Registrasi --</option>
                                            <?php  
                                                $sql_konselor = mysqli_query($mysqli, "SELECT * FROM tb_identitas_survivor INNER JOIN tb_registrasi ON tb_registrasi.id_registrasi = tb_identitas_survivor.id_registrasi WHERE 1 ORDER BY tb_registrasi.id_registrasi DESC") or die (mysqli_error($mysqli));
                                                while ($row = mysqli_fetch_array($sql_konselor)){
                                                    echo '<option value="'.$row['id_registrasi'].'">'.$row['no_registrasi'].' </option> ';
                                                
                                                }
                                            ?>
                                        </select>
                                        <span class="fa fa-user form-control-feedback left"></span>
                                    </div>
                                </div>
                            

                                 <!-- NAMA KONSELOR -->
                                <div class="form-group field item row">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Konselor</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control has-feedback-left" name="nama_konselor" id="nama_konselor" required="required">
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
                                <!-- Jenis Kasus -->
                                <div class="form-group field item row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="kesehatan_fisik">Kesehatan Fisik<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea name="kesehatan_fisik" id="kesehatan_fisik" cols="30" required rows="5" class="form-control"></textarea>
                                        
                                    </div>
                                </div>
                                
                                <!-- UKDRT Terhadap -->
                                <div class="form-group  field item row " id="hidden_kdrt">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"  for="kesehaan_jiwa">Kesehatan Jiwa<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        
                                        <textarea name="kesehatan_jiwa" id="kesehatan_jiwa" required cols="30" rows="5" class="form-control"></textarea>
                                        
                                    </div>
                                </div>
                                <!-- JENIS KEKERASAN-->
                                <div class="form-group field item row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="per_tdk_sehat">Perilaku Tidak Sehat<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea name="per_tdk_sehat" id="per_tdk_sehat" cols="30" required rows="5" class="form-control"></textarea>
                                        
                                    </div>
                                </div>
                                <!-- KETERANGAN KEKERASAN -->
                                <div class="form-group field item row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="kesehatan_reproduksi">Kesehatan Reproduksi<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea id="kesehatan_reproduksi" name="kesehatan_reproduksi" cols="30" rows="5"  required="required" class="form-control  "></textarea>
                                    </div>
                                </div>
                                <div class="form-group field item row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="kondisi_kronis">Kondisi Kronis<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea id="kondisi_kronis" name="kondisi_kronis" cols="30" rows="5" required="required" class="form-control  "></textarea>
                                    </div>
                                </div>
                                <div class="form-group field item row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="ekonomi">Ekonomi<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea id="ekonomi" name="ekonomi" required="required" cols="30" rows="5"  class="form-control  "></textarea>
                                    </div>
                                </div>
                                <div class="form-group field item row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="anak_keluarga">Anak / Keluarga<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea id="anak_keluarga" name="anak_keluarga" cols="30" rows="5"  required="required" class="form-control  "></textarea>
                                    </div>
                                </div>
                                <div class="form-group field item row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="lain_lain">Lain-Lain<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea id="lain_lain" name="lain_lain" cols="30" rows="5"  required="required" class="form-control  "></textarea>
                                    </div>
                                </div>
                                 <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            
                                            <button type='reset'  class="btn btn-danger">Reset</button>
                                            <button type="submit"  class="btn btn-primary">Simpan</button>
                                            <button  class="btn btn-info" onclick="javascript:window.location=('dampak_data.php')">Lihat Data </button>
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

<!-- bootstrap-Validator -->
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
require_once ('../../layout/wrapperkonselor/footer.php');
?>