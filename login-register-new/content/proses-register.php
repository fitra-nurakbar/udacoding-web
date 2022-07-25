<?php 

require 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: ../index.php");
}

if (isset($_POST['register'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$query = mysqli_query($db, $sql);
		if (!$query->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$query = mysqli_query($db, $sql);
			if ($query) {
				echo "<script>alert('Registrasi berhasil.'); document.location.href = '../index.php';</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Registrasi gagal.'); document.location.href = 'register.php';</script>";
			}
		} else {
			echo "<script>alert('Email yang anda masukan sudah terdaftar.'); document.location.href = 'register.php';</script>";
		}
		
	} else {
		echo "<script>alert('Confirm password yang di masukan tidak valid.'); document.location.href = 'register.php';</script>";
	}
}

?>
