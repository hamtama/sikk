<div id="step-3">
	
	
    <!-- CARD DATA DIRI -->
    <div class="card pb-3 pt-3">
        <div class="card-header">
            <strong>DATA DIRI PELAKU</strong>
        </div>
        <!-- CARD BODY -->
        <div class="card-body">
            <!-- NAMA PELAKU -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_pelaku">Nama<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="nama_pelaku" name="nama_pelaku" required="required" class="form-control  has-feedback-left">
                    <span class="fa fa-user form-control-feedback left"></span>
                </div>
            </div>
            <!-- UMUR PELAKU -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="umur_pelaku">Umur<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="umur_pelaku" name="umur_pelaku" required="required" class="form-control  has-feedback-left">
                    <span class="fa fa-sort form-control-feedback left"></span>
                </div>
            </div>
            <!-- ALAMAT PELAKU -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat_pelaku">Alamat<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="alamat_pelaku" name="alamat_pelaku" required="required" class="form-control has-feedback-left">
                    <span class="fa fa-home form-control-feedback left"></span>
                </div>
            </div>
            <!-- NO TELP PELAKU -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_telp_pelaku">No Telp<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="tel" id="no_telp_pelaku" name="no_telp_pelaku" required="required" maxlength="13" class="form-control has-feedback-left ">
                    <span class="fa fa-phone form-control-feedback left"></span>
                </div>
            </div>  
            <!-- AGAMA KEPERCAYAAN PELAKU -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Agama / Kepercayaan<span class="required">*</span></label>
                <div class="radio col-md-6 col-sm-6 ">
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama_p1" name="agama_pelaku" value="Islam">
                            <label for="agama_p1">Islam</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama_P2" name="agama_pelaku" value="Kristen">
                            <label for="agama_P2">Kristen</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama_P3" name="agama_pelaku" value="Katolik">
                            <label for="agama_P3">Katolik</label>
                        </div>
                    </div>
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama_P4" name="agama_pelaku" value="Hindu">
                            <label for="agama_P4">Hindu</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama_P5" name="agama_pelaku" value="Budha">
                            <label for="agama_P5">Budha</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="agama_P6" name="agama_pelaku" value="Kong Hu Cu">
                            <label for="agama_P6">Kong Hu Cu</label>
                        </div>
                        
                    </div>
                    
                </div>
            </div>




        <!-- / CARD BODY -->
        </div>
    <!-- / CARD DATA DIRI   -->
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
                <div class="col-md-6 col-sm-6 ">
                    
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" value="Tidak Sekolah"  name="pendidikan_pelaku" id="pendidikan_p1">
                            <label for="pendidikan_p1">Tidak Sekolah</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" value="TK" name="pendidikan_pelaku" id="pendidikan_p2">
                            <label for="pendidikan_p2">TK</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" value="SD" name="pendidikan_pelaku" id="pendidikan_p3">
                            <label for="pendidikan_p3">SD</label>
                        </div>
                    </div>
                    
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  value="SLTP" name="pendidikan_pelaku" id="pendidikan_p4">
                            <label for="pendidikan_p4">SLTP</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  value="SLTA" name="pendidikan_pelaku" id="pendidikan_p5">
                            <label for="pendidikan_p5">SLTA</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  value="PT/S1/D3/D2" name="pendidikan_pelaku" id="pendidikan_p6">
                            <label for="pendidikan_p6">PT/S1/D3/D2</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PEKERJAAN PELAKU -->
            <div class="form-group field item row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Pekerjaan<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 pekerjaan">
                    <div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p1" name="pekerjaan_pelaku" value="Guru / Dosen">
                            <label for="pekerjaan_p1">Guru / Dosen</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p2" name="pekerjaan_pelaku" value="Pegawai Swasta">
                            <label for="pekerjaan_p2">Pegawai Swasta</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p3" name="pekerjaan_pelaku" value="Buruh">
                            <label for="pekerjaan_p3">Buruh</label>
                        </div>
                    </div>
                    <div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p4" name="pekerjaan_pelaku" value="TNI / POLRI">
                            <label for="pekerjaan_p4">TNI / POLRI</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p5" name="pekerjaan_pelaku" value="Tani">
                            <label for="pekerjaan_p5">Tani</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p6" name="pekerjaan_pelaku" value="Pelajar / Mahasiswa">
                            <label for="pekerjaan_p6">Pelajar/Mahasiswa</label>
                        </div>
                    </div>
                    <div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p7" name="pekerjaan_pelaku" value="PNS / BUMN">
                            <label for="pekerjaan_p7">PNS / BUMN</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p8" name="pekerjaan_pelaku" value="Pedagang">
                            <label for="pekerjaan_p8">Pedagang</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p9" name="pekerjaan_pelaku" value="Wiraswasta">
                            <label for="pekerjaan_p9">Wiraswasta</label>
                        </div>
                    </div>
                    <div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_p" id="pekerjaan_p10" name="pekerjaan_pelaku" value="Ibu Rumah Tangga" />
                            <label for="pekerjaan_p10">Ibu Rumah Tangga</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" class="pekerjaan_p" data-id="pekerjaan_lain_p" id="pekerjaan_p11" name="pekerjaan_pelaku" value="Pekerjaan Lainnya" />
                            <label for="pekerjaan_p11">Pekerjaan Lainnya</label>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            <!-- PEKERJAAN LAINNYA PELAKU -->
            <div class="form-group field item  row" style="display: none;" id="hidden_pekerjaan_pelaku">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pekerjaan_pelaku_lainnya">Pekerjaan Lainnya<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="pekerjaan_pelaku_lainnya"  name="pekerjaan_pelaku_lainnya" required="required" class="form-control has-feedback-left ">
                    <span class="fa fa-briefcase form-control-feedback left"></span>
                </div>
            </div>
        <!-- / CARD BODY KEAHLIAN    -->
        </div>
    <!-- / CARD DAT KEAHLIAN PELAKU -->
    </div>
    <!-- CARD HUBUNGAN PELAKU -->
    <div class="card pb-3 pt-3">
        <div class="card-header">
           <strong> DATA HUBUNGAN DAN LOKASI KEKERASAN </strong>
        </div>
        <!-- CARD BODY HUBUNGAN PELAKU -->
        <div class="card-body">
            <!-- STATUS PERKAWINAN PELAKU-->
            <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Status Perkawinan<span class="required">*</span></label>
                <div class="radio col-md-6 col-sm-6 ">
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_pelaku1" class="status_pelaku" data-id="status_pelaku" name="status_perkawinan_pelaku" value="Menikah">
                            <label for="status_pelaku1">Menikah</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_pelaku2" class="status_pelaku" data-id="status_pelaku" name="status_perkawinan_pelaku" value="Tidak Menikah">
                            <label for="status_pelaku2">Tidak Menikah</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_pelaku3" class="status_pelaku" data-id="status_pelaku" name="status_perkawinan_pelaku" value="Sirri">
                            <label for="status_pelaku3">Sirri</label>
                        </div>
                    </div>
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_pelaku4" class="status_pelaku" data-id="status_pelaku" name="status_perkawinan_pelaku" value="Cerai">
                            <label for="status_pelaku4">Cerai</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_pelaku5" class="status_pelaku" data-id="status_pelaku" name="status_perkawinan_pelaku" value="Poligami">
                            <label for="status_pelaku5">Poligami</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="status_pelaku6" class="status_pelaku" data-id="status_pelaku_lain" name="status_perkawinan_pelaku" value="Lainnya">
                            <label for="status_pelaku6">Status Lainnya</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- STATUS PERKAWINAN LAINNYA PELAKU-->
            <div class="form-group field item row" style="display: none;" id="hidden_status_perkawinan_p">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="status_perkawinan_pelaku">Status Perkawinan Lainnya<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="status_perkawinan_pelaku_lain"  name="status_perkawinan_pelaku_lain" required="required" class="form-control has-feedback-left ">
                    <span class="fa fa-user form-control-feedback left"></span>
                </div>
            </div>
            <!-- HUBUNGAN DENGAN KORBAN -->
            <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Hubungan Dengan Korban<span class="required">*</span></label>
                <div class="radio col-md-6 col-sm-6 ">
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" id="hubungan_p1" class="hubungan" data-id="hubungan" name="hubungan_korban" value="Suami">
                            <label for="hubungan_p1">Suami</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" id="hubungan_p2" class="hubungan" data-id="hubungan" name="hubungan_korban" value="Istri">
                            <label for="hubungan_p2">Istri</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" id="hubungan_p3" class="hubungan" data-id="hubungan" name="hubungan_korban" value="Orang Tua">
                            <label for="hubungan_p3">Orang Tua</label>
                        </div>
                    </div>
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" id="hubungan_p4" class="hubungan" data-id="hubungan" name="hubungan_korban" value="Keluarga">
                            <label for="hubungan_p4">Keluarga</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="hubungan_p5" class="hubungan" data-id="hubungan" name="hubungan_korban" value="Pacar">
                            <label for="hubungan_p5">Pacar</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="hubungan_p6" class="hubungan" data-id="hubungan_lainnya" name="hubungan_korban" value="Lainnya">
                            <label for="hubungan_p6">Lainnya</label>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            <!-- HUBUNGAN DENGAN KORBAN LAINNYA-->
            <div class="form-group field item row" style="display: none;" id="hidden_hubungan_korban">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="hubungan_lainnya">Hubungan Dengan Korban<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="hubungan_pelaku_lainnya"  name="hubungan_pelaku_lainnya" required="required" class="form-control has-feedback-left ">
                    <span class="fa fa-refresh form-control-feedback left"></span>
                </div>
            </div>
            <!-- LOKASI KASUS -->
            <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Lokasi Kasus<span class="required">*</span></label>
                <div class="radio col-md-6 col-sm-6 ">
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" id="lokasi_p1" class="lokasi" data-id="lokasi" name="lokasi_kasus" value="Rumah Tangga">
                            <label for="lokasi_p1">Rumah Tangga</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" id="lokasi_p2" class="lokasi" data-id="lokasi" name="lokasi_kasus" value="Tempat Kerja">
                            <label for="lokasi_p2">Tempat Kerja</label>
                        </div>
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" id="lokasi_p3" class="lokasi" data-id="lokasi" name="lokasi_kasus" value="Tempat Umum">
                            <label for="lokasi_p3">Tempat Umum</label>
                        </div>
                    </div>
                    <div class="radio">
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio" id="lokasi_p4" class="lokasi" data-id="lokasi" name="lokasi_kasus" value="Sekolah">
                            <label for="lokasi_p4">Sekolah</label>
                        </div>
                        
                        <div class="col-sm-4 icheck-greensea">
                            <input type="radio"  id="lokasi_p5" class="lokasi" data-id="lokasi_lainnya" name="lokasi_kasus" value="Lainnya">
                            <label for="lokasi_p5">Lokasi Lainnya</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- LOKASI KASUS LAINNYA-->
            <div class="form-group field item row" style="display: none;" id="hidden_lokasi">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="lokasi_lainnya">Lokasi Kasus Lainnya<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="lokasi_lainnya"  name="lokasi_lainnya" required="required" class="form-control has-feedback-left ">
                    <span class="fa fa-map-marker form-control-feedback left"></span>
                </div>
            </div>
        <!-- / CARD BODY HUBUNGAN PELAKU -->
        </div>
    <!-- / CARD HUBUNGAN PELAKU -->
    </div>       
</div>