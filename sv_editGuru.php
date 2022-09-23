<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$nip=$_POST["nip"];
$nama_guru=$_POST["nama_guru"];
$tlp_guru=$_POST["tlp_guru"];
$jabatan=$_POST["jabatan"];
$tempat_guru=$_POST["tempat_guru"];
$tgl_guru=$_POST["tgl_guru"];
$alamat_guru=$_POST["alamat_guru"];
$jenkel_guru=$_POST["jenkel_guru"];
$uploadOk=1;

//membuat query
$sql="update guru set nama_guru='$nama_guru',
					 tlp_guru='$tlp_guru',
                     jabatan='$jabatan',
					 tempat_guru='$tempat_guru',
					 tgl_guru='$tgl_guru',
					 alamat_guru='$alamat_guru',
					 jenkel_guru='$jenkel_guru'
					 where nip='$nip'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:updateGuru.php");
?>