<?php
session_start();
//mengaktifkan session
require 'fungsi.php';
//menyambungkan dengan file koneksi

$username = $_POST['username'];
//mengecek username
$password = $_POST['password'];
//Mengecek password

$login = mysqli_query($koneksi, "select * from user where 
	username='$username' and password='$password'");
//mulai mengecek dan menyambungkan ke tabel user berdasarkan username dan password
$cek = mysqli_num_rows($login);
//kemudain menghitung data yang ada

if ($cek > 0) {
	//kemudain dipastikan data ada / tidak
	$data = mysqli_fetch_assoc($login);
	if ($data['status'] == "admin") {
		//Jika user login sebagai admin 
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "admin";
		header("location:homeadmin.php");
		

	} else if ($data['status'] == "Wali Kelas 2") {
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "Wali Kelas 2";
		header("location:homeguru.php");

	} else if ($data['status'] == "Wali Kelas 1") {
		//Jika user login sebagai dsn
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "Wali Kelas 1";
		header("location:homeguru2.php");

	} else if ($data['status'] == "Wali Kelas 3") {
		//Jika user login sebagai dsn
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "Wali Kelas 3";
		header("location:homeguru3.php");

	} else if ($data['status'] == "Wali Kelas 4") {
		//Jika user login sebagai dsn
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "Wali Kelas 4";
		header("location:homeguru4.php");

	} else if ($data['status'] == "Wali Kelas 5") {
		//Jika user login sebagai dsn
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "Wali Kelas 5";
		header("location:homeguru5.php");

	} else if ($data['status'] == "Wali Kelas 6") {
		//Jika user login sebagai dsn
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "Wali Kelas 6";
		header("location:homeguru6.php");

	} else {
		header("location:login.php?pesan=gagal");
		// jika data tidak ada maka di lemparkan ke halaman utama web
	}
} else {
	header("location:login.php?pesan=gagal");
}
