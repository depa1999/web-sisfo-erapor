<?php
require_once __DIR__ . '/vendor/autoload.php';
require "fungsi.php";

$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:

$id=$_GET["kode"];
$sql="select * from siswa as s, guru as g, thn_ajar as t, nilai1 as n1 where 
n1.nis=s.nis and n1.nip = g.nip and n1.idtahun = t.idtahun and idnilai1=$id";

$qry = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
$no=0;
while($row=mysqli_fetch_assoc($qry)){
	$no++;
	$mpdf->WriteHTML('
	<!DOCTYPE html>
	<html>
	<head>
	    <title>Laporan Hasil Belajar Siswa</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/stylepdf.css">
	</head>
	<body>
	<h1 style="text-align:center;">LAPORAN HASIL BELAJAR SISWA<br>
	<sub>SD Negeri Jatibarang 01<sub><br>
	<small>Tahun Ajaran '.$row["thn_ajar"].'</small></h1>
    <br>
    <h5>
    <table style="border=0px;">
        <tr style="border:0px;">
            <td>Nama Peserta Didik&nbsp;&nbsp;:&nbsp;&nbsp;'.$row["nama_siswa"].'</td>
            <td>Nomor Induk Siswa&nbsp;&nbsp;:&nbsp;&nbsp;'.$row["nis"].'</td><br>
        </tr>
        <tr style="background-color:white; border:0px">
            <td>Semester&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;'.$row["semester"].'</td>
            <td>Kelas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;:&nbsp;&nbsp;'.$row["kelas"].'</td>
        </tr>
    </table>
    </h5>
    <br>
    <table style="margin-left:auto;">	
	<tr>
		<th>No.</th>
		<th>Mata Pelajaran</th>
		<th>Nilai Hasil Belajar
            <table>
                <tr style="border:0px;">
                    <td>Angka</td>
                    <td>Predikat</td>
                </tr>
            </table>
        </th>
	</tr>
    <tr style="background-color:white;">
        <td style="text-align:center;">1</td>
        <td style="text-align:center;">Bahasa Indonesia</td>
        <td>
            <table>
                <tr style="border:0px;">
                    <td style="text-align:center;">'.$row["n_bindo"].'</td>
                    <td style="text-align:center;">'.$row["p_bindo"].'</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align:center;">2</td>
        <td style="text-align:center;">Pendidikan Agama</td>
        <td>
            <table>
                <tr style="border:0px;">
                    <td style="text-align:center;">'.$row["n_agama"].'</td>
                    <td style="text-align:center;">'.$row["p_agama"].'</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr style="background-color:white;">
        <td style="text-align:center;">3</td>
        <td style="text-align:center;">PKN</td>
        <td>
            <table>
                <tr style="border:0px;">
                    <td style="text-align:center;">'.$row["n_pkn"].'</td>
                    <td style="text-align:center;">'.$row["p_pkn"].'</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align:center;">4</td>
        <td style="text-align:center;">Matematika</td>
        <td>
            <table>
                <tr style="border:0px;">
                    <td style="text-align:center;">'.$row["n_mtk"].'</td>
                    <td style="text-align:center;">'.$row["p_mtk"].'</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr style="background-color:white;">
        <td style="text-align:center;">5</td>
        <td style="text-align:center;">PJOK</td>
        <td>
            <table>
                <tr style="border:0px;">
                    <td style="text-align:center;">'.$row["n_pjok"].'</td>
                    <td style="text-align:center;">'.$row["p_pjok"].'</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr style="background-color:white;">
        <td style="text-align:center;">6</td>
        <td style="text-align:center;">SBDP</td>
        <td>
            <table>
                <tr style="border:0px;">
                    <td style="text-align:center;">'.$row["n_sbdp"].'</td>
                    <td style="text-align:center;">'.$row["p_sbdp"].'</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr style="background-color:white;">
        <td style="text-align:center;">5</td>
        <td style="text-align:center;">Bahasa Jawa</td>
        <td>
            <table>
                <tr style="border:0px;">
                    <td style="text-align:center;">'.$row["n_bjawa"].'</td>
                    <td style="text-align:center;">'.$row["p_bjawa"].'</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>Total Nilai</td>
        <td></td>
        <td></td>
            <table>
                <tr style="border:0px;">
                    <td style="text-align:center;">'.$row["jml_nilai"].'</td>
                    <td></td>
                </tr>
            </table>
    </tr>
	');
}
$mpdf->WriteHTML('</table>');
$id=$_GET["kode"];
$sql="select * from siswa as s, guru as g, nilai1 as n1 where 
n1.nis=s.nis and n1.nip = g.nip and idnilai1=$id";

$qry = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
$no=0;
while($row=mysqli_fetch_assoc($qry)){
    $no++;
    $mpdf->WriteHTML('
    <br>
<p style="text-align:right; padding-right:40px;">Wali Kelas</p><br>
<p style="text-align:right;">'.$row["nama_guru"].'</p>
');
}
$mpdf->WriteHTML('</body></html>');

// Output a PDF file directly to the browser
$mpdf->Output("Laporan Hasil Belajar.pdf","I");