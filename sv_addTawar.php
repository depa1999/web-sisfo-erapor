<?php
require "fungsi.php";

$idmatkul=$_POST['idmatkul'];
$npp=$_POST['npp'];
$klp=$_POST['klp'];
$hari=$_POST['hari'];
$jamkul=$_POST['jamkul'];
$ruang=$_POST['ruang'];
if($status=$_POST['status']=='Ditawarkan'){
    $status=1;
}else{
    $status=0;
}


$sql="insert kultawar values('','$idmatkul','$npp','$klp','$hari','$jamkul','$ruang','$status')";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
//header("location:addTawar.php");
echo "Data telah tersimpan";
?>