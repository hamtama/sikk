 <div id="step-4">
    
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
        <!-- <input type="button" value="Check" class="btn btn-success check" name="submit"> -->
    </div>