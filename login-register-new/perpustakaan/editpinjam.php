<?php include('connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>TUGAS PROYEK BASIS DATA</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	
	<div class="container" style="margin-top:20px">
		<h2>Edit Peminjaman</h2>
		
		<hr>
		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['no_pinjam'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$no_pinjam = $_GET['no_pinjam'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($coneksi, "SELECT * FROM pinjam WHERE no_pinjam='$no_pinjam'") or die(mysqli_error($coneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">no_pinjam tidak ada dalam database.</div>';
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
			$no_pinjam			= $_POST['no_pinjam'];
			$tanggal_pinjam		= $_POST['tanggal_pinjam'];
			$nim		        = $_POST['nim'];
			$id_buku			= $_POST['id_buku'];
			
			$sql = mysqli_query($coneksi, "UPDATE pinjam SET tanggal_pinjam='$tanggal_pinjam', nim='$nim', id_buku='$id_buku'WHERE no_pinjam='$no_pinjam'") or die(mysqli_error($coneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="editpinjam.php?no_pinjam='.$no_pinjam.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="editpinjam.php?no_pinjam=<?php echo $no_pinjam; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TANGGAL PINJAM</label>
				<div class="col-sm-10">
				<input type="hidden" name="no_pinjam" value=<?php echo $_GET['no_pinjam'];?>></<input>
					<input type="text" name="tanggal_pinjam" class="form-control" value="<?php echo $data['tanggal_pinjam']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIM</label>
				<div class="col-sm-10">
				<input type="text" name="nim" class="form-control" value="<?php echo $data['nim']; ?>" required>
				</div>
			</div>
            	<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID BUKU</label>
				<div class="col-sm-10">
                <input type="text" name="id_buku" class="form-control" value="<?php echo $data['id_buku']; ?>" required>
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