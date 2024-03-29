<?php

include 'connection.php';
session_start();

if (isset($_POST['login'])) 
{
    $email = $_POST['email1'];
    $password = $_POST['password1'];
    $selectquery = "SELECT * FROM users WHERE EmailID='$email' AND Password='$password' AND IsEmailVerified= 1";
    $squery = mysqli_query($connection, $selectquery);
    $row = mysqli_fetch_array($squery);

    if(is_array($row))
    {
        $_SESSION['user_id'] = $row['ID'];
        header("location:../include/home.php");    
    }
    else
    {?>
        <script>
            alert("Invalid Email or Password or Your EmailID is not Verified");
        </script>
    <?php
    }
}
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">

    <!-- Title -->
    <title>Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/home/favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/login.css">


</head>

<body>

    <section id="login" class="bg">
        <div class="container">
            <div class="row justify-content-center" id="logo">
                <img src="../img/pre-login/top-logo.png" alt="Logo">
            </div>
            <div class="row justify-content-center">
                <form class="login-form" id="login-form" action="" method="POST">
                    <div class="heading">
                        <h3>Login</h3>
                        <p>Enter your email address and password to login</p>
                    </div>
                    <div class="form-group">
                        <label for="email1" class="label-text">Email</label>
                        <input type="email" name="email1" class="form-control input-field" id="email1" aria-describedby="emailHelp" placeholder="Enter your email address">
                    </div>
                    <div class="form-group">
                        <label for="password1" class="label-text">Password</label>
                        <label for="password1" class="label-text" id="forgot"><a href="forgot-password.php">Forgot Password?</a></label>
                        <input type="password" name="password1" class="form-control input-field" id="password1" placeholder="Enter your password">
                        <span toggle="#password1" class="field-icon toggle-password"><img src="../img/pre-login/eye.png" id="eye-img"></span>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="check1">
                        <label class="label-text form-check-label" for="check1">Remember Me</label>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-block login-button" id="form-login-button">LOGIN</button>
                    <div id="bottom">
                        <p>Don't have an account? <a href="sign-up.php">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>       
    </section>

    <!-- JQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="../js/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="../js/script.js"></script>

</body>

</html>