<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informasi Akademik</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>

<body>
	<?php
	require "fungsi.php";
	require "head.html";
	$nis = $_GET['kode'];
	$sql = "select * from siswa where nis='$nis'";
	$qry = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-3 text-center" style="margin-top: 2cm;">KOREKSI DATA SISWA</h2>
		<div class="row">
			<div class="col-sm-9">
				<form enctype="multipart/form-data" method="post" action="sv_editSiswa.php">
					<div class="form-group">
						<label for="nis">NIS:</label>
						<input class="form-control" type="text" name="nis" id="nis" value="<?php echo $row['nis'] ?>" readonly>
					</div>
					<div class="form-group">
						<label for="nisn">NISN:</label>
						<input class="form-control" type="text" name="nisn" id="nisn" value="<?php echo $row['nisn'] ?>">
					</div>
					<div class="form-group">
						<label for="nama">Nama:</label>
						<input class="form-control" type="text" name="nama_siswa" id="nama_siswa" value="<?php echo $row['nama_siswa'] ?>">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat:</label>
						<input class="form-control" type="text" name="alamat_siswa" id="alamat_siswa" value="<?php echo $row['alamat_siswa'] ?>">
					</div>
					<div class="form-group">
						<label for="tempat">Tempat Lahir:</label>
						<input class="form-control" type="text" name="tempat_siswa" id="tempat_siswa" value="<?php echo $row['tempat_siswa'] ?>">
					</div>
					<div class="form-group">
						<label for="tgl">Tanggal Lahir:</label>
						<input class="form-control" type="date" name="tgl_siswa" id="tgl_siswa" value="<?php echo $row['tgl_siswa'] ?>">
					</div>
					<div class="form-group">
						<label for="jenkel">Jenis Kelamin:</label>
						<select class="form-control" name="jenkel_siswa" id="jenkel_siswa">
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="kelas">Kelas:</label>
						<select class="form-control" name="kelas" id="kelas">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
						</select>
					</div>
					<div>
						<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
					</div>
					<input type="hidden" name="nis" id="nis" value="<?php echo $nis ?>">
				</form>
			</div>
		</div>
	</div>
	<script>
		$('#submit').on('click', function() {
			var nis = $('#nis').val();
			var nisn = $('#nisn').val();
			var nama_siswa = $('#nama_siswa').val();
			var alamat_siswa = $('#alamat_siswa').val();
			var tempat_siswa = $('#tempat_siswa').val();
			var tgl_siswa = $('#tgl_siswa').val();
			var jenkel_siswa = $('#jenkel_siswa').val();
			var kelas = $('#kelas').val();
			$.ajax({
				method: "POST",
				url: "sv_editSiswa.php",
				data: {
					nis: nis,
					nisn: nisn,
					nama_siswa: nama_siswa,
					tempat_siswa:tempat_siswa,
					tgl_siswa:tgl_siswa,
					jenkel_siswa:jenkel_siswa,
					kelas: kelas
				}
			});
		});
	</script>
</body>

</html>