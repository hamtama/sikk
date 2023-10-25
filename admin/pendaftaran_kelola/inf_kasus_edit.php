<?php 
// error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE); 
require_once ('../../login/connection.php');
if ($_POST['id_kasus']  && $_POST['id_kdrt'] && $_POST['id']){
    $id = $_POST['id'];
    $id_kasus = $_POST['id_kasus'];
    $id_kdrt = $_POST['id_kdrt'];       
    switch(($id_kasus)AND($id_kdrt)){
        case (($id_kasus == '1')AND($id_kdrt == '2')) :   
            $judul = "INPUT INFORMASI KASUS KEKERASAN DALAM RUMAH TANGGA"; 
            $jenis_kekerasan = "KTI (KEKERASAN TERHADAP ISTRI)";    
            $table = "tb_kdrt_kti";
            break ;
        case (($id_kasus == '1'AND $id_kdrt == '3')) :
            $judul = "INPUT INFORMASI KASUS KEKERASAN DALAM RUMAH TANGGA";
            $jenis_kekerasan = 'KTA (KEKERASAN TERHADAP ANAK)';
            $table = 'tb_kdrt_kta';
            break ;
        case (($id_kasus == '1'AND $id_kdrt == '4')) :
            $judul = "INPUT INFORMASI KASUS KEKERASAN DALAM RUMAH TANGGA";
            $jenis_kekerasan = 'KTS (KEKERASAN TERHADAP SUAMI)';
            $table = 'tb_kdrt_ktS';
            break ;
        case (($id_kasus == '1'AND $id_kdrt == '7')) :
            $judul = "INPUT INFORMASI KASUS KEKERASAN DALAM RUMAH TANGGA";
            $jenis_kekerasan = 'KDRT LAIN-LAIN';
            $table = 'tb_kdrt_lain';
            break ;
        case (($id_kasus == '3'AND $id_kdrt == '1')) :  
            $judul = "INPUT INFORMASI KASUS KEKERASAN LUAR RUMAH TANGGA";
            $jenis_kekerasan = 'KEKERARASAN TERHADAP PEREMPUAN';
            $table = 'tb_ktp';
            break ;

        case (($id_kasus == '4'AND $id_kdrt == '1')) :
            $judul = "INPUT INFORMASI KASUS KEKERASAN DALAM LUAR TANGGA";
            $jenis_kekerasan = 'KEKERASAN TERHADAP ANAK';
            $table = 'tb_kta';
            break ;    
    }
?>
<form id="action" action="" method="post">
    <!-- CARD KDRT -->
    <div class="card pt-3 pb-3">
        <div class="card-header">
            <h2 class="text-center"><?=$judul?></h2>
        </div>
        <div class="card-body">
            <!-- CARD BODY KDRT -->
            <strong class="col-md-12 text-center"><?=$jenis_kekerasan?></strong>
            <input type="hidden" id="id" name="id" value="<?=$id?>">
            <input type="hidden" id="id_kasus" name="id_kasus" value="<?=$id_kasus?>">
            <input type="hidden" id="id_kdrt" name="id_kdrt" value="<?=$id_kdrt?>">
                <?php
                $sql = "SELECT * FROM $table INNER JOIN tb_jenis_kekerasan ON tb_jenis_kekerasan.id_jk = $table.id_jk WHERE id_registrasi = '$id'";
                    $result = $mysqli->query($sql);
                    
                        $keterangan = array();
                    while($baris = mysqli_fetch_array($result)){
                        $id_k = $baris[0];
                        $no_registrasi = $baris['id_registrasi'];
                        $id_kekerasan = $baris['id_jk'];
                        
                        if($baris['keterangan']== ''){ $keterangan = '';} else {
                            $keterangan[] = $baris['keterangan'];
                        }
                        ?>
                        <div class="form-group field item row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kekerasan</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="hidden" id="id_edit" name="id_edit[]" value="<?=$id_k?>">
                                    <input  type="checkbox" id="id_hapus<?=$id_k?>" name="id_hapus"  value="<?=$id_k?>" style="display: none;">
                                    <select class="form-control has-feedback-left" name="kti[]" required="required">
                                        <option value="<?=$id_kekerasan?>"><?=$baris['jenis_kekerasan']?></option>
                                         <?php
                                         $sql_kti = mysqli_query($mysqli, "SELECT * FROM tb_jenis_kekerasan WHERE 1 ORDER BY id_jk ASC") or die (mysqli_error($mysqli));
                                        while ($row = mysqli_fetch_array($sql_kti)) {
                                            
                                        echo '<option value="'.$row['id_jk'].'">'.$row['jenis_kekerasan'].' </option> ';
                                        }
                                        ?>
                                    </select>
                                    <span class="fa fa-user form-control-feedback left"></span>
                                </div>
                                
                                <script type="text/javascript">
                                $('#hapus_<?=$id_k?>').click(function(){
                                    $('#id_hapus<?=$id_k?>').attr('checked', true);
                                });
                                </script>
                                <button type="submit" class="btn btn-danger hapus" id="hapus_<?=$id_k?>"><i class="fa fa-trash p-1"></i></buuton>
                        </div>

                    <?php
                    }
                    ?>
            <div class="form-group field item row p-3">
                
                <label class="col-form-label col-md-12 col-sm-12">Keterangan KDRT KTI<span class="required">*</span></label>
                <div>
                    <textarea name="ket" cols="60"  rows="3" class="form-control"><?php if(!empty($keterangan)){foreach ($keterangan as $ket) {echo $ket[1];
                    } 
                    } else {
                        echo 'TIdak Ada';
                    } ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <input type="submit" value="Simpan" class="btn btn-success submit" name="submit">
</form>
<?php
}
?>
<script type="text/javascript">
$('.hapus').click(function(){
    if(confirm('Apakah Yakin Akan Menghapus Data')){
        $('#action').attr('action', 'inf_kasus_delete.php');
        $('#action').submit();
    } 
});

$('.submit').click(function(){
  $('#action').attr('action', 'inf_kasus_aksiedit.php');
  $('#action').submit();
});
</script>