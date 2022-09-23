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
		<h3>TAMBAH DATA TAHUN AJAR</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>
        <br>
		<form method="post" action="sv_addAjar.php" enctype="multipart/form-data">
			<div class="form-group">
				<input class="form-control-ku col-md-1" type="number" name="thn_ajar1" id="thn_ajar1" required>
                <label for="/">/</label>
                <input class="form-control-ku col-md-1" type="number" name="thn_ajar2" id="thn_ajar2" required>
			</div>
            <div>
				<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
			</div>
		</form>
	</div>
	
	<script>
		$(document).ready(function(){
			$('#butsave').on('click',function(){			
				$('#butsave').attr('disabled', 'disabled');
				var thn_ajar1	= $('#thn_ajar1').val();
				var thn_ajar2 	= $('#thn_ajar2').val();
				var status 	= $('#status').val();
				
				$.ajax({
					type	: "POST",
					url		: "sv_addAjar.php",
					data	: {
								thn_ajar1:thn_ajar1,
								thn_ajar2:thn_ajar2
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