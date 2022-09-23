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
	require "head.html";
	?>
	<div class="utama">		
		<br><br><br>		
		<h3>TAMBAH DATA SISWA</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="sv_addSiswa.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="NIS">NIS:</label>
				<input class="form-control" type="text" name="nis" id="nis" required>
			</div>
			<div class="form-group">
				<label for="nisn">NISN:</label>
				<input class="form-control" type="text" name="nisn" id="nisn" required>
			</div>
			<div class="form-group">
				<label for="Nama">Nama:</label>
				<input class="form-control" type="text" name="nama_siswa" id="nama_siswa">
			</div>
			<div class="form-group">
				<label for="Alamat">Alamat:</label>
				<input class="form-control" type="text" name="alamat_siswa" id="alamat_siswa">
			</div>
			<div class="form-group">
				<label for="Tempat">Tempat Lahir:</label>
				<input class="form-control" type="text" name="tempat_siswa" id="tempat_siswa">
			</div>
			<div class="form-group">
				<label for="Tgl">Tanggal Lahir:</label>
				<input class="form-control" type="date" name="tgl_siswa" id="tgl_siswa">
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
			<!--<div class="form-group">
				<label for="foto">Foto</label> 
				<input class="form-control" type="file" name="foto" id="foto">
			</div>-->
			<div>		
				<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
			</div>
		</form>
	</div>
	
	<script>
		$(document).ready(function(){
			$('#butsave').on('click',function(){			
				$('#butsave').attr('disabled', 'disabled');
				var nis	= $('#nis').val();
				var nisn 	= $('#nisn').val();
				var nama_siswa 	= $('#nama_siswa').val();
				var alamat_siswa 	= $('#alamat_siswa').val();
				var tempat_siswa 	= $('#tempat_siswa').val();
				var tgl_siswa 	= $('#tgl_siswa').val();
				var jenkel_siswa 	= $('#jenkel_siswa').val();
				var kelas 	= $('#kelas').val();
				
				$.ajax({
					type	: "POST",
					url		: "sv_addSiswa.php",
					data	: {
								nis:nis,
								nisn:nisn,
								nama_siswa:nama_siswa,
								alamat_siswa:alamat_siswa,
								tempat_siswa:tempat_siswa,
								tgl_siswa:tgl_siswa,
								jenkel_siswa:jenkel_siswa,
								kelas:kelas
							  },
					contentType	:"undefined",					
					success : function(dataResult){						
						alert('success');
						$("#butsave").removeAttr("disabled");
						$('#fupForm').find('input:text').val('');
						$("#success").show();
						$('#success').html(dataResult);	
					}	   
				});
			});
		});
	</script>
	
</body>
</html>