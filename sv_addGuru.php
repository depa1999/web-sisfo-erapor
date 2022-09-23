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


// simpan data
$sql="insert guru values('','$nip','$nama_guru','$tlp_guru','$jabatan','$tempat_guru','$tgl_guru',
'$alamat_guru','$jenkel_guru')";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
echo "Data telah tersimpan";
header("location:updateGuru.php");
?>