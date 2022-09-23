<?php
require "tampilan.php";
?>

<body>
<?php

//memanggil file berisi fungsi2 yang sering dipakai
require "fungsi.php";

/*	---- cetak data per halaman ---------	*/

//--------- konfigurasi

//jumlah data per halaman
$jmlDataPerHal = 3;

//cari jumlah data
if (isset($_POST['cari'])) {
	$cari = $_POST['cari'];
	$sql = "select * from siswa as s, guru as g, nilai1 as n1 where 
					 n1.nis=s.nis and n1.nip = g.nip 
					 having 
					 nisn like'%$cari%' 
					 order by s.nama_siswa asc, g.nama_guru asc";
} else {
	$sql = "select * from siswa as s, guru as g, nilai1 as n1 where 
					 n1.nis=s.nis and n1.nip = g.nip
					 order by s.nama_siswa asc, g.nama_guru asc";
}
$qry = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
$jmlData = mysqli_num_rows($qry);

$jmlHal = ceil($jmlData / $jmlDataPerHal);
if (isset($_GET['hal'])) {
	$halAktif = $_GET['hal'];
} else {
	$halAktif = 1;
}

$awalData = ($jmlDataPerHal * $halAktif) - $jmlDataPerHal;

//Jika tabel data kosong
$kosong = false;
if (!$jmlData) {
	$kosong = true;
}
//data berdasar pencarian atau tidak
if (isset($_POST['cari'])) {
	$cari = $_POST['cari'];
	$sql = " select * from siswa as s, guru as g, nilai1 as n1 where 
					   n1.nis=s.nis and n1.nip = g.nip 
					   having 
					   nisn like'%$cari%'
					   order by s.nama_siswa asc, g.nama_guru asc
					   limit $awalData,$jmlDataPerHal";
} else {
	$sql = "select * from siswa as s, guru as g, nilai1 as n1 where 
					  n1.nis=s.nis and n1.nip = g.nip
					  order by s.nama_siswa asc, g.nama_guru asc 
					  limit $awalData,$jmlDataPerHal";
}
//Ambil data untuk ditampilkan
$hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

?>
	<br><br>
	<ul class="pagination">
			<?php
			//navigasi pagination
			//cetak navigasi back
			if ($halAktif > 1) {
				$back = $halAktif - 1;
				echo "<li class='page-item'><a class='page-link' href=?hal=$back>&laquo;</a></li>";
			}
			//cetak angka halaman
			for ($i = 1; $i <= $jmlHal; $i++) {
				if ($i == $halAktif) {
					echo "<li class='page-item'><a class='page-link' href=?hal=$i style='font-weight:bold;color:red;'>$i</a></li>";
				} else {
					echo "<li class='page-item'><a class='page-link' href=?hal=$i>$i</a></li>";
				}
			}
			//cetak navigasi forward
			if ($halAktif < $jmlHal) {
				$forward = $halAktif + 1;
				echo "<li class='page-item'><a class='page-link' href=?hal=$forward>&raquo;</a></li>";
			}
			?>
		</ul>
	<table class="table table-hover">
		<thead class="thead-light">
			<tr>
				<th>No.</th>
				<th>NISN</th>
				<th>Nama Siswa</th>
				<th>Semester</th>
				<th>Kelas</th>
				<th>Wali Kelas</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php
					//jika data tidak ada
					if ($kosong) {
				?>
				<tr>
					<th colspan="6">
						<div class="alert alert-info alert-dismissible fade show text-center">
							<!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
							Data tidak ada
						</div>
					</th>
				</tr>
				<?php
					} else {
						if ($awalData == 0) {
							$no = $awalData + 1;
						} else {
							$no = $awalData;
						}
					while ($row = mysqli_fetch_assoc($hasil)) {
				?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $row["nisn"] ?></td>
				<td><?php echo $row["nama_siswa"] ?></td>
				<td><?php echo $row["semester"] ?></td>
				<td><?php echo $row["kelas"] ?></td>
				<td><?php echo $row["nama_guru"] ?></td>
				<td>
					<a href="prnRapotPdf.php?kode=<?php echo $row['idnilai1']?>">Cetak Rapot</a>
				</td>
			</tr>
			<?php
						$no++;
					}
				}
				?>
		</tbody>
	</table>
</body>