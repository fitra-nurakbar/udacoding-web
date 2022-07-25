<?php
//include file config.php
include('connect.php');
 
$table = "pinjam";
// Cara 1
// $sql = "$coneksi, SELECT count(*) AS jumlah FROM $table";
$query = mysqli_query($coneksi, "SELECT count(*) AS jumlah FROM $table");
$result = mysqli_fetch_array($query);
echo "<script>alert('Total Jumlah Peminjam Buku Di Perpustakaan Adalah ' + {$result['jumlah']})</script>";
echo "<script>document.location='pinjam.php';</script>";
// if(isset($_GET['Jumlah'])){
//     $sql = mysqli_query($koneksi, "SELECT COUNT(*) FROM pinjam;");
//     $res = mysqli_fetch_array($sql);
//     echo "Hasil : ".$res."";
// }

?>