<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$username=$_POST["username"];
$password=$_POST["password"];
$status=$_POST["status"];

// simpan data
$sql="insert user values('','$username','$password','$status')";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
echo "Data telah tersimpan";
header("location:updateUser.php");
?>