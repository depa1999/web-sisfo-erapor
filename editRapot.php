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
	require "headguru.html";
	$idnilai1=$_GET['kode'];
	$sql="select * from siswa as s, guru as g, thn_ajar as t, nilai1 as n1 where 
    n1.nis=s.nis and n1.nip = g.nip and n1.idtahun = t.idtahun and idnilai1=$idnilai1";
	$qry=mysqli_query($koneksi,$sql);
	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-3 text-center" style="margin-top: 2cm;">KOREKSI NILAI RAPOT</h2>	
		<div class="row">
		<div class="col-sm-9">
			<form enctype="multipart/form-data" method="post" action="sv_editRapot.php">
				<div class="form-group">
					<label for="nama_siswa">Nama Siswa:</label>
					<input class="form-control" type="text" name="nama_siswa" id="nama_siswa" value="<?php echo $row['nama_siswa']?>" readonly>
				</div>
				<div class="form-group">
					<label for="kelas">Kelas:</label>
					<input class="form-control" type="text" name="kelas" id="kelas" value="<?php echo $row['kelas']?>" readonly>
				</div>
				<div class="form-group">
					<label for="wali_kelas">Wali Kelas:</label>
					<input class="form-control" type="text" name="nama_guru" id="nama_guru" value="<?php echo $row['nama_guru']?>" readonly>
				</div>
				<div class="form-group">
					<label for="thn_ajar">Tahun Ajaran:</label>
					<input class="form-control" type="text" name="thn_ajar" id="thn_ajar" value="<?php echo $row['thn_ajar']?>" readonly>
				</div>
				<div class="form-group">
					<label for="semester">Semester:</label>
					<select class="form-control" name="semester" id="semester">
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
				</div>
                <div class="form-group">
					<label for="n_bindo">Nilai B.Indonesia:</label>
					<input class="form-control" type="number" name="n_bindo" id="n_bindo" value="<?php echo $row['n_bindo']?>">
				</div>
                <div class="form-group">
					<label for="n_agama">Nilai Agama:</label>
					<input class="form-control" type="number" name="n_agama" id="n_agama" value="<?php echo $row['n_agama']?>">
				</div>
                <div class="form-group">
					<label for="n_pkn">Nilai PKN:</label>
					<input class="form-control" type="number" name="n_pkn" id="n_pkn" value="<?php echo $row['n_pkn']?>">
				</div>
                <div class="form-group">
					<label for="n_mtk">Nilai Matematika:</label>
					<input class="form-control" type="number" name="n_mtk" id="n_mtk" value="<?php echo $row['n_mtk']?>">
				</div>
                <div class="form-group">
					<label for="n_pjok">Nilai PJOK:</label>
					<input class="form-control" type="number" name="n_pjok" id="n_pjok" value="<?php echo $row['n_pjok']?>">
				</div>
				<div class="form-group">
					<label for="n_sbdp">Nilai SBDP:</label>
					<input class="form-control" type="number" name="n_sbdp" id="n_sbdp" value="<?php echo $row['n_sbdp']?>">
				</div>
				<div class="form-group">
					<label for="n_bjawa">Nilai B.Jawa:</label>
					<input class="form-control" type="number" name="n_bjawa" id="n_bjawa" value="<?php echo $row['n_bjawa']?>">
				</div>
				<div>		
					<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
				</div>
				<input type="hidden" name="idnilai1" id="idnilai1" value="<?php echo $idnilai1?>">
			</form>
		</div>
		</div>
	</div>
	<script>
		$('#submit').on('click',function(){
			var idnilai1 = $('#idnilai1').val();
			var semester= $('#semester').val();
			var n_bindo	= $('#n_bindo').val();
			var n_agama = $('#n_agama').val();
            var n_pkn 	= $('#n_pkn').val();
            var n_mtk 	= $('#n_mtk').val();
            var n_pjok 	= $('#n_pjok').val();
			var n_sbdp 	= $('#n_sbdp').val();
			var n_bjawa = $('#n_bajawa').val();
			$.ajax({
				method	: "POST",
				url		: "sv_editRapot.php",
				data	: 
						{
							idnilai1:idnilai1, 
							semester:semester, 
							n_bindo:n_bindo, 
							n_agama:n_agama, 
							n_pkn:n_pkn, 
							n_mtk:n_mtk, 
							n_pjok:n_pjok,
							n_sbdp:n_sbdp,
							n_bjawa:n_bjawa
						}
			});
		});
	</script>
</body>
</html>