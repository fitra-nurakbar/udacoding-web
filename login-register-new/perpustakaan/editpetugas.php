<?php include('connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>TUGAS PROYEK BASIS DATA</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	
	<div class="container" style="margin-top:20px">
		<h2>Edit Petugas</h2>
		
		<hr>
		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_petugas'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_petugas = $_GET['id_petugas'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($coneksi, "SELECT * FROM petugas WHERE id_petugas='$id_petugas'") or die(mysqli_error($coneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">id_petugas tidak ada dalam database.</div>';
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
			$id_petugas			= $_POST['id_petugas'];
			$nama_petugas		= $_POST['nama_petugas'];
			$pekerjaan		    = $_POST['pekerjaan'];
			$sift			    = $_POST['sift'];
			
			$sql = mysqli_query($coneksi, "UPDATE petugas SET nama_petugas='$nama_petugas', pekerjaan='$pekerjaan', sift='$sift'WHERE id_petugas='$id_petugas'") or die(mysqli_error($coneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="editpetugas.php?id_petugas='.$id_petugas.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="editpetugas.php?id_petugas=<?php echo $id_petugas; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA PETUGAS</label>
				<div class="col-sm-10">
				<input type="hidden" name="id_petugas" value=<?php echo $_GET['id_petugas'];?>></<input>
					<input type="text" name="nama_petugas" class="form-control" value="<?php echo $data['nama_petugas']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">PEKERJAAN</label>
				<div class="col-sm-10">
				<input type="text" name="pekerjaan" class="form-control" value="<?php echo $data['pekerjaan']; ?>" required>
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
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="petugas.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>