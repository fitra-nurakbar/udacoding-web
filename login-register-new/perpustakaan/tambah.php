<?php include('connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>TUGAS PROYEK BASIS DATA</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script type="text/javascript">
		function angka(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if ((charCode < 48 || charCode > 57)&&charCode>32){
			alert("Masukan NIM Anda , Hanya berupa Angka");
			return false;
		}
		return true;
	}
		
	function huruf(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32) {
		alert("Masukan Nama Anda , Hanya berupa Huruf");
		return false;
    }
    return true;
}
</script>
</head>

<body>
<?php 
include 'navbar.php';
?>

<section>
	<div class="container col-8 mb-5" style="margin-top:20px">

		<?php
		if(isset($_POST['submit'])){
			$nim				= $_POST['nim'];
			$nama_pengunjung	= $_POST['nama_pengunjung'];
			$prodi				= $_POST['prodi'];
			$fakultas			= $_POST['fakultas'];
			$id_petugas			= $_POST['id_petugas'];
			
			$cek = mysqli_query($coneksi, "SELECT * FROM pengunjung WHERE nim='$nim'") or die(mysqli_error($coneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($coneksi, "INSERT INTO pengunjung(nim, nama_pengunjung, prodi, fakultas, id_petugas) VALUES('$nim', '$nama_pengunjung', '$prodi', '$fakultas','$id_petugas	')") or die(mysqli_error($coneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
			}
		}
		//cek inputan
	
		?>
		<div class="card card-danger text-dark">
			<div class="card-header border-0">
				<h3 class="card-title text-center">
					Tambah Pengunjung
				</h3>
			</div>
              <form role="form" action="proses_nilai.php" method="POST" class="mb-5">
                <div class="card-body text-dark">
            		<div class="form-group">
				    <label for="NIM">NIM</label>
				    <input type="number"  onkeypress="return angka(event)"  name="nim" class="form-control" id="nim" placeholder="Enter NIM">
				  </div>

				  <div class="form-group">
				    <label for="Nama">Nama Pengunjung</label>
				    <input type="text" onkeypress="return huruf(event)" class="form-control" id="nama" name="nama_pengunjung" placeholder="Nama">
				  </div>

				  <div class="form-group">
				    <label for="Prodi">Prodi</label>
				    <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Prodi">
				  </div>

				  <div class="form-group">
				    <label for="Fakultas">Fakultas</label>
				    <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Fakultas">
				  </div>

				  <div class="form-group ">
				    <label for="IDpetugas">ID Petugas</label>
				    <select class="form-control" name="id_petugas">
						<option disabled selected> Pilih </option>
							<?php
						            //Perintah sql untuk menampilkan semua data pada tabel jurusan
						            $sql="SELECT * from pengunjung ORDER BY id_petugas ASC ";

						            $hasil=mysqli_query($coneksi,$sql);
						            $no=0;
						            while ($data = mysqli_fetch_array($hasil)) {
						            $no++;

						            $ket="";
						            if (isset($_GET['pengunjung'])) {
						                $jurusan = trim($_GET['pengunjung']);

						                if ($jurusan==$data['id_petugas'])
						                {
						                    $ket="selected";
						                }
						            }
						            ?>
						            <option <?php echo $ket; ?> value="<?php echo $data['id_petugas'];?>"><?php echo $data['id_petugas'];?></option>
						            <?php
								}
						  	?>
					</select>
				  </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-left: 20px">Masukkan</button><button type="reset" class="btn btn-danger" style="margin-left: 20px">Batal</button>
              </form>
            </div>
	</div>
	
</section>
	

	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html> 