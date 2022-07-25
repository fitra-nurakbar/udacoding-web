<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Selamat</title>
</head>
<body style="text-align: center;">
    <h1 style="font-size: 2em; margin: 20px 0; color: #000; text-transform: capitalize; font-weight: bold;"><?= $_SESSION['username']; ?>, Anda berhasil login.</h1>
    <a href="logout.php">Logout</a>
</body>
</html>