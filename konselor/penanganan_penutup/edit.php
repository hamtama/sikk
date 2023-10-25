<?php  
require_once ('../../login/connection.php');

if ($_POST['rowid']){
    $id = $_POST['rowid'];
    $sql = "SELECT * FROM tb_penutup WHERE id_registrasi = '$id'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris){

?>
<form role="form" class="form-horizontal form-label-left" method="post" action="aksiedit.php" >
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Evaluator Konselor<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
    	<input type="hidden" name="id_registrasi" value="<?=$baris['id_registrasi']; ?>">
        <textarea name="evaluator_konselor" id="" cols="30" rows="5" class="form-control"><?=$baris['evaluator_konselor'] ?></textarea>
    </div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Evaluasi Akhir<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <textarea name="evaluasi_akhir" id="" cols="30" rows="5" class="form-control"><?=$baris['evaluasi_akhir'] ?></textarea>
    </div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Catatan<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <textarea name="catatan" id="" cols="30" rows="5" class="form-control"><?=$baris['catatan'] ?></textarea>
    </div>
</div>
<div class="form-group">
            <div class="col-md-6 offset-md-3">
                <button  type="submit" class="btn-sm btn-success"><i class="fa fa-check-square-o"></i> Selesai</button>
            </div>
        </div>
</form>
<?php  
}
}
?>
