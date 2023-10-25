<?php  
require_once ('../../login/connection.php');

if ($_POST['rowid']){
    $id = $_POST['rowid'];
?>
<form role="form" class="form-horizontal form-label-left" method="post" action="../penanganan_penutup/aksitambah.php" >
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Evaluator Konselor<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
    	<input type="hidden" name="id_registrasi" value="<?=$id; ?>">
        <textarea name="evaluator_konselor" id="" cols="30" rows="5" class="form-control"></textarea>
    </div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Evaluasi Akhir<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <textarea name="evaluasi_ahkir" id="" cols="30" rows="5" class="form-control"></textarea>
    </div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Catatan<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <textarea name="catatan" id="" cols="30" rows="5" class="form-control"></textarea>
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

?>
