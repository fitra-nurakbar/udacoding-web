<?php include('connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>TUGAS PROYEK BASIS DATA</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	
<?php 
include 'navbar.php';
?>
	
	<div class="container" style="margin-top:20px">
		<h2>Tambah Petugas</h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
			$id_petugas		= $_POST['id_petugas'];
			$nama_petugas	= $_POST['nama_petugas'];
			$pekerjaan		= $_POST['pekerjaan'];
			$sift			= $_POST['sift'];
			
			$cek = mysqli_query($coneksi, "SELECT * FROM petugas WHERE id_petugas='$id_petugas'") or die(mysqli_error($coneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($coneksi, "INSERT INTO petugas(id_petugas, nama_petugas, pekerjaan,sift) VALUES('$id_petugas', '$nama_petugas', '$pekerjaan', '$sift')") or die(mysqli_error($coneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambahpetugas.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data, pilih id petugas yang tersedia.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, id petugas sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambahpetugas.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID PETUGAS</label>
				<div class="col-sm-10">
					<input type="text" name="id_petugas" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA PETUGAS</label>
				<div class="col-sm-10">
					<input type="text" name="nama_petugas" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">PEKERJAAN</label>
				<div class="col-sm-10">
						<input type="text" name="pekerjaan" class="form-control" size="4" required>
					</div>
				</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">SIFT KERJA</label>
				<div class="col-sm-10">
						<input type="radio" name="sift" value="senin - rabu pagi, kamis - sabtu siang">Senin- Rabu Pagi,Kamis- Sabtu Siang<br>
						<input type="radio" name="sift" value="senin -  rabu siang, kamis - sabtu pagi">Senin- Rabu Siang, Kamis- Sabtu Pagi<br>
						</div>
					</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<br>
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
				</div>
			</div>
		</form>
		
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>