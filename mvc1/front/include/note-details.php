<?php 

    session_start();
    include 'connection.php';
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }
    $note_id = $_GET['note_id'];                          
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">

    <!-- Title -->
    <title>Note Details</title>

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
                        <a class="nav-link" href="search.html">Search Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Sell Your Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Buyer Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.html">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact-us.html">Contact Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link navbar-user-photo" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../img/note-details/reviewer-1.png"></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="user-profile.html">Update Profile</a>
                            <a class="dropdown-item" href="change-password.html">Change Password</a>
                            <a class="dropdown-item" href="login.html" id="logout"><b>Logout</b></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html"><button type="button" class="btn btn-primary btn-login">Login</button></a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <!-- Note Details -->
    <section class="note-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title">Note Details</h3>
                </div>
            </div>

            <?php
                $squery = "SELECT * FROM seller_notes WHERE ID = $note_id";
                $query = mysqli_query($connection, $squery);
                $row = mysqli_fetch_assoc($query);

                $seller_id = $row['SellerID'];
                $note_title = $row['Title'];
                $note_cat = $row['Category'];
                $note_pic = $row['DisplayPicture'];
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
                                
                /* For category */
                $catquery = "SELECT * FROM note_categories WHERE ID = '$note_cat'";
                $category_id = mysqli_query($connection, $catquery);
                if(!$category_id){
                    die(mysqli_error($connection));
                }
                $row = mysqli_fetch_assoc($category_id);
                $book_category = $row['Name'];

                /* For country */
                $conquery = "SELECT * FROM countries WHERE ID = '$note_country'";
                $country_id = mysqli_query($connection, $conquery);
                if(!$country_id){
                    die(mysqli_error($connection));
                }
                $row = mysqli_fetch_assoc($country_id);
                $book_country = $row['Name'];          
                
                /* For seller name */
                $namequery = "SELECT * FROM users WHERE ID = $seller_id";
                $name = mysqli_query($connection, $namequery);
                if(!$name){
                    die(mysqli_error($connection));
                }  
                $row = mysqli_fetch_assoc($name);
                $firstname = $row['FirstName'];
                $lastname = $row['LastName'];
            ?>
            <form method="POST" action="">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <div class="row" id="top">
                        <div class="col-md-4 col-sm-5 book-cover">
                            <img src="<?php echo $note_pic; ?>">
                        </div>
                        <div class="col-md-8 col-sm-7 book-detail">
                            <h2><?php echo $note_title; ?></h2>
                            <h5><?php echo $book_category; ?></h5>
                            <p><?php echo $note_desc; ?></p>
                            <div class="form-group">
                                <button type="button" id="btnSubmit" name="btnSubmit" class="btn" data-toggle="modal" href="#"
                                    data-target="<?php if($note_sell_type == 1){echo "#exampleModalCenter";} else {echo "";} ?>">DOWNLOAD <?php if($note_sell_type == 1){echo " / $$note_price";} else {echo "";} ?>
                                </button>
                            </div>

                            <!-- Thanks Popup -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content popup-container">
                                        <div class="row">
                                            <div class="col">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><img src="../img/note-details/close.png" id="close"></span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col" align="center">
                                                <div id="popup-top-image">
                                                    <img src="../img/note-details/SUCCESS.png" alt="Logo" class="center">
                                                </div><br>
                                                <h3>Thank you for purchasing!</h3><br>
                                            </div>
                                        </div>
                                        <div class="row popup-bottom">
                                            <div class="col">
                                            <?php
                                            if(isset($_GET['user_id'])){                           
                                                $user_id = $_GET['user_id'];
                                                $squery = "SELECT * FROM users WHERE ID = '$user_id'";
                                                $user_details = mysqli_query($connection, $squery);
                                                if(!$user_details){
                                                    die(mysqli_error($connection));
                                                }
                                                $row = mysqli_fetch_assoc($user_details);
                                                $name = $row['FirstName'];
                                            } 

                                            /* For insert query in downloads table */

                                                $pathquery = "SELECT * FROM seller_notes_attachements WHERE NoteID = $note_id";
                                                $query = mysqli_query($connection, $pathquery);
                                                $row = mysqli_fetch_assoc($query);

                                                $path = $row['FilePath'];
                                
                                                if($note_sell_type == 0){
                                                    $allowed_download = 1; 
                                                    $attachment_path = $path;
                                                    $downloaded = 1;
                                                } else {
                                                    $allowed_download = 0; 
                                                    $attachment_path = '';
                                                    $downloaded = 0;
                                                }
                                                
                                                $insertquery = "INSERT INTO downloads (NoteID, Seller, Downloader, IsSellerHasAllowedDownload, AttachmentPath, IsAttachmentDownloaded, AttachmentDownloadedDate, IsPaid, PurchasedPrice, NoteTitle, NoteCategory, CreatedDate, CreatedBy, ModifiedDate, ModifiedBy) VALUES ($note_id, $seller_id, $user_id, $allowed_download, '$attachment_path', $downloaded, NOW(), $note_sell_type, $note_price, '$note_title', '$book_category', NOW(), $user_id, NOW(), '$user_id')";
                                    
                                                $notequery = mysqli_query($connection, $insertquery);
                                            
                                            ?>
                                                <h6>Dear <?php echo $name;?>,</h6>
                                                <p>As this is paid notes - you need to pay to seller <?php echo $firstname," ",$lastname; ?>
                                                    offline. We will send him an email that you want to download
                                                    this note. He may contact you further for payment process
                                                    completion.</p>
                                                <p>In case, you have Urgency,<br>Please contact us on +91987654321.
                                                </p>
                                                <p>Once he recelves the payment and acknowledge us - selected notes
                                                    you can see over my downloads tab for download.</p>
                                                <p>Have a good day.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Thanks Popup End -->

                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 book-data">
                    <table>
                        <tr>
                            <td id="attribute">Institution :</td>
                            <td id="value"><?php echo $note_university; ?></td>
                        </tr>
                        <tr>
                            <td id="attribute">Country :</td>
                            <td id="value"><?php echo $book_country; ?></td>
                        </tr>
                        <tr>
                            <td id="attribute">Course Name :</td>
                            <td id="value"><?php echo $note_course ?></td>
                        </tr>
                        <tr>
                            <td id="attribute">Course Code :</td>
                            <td id="value"><?php echo $note_code ?></td>
                        <tr>
                            <td id="attribute">Professor :</td>
                            <td id="value"<?php echo $note_prof ?>></td>
                        </tr>
                        <tr>
                            <td id="attribute">Number of Pages :</td>
                            <td id="value"><?php echo $note_page ?></td>
                        </tr>
                        <tr>
                            <td id="attribute">Approved Date :</td>
                            <td id="value"><?php echo date('F d Y', $date) ?></td>
                        </tr>
                        <tr>
                            <td id="attribute">Rating :</td>
                            <td id="value"><img src="../img/search/star.png" id="book-rating">
                                <img src="../img/search/star.png" id="book-rating">
                                <img src="../img/search/star.png" id="book-rating">
                                <img src="../img/search/star.png" id="book-rating">
                                <img src="../img/search/star-white.png" id="book-rating">
                                <span>100 reviews</span>
                            </td>
                        </tr>
                    </table>
                    <span id="red-text">5 Users marked this note as inappropriate</span>
                </form></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-5 col-sm-12 left-bottom">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title">Note Preview</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- responsive iframe -->
                            <div class="embed-responsive embed-responsive-1by1">
                                <iframe class="embed-responsive-item" src="<?php echo $note_preview; ?>"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 right-bottom">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title">Customer Reviews</h3>
                        </div>
                    </div>
                    <div class="review">
                        <div class="row">
                            <div class="col-md-1 col-sm-2">
                                <img src="../img/note-details/reviewer-1.png">
                            </div>
                            <div class="col-md-11 col-sm-10" id="review">
                                <h6>Richard Brown</h6>
                                <img src="../img/search/star.png" id="book-rating">
                                <img src="../img/search/star.png" id="book-rating">
                                <img src="../img/search/star.png" id="book-rating">
                                <img src="../img/search/star.png" id="book-rating">
                                <img src="../img/search/star-white.png" id="book-rating">
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam aut nam nostrum
                                    repellendus dolorum error sint</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-1 col-sm-2">
                                <img src="../img/note-details/reviewer-2.png">
                            </div>
                            <div class="col-md-11 col-sm-10" id="review">
                                <h6>Alice Otriaz</h6>
                                <img src="../img/search/star.png" id="book-rating">
                                <img src="../img/search/star.png" id="book-rating">
                                <img src="../img/search/star.png" id="book-rating">
                                <img src="../img/search/star.png" id="book-rating">
                                <img src="../img/search/star-white.png" id="book-rating">
                                </span>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam aut nam nostrum
                                    repellendus dolorum error sint</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-1 col-sm-2">
                                <img src="../img/note-details/reviewer-3.png">
                            </div>
                            <div class="col-md-11 col-sm-10" id="review">
                                <h6>Sara Passmore</h6>
                                <span>
                                    <img src="../img/search/star.png" id="book-rating">
                                    <img src="../img/search/star.png" id="book-rating">
                                    <img src="../img/search/star.png" id="book-rating">
                                    <img src="../img/search/star.png" id="book-rating">
                                    <img src="../img/search/star-white.png" id="book-rating">
                                </span>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numqua aut nam nostrum
                                    repellendus dolorum error sint</p>
                            </div>
                        </div>
                    </div>
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


    <!-- JQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="../js/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../js/bootstrap/bootstrap.min.js"></script>

</body>

</html>