<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$nis=$_POST["nis"];
$nisn=$_POST["nisn"];
$nama_siswa=$_POST["nama_siswa"];
$alamat_siswa=$_POST["alamat_siswa"];
$tempat_siswa=$_POST["tempat_siswa"];
$tgl_siswa=$_POST["tgl_siswa"];
$jenkel_siswa=$_POST["jenkel_siswa"];
$kelas=$_POST["kelas"];

// simpan data
$sql="insert siswa values('$nis','$nisn','$nama_siswa','$kelas','$alamat_siswa','$tempat_siswa',
'$tgl_siswa','$jenkel_siswa')";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
echo "Data telah tersimpan";
header("location:updateSiswa.php");
?>