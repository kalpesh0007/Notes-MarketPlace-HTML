<?php 

    session_start();
    include 'connection.php';
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">

    <!-- Title -->
    <title>Search Notes</title>

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
                    <li class="nav-item active">
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
                        <a class="nav-link" href="login.php"><button type="button" class="btn btn-primary btn-login">Login</button></a>
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
                            Search Notes
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Title -->

    <section class="search">
        <div class="container">
            <div class="search-filter">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title">Search and Filter notes</h1>
                    </div>
                </div>
                <div class="filtering">
                    <div class="row">
                        <div class="col-md-12">
                            <input class="form-control me-2" id="search1" type="search"
                                placeholder="Search notes here..." aria-label="Search">
                        </div>
                    </div>
                    <div class="row" id="filter">
                        <div class="col-md-2 col-sm-4">
                            <div class="form-group">
                                <select id="dropdownType1" class="form-control">
                                    <option selected>Select type</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <div class="form-group">
                                <select id="dropdownCategory1" class="form-control">
                                    <option selected>Select category</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <div class="form-group">
                                <select id="dropdownUniversity1" class="form-control">
                                    <option selected>Select university</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <div class="form-group">
                                <select id="dropdownCourse1" class="form-control">
                                    <option selected>Select course</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <div class="form-group">
                                <select id="dropdownCountry1" class="form-control">
                                    <option selected>Select country</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <div class="form-group">
                                <select id="dropdownRating1" class="form-control">
                                    <option selected>Select rating</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                    <?php
                    $query = "SELECT * FROM seller_notes WHERE Status = 9";
                    $notes = mysqli_query($connection, $query);
                    if(!$notes){
                        die("Failed to load NOTES".mysqli_error($connection));
                    }
                    $count = mysqli_num_rows($notes);
                    ?>
                        <h1 class="title">Total <?php echo $count ?> Notes</h1>
                    </div>
                </div>
                <div class="filter-result">
                    <div class="row">
                        <?php
                                for ($i = 1; $i <= $count; $i++){
                                $row = mysqli_fetch_assoc($notes);

                                $note_id = $row['ID'];
                                $note_title = $row['Title'];
                                $note_cat = $row['Category'];
                                $note_pic = $row['DisplayPicture'];
                                $note_type = $row['NoteType'];
                                $note_page = $row['NumberofPages'];
                                $note_desc = $row['Description'];
                                $note_university = $row['UniversityName'];
                                $note_country = $row['Country'];
                                $note_course = $row['Course'];
                                $note_code = $row['CourseCode'];
                                $note_prof = $row['Professor'];
                                $note_sell_type = $row['IsPaid'];
                                $note_price = $row['SellingPrice'];
                                $note_preview = $row['NotesPreview'];
                                $note_date = $row['PublishedDate'];
                                $date = strtotime($note_date);
                                
                                $_SESSION['note_id'] = $note_id;
                                $_SESSION['note_title'] = $note_title;
                                $_SESSION['note_pic'] = $note_pic;
                                
                                /* For country */
                                $conquery = "SELECT * FROM countries WHERE ID = '$note_country'";
                                $country_id = mysqli_query($connection, $conquery);
                                if(!$country_id){
                                    die(mysqli_error($connection));
                                }
                                $row = mysqli_fetch_assoc($country_id);
                                $book_country = $row['Name'];
                                
                            ?>
                        <div class="col-md-4 col-sm-6" style="padding: 12px 10px;">
                            <div class="full-book">
                                <div class="book-cover">
                                    <a href="<?php if(isset($user_id)){echo 'note-details.php?note_id='.$note_id.'&user_id='.$user_id;} else {echo 'note-details.php?note_id='.$note_id;}?>">
                                    <img src="<?php echo $note_pic; ?>" alt="book-cover" id="book-cover-1" class="img-fluid img-responsive"></a>
                                </div>
                                <div class="book-details">
                                    <a href="<?php if(isset($user_id)){echo 'note-details.php?note_id='.$note_id.'&user_id='.$user_id;} else {echo 'note-details.php?note_id='.$note_id;}?>">
                                    <h5 id="book-title"><?php echo $note_title; ?></h5></a>
                                    <ul>
                                        <li><img src="../img/search/university.png" id="book-uni"><?php echo $note_university,', ', $book_country; ?></li>
                                        <li><img src="../img/search/pages.png" id="book-pages"><?php echo $note_page; ?> Pages</li>
                                        <li><img src="../img/search/calendar.png" id="book-date"><?php echo date('D, M d Y', $date); ?></li>
                                        <li><img src="../img/search/flag.png" id="book-remark"><span id="red-text">5 Users
                                                marked this note as inappropriate</span></li>
                                    </ul>
                                    <img src="../img/search/star.png" id="book-rating">
                                    <img src="../img/search/star.png" id="book-rating">
                                    <img src="../img/search/star.png" id="book-rating">
                                    <img src="../img/search/star.png" id="book-rating">
                                    <img src="../img/search/star.png" id="book-rating">
                                    <span id="reviews">100 reviews</span>
                                </div>
                            </div>
                            
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Pagination -->
    <div class="row justify-content-center">
        <div class="pagination">
            <a href="#"><img src="../img/search/left-arrow.png"></a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#"><img src="../img/search/right-arrow.png"></a>
        </div>
    </div>

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