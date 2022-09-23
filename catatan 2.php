<!DOCTYPE html>
<html>
<head>
    <title>A12.2018.05960-Depata Siwa Prasetya</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
	<script>
	/*fungsi untuk membuat isian kode kelompok yang bergantung
	 pada isian nama mata kuliah*/
	</script>
</head>
<body onload="kode_klp()">
<?php
	require "head.html";
	require "fungsi.php";

	$jmlDataPerHal = 3;

	//cari jumlah data
	if (isset($_POST['cari'])){
		$cari=$_POST['cari'];
    	$sql="select * from kultawar as k, matkul as m where 
                         k.idmatkul=m.idmatkul 
                         having 
                         namamatkul like'%$cari%' 
                         order by m.namamatkul asc";
	}else{
    	$sql="select * from kultawar as k, matkul as m where 
                         k.idmatkul=m.idmatkul
				         order by m.namamatkul asc";				
	}
	$qry = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
	$jmlData = mysqli_num_rows($qry);

	$jmlHal = ceil($jmlData / $jmlDataPerHal);
	if (isset($_GET['hal'])){
		$halAktif=$_GET['hal'];
	}else{
		$halAktif=1;
	}

	$awalData=($jmlDataPerHal * $halAktif)-$jmlDataPerHal;

	//Jika tabel data kosong
	$kosong=false;
	if (!$jmlData){
		$kosong=true;
	}
	//data berdasar pencarian atau tidak
	if (isset($_POST['cari'])){
		$cari=$_POST['cari'];
		$sql=" select * from matkul as m, kultawar as k where 
                           k.idmatkul=m.idmatkul 
                           having 
                           namamatkul like'%$cari%' 
                           order by m.namamatkul asc
                           limit $awalData,$jmlDataPerHal";
	}else{
		$sql="select * from matkul as m, kultawar as k where 
                          k.idmatkul=m.idmatkul 
                          order by m.namamatkul asc
                          limit $awalData,$jmlDataPerHal";		
	}
	//Ambil data untuk ditampilkan
	$hasil=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
?>
	<div class="utama">			
		<br><br>
		<h3>Input KRS</h3>
		<br>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>
		<form id="faddTawar">			
			<div class="form-group">
				<label for="thAkdm">Tahun Akademik: </label>
				<select class="form-control" name="thAkdm" id="thAkdm">
					<?php
					$thAkdm=array('Gasal 2020/2021','Genap 2020/2021');
					for($i=0;$i<count($thAkdm);$i++){
						echo "<option value=$thAkdm[$i]>$thAkdm[$i]";
					}
					?>					
				</select>
			</div>
			<div class="form-group">
				<label for="nim">NIM:</label>
				<select class="form-control" name="nim" id="nim">
				<?php
				$sql="select nim, nim from mhs order by nim";
				$qry=mysqli_query($koneksi,$sql);
				while($hsl=mysqli_fetch_row($qry)){
					echo "<option value='".$hsl[0]."'>".$hsl[1];
				}
				?>
				</select>
			</div>	
				<button class="btn btn-primary" id="btnSimpan" type="button">Simpan</button>
			</div>
		</form>
	</div>
	<br>
	<span class="float-right">
		<form action="" method="post" class="form-inline">
			<button class="btn btn-warning" type="submit">Cari</button>
			<input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data KRS..." autofocus autocomplete="off">
		</form>
	</span>
	
	<div class="utama">
	<table class="table table-hover">
	<thead class="thead-light">
      <tr>
		<th>Pilih</th>
		<th>Mata Kuliah</th>
		<th>Kelompok</th>
		<th>Hari</th>
		<th>Jam</th>
		<th>Ruang</th>
		<th>Jumlah Mahasiswa</th>
	  </tr>
	</thead>
	<tbody>
			<tr>
				<td><?php echo $row["namamatkul"]?></td>
				<td><?php echo $row["namamatkul"]?></td>
				<td><?php echo $row["namadosen"]?></td>
				<td><?php echo $row["klp"]?></td>
				<td><?php echo $row["hari"]?></td>
				<td><?php echo $row["jamkul"]?></td>
				<td><?php echo $row["ruang"]?></td>
				<td><?php echo $row["kapasitas"]?></td>
			</tr>
			
	</tbody>
	</table>
</div>

	<script>
	$(document).ready(function(){
		$("#btnSimpan").on('click', function(){
			var thAkdm = $("#thAkdm").val();						
			var nim = $("#nim").val();
			var klp = $("#klp").val();
			var hari = $("#hari").val();
			var jamkul = $("#jamkul").val();
			var ruang = $("#ruang").val();
			var kapasitas = $("#kapasitas").val();

			$.ajax({
				type	: "post",
				url 	: "sv_addTawar.php",
				data 	: {
					thAkdm	: thAkdm,
					nim 	: nim,
					klp 	: klp,
					hari  	: hari,
					jamkul 	: jamkul,
					ruang 	: ruang,
					kapasitas : kapasitas
				},
				success : function(data){
					$("#thAkdm").val('');
					$('#nim').val('');
					$("#klp").val('');
					$('#hari').val('');
					$('#jamkul').val('');
					$('#ruang').val('');
					$('#kapasitas').val('');
					$('#success').show();
					$('#success').html(data);
				}
			});
		});
	});
	</script>	
</body>
</html>