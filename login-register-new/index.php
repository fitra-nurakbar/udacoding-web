<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <Video autoplay muted loop class="bg-video">
        <source src="media/bg.mp4" type="video/mp4">
    </Video>
    <div class="container">
        <h1 class="header">Login</h1>
        <form action="content/proses-login.php" method="post">
            <div class="txt_field">
                <input type="text" id="username" name="username" value="<?= $username; ?>"required>
                <label for="username">Username</label>
                <span></span>
            </div>
            <div class="txt_field">
                <input type="password" id="password" name="password" value="<?= $_POST['password']; ?>" required>
                <span></span>
                <label for="password">Password</label>
            </div>
            <div class="pass">
                <div class="forgot">Forgot password</div>
                <label for="show"><input type="checkbox" id="show" name="show">Show password</label>
            </div>
            <button class="button" type="submit" name="submit">Login</button>
            <div class="sign_link">
                Don't have an account? <a href="content/register.php">Register Here.</a>
            </div>
        </form>
    </div>
<script src="js/script.js"></script>
</body>

</html>