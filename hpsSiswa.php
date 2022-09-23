<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$id=$_GET["kode"];

//membuat query hapus data
$sql="delete from siswa where nis=$id";
mysqli_query($koneksi,$sql);
header("location:updateSiswa.php");
?>