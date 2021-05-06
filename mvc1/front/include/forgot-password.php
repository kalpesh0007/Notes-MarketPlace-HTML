<?php

session_start();
include 'connection.php';
include '../src/sendmail.php';

if (isset($_POST['forgot_password'])) 
{    
    $email = $_POST['email1'];
    $selectquery = "SELECT * FROM users WHERE EmailID='$email'";
    $squery = mysqli_query($connection, $selectquery);
 
    $count= mysqli_num_rows($squery);
 
    if ($count > 0)
    {
        $random_pass = bin2hex(random_bytes(8));

        $updatequery = "UPDATE users SET Password='$random_pass' WHERE EmailID='$email'";
        mysqli_query($connection, $updatequery);

        // This email address and name will be visible as sender of email
        $config_email = 'notesmarketplace330@gmail.com';
        $mail->Username = $config_email; // YOUR gmail email which will be used as sender and PHPMailer configuration 
        $mail->Password = 'Notes@123';   // YOUR gmail password for above account
    
        // Sender and recipient settings
        $mail->setFrom($config_email, 'NotesMarketPlace');  // This email address and name will be visible as sender of email

        $mail->addAddress($email);  // This email is where you want to send the email
        $mail->addReplyTo($config_email);    // If receiver replies to the email, it will be sent to this email address
     
        // Setting the email content
        $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
        $mail->Subject = "New Temporary Password has been created for you";       //subject line of email
        $mail->Body = "
        <table style='height:60%; 
                    width: 60%; 
                    position: absolute; 
                    margin-left: 10%; 
                    font-family: Open Sans !important; 
                    background: white; 
                    border-radius: 3px; 
                    padding-left: 2%; 
                    padding-right: 2%;'>
            <thead>
                <th>
                    <img src='https://i.ibb.co/HVyPwqM/top-logo1.png' alt='logo' style='margin-top: 5%; margin-left: 0px;'>
                </th>
            </thead>
            <tbody>
                <tr style='height: 60px;'>
                    <td class='text-3'>
                        Hello,    
                    </td>
                </tr>
                <tr style='height: 60px;'>
                    <td class='text-3'>
                        We have generated a new password for you <br>
                        Password: $random_pass
                    </td>
                </tr>
                <tr style='height: 60px;'>
                    <td class='text-3'>
                        Regards, <br>
                        Notes Marketplace
                    </td>
                </tr>  
            </tbody>
        </table>";
        //Email body
        
        $mail->send();
        header("location:../include/login.php");
    } 
    else {
    ?>
        <script>
            alert("Email does not exists");
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
    <title>Forgot Password</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/home/favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/forgot-password.css">


</head>

<body>

    <section id="forgot-password" class="bg">
        <div class="container">
            <div class="row justify-content-center" id="logo">
                <img src="../img/pre-login/top-logo.png" alt="Logo">
            </div>
            <div class="row justify-content-center">
                <form class="forgot-password-form" id="" action="" method="POST">
                    <div class="heading">
                        <h3>Forgot Password?</h3>
                        <p>Enter your email to reset your password</p>
                    </div>
                    <div class="form-group">
                        <label for="email1" class="label-text">Email</label>
                        <input type="email" name="email1" class="form-control input-field" id="email1" aria-describedby="emailHelp" placeholder="Enter your email address">
                    </div>
                    <button type="submit" name="forgot_password" class="btn btn-primary btn-block login-button" id="form-login-button">SUBMIT</button>
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