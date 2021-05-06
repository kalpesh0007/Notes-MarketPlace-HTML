<?php 

    session_start();

    include 'connection.php';
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }
    
    
    //Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
     
    //include PHPMailer classes to your PHP file for sending email
    require_once __DIR__ . '/src/Exception.php';
    require_once __DIR__ . '/src/PHPMailer.php';
    require_once __DIR__ . '/src/SMTP.php';
?>
                       

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">

    <!-- Title -->
    <title>Contact Us</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/home/favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <!-- Navbar -->
    <section class="nav-bar">       
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <a class="navbar-brand" href="home.html">
                <img src="../img/home/logo.png" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon bg-light"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php if(isset($_SESSION['user_id'])){ echo "search-notes.php?user_id=".$user_id;} else {echo "search-notes.php";}?>">Search Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php if(isset($_SESSION['user_id'])){ echo "dashboard.php?user_id=".$user_id;} else {echo "login.php";} ?>">Sell Your Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.html">FAQ</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php if(isset($_SESSION['user_id'])){ echo "contact-us.php?user_id=".$user_id;} else {echo "contact-us.php";} ?>">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html"><button type="button" class="btn btn-primary btn-login">Login</button></a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <!-- Title -->
    <section id="title">
        <div id="title-content">
            <div class="container">
                <div class="row">
                    <div id="title-content-inner">
                        <div id="title-heading">
                            Contact Us
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Title -->

    <section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title">Get in Touch</h1>
                    <p id="title-bottom">Let us know how to get back to you</p>
                </div>
            </div>
            <form action="" method="POST">

            <?php
                if (isset($_POST['submit'])){
                
                $fullname = mysqli_real_escape_string($connection, $_POST['full_name']);
                $email = mysqli_real_escape_string($connection, $_POST['email']);
                $subject = mysqli_real_escape_string($connection, $_POST['subject']);
                $comments = mysqli_real_escape_string($connection, $_POST['comments']);
                
                if(!preg_match('/^[a-zA-Z\s]+$/', $fullname)){
                    $text_only_error_fullname = "Should contain only Characters";
                }
                else if(preg_match('/^[a-zA-Z\s]+$/', $fullname) && !empty($email) && !empty($subject) && !empty($comments)){
                    
                    $mail = new PHPMailer(true);
        
                    try {
                        // Server settings
                        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;        // You can enable this for detailed debug output
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port = 587;  // This is fixed port for gmail SMTP
                    
                        // This email address and name will be visible as sender of email
                        $config_email = 'notesmarketplace330@gmail.com';
                        $mail->Username = $config_email; // YOUR gmail email which will be used as sender and PHPMailer configuration 
                        $mail->Password = 'Notes@123';   // YOUR gmail password for above account
                    
                        // Sender and recipient settings
                        $mail->setFrom($config_email, 'NotesMarketPlace');  // This email address and name will be visible as sender of email
        
                        $mail->addAddress('sir.micky007@gmail.com', 'NotesMarketPlace Admin');  // This email is where you want to send the email
                        $mail->addReplyTo($config_email, $fullname);    // If receiver replies to the email, it will be sent to this email address
                    
                        // Setting the email content
                        $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
                        $mail->Subject = "$fullname - Query";       //subject line of email
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
                                            $comments
                                        </td>
                                    </tr>
                                    <tr style='height: 60px;'>
                                        <td class='text-3'>
                                            Regards, <br>
                                            $fullname
                                        </td>
                                    </tr>  
                                </tbody>
                        </table>";
                        //Email body
                        
                        $mail->send();
                        $email_sent= "Thank You For Contacting us! We will try to resolve your issue as soon as posibble!";
                        } catch (Exception $e) {
                            echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                        }
                    }
                }    
            ?>  

                <?php    
                       
                    if(isset($_GET['user_id'])){                           
                        $user_id = $_GET['user_id'];
                        $squery = "SELECT * FROM users WHERE ID = '$user_id'";
                        $user_details = mysqli_query($connection, $squery);
                        if(!$user_details){
                            die(mysqli_error($connection));
                        }
                        $row = mysqli_fetch_assoc($user_details);
                        $full_name = $row['FirstName'];
                        $email = $row['EmailID'];
                    }
                ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fullName1">Full Name <span>*</span></label>
                            <input type="text" name="full_name" class="form-control" id="fullName1" placeholder="Enter your full name" value="<?php if(isset($full_name)){echo $full_name;} ?>" required>
                            <?php
                                if(isset($text_only_error_fullname)){
                                    echo "<p style='margin-left: 0px !important; text-align:left !important; color:red'>$text_only_error_fullname</p>";
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="email1">Email address <span>*</span></label>
                            <input type="email" name="email" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter your email address" value="<?php if(isset($email)){echo $email;} ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="subject1">Subject <span>*</span></label>
                            <input type="text" name="subject" class="form-control" id="subject1" placeholder="Enter your subject" required>
                            <?php
                                if(isset($email_sent)){
                                    echo "<p style='margin-left: 0px !important; text-align:left !important; color:#red'>$email_sent</p>";
                                }
                            ?>  
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="comments1">Comments / Questions <span>*</span></label>
                            <textarea name="comments" class="form-control" id="comments1" placeholder="Comments..." required></textarea> 
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" name="submit" id="btnSubmit" class="btn">SUBMIT</button>
                </div>

            </form>
        </div>
    </section>
    
    <!-- Footer -->
    <hr>
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 footer-content">
                    <p>Copyright © <a href="https://www.tatvasoft.com/">TatvaSoft</a> All Rights Reserved.</p>
                </div>
                <div class="col-md-6 footer-social text-right">
                    <ul class="social-list">
                        <li><a href="#"><i><img src="../img/home/facebook.png"></i></a></li>
                        <li><a href="#"><i><img src="../img/home/twitter.png"></i></a></li>
                        <li><a href="#"><i><img src="../img/home/linkedin.png"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- JQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="../js/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../js/bootstrap/bootstrap.min.js"></script>

</body>

</html>
