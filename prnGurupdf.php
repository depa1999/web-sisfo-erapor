<?php
require_once __DIR__ . '/vendor/autoload.php';
require "fungsi.php";

$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:

$mpdf->WriteHTML('
	<!DOCTYPE html>
	<html>
	<head>
	    <title>Sistem Informasi Akademik::Daftar Mahasiswa</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/stylepdf.css">
	</head>
	<body>
	<h1>Daftar Guru<br>
	<sub>SD Negeri Jatibarang 01<sub><br>
	<br>
	<table>	
	<tr>
		<th>No.</th>
		<th>NIP</th>
		<th>Nama Guru</th>
		<th>No Telepon</th>
        <th>Jabatan</th>
	</tr>
	');
$sql="select * from guru";		
$qry = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
$no=0;
while($row=mysqli_fetch_assoc($qry)){
	$no++;
	$mpdf->WriteHTML('
	<tr>
		<td>'.$no.'</td>
		<td>'.$row["nip"].'</td>
		<td style="text-align:center;">'.$row["nama_guru"].'</td>	
        <td>'.$row["tlp_guru"].'</td>
        <td>'.$row["jabatan"].'</td>		
	</tr>
	');
}
$mpdf->WriteHTML('</table>');
$mpdf->WriteHTML('</body></html>');
// Output a PDF file directly to the browser
$mpdf->Output("Data_Siswa_Kelas_2.pdf","I");




	
		
	
