<div id="step-2">
    <!-- FORM IDENTITAS SURIVIVOR -->
    <div class="card pb-3 pt-3">
        <div class="card-header">
            <strong>DATA DIRI SURVIVOR </strong> 
        </div>
        <div class="card-body">
            <!-- NAMA SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name_survivor">Nama<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="nama_survivor" name="nama_survivor" required="required" class="form-control has-feedback-left">
                        <span class="fa fa-user form-control-feedback left"></span>
                </div>
            </div>
             <!-- GENDER SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <?php  
                        $sql_gender = mysqli_query($mysqli, "SELECT * FROM tb_jenis_kelamin  WHERE 1 ORDER BY id_jenis_kelamin ASC") or die (mysqli_error($mysqli));
                        while ($row = mysqli_fetch_array($sql_gender)){
                            echo '
                            <div class="radio">
                                <div class="col-sm-3 icheck-greensea">
                                    <input type="radio" id="jenis_kelamin'.$row['id_jenis_kelamin'].'" name="jenis_kelamin" value="'.$row['jenis_kelamin'].'">
                                    <label for="jenis_kelamin'.$row['id_jenis_kelamin'].'">'.$row['jenis_kelamin'].'</label>
                                </div>
                            </div>
                             ';
                        }
                    ?>
                </div>
            </div>
            <!-- TEMPAT LAHIR SURVIVOR -->
            <div class="form-group field item  row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tempat_lahir">Tempat Lahir <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="tempat_lahir" name="tempat_lahir"  required="required" class="form-control has-feedback-left">
                    <span class="fa fa-map-marker form-control-feedback left"></span>
                </div>
            </div>
            <!-- TANGGAL LAHIR SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align " for="tanggal_lahir">Tanggal Lahir<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="tanggal_lahir" name="tanggal_lahir" required="required"  class="form-control has-feedback-left ">
                    <span class="fa fa-calendar-o form-control-feedback left"></span>
                    <span class="">Format Tanggal Lahir :<b> "01 Januari 2019"</b></span>
                </div>
            </div>
            <!-- ALAMAT SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat_survivor">Alamat<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="alamat_survivor" name="alamat_survivor" required="required" class="form-control has-feedback-left ">
                        <span class="fa fa-home form-control-feedback left"></span>
                </div>
            </div>
            <!-- KECAMATAN SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kecamatan">Kecamatan<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="kecamatan" name="kecamatan" required="required" class="form-control has-feedback-left">
                    <span class="fa fa-home form-control-feedback left"></span>
                </div>
            </div>
            <!-- KABUPATEN SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kabupaten">Kabupaten<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <select class="form-control has-feedback-left kabupaten_lain" required name="kabupaten" id="kabupaten">
                        <option value="">-- Pilih Kabupaten --</option>
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
                    <input type="text" class="form-control has-feedback-left" id="kabupaten_lain" name="kabupaten_lain">
                    <span class="fa fa-home form-control-feedback left"></span>

                </div>
            </div>
            <!-- NO TELP SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_telp_survivor">No. Telp<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="tel" id="no_telp_survivor" name="no_telp_survivor" maxlength="13" required="required" class="form-control has-feedback-left">
                    <span class="fa fa-phone form-control-feedback left"></span>
                </div>
            </div>
            <!-- AGAMA KEPERCAYAAN SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Agama / Kepercayaan<span class="required">*</span></label>
                <div class="radio col-md-6 col-sm-6 ">
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required"  id="agama1" name="agama_survivor" value="Islam">
                            <label for="agama1">Islam</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" id="agama2" name="agama_survivor" value="Kristen">
                            <label for="agama2">Kristen</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" id="agama3" name="agama_survivor" value="Katolik">
                            <label for="agama3">Katolik</label>
                        </div>
                    </div>
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" id="agama4" name="agama_survivor" value="Hindu">
                            <label for="agama4">Hindu</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" id="agama5" name="agama_survivor" value="Budha">
                            <label for="agama5">Budha</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" id="agama6" name="agama_survivor" value="Kong Hu Cu">
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
                    <input type="text"   name="hobby" required="required" class="form-control has-feedback-left  ">
                    <span class="fa fa-futbol-o form-control-feedback left"></span>
                </div>
            </div>
            <!-- KETERAMPILAN SURVIVOR -->
            <div class="form-group field item row"  id="keterampilan">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="keterampilan">Keterampilan<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text"  name="keterampilan" required="required" class="form-control  has-feedback-left">
                    <span class="fa fa-lightbulb-o form-control-feedback left"></span>
                </div>
            </div> 
            <!-- PENDIDIKAN SURVIVOR -->
            <div class="form-group field item row">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan</label>
                <div class="col-md-6 col-sm-6 ">
                    
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" value="Tidak Sekolah"  name="pendidikan_survivor" id="pendidikan1">
                            <label for="pendidikan1">Tidak Sekolah</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" value="TK" name="pendidikan_survivor" id="pendidikan2">
                            <label for="pendidikan2">TK</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" value="SD" name="pendidikan_survivor" id="pendidikan3">
                            <label for="pendidikan3">SD</label>
                        </div>
                    </div>
                    
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" value="SLTP" name="pendidikan_survivor" id="pendidikan4">
                            <label for="pendidikan4">SLTP</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" value="SLTA" name="pendidikan_survivor" id="pendidikan5">
                            <label for="pendidikan5">SLTA</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" value="PT/S1/D3/D2" name="pendidikan_survivor" id="pendidikan6">
                            <label for="pendidikan6">PT/S1/D3/D2</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PEKERJAAN SURVIVOR -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Pekerjaan<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 pekerjaan">
                    <div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" class="pekerjaan" data-id="pekerjaan" id="pekerjaan1" name="pekerjaan_survivor" value="Guru / Dosen">
                            <label for="pekerjaan1">Guru / Dosen</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" class="pekerjaan" data-id="pekerjaan" id="pekerjaan2" name="pekerjaan_survivor" value="Pegawai Swasta">
                            <label for="pekerjaan2">Pegawai Swasta</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" class="pekerjaan" data-id="pekerjaan" id="pekerjaan3" name="pekerjaan_survivor" value="Buruh">
                            <label for="pekerjaan3">Buruh</label>
                        </div>
                    </div>
                    <div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" class="pekerjaan" data-id="pekerjaan" id="pekerjaan4" name="pekerjaan_survivor" value="TNI / POLRI">
                            <label for="pekerjaan4">TNI / POLRI</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" class="pekerjaan" data-id="pekerjaan" id="pekerjaan5" name="pekerjaan_survivor" value="Tani">
                            <label for="pekerjaan5">Tani</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" class="pekerjaan" data-id="pekerjaan" id="pekerjaan6" name="pekerjaan_survivor" value="Pelajar / Mahasiswa">
                            <label for="pekerjaan6">Pelajar/Mahasiswa</label>
                        </div>
                    </div>
                    <div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" class="pekerjaan" data-id="pekerjaan" id="pekerjaan7" name="pekerjaan_survivor" value="PNS / BUMN">
                            <label for="pekerjaan7">PNS / BUMN</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" class="pekerjaan" data-id="pekerjaan" id="pekerjaan8" name="pekerjaan_survivor" value="Pedagang">
                            <label for="pekerjaan8">Pedagang</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" class="pekerjaan" data-id="pekerjaan" id="pekerjaan9" name="pekerjaan_survivor" value="Wiraswasta">
                            <label for="pekerjaan9">Wiraswasta</label>
                        </div>
                    </div>
                    <div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" class="pekerjaan" data-id="pekerjaan" id="pekerjaan10" name="pekerjaan_survivor" value="Ibu Rumah Tangga" />
                            <label for="pekerjaan10">Ibu Rumah Tangga</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" class="pekerjaan" data-id="pekerjaan_lain" id="pekerjaan11" name="pekerjaan_survivor" value="Lainnya" />
                            <label for="pekerjaan11">Lainnya</label>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            <!-- PEKERJAAN LAINNYA SURVIVOR -->
            <div class="form-group field item row" style="display: none;" id="hidden_textbox">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pekerjaan_survivor">Pekerjaan Lainnya<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="pekerjaan_lain"  name="pekerjaan_survivor_lainnya" class="form-control has-feedback-left">
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
                <div class="radio col-md-6 col-sm-6 ">
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" id="status_survivor1" class="status_survivor" data-id="status_survivor" name="status_perkawinan_survivor" value="Menikah">
                            <label for="status_survivor1">Menikah</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" id="status_survivor2" class="status_survivor" data-id="status_survivor" name="status_perkawinan_survivor" value="Tidak Menikah">
                            <label for="status_survivor2">Tidak Menikah</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" id="status_survivor3" class="status_survivor" data-id="status_survivor" name="status_perkawinan_survivor" value="Sirri">
                            <label for="status_survivor3">Sirri</label>
                        </div>
                    </div>
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" id="status_survivor4" class="status_survivor" data-id="status_survivor" name="status_perkawinan_survivor" value="Cerai">
                            <label for="status_survivor4">Cerai</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" id="status_survivor5" class="status_survivor" data-id="status_survivor" name="status_perkawinan_survivor" value="Poligami">
                            <label for="status_survivor5">Poligami</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" required="required" id="status_survivor6"  class="status_survivor" data-id="status_survivor_lain"  name="status_perkawinan_survivor" value="Lainnya">
                            <label for="status_survivor6">Status Lainnya</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- STATUS PERKAWINAN LAINNYA SURVIVOR-->
            <div class="form-group field item row" style="display: none;" id="hidden_status_perkawinan">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="status_perkawinan_survivor">Status Perkawinan Lainnya<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="status_perkawinan_survivor_lain"  name="status_perkawinan_survivor_lain"  class="form-control  has-feedback-left">
                    <span class="fa fa-user form-control-feedback left"></span>
                </div>    
            </div>
            <!-- LAMA HUBUNGAN -->
            <div class="form-group field item row"  id="lama_hubungan_survivor">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="lama_hubungan_survivor">Lama Hubungan/Mengenal Pelaku<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                        <input type="text"  name="lama_hubungan_survivor" required="required" class="form-control has-feedback-left">
                        <span class="fa fa-clock-o form-control-feedback left"></span>
                </div>
            </div>
            <!-- JUMLAH ANAK SURVIVOR-->
            <div class="form-group field item row"  id="jumlah_anak">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="lama_hubungan_survivor">Jumlah Anak<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 xdisplay_inputx form-group row has-feedback">
                        <select class="form-control has-feedback-left" name="jumlah_anak" id="jumlah_anak">
                            <option value=""><i> -- Jumlah Anak --</i></option>
                            <option value="Tidak Ada">Tidak Ada</option>
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
            <div class="form-group field item row"  id="perolehan_informasi_survivor">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="perolehn Inofrmasi">Dirujuk Oleh(Perolehan Informasi)<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                        <input type="text"  name="perolehan_informasi_survivor" required="required" class="form-control has-feedback-left">
                        <span class="fa fa-bullhorn form-control-feedback left"></span>
                </div>
            </div>
            <!-- / FORM INDENTITAS SURVIVOR -->
        </div>
    </div>
</div>