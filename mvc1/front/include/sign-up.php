<?php 

    session_start();
    include '../src/sendmail.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">

    <!-- Title -->
    <title>Sign Up</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/home/favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/sign-up.css">
    
    <!-- JQuery -->
    <script src="../js/jquery.min.js"></script>


</head>

<body>

<?php 

    include 'connection.php';
    
    if (isset($_POST['submit'])){
            
        $firstname = mysqli_real_escape_string($connection, $_POST['first_name']);
        $lastname = mysqli_real_escape_string($connection, $_POST['last_name']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $confirmpassword = mysqli_real_escape_string($connection, $_POST['confirm_password']);

        $token = bin2hex(random_bytes(12));

        $emailquery = "SELECT * FROM users WHERE EmailID='$email'";
        $equery = mysqli_query($connection, $emailquery);
        
        $emailcount = mysqli_num_rows($equery);

        $_POST = array();
        if ($emailcount > 0){
            ?>
                <script>
                    alert("Email already exists");
                </script>
            <?php
        } else {
            if ($password === $confirmpassword){
                
                $insertquery = "INSERT INTO users (RoleID, FirstName, LastName, EmailID, Password, Token, IsEmailVerified, IsActive) VALUES ( 1, '$firstname', '$lastname', '$email', '$password', '$token', b'0', b'1')";    
                
                $iquery = mysqli_query($connection, $insertquery);
            
                if ($iquery) {

                // This email address and name will be visible as sender of email
 
                $config_email = 'notesmarketplace330@gmail.com';
                $mail->Username = $config_email; // YOUR gmail email which will be used as sender and PHPMailer configuration 
                $mail->Password = 'Notes@123';   // YOUR gmail password for above account
            
                // Sender and recipient settings
                $mail->setFrom($config_email, 'NotesMarketPlace');  // This email address and name will be visible as sender of email

                $mail->addAddress($email, $firstname);  // This email is where you want to send the email
                $mail->addReplyTo($config_email, $firstname);    // If receiver replies to the email, it will be sent to this email address
            
                // Setting the email content
                $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
                $mail->Subject = "Notes Marketplace - Email Verification";       //subject line of email
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
                        <tr style='height: 60px; 
                                font-family: Open Sans; 
                                font-size: 26px; 
                                font-weight: 600; 
                                line-height: 30px;
                                color: #6255a5;'>
                            <td class='text-1'>Email Verification</td>
                        </tr>
                        <tr style='height: 40px;
                                font-family: Open Sans;
                                font-size: 18px;
                                font-weight: 600;
                                line-height: 22px;
                                color: #333333;
                                margin-bottom: 20px;'>
                            <td class='text-2'>Dear $firstname,</td>
                        </tr>
                        <tr style='height: 60px;'>
                            <td class='text-3'>
                                Thanks for Signing up! <br>
                                Simply click below for email verification.
                            </td>
                        </tr>
                        <tr style='height: 120px; 
                                font-size: 16px; 
                                font-weight: 400; 
                                line-height: 22px; 
                                color: #333333;
                                margin-bottom: 50px;'>
                            <td style='text-align: center;'>
                                <button class='btn btn-verify' 
                                style='width: 100% !important; 
                                height: 50px; 
                                font-family: Open Sans; 
                                font-size: 18px; 
                                font-weight: 600; 
                                line-height: 22px; 
                                color: #fff; 
                                background-color: #6255a5; 
                                border-radius: 3px;'>
                                <a class='btn' href='http://localhost/notesmarketplace/front/include/activate.php?token=$token' role='button'      
                                style='color: #fff; 
                                text-decoration: none; 
                                text-transform: uppercase;'>Verify email address</a>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>";
                //Email body
                
                $mail->send();
                    ?>
                        <script>
                            alert("Check your mail to activate your account");
                        </script>
                    <?php
            } else {
            ?>
                <script>
                    alert("Not Inserted");
                </script>
            <?php     
            } 
        } 
    }
}
mysqli_close($connection);

?>

    <section id="sign-up" class="bg">
        <div class="container">
            <div class="row justify-content-center" id="logo">
                <img src="../img/pre-login/top-logo.png" alt="Logo">
            </div>
            <div class="row justify-content-center">
                <form class="sign-up-form" id="signup-form" action="" method="POST">
                    <div class="heading">
                        <h3>Creat an Account</h3>
                        <p>Enter your details to signup</p>
                    </div>
                    <div class="form-group">
                        <label for="first-name1" class="label-text">First Name <span>*</span></label>
                        <input type="text" name="first_name" class="form-control input-field" id="first-name1" placeholder="Enter your first name" maxlength="50" required>
                        <span class="error_form" id="fname_error_message"></span>
                    </div>
                    <div class="form-group">
                        <label for="last-name1" class="label-text">Last Name <span>*</span></label>
                        <input type="text" name="last_name" class="form-control input-field" id="last-name1" placeholder="Enter your last name" maxlength="50" required>
                        <span class="error_form" id="lname_error_message"></span>
                    </div>
                    <div class="form-group">
                        <label for="email1" class="label-text">Email <span>*</span></label>
                        <input type="email" name="email" class="form-control input-field" id="email1" aria-describedby="emailHelp" placeholder="Enter your email address" maxlength="100" required>
                        <span class="error_form" id="email_error_message"></span>
                    </div>
                    <div class="form-group">
                        <label for="password1" class="label-text">Password <span>*</span></label>
                        <input type="password" name="password" class="form-control input-field" id="password1" placeholder="Enter your password" maxlength="24" required>
                        <span class="error_form" id="password_error_message"></span>
                        <span toggle="#password1" class="field-icon toggle-password"><img src="../img/pre-login/eye.png" id="eye-img"></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password1" class="label-text">Confirm Password <span>*</span></label>
                        <input type="password" name="confirm_password" class="form-control input-field" id="confirm-password1" placeholder="Re-enter your password" maxlength="24" required>
                        <span class="error_form" id="confirm_password_error_message"></span>
                        <span toggle="#confirm-password1" class="field-icon toggle-password"><img src="../img/pre-login/eye.png" id="eye-img"></span>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block login-button" id="form-login-button">SIGN UP</button>
                    <div id="bottom">
                        <p>Already have an account? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>       
    </section>
    
    <script type="text/javascript">
                
        $(document).ready(function(){
                  
                $("#fname_error_message").hide();
                $("#lname_error_message").hide();
                $("#email_error_message").hide();
                $("#password_error_message").hide();
                $("#confirm_password_error_message").hide();
    
                var error_fname = false;
                var error_lname = false;
                var error_email = false;
                var error_password = false;
                var error_confirm_password = false;
    
                $("#first-name1").focusout(function(){
                    check_fname();
                });
                $("#last-name1").focusout(function() {
                    check_lname();
                });
                $("#email1").focusout(function() {
                    check_email();
                });
                $("#password1").focusout(function() {
                    check_password();
                });
                $("#confirm-password1").focusout(function() {
                    check_confirm_password();
                });
    
                function check_fname() {
                    var pattern = /^[a-zA-Z]+$/;
                    var fname = $("#first-name1").val();
                    if (pattern.test(fname) && fname !== '') {
                        $("#fname_error_message").hide();
                        error_fname = false;
                    } else {
                        $("#fname_error_message").html("Should contain only Characters");
                        $("#fname_error_message").show();
                        $("#fname_error_message").css("color","red");
                        error_fname = true;
                    }
                }
    
                function check_lname() {
                    var pattern = /^[a-zA-Z]+$/;
                    var lname = $("#last-name1").val()
                    if (pattern.test(lname) && lname !== '') {
                        $("#lname_error_message").hide();
                        error_lname = false;
                    } else {
                        $("#lname_error_message").html("Should contain only Characters");
                        $("#lname_error_message").show();
                        $("#lname_error_message").css("color","red");
                        error_lname = true;
                    }
                }
    
                function check_email() {
                    var pattern = /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                    var email = $("#email1").val();
                    if (pattern.test(email) && email !== '') {
                        $("#email_error_message").hide();
                        error_email = false;
                    } else {
                        $("#email_error_message").html("Invalid Email");
                        $("#email_error_message").show();
                        $("#email_error_message").css("color","red");
                        error_email = true;
                    }
                }
    
                function check_password() {
                    var pattern = /^(?=(.*[a-z]){1,})(?=(.*[A-Z]){1,})(?=(.*[0-9]){1,})(?=(.*[!@#$%^&*()\-__+.]){1,}).{6,24}$/;
                    var password = $("#password1").val()
                    if (pattern.test(password) && password !== '') {
                        $("#password_error_message").hide();  
                        error_password = false;
                    } else {
                        $("#password_error_message").html("Enter Strong Password");
                        $("#password_error_message").show();
                        $("#password_error_message").css("color","red");
                        error_password = true;
                    }
                }
    
                function check_confirm_password() {
                    var password = $("#password1").val();
                    var confirm_password = $("#confirm-password1").val();
                    if (confirm_password == password) {
                        $("#confirm_password_error_message").hide();
                        error_confirm_password = false;
                    } else {
                        $("#confirm_password_error_message").html("Passwords did not Matched");
                        $("#confirm_password_error_message").show();
                        $("#confirm_password_error_message").css("color","red");
                        error_confirm_password = true;
                    }
                }
    
                $("#signup-form").submit(function() {
                    error_fname = false;
                    error_lname = false;
                    error_email = false;
                    error_password = false;
                    error_confirm_password = false;
    
                    check_fname();
                    check_lname();
                    check_email();
                    check_password();
                    check_confirm_password();
    
                    if (error_fname === true && error_lname === true && error_email === true && error_password === true && error_confirm_password === true) {
                        alert("Please Fill the form Correctly");
                        return true;
                    } 
                });  
            });       

        </script>
    
    
    <!-- Popper JS -->
    <script src="../js/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="../js/script.js"></script>

</body>

</html>