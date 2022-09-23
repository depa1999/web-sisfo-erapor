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
		<h3>TAMBAH DATA USER</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="sv_addUser.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="Username">Username:</label>
				<input class="form-control" type="text" name="username" id="username" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input class="form-control" type="text" name="password" id="password" required>
			</div>
			<div class="form-group">
				<label for="status">Status:</label>
				<select class="form-control" name="status" id="status">
					<option value="Wali Kelas 1">Wali Kelas 1</option>
                    <option value="Wali Kelas 2">Wali Kelas 2</option>
                    <option value="Wali Kelas 3">Wali Kelas 3</option>	
                    <option value="Wali Kelas 4">Wali Kelas 4</option>
                    <option value="Wali Kelas 5">Wali Kelas 5</option>
                    <option value="Wali Kelas 6">Wali Kelas 6</option>	
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
				var username	= $('#username').val();
				var password 	= $('#password').val();
				var status 	= $('#status').val();
				
				$.ajax({
					type	: "POST",
					url		: "sv_addUser.php",
					data	: {
								username:username,
								password:password,
								status:status
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