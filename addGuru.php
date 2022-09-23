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
		<h3>TAMBAH DATA GURU</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="sv_addGuru.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="nip">NIP:</label>
				<input class="form-control" type="text" name="nip" id="nip" required>
			</div>
			<div class="form-group">
				<label for="nama_guru">Nama:</label>
				<input class="form-control" type="text" name="nama_guru" id="nama_guru" required>
			</div>
			<div class="form-group">
				<label for="tlp_guru">No Telepon:</label>
				<input class="form-control" type="text" name="tlp_guru" id="tlp_guru">
			</div>
			<div class="form-group">
				<label for="jabatan">Jabatan:</label>
				<select class="form-control" name="jabatan" id="jabatan">
					<option value="Wali Kelas 1">Wali Kelas 1</option>
                    <option value="Wali Kelas 2">Wali Kelas 2</option>
                    <option value="Wali Kelas 3">Wali Kelas 3</option>	
                    <option value="Wali Kelas 4">Wali Kelas 4</option>
                    <option value="Wali Kelas 5">Wali Kelas 5</option>
                    <option value="Wali Kelas 6">Wali Kelas 6</option>	
				</select>
			</div>
			<div class="form-group">
				<label for="tempat_guru">Tempat Lahir:</label>
				<input class="form-control" type="text" name="tempat_guru" id="tempat_guru">
			</div>
			<div class="form-group">
				<label for="tgl_guru">Tanggal Lahir:</label>
				<input class="form-control" type="date" name="tgl_guru" id="tgl_guru">
			</div>
			<div class="form-group">
				<label for="alamat_guru">Alamat:</label>
				<input class="form-control" type="text" name="alamat_guru" id="alamat_guru">
			</div>
			<div class="form-group">
				<label for="jenkel_guru">Jenis Kelamin:</label>
				<select class="form-control" name="jenkel_guru" id="jenkel_guru">
					<option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>	
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
				var nip 	= $('#nip').val();
				var nama_guru	= $('#nama_guru').val();
				var tlp_guru 	= $('#tlp_guru').val();
				var jabatan 	= $('#jabatan').val();
				var tempat_guru = $('#tempat_guru').val();
				var tgl_guru 	= $('#tgl_guru').val();
				var alamat_guru = $('#alamat_guru').val();
				var jenkel_guru = $('#jenkel_guru').val();
                
				
				$.ajax({
					type	: "POST",
					url		: "sv_addGuru.php",
					data	: {
								nip:nip,
								nama_guru:nama_guru,
								tlp_guru:tlp_guru,
								jabatan:jabatan,
								tempat_guru:tempat_guru,
								tgl_guru:tgl_guru,
								alamat_guru:alamat_guru,
								jenkel_guru:jenkel_guru
							  },					
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