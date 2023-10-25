<?php
require_once ('../../layout/wrapperadmin/head.php');
require_once ('../../layout/wrapperadmin/sidebar.php');
require_once ('../../layout/wrapperadmin/header.php');
require_once ('../../layout/wrapperadmin/content.php');

$tanggal = strtotime("19.September.2020");
                $tgl =  date("Y-m-d",$tanggal);
echo $tgl;
$tanggal = strtotime("2020-09-19");
$tgl2 =  date("d.M.Y",$tanggal);
echo $tgl2;
require_once ('../../layout/wrapperadmin/footer.php');
?>