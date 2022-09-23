<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$nis=$_POST["nis"];
$nisn=$_POST["nisn"];
$nama_siswa=$_POST["nama_siswa"];
$kelas=$_POST["kelas"];
$alamat_siswa=$_POST["alamat_siswa"];
$tempat_siswa=$_POST["tempat_siswa"];
$tgl_siswa=$_POST["tgl_siswa"];
$jenkel_siswa=$_POST["jenkel_siswa"];
$uploadOk=1;

//membuat query
$sql="update siswa set nisn='$nisn',
					 nama_siswa='$nama_siswa',
					 kelas='$kelas',
					 alamat_siswa='$alamat_siswa',
					 tempat_siswa='$tempat_siswa',
					 tgl_siswa='$tgl_siswa',
					 jenkel_siswa='$jenkel_siswa'
					 where nis='$nis'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:updateSiswa.php");
?>