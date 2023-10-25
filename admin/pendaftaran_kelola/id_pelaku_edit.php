<?php  
require_once ('../../login/connection.php');
if ($_POST['rowid']){
    $id = $_POST['rowid'];

    $sql = "SELECT * FROM tb_identitas_pelaku INNER JOIN tb_registrasi ON tb_registrasi.id_registrasi = tb_identitas_pelaku.id_registrasi WHERE id_pelaku = '$id'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris){

$pendidikan = $baris['pendidikan_pelaku'];
$pekerjaan = $baris['pekerjaan_pelaku'];
$agama = $baris['agama_pelaku'];
$status_perkawinan = $baris['status_perkawinan_pelaku'];
$hubungan_korban = $baris['hubungan_korban'];
$lokasi = $baris['lokasi_kasus'];

?>

<form role="form" class="" method="post" action="id_pelaku_aksiedit.php" >
    <!-- CARD DATA DIRI -->
    <div class="card pb-3 pt-3">
        <div class="card-header">
            <strong>DATA DIRI PELAKU</strong>
        </div>
        <!-- CARD BODY -->
        <div class="card-body">
            <!-- No Registrasi -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_pelaku">No Registrasi<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="hidden" id="id_pelaku" name ="id_pelaku" required="required"  class="form-control" readonly value="<?php echo $baris['id_pelaku'] ?>" >
                    <input type="text" id="no_registrasi" name="no_registrasi" required="required" class="form-control  has-feedback-left" readonly value="<?php echo $baris['no_registrasi'] ?> ">
                    <span class="fa fa-user form-control-feedback left"></span>
                </div>
            </div>
            <!-- NAMA PELAKU -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_pelaku">Nama<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    
                    <input type="text" id="nama_pelaku" name="nama_pelaku" required="required" class="form-control  has-feedback-left" value="<?php echo $baris['nama_pelaku']; ?> ">
                    <span class="fa fa-user form-control-feedback left"></span>
                </div>
            </div>
            <!-- UMUR PELAKU -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="umur_pelaku">Umur<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="umur_pelaku" name="umur_pelaku" required="required" class="form-control  has-feedback-left" value="<?php echo $baris['umur']; ?> ">
                    <span class="fa fa-sort form-control-feedback left"></span>
                </div>
            </div>
            <!-- ALAMAT PELAKU -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat_pelaku">Alamat<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="alamat_pelaku" name="alamat_pelaku" required="required" class="form-control has-feedback-left" value="<?php echo $baris['alamat_pelaku']; ?> ">
                    <span class="fa fa-home form-control-feedback left"></span>
                </div>
            </div>
            <!-- NO TELP PELAKU -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_telp_pelaku">No Telp<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="tel" id="no_telp_pelaku" name="no_telp_pelaku" required="required" maxlength="13" class="form-control has-feedback-left " value="<?php echo $baris['no_telp_pelaku']; ?> ">
                    <span class="fa fa-phone form-control-feedback left"></span>
                </div>
            </div>
            <!-- AGAMA KEPERCAYAAN PELAKU -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Agama / Kepercayaan<span class="required">*</span></label>
                <div class="radio col-md-9 col-sm-9 ">
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama_p1" name="agama_pelaku" value="Islam" <?php if($agama == 'Islam') {echo "checked";} ?>>
                            <label for="agama_p1">Islam</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama_P2" name="agama_pelaku" value="Kristen" <?php if($agama == 'Kristen'){ echo "checked";} ?>>
                            <label for="agama_P2">Kristen</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama_P3" name="agama_pelaku" value="Katolik" <?php if($agama == 'Katolik'){ echo "checked";} ?>>
                            <label for="agama_P3">Katolik</label>
                        </div>
                    </div>
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama_P4" name="agama_pelaku" value="Hindu" <?php if($agama == 'Hindu'){ echo "checked";} ?>>
                            <label for="agama_P4">Hindu</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama_P5" name="agama_pelaku" value="Budha" <?php if($agama == 'Budha'){ echo "checked";} ?>>
                            <label for="agama_P5">Budha</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama_P6" name="agama_pelaku" value="Kong Hu Cu" <?php if($agama == 'Kong Hu Cu'){ echo "checked";} ?>>
                            <label for="agama_P6">Kong Hu Cu</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CARD DATA KEAHLIAN PELAKU -->
    <div class="card pb-3 pt-3">
        <div class="card-header">
            <strong>DATA KEAHLIAN PELAKU</strong>
        </div>
        <!-- CARD BODY KEAHLIAN -->
        <div class="body">
            <!-- PENDIDIKAN PELAKU -->
            <div class="form-group field item row">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan</label>
                <div class="col-md-9 col-sm-9 ">
                    
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" value="Tidak Sekolah"  name="pendidikan_pelaku" id="pendidikan_p1" <?php if($pendidikan == 'Tidak Sekolah') {echo "checked";} ?> >
                            <label for="pendidikan_p1">Tidak Sekolah</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" value="TK" name="pendidikan_pelaku" id="pendidikan_p2" <?php if($pendidikan == 'TK') {echo "checked";} ?>>
                            <label for="pendidikan_p2">TK</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" value="SD" name="pendidikan_pelaku" id="pendidikan_p3" <?php if($pendidikan == 'SD') {echo "checked";} ?> >
                            <label for="pendidikan_p3">SD</label>
                        </div>
                    </div>
                    
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  value="SLTP" name="pendidikan_pelaku" id="pendidikan_p4" <?php if($pendidikan == 'SLTP') {echo "checked";} ?>>
                            <label for="pendidikan_p4">SLTP</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  value="SLTA" name="pendidikan_pelaku" id="pendidikan_p5" <?php if($pendidikan == 'SLTA') {echo "checked";} ?>>
                            <label for="pendidikan_p5">SLTA</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  value="PT/S1/D3/D2" name="pendidikan_pelaku" id="pendidikan_p6" <?php if($pendidikan == 'PT/S1/D3/D2') {echo "checked";} ?>>
                            <label for="pendidikan_p6">PT/S1/D3/D2</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- PEKERJAAN PELAKU -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Pekerjaan<span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 pekerjaan">
                    <div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p1" name="pekerjaan_pelaku" value="Guru / Dosen" <?php if($pekerjaan == 'Guru / Dosen'){ echo "checked";} ?>>
                            <label for="pekerjaan_p1">Guru / Dosen</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p2" name="pekerjaan_pelaku" value="Pegawai Swasta" <?php if($pekerjaan == 'Pegawai Swasta'){ echo "checked";} ?>>
                            <label for="pekerjaan_p2">Pegawai Swasta</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p3" name="pekerjaan_pelaku" value="Buruh" <?php if($pekerjaan == 'Buruh'){ echo "checked";} ?>>
                            <label for="pekerjaan_p3">Buruh</label>
                        </div>
                    </div>
                    <div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p4" name="pekerjaan_pelaku" value="TNI / POLRI" <?php if($pekerjaan == 'TNI / POLRI'){ echo "checked";} ?>>
                            <label for="pekerjaan_p4">TNI / POLRI</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p5" name="pekerjaan_pelaku" value="Tani" <?php if($pekerjaan == 'Tani'){ echo "checked";} ?>>
                            <label for="pekerjaan_p5">Tani</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p6" name="pekerjaan_pelaku" value="Pelajar / Mahasiswa" <?php if($pekerjaan == 'Pelajar / Mahasiswa'){ echo "checked";} ?>>
                            <label for="pekerjaan_p6">Pelajar / Mahasiswa</label>
                        </div>
                    </div>
                    <div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p7" name="pekerjaan_pelaku" value="PNS / BUMN" <?php if($pekerjaan == 'PNS / BUMN'){ echo "checked";} ?>>
                            <label for="pekerjaan_p7">PNS / BUMN</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p8" name="pekerjaan_pelaku" value="Pedagang" <?php if($pekerjaan == 'Pedagang'){ echo "checked";} ?>>
                            <label for="pekerjaan_p8">Pedagang</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p9" name="pekerjaan_pelaku" value="Wiraswasta" <?php if($pekerjaan == 'Wiraswasta'){ echo "checked";} ?>>
                            <label for="pekerjaan_p9">Wiraswasta</label>
                        </div>
                    </div>
                    <div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p10" name="pekerjaan_pelaku" value="Ibu Rumah Tangga" <?php if($pekerjaan == 'Ibu Rumah Tangga'){ echo "checked";} ?> />
                            <label for="pekerjaan_p10">Ibu Rumah Tangga</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_lain_p" id="pekerjaan_p11" name="pekerjaan_pelaku" value="Lainnya" <?php if($pekerjaan == 'Lainnya'){ echo "checked";} ?> />
                            <label for="pekerjaan_p11">Pekerjaan Lainnya</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PEKERJAAN LAINNYA PELAKU -->
            <div class="form-group field item row" style="display: none;" id="hidden_pekerjaan_pelaku">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pekerjaan_pelaku_lainnya">Pekerjaan Lainnya<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text"   name="pekerjaan_pelaku_lainnya"  class="form-control has-feedback-left " value="<?php echo $baris['pekerjaan_lainnya']; ?> " >
                    <span class="fa fa-briefcase form-control-feedback left"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- CARD HUBUNGAN PELAKU -->
    <div class="card pb-3 pt-3">
        <div class="card-header">
           <strong> DATA HUBUNGAN DAN LOKASI KEKERASAN </strong>
        </div>
        <!-- CARD BODY HUBUNGAN PELAKU -->
        <div class="card-body">

            <!-- STATUS PERKAWINAN PELAKU-->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Status Perkawinan<span class="required">*</span></label>
                <div class="radio col-md-9 col-sm-9 ">
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_pelaku1" class="status_pelaku" data-id="status_pelaku" name="status_perkawinan_pelaku" value="Menikah" <?php if($status_perkawinan == 'Menikah'){ echo "checked";} ?>>
                            <label for="status_pelaku1">Menikah</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_pelaku2" class="status_pelaku" data-id="status_pelaku" name="status_perkawinan_pelaku" value="Tidak Menikah" <?php if($status_perkawinan == 'Tidak Menikah'){ echo "checked";} ?> >
                            <label for="status_pelaku2">Tidak Menikah</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_pelaku3" class="status_pelaku" data-id="status_pelaku" name="status_perkawinan_pelaku" value="Sirri" <?php if($status_perkawinan == 'Sirri'){ echo "checked";} ?>>
                            <label for="status_pelaku3">Sirri</label>
                        </div>
                    </div>
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_pelaku4" class="status_pelaku" data-id="status_pelaku" name="status_perkawinan_pelaku" value="Cerai" <?php if($status_perkawinan == 'Cerai'){ echo "checked";} ?>>
                            <label for="status_pelaku4">Cerai</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_pelaku5" class="status_pelaku" data-id="status_pelaku" name="status_perkawinan_pelaku" value="Poligami" <?php if($status_perkawinan == 'Poligami'){ echo "checked";} ?>>
                            <label for="status_pelaku5">Poligami</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_pelaku6" class="status_pelaku" data-id="status_pelaku_lain" name="status_perkawinan_pelaku" value="Lainnya" <?php if($status_perkawinan == 'Lainnya'){ echo "checked";} ?>>
                            <label for="status_pelaku6">Status Lainnya</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- STATUS PERKAWINAN LAINNYA PELAKU-->
            <div class="form-group field item row" style="display: none;" id="hidden_status_perkawinan_p">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="status_perkawinan_pelaku">Status Perkawinan Lainnya<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text"   name="status_perkawinan_pelaku_lain" class="form-control has-feedback-left " value="<?php  echo $baris['status_lainnya']; ?>">
                    <span class="fa fa-user form-control-feedback left"></span>
                </div>
            </div>
            <!-- HUBUNGAN DENGAN KORBAN -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Hubungan Dengan Korban<span class="required">*</span></label>
                <div class="radio col-md-9 col-sm-9 ">
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" id="hubungan_p1" class="hubungan" data-id="hubungan" name="hubungan_korban" value="Suami" <?php if($hubungan_korban == 'Suami'){ echo "checked";} ?> >
                            <label for="hubungan_p1">Suami</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" id="hubungan_p2" class="hubungan" data-id="hubungan" name="hubungan_korban" value="Istri" <?php if($hubungan_korban == 'Istri'){ echo "checked";} ?> >
                            <label for="hubungan_p2">Istri</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" id="hubungan_p3" class="hubungan" data-id="hubungan" name="hubungan_korban" value="Orang Tua" <?php if($hubungan_korban == 'Orang Tua'){ echo "checked";} ?>   >
                            <label for="hubungan_p3">Orang Tua</label>
                        </div>
                    </div>
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" id="hubungan_p4" class="hubungan" data-id="hubungan" name="hubungan_korban" value="Keluarga" <?php if($hubungan_korban == 'Keluarga'){ echo "checked";} ?> >
                            <label for="hubungan_p4">Keluarga</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="hubungan_p5" class="hubungan" data-id="hubungan" name="hubungan_korban" value="Pacar" <?php if($hubungan_korban == 'Pacar'){ echo "checked";} ?> >
                            <label for="hubungan_p5">Pacar</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="hubungan_p6" class="hubungan" data-id="hubungan_lainnya" name="hubungan_korban" value="Lainnya" <?php if($hubungan_korban == 'Lainnya'){ echo "checked";} ?> >
                            <label for="hubungan_p6">Hubungan Lainnya</label>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            <!-- HUBUNGAN DENGAN KORBAN LAINNYA-->
            <div class="form-group field item row" style="display: none;" id="hidden_hubungan_korban">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="hubungan_lainnya">Hubungan Dengan Korban<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text"   name="hubungan_pelaku_lainnya"  class="form-control has-feedback-left " value="<?php echo $baris['hubungan_lainnya']; ?>" >
                    <span class="fa fa-refresh form-control-feedback left"></span>
                </div>
            </div>
            <!-- LOKASI KASUS -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Lokasi Kasus<span class="required">*</span></label>
                <div class="radio col-md-9 col-sm-9 ">
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" id="lokasi_p1" class="lokasi" data-id="lokasi" name="lokasi_kasus" value="Rumah Tangga" <?php if($lokasi == 'Rumah Tangga'){ echo "checked";} ?> >
                            <label for="lokasi_p1">Rumah Tangga</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" id="lokasi_p2" class="lokasi" data-id="lokasi" name="lokasi_kasus" value="Tempat Kerja" <?php if($lokasi == 'Tempat Kerja'){ echo "checked";} ?>  >
                            <label for="lokasi_p2">Tempat Kerja</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" id="lokasi_p3" class="lokasi" data-id="lokasi" name="lokasi_kasus" value="Tempat Umum" <?php if($lokasi == 'Tempat Umum'){ echo "checked";} ?> >
                            <label for="lokasi_p3">Tempat Umum</label>
                        </div>
                    </div>
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" id="lokasi_p4" class="lokasi" data-id="lokasi" name="lokasi_kasus" value="Sekolah" <?php if($lokasi == 'Sekolah'){ echo "checked";} ?> >
                            <label for="lokasi_p4">Sekolah</label>
                        </div>
                        
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="lokasi_p5" class="lokasi" data-id="lokasi_lainnya" name="lokasi_kasus" value="Lainnya" <?php if($lokasi == 'Lainnya'){ echo "checked";} ?>>
                            <label for="lokasi_p5">Lokasi Lainnya</label>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- LOKASI KASUS LAINNYA-->
            <div class="form-group field item row" style="display: none;" id="hidden_lokasi">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="lokasi_lainnya">Lokasi Kasus Lainnya<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text"   name="lokasi_lainnya"  class="form-control has-feedback-left " value="<?php echo $baris['lokasi_lainnya'] ?>">
                    <span class="fa fa-map-marker form-control-feedback left"></span>
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
        </div>
    </div>
</form>
<script src="../../assets/vendors/validator/multifield.js"></script>
<script src="../../assets/vendors/validator/validator.js"></script>
<script type="text/javascript">

    // IDENTITAS PELAKU (PEKERJAAN)
$('.pekerjaan_p').click(function()  {
        idname = $(this).attr('data-id');
        if($(this).is(':checked')){
            if( idname === 'pekerjaan_lain_p'){
                $('#hidden_pekerjaan_pelaku').show('slow');
            } 
            if (idname === 'pekerjaan_p') {
                $('#hidden_pekerjaan_pelaku').hide('slow');
            }
        }
});

// IDENTITAS PELAKU (STATUS PERKAWINAN)
$('.status_pelaku').click(function()  {
        idname = $(this).attr('data-id');
        if($(this).is(':checked')){
            if( idname === 'status_pelaku_lain'){
                $('#hidden_status_perkawinan_p').show('slow');
            } 
            if (idname === 'status_pelaku') {
                $('#hidden_status_perkawinan_p').hide('slow');
            }
        }
});
// IDENTITAS PELAKU (HUBUNGAN DENGAN KORBAN)
$('.hubungan').click(function()  {
        idname = $(this).attr('data-id');
        if($(this).is(':checked')){
            if( idname === 'hubungan_lainnya'){
                $('#hidden_hubungan_korban').show('slow');
            } 
            if (idname === 'hubungan') {
                $('#hidden_hubungan_korban').hide('slow');
            }
        }
});

// IDENTITAS PELAKU (LOKASI KASUS)
$('.lokasi').click(function()  {
        idname = $(this).attr('data-id');
        if($(this).is(':checked')){
            if( idname === 'lokasi_lainnya'){
                $('#hidden_lokasi').show('slow');
            } 
            if (idname === 'lokasi') {
                $('#hidden_lokasi').hide('slow');
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
    }
}
?>