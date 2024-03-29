<?php 

    session_start();
    include 'connection.php';
    $user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
   
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
   
    <!-- Title -->
    <title>Notes Market Place</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/home/favicon.ico">
    
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!--bootstrap css-->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">


</head>

<body>

    <!-- Navbar -->
    <section class="home-nav-bar">       
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
                    <li class="nav-item">
                        <a class="nav-link" href="<?php if(isset($_SESSION['user_id'])){ echo "contact-us.php?user_id=".$user_id;} else {echo "contact-us.php";} ?>">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php if(isset($_SESSION['user_id'])){ echo "home.php?user_id=".$user_id;} else {echo "login.php";}?>"><button type="button" class="btn btn-primary btn-login">Login</button></a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <!-- Home -->
    <section class="home">
        <div class="home-img"></div>
        <div class="home-overlay col-md-7">
            <span class="heading">Download Free/Paid Notes</span><br>
            <span class="heading">or Sale your Book</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus debitis adipisci ad quae reprehenderit voluptatem nemo eos, totam nulla animi voluptatum.</p>
            <div class="overlay-btn">
                <button type="button" class="btn btn-outline-light">LEARN MORE</button>
            </div>
        </div>
    </section>

    <!--  About -->
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6 about-heading">
                    <span>About</span><br><span>
                        NotesMarketPlace
                    </span>
                </div>
                <div class="col-md-6 about-text">
                    <p id="about-p1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde qui soluta quisquam laudantium corporis placeat ratione facilis corrupti, fuga veritatis perferendis nam odio, voluptatibus hic alias autem provident. Labore, maxime.</p>
                    <p id="about-p2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut rerum veritatis deserunt accusantium, natus ad quod nam sapiente amet aut! Qui, a nemo delectus, earum beatae error tempore vitae magni.</p>
                </div>
            </div>
        </div>
    </section>

    <!--  Work -->
    <section class="work">
        <div class="container">
            <div class="row">
                <div class="col-md-12 work-heading">
                    <span>How it Works</span>
                </div>
                <div class="col-md-6 work-content">
                    <div class="logo">
                        <img src="../img/home/download.png">
                    </div>
                    <div class="sub-heading">
                        <span>Download Free/Paid Notes</span>
                    </div>
                    <div class="work-text">
                        <span>Get Material For your <br>Cource etc.</span>
                    </div>
                    <div class="work-btn">
                        <a href="#"><button type="button" class="btn btn-primary work-btn" id="btn1"><span>Download</span></button></a>
                    </div>
                </div>
                <div class="col-md-6 work-content">
                    <div class="logo">
                        <img src="../img/home/seller.png">
                    </div>
                    <div class="sub-heading">
                        <span>Seller</span>
                    </div>
                    <div class="work-text">
                        <span>Upload and Download Cource <br> and Materials etc.</span>
                    </div>
                    <div class="work-btn">
                        <a href="#"><button type="button" class="btn btn-primary work-btn" id="btn2"><span>Sell Book</span></button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials  -->
    <section class="testimonial">
        <div class="container">
            <div class="row">
                <div class="testimonial-heading col-md-12">
                    <span>What our Customers are Saying</span>
                </div>
                <div class="col-md-6 team" id="team1">
                    <div class="team1">
                        <div class="team-img col-md-6">
                            <img src="../img/home/customer-1.png">
                        </div>
                        <div class="team-intro">
                            <span class="team-name">Walter Meller</span><br>
                            <span class="team-job">Founder & CEO, Matrix Group</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda possimus illo numquam libero quibusdam voluptatem laboriosam esse</p>
                    </div>
                </div>
                <div class="col-md-6 team" id="team2">
                    <div class="team2">
                        <div class="team-img col-md-6">
                            <img src="../img/home/customer-2.png">
                        </div>
                        <div class="team-intro">
                            <span class="team-name">Jonnie Riley</span><br>
                            <span class="team-job">Employee, Curious Snacks</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda possimus illo numquam libero quibusdam voluptatem laboriosam esse</p>
                    </div>
                </div>
                <div class="col-md-6 team" id="team3">
                    <div class="team3">
                        <div class="team-img col-md-6">
                            <img src="../img/home/customer-3.png">
                        </div>
                        <div class="team-intro">
                            <span class="team-name">Amilia Luna</span><br>
                            <span class="team-job">Teacher, Saint Joseph High School</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda possimus illo numquam libero quibusdam voluptatem laboriosam esse</p>
                    </div>
                </div>
                <div class="col-md-6 team" id="team4">
                    <div class="team4">
                        <div class="team-img col-md-6">
                            <img src="../img/home/customer-4.png">
                        </div>
                        <div class="team-intro">
                            <span class="team-name">Daniel Cardos</span><br>
                            <span class="team-job">Software Engineer, Infinitum Company</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda possimus illo numquam libero quibusdam voluptatem laboriosam esse</p>
                    </div>
                </div>
            </div>
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


    <!-- Jquery JS -->
    <script src="../js/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="../js/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS-->
    <script src="../js/script.js"></script>

</body>

</html>