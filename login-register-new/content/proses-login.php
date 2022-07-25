<?php 

require 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$query = mysqli_query($db, $sql);
	if ($query->num_rows > 0) {
		$row = mysqli_fetch_assoc($query);
		$_SESSION['username'] = $row['username'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Oops! Username atau Password salah.'); document.location.href = '../index.php';</script>";
	}
}

?>