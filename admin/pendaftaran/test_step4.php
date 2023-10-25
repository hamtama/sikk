<?php
require_once ('../../layout/wrapperadmin/head.php');
require_once ('../../layout/wrapperadmin/sidebar.php');
require_once ('../../layout/wrapperadmin/header.php');
require_once ('../../layout/wrapperadmin/content.php');
?>


    <form action="aksitambah_test.php" method="post">
    <div id="step-4">
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
        <!-- CARD KDRT -->
        <div class="card pt-3 pb-3">
            <div class="card-header">
                <h2 class="text-center">INPUT INFORMASI KASUS KEKERASAN DALAM RUMAH TANGGA</h2>
            </div>
            <!-- CARD BODY KDRT -->
            <div class="card-body">
                <div class="row">
                    <input type="checkbox" id="kasus_kdrt" name="kasus_kdrt" value="1" style="display: none;">
                    <div class="form-group col-md-3 col-md-3 row">
                        <input type="checkbox" id="kdrt_kti"  name="jenis_kdrt[]" value="2" style="display: none;">
                        <strong class="col-md-12 text-center">KTI (Kekerasan Terhadap Istri)</strong>
                        <div class="radio">
                            <?php
                            $sql_kti = mysqli_query($mysqli, "SELECT * FROM tb_jenis_kekerasan WHERE 1 ORDER BY id_jk ASC") or die (mysqli_error($mysqli));
                            while ($row = mysqli_fetch_array($sql_kti)) {
                            echo '
                            <div class=" icheck-greensea">
                                
                                <input class="kti" type="checkbox" id="kti_'.$row['id_jk'].'" name="kti[]" value="'.$row['id_jk'].'" >
                                <label for="kti_'.$row['id_jk'].'">'.$row['jenis_kekerasan'].'</label>
                            </div>
                            ';
                            }
                            ?>
                        </div>
                         <div class="form-group field item row p-3">
                            
                            <label class="col-form-label col-md-12 col-sm-12">Keterangan KDRT KTI<span class="required">*</span></label>
                            <div>
                                <textarea name="ket_kti" cols="60"  rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-group col-sm-3 col-sm-3 row">
                        <input type="checkbox" name="jenis_kdrt[]" id="kdrt_kta" value="3" style="display: none;">
                        <strong class="col-md-12 text-center">KTA (Kekerasan Terhadap Anak)</strong>
                        <div class="radio">
                            <?php
                            $sql_kta = mysqli_query($mysqli, "SELECT * FROM tb_jenis_kekerasan WHERE 1 ORDER BY id_jk ASC") or die (mysqli_error($mysqli));
                            while ($row = mysqli_fetch_array($sql_kta)) {
                            echo '
                            <div class=" icheck-greensea">
                                <input class="kta" type="checkbox" id="kta_'.$row['id_jk'].'" name="kta[]" value="'.$row['id_jk'].'" >
                                <label for="kta_'.$row['id_jk'].'">'.$row['jenis_kekerasan'].'</label>
                            </div>
                            ';
                            }
                            ?>
                        </div>
                        <div class="form-group field item row p-3">
                            <label class="col-form-label col-md-12 col-sm-12">Keterangan KDRT KTA<span class="required">*</span></label>
                            <div>
                                <textarea name="ket_kta" cols="60"  rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group col-sm-3 col-sm-3 row">
                        <input type="checkbox" id="kdrt_kts" name="jenis_kdrt[]" value="4" style="display: none;">
                        <strong class="col-md-12 text-center">KTS (Kekerasan Terhadap Suami)</strong>
                        <div class="radio">
                            <?php
                            $sql_kti = mysqli_query($mysqli, "SELECT * FROM tb_jenis_kekerasan WHERE 1 ORDER BY id_jk ASC") or die (mysqli_error($mysqli));
                            while ($row = mysqli_fetch_array($sql_kti)) {
                            echo '
                            <div class=" icheck-greensea">
                                <input class="kts" type="checkbox" id="kts_'.$row['id_jk'].'" name="kts[]" value="'.$row['id_jk'].'" >
                                <label for="kts_'.$row['id_jk'].'">'.$row['jenis_kekerasan'].'</label>
                            </div>
                            ';
                            }
                            ?>
                        </div>
                        <div class="form-group field item row p-3">
                            <label class="col-form-label col-md-12 col-sm-12">Keterangan KDRT KTS<span class="required">*</span></label>
                            <div>
                                <textarea name="ket_kts" cols="60"  rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group col-sm-3 col-sm-3 row">
                        <input type="checkbox" id="kdrt_lain" name="jenis_kdrt[]" value="7" style="display: none;">
                        <strong class="col-md-12 text-center">Kekerasan Lainnya</strong>
                        <div class="radio">
                            <?php
                            $sql_kti = mysqli_query($mysqli, "SELECT * FROM tb_jenis_kekerasan WHERE 1 ORDER BY id_jk ASC") or die (mysqli_error($mysqli));
                            while ($row = mysqli_fetch_array($sql_kti)) {
                            echo '
                            <div class=" icheck-greensea">
                                <input class="kdrt_lain" type="checkbox" id="kl_'.$row['id_jk'].'" name="lain_lain[]" value="'.$row['id_jk'].'" >
                                <label for="kl_'.$row['id_jk'].'">'.$row['jenis_kekerasan'].'</label>
                            </div>
                            ';
                            }
                            ?>
                        </div>
                        <div class="form-group field item row p-3">
                            <label class="col-form-label col-md-12 col-sm-12">Keterangan KDRT Lain<span class="required">*</span></label>
                            <div>
                                <textarea name="ket_lain" cols="60"  rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
               <!-- / CARD BODY KRDRT -->
            </div>
        <!-- / CARD KDRT -->
        </div>

    

        <!-- CARD KLRT -->
        <div class="card pt-3 pb-3">
            <div class="card-header">
                <h2 class="text-center">INPUT INFORMASI KASUS KEKERASAN DI LUAR RUMAH TANGGA</h2>
            </div>
            <!-- CARD BODY KLRT -->
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6 col-sm-6 row">
                        <strong class="col-md-12 text-center">KTP (Kekerasan Terhadap PEREMPUAN)</strong>
                        <input type="checkbox" id="kasus_ktp" name="klrt[]" value="3" style="display: none;">
                        <div class="radio">
                            <?php
                            $sql_kti = mysqli_query($mysqli, "SELECT * FROM tb_jenis_kekerasan WHERE 1 ORDER BY id_jk ASC") or die (mysqli_error($mysqli));
                            while ($row = mysqli_fetch_array($sql_kti)) {
                            echo '
                            <div class=" icheck-greensea">
                                
                                <input class="ktp" type="checkbox" id="ktp_'.$row['id_jk'].'" name="ktp[]" value="'.$row['id_jk'].'" >
                                <label for="ktp_'.$row['id_jk'].'">'.$row['jenis_kekerasan'].'</label>
                            </div>
                            ';
                            }
                            ?>
                        </div>
                        <div class="form-group field item row p-3">
                            <label class="col-form-label col-md-12 col-sm-12">Keterangan KTP<span class="required">*</span></label>
                            <div>
                                <textarea name="ket_ktp" id="ket_ktp" cols="60"  rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                      
                    </div>
                    <div class="form-group col-sm-6 col-sm-6 row">
                        <strong class="col-md-12 text-center">KTA (Kekerasan Terhadap Anak)</strong>
                        <input type="checkbox" id="kasus_kta" name="klrt[]" value="4" style="display: none;">
                        <div class="col-sm-12 radio">
                            <?php
                            $sql_kti = mysqli_query($mysqli, "SELECT * FROM tb_jenis_kekerasan WHERE 1 ORDER BY id_jk ASC") or die (mysqli_error($mysqli));
                            while ($row = mysqli_fetch_array($sql_kti)) {
                            echo '
                            <div class=" icheck-greensea">
                               
                                <input class="kta2" type="checkbox" id="kta2_'.$row['id_jk'].'" name="kta2[]" value="'.$row['id_jk'].'" >
                                <label for="kta2_'.$row['id_jk'].'">'.$row['jenis_kekerasan'].'</label>
                            </div>
                            ';
                            }
                            ?>
                        </div>
                        <div class="form-group field item row p-3">
                            <label class="col-form-label col-md-12 col-sm-12">Keterangan KTA<span class="required">*</span></label>
                            <div>
                                <textarea name="ket_kta2" cols="60"  rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- / CARD BODY CART  -->
            </div>
        <!-- / CARD KLRT -->
        </div>
    </div>
  
    <input type="submit" value="submit" class="btn btn-success submit" name="submit">
    </form>
<script type="text/javascript">
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

$('.submit').click(function()  {
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
        
});
    
</script>
<?php
    require_once ('../../layout/wrapperadmin/footer.php');
    ?>