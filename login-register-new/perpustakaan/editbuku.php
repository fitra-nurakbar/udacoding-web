<?php include('connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>TUGAS PROYEK BASIS DATA</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	
	<div class="container" style="margin-top:20px">
		<h2>Edit Buku</h2>
		
		<hr>
		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_buku'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_buku = $_GET['id_buku'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($coneksi, "SELECT * FROM buku WHERE id_buku='$id_buku'") or die(mysqli_error($coneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">id_buku tidak ada dalam database.</div>';
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
			$id_buku			= $_POST['id_buku'];
			$judul_buku			= $_POST['judul_buku'];
			$penulis			= $_POST['penulis'];
			$edisi				= $_POST['edisi'];
			$impersum			= $_POST['impersum'];
			$lokasi				= $_POST['lokasi'];
			$isbn				= $_POST['isbn'];
			$golongan			= $_POST['golongan'];
			$bahasa				= $_POST['bahasa'];
			
			// Upload Gambar
			$ekstensi_diperbolehkan	= array('png','jpg');
			$gambar 				= $_FILES['file']['name'];
			$x 						= explode('.', $gambar);
			$ekstensi 				= strtolower(end($x));
			$ukuran					= $_FILES['file']['size'];
			$file_tmp 				= $_FILES['file']['tmp_name'];

			if(isset($gambar) and !empty($file_tmp)){   
				if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					if($ukuran < 1044070){
						$location = 'file/';
			            if(move_uploaded_file($file_tmp, $location.$gambar)){
			            	$sql = mysqli_query($coneksi, "UPDATE buku SET judul_buku='$judul_buku', penulis='$penulis', edisi='$edisi', gambar_buku='$gambar',impersum='$impersum', lokasi='$lokasi', isbn='$isbn',golongan='$golongan', bahasa='$bahasa' WHERE id_buku='$id_buku'") or die(mysqli_error($coneksi));
			             	if($sql){
									echo '<script>alert("Berhasil menambahkan data."); document.location="tambahbuku.php";</script>';
								}else{
									echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
								}
			            }
			        }else{
						echo 'UKURAN FILE TERLALU BESAR';
					}
				}else{
					echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
		       	}
	        } else {
	            echo 'You should select a file to upload !!';
	        }
			// $sql = mysqli_query($coneksi, "UPDATE buku SET judul_buku='$judul_buku', penulis='$penulis', edisi='$edisi', gambar_buku='$gambar',impersum='$impersum', lokasi='$lokasi', isbn='$isbn',golongan='$golongan', bahasa='$bahasa' WHERE id_buku='$id_buku'") or die(mysqli_error($coneksi));
			
			// if($sql){
			// 	echo '<script>alert("Berhasil menyimpan data."); document.location="editbuku.php?id_buku='.$id_buku.'";</script>';
			// }else{
			// 	echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			// }
		}
		?>
		
		<form action="editbuku.php?id_buku=<?php echo $id_buku; ?>" method="post"  enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JUDUL BUKU</label>
				<div class="col-sm-10">
				<input type="hidden" name="id_buku" value=<?php echo $_GET['id_buku'];?>></<input>
					<input type="text" name="judul_buku" class="form-control" value="<?php echo $data['judul_buku']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">PENULIS</label>
				<div class="col-sm-10">
				<input type="text" name="penulis" class="form-control" value="<?php echo $data['penulis']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">EDISI</label>
				<div class="col-sm-10">
				<input type="text" name="edisi" class="form-control" value="<?php echo $data['edisi']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">IMPERSUM</label>
				<div class="col-sm-10">
				<input type="text" name="impersum" class="form-control" value="<?php echo $data['impersum']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">LOKASI</label>
				<div class="col-sm-10">
				<input type="text" name="lokasi" class="form-control" value="<?php echo $data['lokasi']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ISBN</label>
				<div class="col-sm-10">
				<input type="text" name="isbn" class="form-control" value="<?php echo $data['isbn']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">GOLONGAN</label>
				<div class="col-sm-10">
				<input type="text" name="golongan" class="form-control" value="<?php echo $data['golongan']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">BAHASA</label>
				<div class="col-sm-10">
				<input type="text" name="bahasa" class="form-control" value="<?php echo $data['bahasa']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">GAMBAR</label>
				<div class="col-sm-10">
					<img src="file/<?= $data['gambar_buku'];?>" height="200px">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">GAMBAR</label>
				<div class="col-sm-10">
					<input type="file" name="file">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="buku.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>