<?php
//include file config.php
include('connect.php');
 
//jika benar mendapatkan GET id dari URL
if(isset($_GET['nim'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$nim = $_GET['nim'];
	
	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($coneksi, "SELECT * FROM pengunjung WHERE nim='$nim'") or die(mysqli_error($coneksi));
	
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($coneksi, "DELETE FROM pengunjung WHERE nim='$nim'") or die(mysqli_error($coneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php";</script>';
		}
	}else{
		echo '<script>alert("NIM tidak ditemukan di database."); document.location="index.php";</script>';
	}
}else{
	echo '<script>alert("NIM tidak ditemukan di database."); document.location="index.php";</script>';
}
 
?>