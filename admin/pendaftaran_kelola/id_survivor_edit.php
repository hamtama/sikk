<?php  
require_once ('../../login/connection.php');
if ($_POST['rowid']){
    $id = $_POST['rowid'];

    $sql = "SELECT * FROM tb_identitas_survivor 
    INNER JOIN tb_registrasi  ON tb_identitas_survivor.id_registrasi = tb_registrasi.id_registrasi 
    INNER JOIN tb_kabupaten ON tb_identitas_survivor.id_kabupaten = tb_kabupaten.id_kabupaten
    WHERE id_survivor = '$id'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris){

$pendidikan_survivor =$baris['pendidikan'];
$agama = $baris['agama'];
$pekerjaan = $baris['pekerjaan'];
$jenis_kelamin = $baris['jenis_kelamin'];
$status_perkawinan =$baris['status_perkawinan'];
?>
<!-- FORM IDENTITAS SURIVIVOR -->
<form role="form" class="form-horizontal form-label-left" method="post" action="id_survivor_aksiedit.php" >
    <!-- FORM IDENTITAS SURIVIVOR -->
    <div class="card pb-3 pt-3">
        <div class="card-header">
            <strong>DATA DIRI SURVIVOR </strong> 
        </div>
        <div class="card-body">
            <!-- NO REGISTRASI -->
             <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name_survivor">No Registrasi<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="hidden" name="id_survivor" id="id_survivor"  value=" <?php echo $baris['id_survivor'] ?>"/>
                    <input type="text" id="no_registrasi" name="no_registrasi" required="required" readonly class="form-control has-feedback-left" value="<?php echo $baris['no_registrasi'] ?>">
                    <span class="fa fa-file-text form-control-feedback left"></span>
                </div>
            </div>
            <!-- NAMA SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name_survivor">Nama<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="nama_survivor" name="nama_survivor" required="required" class="form-control has-feedback-left" value="<?php echo $baris['nama'] ?>">
                    <span class="fa fa-user form-control-feedback left"></span>
                </div>
            </div>
            <!-- GENDER SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                <div class="col-md-6 col-sm-6 ">
                    <?php  
                        $sql_gender = mysqli_query($mysqli, "SELECT * FROM tb_jenis_kelamin  WHERE 1 ORDER BY id_jenis_kelamin ASC") or die (mysqli_error($mysqli));
                        while ($row = mysqli_fetch_array($sql_gender)){
                            if($jenis_kelamin == $row['jenis_kelamin']){
                                $check = 'checked="checked"';
                            } else {
                                $check = '';
                            }
                            echo '
                            <div class="radio">
                                <div class="col-sm-6 icheck-greensea">
                                    <input type="radio" id="jenis_kelamin'.$row['id_jenis_kelamin'].'" name="jenis_kelamin" '.$check.' value="'.$row['jenis_kelamin'].'">
                                    <label for="jenis_kelamin'.$row['id_jenis_kelamin'].'">'.$row['jenis_kelamin'].'</label>
                                </div>
                            </div>
                             ';
                        }
                    ?>
                </div>
            </div>
            <!-- TEMPAT LAHIR SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tempat_lahir">Tempat Lahir <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="tempat_lahir" name="tempat_lahir" required="required" class="form-control has-feedback-left" value="<?php echo $baris['tempat_lahir'] ?>">
                    <span class="fa fa-map-marker form-control-feedback left"></span>
                </div>
            </div>
            <!-- TANGGAL LAHIR SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align " for="tanggal_lahir">Tanggal Lahir<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="tanggal_lahir" name="tanggal_lahir" required="required"  class="form-control has-feedback-left" value="<?php echo $baris['tanggal_lahir'] ?>">
                    <span class="fa fa-calendar-o form-control-feedback left"></span>
                    <span class="">Format Tanggal Lahir :<b> "01 Januari 2019"</b></span>
                </div>
            </div>
            <!-- ALAMAT SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat_survivor">Alamat<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="alamat_survivor" name="alamat_survivor" required="required" class="form-control has-feedback-left" value="<?php echo $baris['alamat'] ?>">
                    <span class="fa fa-home form-control-feedback left"></span>
                </div>
            </div>
            <!-- KECAMATAN SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kecamatan">Kecamatan<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="kecamatan" name="kecamatan" required="required" class="form-control has-feedback-left" value="<?php echo $baris['kecamatan'] ?>">
                    <span class="fa fa-home form-control-feedback left"></span>
                </div>
            </div>
            <!-- KABUPATEN SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kabupaten">Kabupaten<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <select class="form-control has-feedback-left kabupaten_lain" name="kabupaten" id="kabupaten">
                        <option value="<?php echo $baris['id_kabupaten'] ?>"><?php if($baris['id_kabupaten'] == '7') {echo $baris['kabupaten_lain'];} else {echo $baris['kabupaten'];} ?></option>
                            <?php  
                                $sql_kabupaten = mysqli_query($mysqli, "SELECT * FROM tb_kabupaten  WHERE 1 ORDER BY kode_kemendagri ASC") or die (mysqli_error($mysqli));
                                while ($row = mysqli_fetch_array($sql_kabupaten)){
                                    echo '<option value="'.$row['id_kabupaten'].'">'.$row['kabupaten'].' </option> ';
                                }
                            ?>
                    </select>
                    <span class="fa fa-home form-control-feedback left"></span>
                </div>
            </div>
            <!-- KABUPATEN LAIN LAIN -->
            <div class="form-group field item row" id="hidden_kabupaten" style="display: none;">
                <label class="col-form-label col-md-e col-sm-3 label-align" for="kabupaten_lain_lain">Kabupaten Lain <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" class="form-control has-feedback-left" id="kabupaten_lain" value="<?php echo $baris['kabupaten_lain'] ?>" name="kabupaten_lain">
                    <span class="fa fa-home form-control-feedback left"></span>
                </div>
            </div>
            <!-- NO TELP SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_telp_survivor">No. Telp<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="tel" id="no_telp_survivor" value="<?=$baris['no_telp'] ?>" name="no_telp_survivor" maxlength="13" required="required" class="form-control has-feedback-left">
                    <span class="fa fa-phone form-control-feedback left"></span>
                </div>
            </div>
            <!-- AGAMA KEPERCAYAAN SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Agama / Kepercayaan<span class="required">*</span></label>
                <div class="radio col-md-9 col-sm-9 ">
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama1" name="agama_survivor" value="Islam" <?php if($agama == 'Islam' ){ echo "checked";} ?> >
                            <label for="agama1">Islam</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama2" name="agama_survivor" value="Kristen" <?php if($agama == 'Kristen' ){ echo "checked";} ?>>
                            <label for="agama2">Kristen</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama3" name="agama_survivor" value="Katolik" <?php if($agama == 'Katolik' ){ echo "checked";} ?>>
                            <label for="agama3">Katolik</label>
                        </div>
                    </div>
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama4" name="agama_survivor" value="Hindu" <?php if($agama == 'Hind' ){ echo "checked";} ?>>
                            <label for="agama4">Hindu</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama5" name="agama_survivor" value="Budha" <?php if($agama == 'Budha' ){ echo "checked";} ?>>
                            <label for="agama5">Budha</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama6" name="agama_survivor" value="Kong Hu Cu" <?php if($agama == 'Kong Hu Cu' ){ echo "checked";} ?>>
                            <label for="agama6">Kong Hu Cu</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card pb-3 pt-3">
        <div class="card-header">
            <strong>DATA AKADEMIK DAN KEAHLIAN SURVIVOR</strong>  
        </div>
        <div class="card-body">
            <!-- HOBBY SURVIVOR -->
            <div class="form-group field item row"  id="hobby">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="hobby">Hobby<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    
                    <input type="text"   name="hobby" required="required" class="form-control has-feedback-left" value="<?php echo $baris['hobby'] ?>">
                    <span class="fa fa-futbol-o form-control-feedback left"></span>
                    
                </div>
            </div>
            <!-- KETERAMPILAN SURVIVOR -->
            <div class="form-group row field item"  id="keterampilan">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="keterampilan">Keterampilan<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text"  name="keterampilan" required="required" class="form-control  has-feedback-left" value="<?php echo $baris['keterampilan'] ?>">
                    <span class="fa fa-lightbulb-o form-control-feedback left"></span>
                </div>
            </div>
            <!-- PENDIDIKAN SURVIVOR -->
            <div class="form-group field item row">
                <label for="pendidikan" class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan<span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 ">
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" value="Tidak Sekolah" <?php if($pendidikan_survivor == 'Tidak Sekolah' ){ echo "checked";} ?> required="required"  name="pendidikan_survivor" id="pendidikan1">
                            <label for="pendidikan1">Tidak Sekolah</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" value="TK" <?php if($pendidikan_survivor == 'TK' ){ echo "checked";} ?> required="required" name="pendidikan_survivor" id="pendidikan2">
                            <label for="pendidikan2">TK</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" value="SD" <?php if($pendidikan_survivor== 'SD' ){ echo "checked";} ?>  name="pendidikan_survivor" id="pendidikan3">
                            <label for="pendidikan3">SD</label>
                        </div>
                    </div>
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  value="SLTP" <?php if($pendidikan_survivor == 'SLTP' ){ echo "checked";} ?> name="pendidikan_survivor" id="pendidikan4">
                            <label for="pendidikan4">SLTP</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  value="SLTA" <?php if($pendidikan_survivor == 'SLTA'){ echo "checked";} ?> name="pendidikan_survivor" id="pendidikan5">
                            <label for="pendidikan5">SLTA</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  value="PT/S1/D3/D2" <?php if($pendidikan_survivor == 'PT/S1/D3/D2' ){ echo "checked";} ?> name="pendidikan_survivor" id="pendidikan6">
                            <label for="pendidikan6">PT/S1/D3/D2</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PEKERJAAN SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Pekerjaan<span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 pekerjaan">
                    <div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan" data-id="pekerjaan" id="pekerjaan1" name="pekerjaan_survivor" value="Guru / Dosen" <?php if($pekerjaan == 'Guru / Dosen' ){ echo "checked";} ?>>
                            <label for="pekerjaan1">Guru / Dosen</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan" data-id="pekerjaan" id="pekerjaan2" name="pekerjaan_survivor" value="Pegawai Swasta" <?php if($pekerjaan == 'Pegawai Swasta' ){ echo "checked";} ?>>
                            <label for="pekerjaan2">Pegawai Swasta</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan" data-id="pekerjaan" id="pekerjaan3" name="pekerjaan_survivor" value="Buruh" <?php if($pekerjaan == 'Buruh' ){ echo "checked";} ?>>
                            <label for="pekerjaan3">Buruh</label>
                        </div>
                    </div>
                    <div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan" data-id="pekerjaan" id="pekerjaan4" name="pekerjaan_survivor" value="TNI / POLRI" <?php if($pekerjaan == 'TNI / POLRI' ){ echo "checked";} ?>>
                            <label for="pekerjaan4">TNI / POLRI</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan" data-id="pekerjaan" id="pekerjaan5" name="pekerjaan_survivor" value="Tani" <?php if($pekerjaan == 'Tani' ){ echo "checked";} ?>>
                            <label for="pekerjaan5">Tani</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan" data-id="pekerjaan" id="pekerjaan6" name="pekerjaan_survivor" value="Pelajar / Mahasiswa" <?php if($pekerjaan == 'Pelajar / Mahasiswa' ){ echo "checked";} ?>>
                            <label for="pekerjaan6">Pelajar / Mahasiswa</label>
                        </div>
                    </div>
                    <div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan" data-id="pekerjaan" id="pekerjaan7" name="pekerjaan_survivor" value="PNS / BUMN" <?php if($pekerjaan == 'PNS / BUMN' ){ echo "checked";} ?>>
                            <label for="pekerjaan7">PNS / BUMN</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan" data-id="pekerjaan" id="pekerjaan8" name="pekerjaan_survivor" value="Pedagang" <?php if($pekerjaan == 'Pedagang' ){ echo "checked";} ?> >
                            <label for="pekerjaan8">Pedagang</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan" data-id="pekerjaan" id="pekerjaan9" name="pekerjaan_survivor" value="Wiraswasta" <?php if($pekerjaan == 'Wiraswasta' ){ echo "checked";} ?>>
                            <label for="pekerjaan9">Wiraswasta</label>
                        </div>
                    </div>
                    <div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan" data-id="pekerjaan" id="pekerjaan10" name="pekerjaan_survivor" value="Ibu Rumah Tangga" <?php if($pekerjaan == 'Ibu Rumah Tangga' ){ echo "checked";} ?>/>
                            <label for="pekerjaan10">Ibu Rumah Tangga</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan" data-id="pekerjaan_lain" id="pekerjaan11" name="pekerjaan_survivor" value="Lainnya" <?php if($pekerjaan == 'Lainnya' ){ echo "checked";} ?>/>
                            <label for="pekerjaan11">Pekerjaan Lainnya</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PEKERJAAN LAINNYA SURVIVOR -->
            <div class="form-group field item row" style="display: none;" id="hidden_textbox">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pekerjaan_survivor">Pekerjaan Lainnya<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text"   name="pekerjaan_survivor_lainnya"  class="form-control has-feedback-left" value="<?php echo $baris['pekerjaan_lainnya'] ?>">
                    <span class="fa fa-briefcase form-control-feedback left"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card pb-3 pt-3">
        <div class="card-header">
            <strong>DATA HUBUNGAN SURVIVOR</strong>
        </div>
        <div class="card-body">
            <!-- STATUS PERKAWINAN SURVIVOR-->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Status Perkawinan<span class="required">*</span></label>
                <div class="radio col-md-9 col-sm-9 ">
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_survivor1" class="status_survivor" data-id="status_survivor" name="status_perkawinan_survivor" <?php if($status_perkawinan == 'Menikah' ){ echo "checked";} ?> value="Menikah" >
                            <label for="status_survivor1">Menikah</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_survivor2" class="status_survivor" data-id="status_survivor" name="status_perkawinan_survivor" <?php if($status_perkawinan == 'Tidak Menikah' ){ echo "checked";} ?> value="Tidak Menikah" >
                            <label for="status_survivor2">Tidak Menikah</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_survivor3" class="status_survivor" data-id="status_survivor" name="status_perkawinan_survivor" <?php if($status_perkawinan == 'Sirri' ){ echo "checked";} ?> value="Sirri" >
                            <label for="status_survivor3">Sirri</label>
                        </div>
                    </div>
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_survivor4" class="status_survivor" data-id="status_survivor" name="status_perkawinan_survivor" <?php if($status_perkawinan == 'Cerai'){ echo "checked";} ?> value="Cerai" >
                            <label for="status_survivor4">Cerai</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_survivor5" class="status_survivor" data-id="status_survivor" name="status_perkawinan_survivor" <?php if($status_perkawinan == 'Poligami'){ echo "checked";} ?> value="Poligami" >
                            <label for="status_survivor5">Poligami</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_survivor6" class="status_survivor" data-id="status_survivor_lain" name="status_perkawinan_survivor" <?php if($status_perkawinan == 'Lainnya' ){ echo "checked";} ?> value="Lainnya" >
                            <label for="status_survivor6">Status Lainnya</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- STATUS PERKAWINAN LAINNYA SURVIVOR-->
            <div class="form-group field item row" style="display: none;" id="hidden_status_perkawinan">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="status_perkawinan_survivor">Status Perkawinan Lainnya<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text"   name="status_perkawinan_survivor_lain"  class="form-control  has-feedback-left" value="<?php echo $baris['status_lainnnya'] ?>">
                    <span class="fa fa-user form-control-feedback left"></span>
                </div>
            </div>
            <!-- LAMA HUBUNGAN -->
            <div class="form-group row field item"   id="lama_hubungan_survivor">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="lama_hubungan_survivor">Lama Hubungan/Mengenal Pelaku<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text"  name="lama_hubungan_survivor" required="required" class="form-control has-feedback-left" value="<?php echo $baris['keterampilan'] ?>">
                    <span class="fa fa-clock-o form-control-feedback left"></span>
                </div>
            </div>
            <!-- JUMLAH ANAK SURVIVOR-->
            <div class="form-group row field item"  id="jumlah_anak">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="lama_hubungan_survivor">Jumlah Anak<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 xdisplay_inputx form-group row has-feedback">
                    <select class="form-control has-feedback-left" name="jumlah_anak" id="jumlah_anak">
                        <option value="<?php echo $baris['jumlah_anak'] ?>"><i> <?php echo $baris['jumlah_anak'] ?></i></option>
                        <option value="1 Orang">1 Orang</option>
                        <option value="2 Orang">2 Orang</option>
                        <option value="3 Orang">3 Orang</option>
                        <option value="4 Orang">5 Orang</option>
                        <option value="5 Orang">5 Orang</option>
                        <option value="6 Orang">6 Orang</option>
                        <option value="7 Orang">7 Orang</option>
                        <option value="8 Orang">8 Orang</option>
                        <option value="9 Orang">9 Orang</option>
                        <option value="10 Orang">10 Orang</option>
                    </select>
                    <span class="fa fa-child form-control-feedback left" aria-hidden="true"></span>
                </div>
            </div>
            <!-- PEROLEHAN INFORMASI SURVIVOR -->
            <div class="form-group row field item"  id="perolehan_informasi_survivor">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="perolehn Inofrmasi">Dirujuk Oleh(Perolehan Informasi)<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text"  name="perolehan_informasi_survivor" required="required" class="form-control has-feedback-left" value="<?php echo $baris['keterampilan'] ?>">
                    <span class="fa fa-bullhorn form-control-feedback left"></span>
                </div>
            </div>
        </div>    
    </div>  
    <!-- / FORM INDENTITAS SURVIVOR -->
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

