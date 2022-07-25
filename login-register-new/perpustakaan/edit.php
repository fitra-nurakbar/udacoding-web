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
		<h2>Edit Pengunjung</h2>
		
		<hr>
		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['nim'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$nim = $_GET['nim'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($coneksi, "SELECT * FROM pengunjung WHERE nim='$nim'") or die(mysqli_error($coneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">NIM tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nim = $_POST['nim'];
			$nama_pengunjung	= $_POST['nama_pengunjung'];
			$prodi				= $_POST['prodi'];
			$fakultas			= $_POST['fakultas'];
			
			$sql = mysqli_query($coneksi, "UPDATE pengunjung SET nama_pengunjung='$nama_pengunjung', prodi = '$prodi', fakultas='$fakultas' WHERE nim ='$nim' ") or die(mysqli_error($coneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="edit.php?nim='.$nim.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="edit.php?nim=<?php echo $nim; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA PENGUNJUNG</label>
				<div class="col-sm-10">
					<td><input type="hidden" name="nim" value=<?php echo $_GET['nim'];?>></td>
					<input type="text" name="nama_pengunjung" class="form-control" value="<?php echo $data['nama_pengunjung']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">PRODI</label>
				<div class="col-sm-10">
				<input type="text" name="prodi" class="form-control" value="<?php echo $data['prodi']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">FAKULTAS</label>
				<div class="col-sm-10">
				<input type="text" name="fakultas" class="form-control" value="<?php echo $data['fakultas']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>