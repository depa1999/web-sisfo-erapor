<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$thn_ajar=$_POST["thn_ajar1"]."/".$_POST["thn_ajar2"];

// simpan data
$sql="insert thn_ajar values('','$thn_ajar')";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
echo "Data telah tersimpan";
header("location:updateAjaran.php");
?>