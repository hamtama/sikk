<div id="step-1" class="p-5 overflow-hidden">
    <!-- FORM HOME PAGE -->
        <div class="form-group field item row">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_registrasi">No. Registrasi <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">


                <?php
                        
                        $sql_registrasi = mysqli_query($mysqli, "SELECT * FROM tb_registrasi ORDER BY id_registrasi DESC LIMIT 1") or die (mysqli_error($mysqli));
                        while ($row = mysqli_fetch_array($sql_registrasi)){
                            $no_urut ='';
                            $ex_date = explode('-', $row['hari_tanggal']);
                            $date = $ex_date[2];
                            $mount = $ex_date[1];
                            $bln = date('m');
                            switch ($bln) {
                                case '01':
                                    $bln = 'I';
                                    break;
                                case '02':
                                    $bln = 'II';
                                    break;
                                case '03':
                                    $bln = 'III';
                                    break;
                                case '04':
                                    $bln = 'IV';
                                    break;
                                case '05':
                                    $bln = 'V';
                                    break;
                                case '06':
                                    $bln = 'VI';
                                    break;
                                case '07':
                                    $bln = 'VII';
                                    break;
                                case '08':
                                    $bln = 'VIII';
                                    break;
                                case '09':
                                    $bln = 'IX';
                                    break;
                                case '10':
                                    $bln = 'X';
                                    break;
                                case '11':
                                    $bln = 'XI';
                                    break;
                                case '12':
                                    $bln = 'XII';
                                    break;
                            }
                            $ex_no = explode('/', $row['no_registrasi']);
                            if ($date == '31' and $mount == '12') {
                                $no_urut = 0;
                            } else {
                                $no_urut = $ex_no[0];
                            }
                            $no_registrasi = $no_urut+1;
                            $tahun = date('Y');
                            $reg = $no_registrasi."/P2TPAKK-RDU/".$bln."/".$tahun;
                            echo '<input type="text" id="no_registrasi_terakhir" value="'.$reg.'"name="no_registrasi" class="form-control has-feedback-left">';
                        }
                    ?>
                <span class="fa fa-file-text form-control-feedback left"></span>
            </div>
        </div>  
        <!-- TANGGAL REGISTRASI -->
        <div class="form-group field item row" >
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal">Tanggal <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 " >
                
                <div class="input-group date" id="myDatepicker" >
                    <input type="text"  id="myDatepicker" name="tanggal" required="required" class="form-control has-feedback-left ml-0">
                    <span class="fa fa-calendar form-control-feedback left"></span>
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    
                </div>

            </div>
        </div>
        <!-- KONSELOR HOME PAGE -->
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
        <!-- MEDIA HOME PAGE -->
        <div class="form-group field item row">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Media<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <select class="form-control has-feedback-left" name="media" id="media" required="required">
                    <option value="">-- Pilih Media --</option>
                    <option value="Tatap Muka">Tatap Muka</option>
                    <option value="Surat">Surat</option>
                    <option value="Telepon">Telepon</option>
                    <option value="Outreach">Outreach</option>
                    <option value="Email">Email</option>
                </select>
                <span class="fa fa-video-camera form-control-feedback left"></span>
            </div>
        </div>
        <!-- / MEDIA HOME PAGE -->
</div>