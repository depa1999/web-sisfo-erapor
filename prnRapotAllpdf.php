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
	<h1>Daftar Siswa Kelas 2<br>
	<sub>SD Negeri Jatibarang 01<sub><br>
	<br>
	<table>	
	<tr>
		<th>Ranking</th>
		<th>NISN</th>
		<th>NIS</th>
		<th>Nama</th>
	</tr>
	');
$sql="select * from siswa as s, guru as g, thn_ajar as t, nilai1 as n1 where 
n1.nis=s.nis and n1.nip = g.nip and n1.idtahun = t.idtahun and kelas='2'
order by n1.jml_nilai desc";		
$qry = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
$no=0;
while($row=mysqli_fetch_assoc($qry)){
	$no++;
	$mpdf->WriteHTML('
	<tr>
		<td style="text-align:center;">'.$no.'</td>
		<td style="text-align:center;">'.$row["nisn"].'</td>
		<td style="text-align:center;">'.$row["nis"].'</td>
		<td style="text-align:center;">'.$row["nama_siswa"].'</td>			
	</tr>
	');
}
$mpdf->WriteHTML('</table>');
$mpdf->WriteHTML('</body></html>');
// Output a PDF file directly to the browser
$mpdf->Output("Data_Siswa_Kelas_2.pdf","I");




	
		
	
