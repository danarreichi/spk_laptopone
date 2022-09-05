<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='customStyle.css' rel='stylesheet'>
    <link href='Assets/css/bootstrap.css' rel='stylesheet'>
    <title>Login</title>
</head>

<body>

    <div class='container-fluid d-flex vh-100 justify-content-center align-items-center'>
        <div class='formLogin'>
            <img src="Assets/img/login_icon.svg" alt="">
            <div id='labelLogin'>Login Pengguna</div>
            <?php
            session_start();
            if (!empty($_SESSION['message'])) {
                $message = $_SESSION['message'];
            ?>
                <div class="alert alert-danger alert-block">
                    <strong> <?= $message; ?> </strong>
                </div>
                <?php 
            }
            session_unset(); ?>
                <form method='POST' action='cekLogin.php'>
                    <input type='text' class='form-control' name='username' placeholder='Username' required></input>
                    <input type='password' class='form-control' name='password' placeholder='Password' required></input>
                    <input type='submit' class='btn btn-primary w-100' value='Login'></input>
                </form>
        </div>
    </div>

</body>

</html>