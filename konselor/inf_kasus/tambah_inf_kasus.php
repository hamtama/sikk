<?php
require_once ('../../login/connection.php');
if (isset($_POST['id'])){
    $id = $_POST['id'];
    
    echo $id;
    switch ($id) {
        case '1' :  $aksi ="aksitambah_jkasus.php"; 
                    $judul ="Jenis Kasus";
                    $input ="jenis_kasus";
                    
            break;
        case '2' :  $aksi ="aksitambah_kdrt.php";
                    $judul ="Jenis Kekerasan KDRT";
                    $input ="kekerasan_kdrt";
                    
            break;
        case '3' :  $aksi ="aksitambah_jkekerasan.php";  
                    $judul ="Jenis Kekerasan";
                    $input ="jenis_kekerasan";
            break;
    }
    ?>
<form role="form" class=""  action="<?=$aksi?>" method="post">
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align"><?=$judul?><span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="hidden" id="judul" value="Tambah Data <?=$judul?>">
            <input class="form-control" name="<?=$input?>" required="required" type="text" value="" />
        </div>
    </div>
    <div class="ln_solid">
        <div class="form-group">
            <div class="col-md-6 offset-md-3">
                <button type='reset'  class="btn btn-success">Reset</button>
                <button type="submit"  class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</form>
                       
<?php  
}
?>