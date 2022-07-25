<?php
//memasukkan file config.php
include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>TUGAS PROYEK BASIS DATA</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
<body>

<?php 
include 'navbar.php';
?>
	<div class="container" style="margin-top:20px">
		<h2><center>Data Peminjaman Perpustakaan</center></h2>
		
		<hr>
			<div class="card">
			<div class="container">
		<form action="pinjam.php" method="get" class="form-group">
		    <input type="text" name="cari">
		    <input type="submit" value="Cari" class="btn btn-primary">
			<a href="jumlah.php" class="btn btn-primary">jumlah</a>
		</form>
		
	
		<?php 
		if(isset($_GET['cari'])){
		  $cari = $_GET['cari'];
		  echo "<b>Hasil pencarian : ".$cari."</b>";
		}
		?>
		
		<table class="table table-striped table-hover table-sm table-bordered">
          	<thead class="thead-danger">
				<tr class="table-primary" style="text-align:center">
					<th>No</th>
					<th>Nomor Peminjaman</th>
					<th>Tanggal Peminjaman</th>
					<th>NIM</th>
					<th>ID Buku</th>
					<th>Aksi</th>
				</tr>
			</thead>
          <?php 
          if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            $data = mysqli_query($coneksi, "SELECT * FROM pinjam where no_pinjam like '%".$cari."%'");       
          }else{
            $data = mysqli_query($coneksi, "SELECT * FROM pinjam");   
          }
          $no = 1;
          while($d = mysqli_fetch_array($data)){
          ?>
          <tbody>
       		<tr>
	            <td><?php echo $no++; ?></td>
	            <td><?php echo $d['no_pinjam']; ?></td>
	            <td><?php echo $d['tanggal_pinjam']; ?></td>
	            <td><?php echo $d['nim']; ?></td>
	            <td><?php echo $d['id_buku']; ?></td>
	            <td><a href="#" class="badge badge-info">Edit</a> <a href="#" class="badge badge-danger">Hapus</a></td>
	        </tr>
	        <?php } ?>
          	
          </tbody>
        </table>
		</div>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>