<?php 

    session_start();
    include 'connection.php';
    $user_id = $_SESSION['user_id'];
    
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
    <title>Add Notes</title>

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
                    <li class="nav-item">
                        <a class="nav-link" href="<?php if(isset($_SESSION['user_id'])){ echo "contact-us.php?user_id=".$user_id;} else {echo "contact-us.php";} ?>">Contact Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link navbar-user-photo" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../img/note-details/reviewer-1.png"></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="user-profile.html">My Profile</a>
                            <a class="dropdown-item" href="my-downloads.html">My Downloads</a>
                            <a class="dropdown-item" href="my-sold-notes.html">My Sold Notes</a>
                            <a class="dropdown-item" href="my-rejected-notes.html">My Rejected Notes</a>
                            <a class="dropdown-item" href="change-password.html">Change Password</a>
                            <a class="dropdown-item" href="login.html"><b>Logout</b></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html"><button type="button" class="btn btn-primary btn-login" id="logout">Logout</button></a>
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
                            Add Notes
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Title -->

    <!-- Add Note Details -->
    <section class="add-notes">
        <div class="container">
            <form class="add-notes-form" id="add-notes-form" action="" method="POST" enctype="multipart/form-data"> 

            <?php
            
                ob_start();
                $isflag = 0;

                if (isset($_POST['submit'])) {
                    
                    $title = mysqli_real_escape_string($connection, $_POST['title']);
                    $category = mysqli_real_escape_string($connection, $_POST['category']);
                    $type = mysqli_real_escape_string($connection, $_POST['type']);
                    $no_of_pages = mysqli_real_escape_string($connection, $_POST['no_of_pages']);
                    $description = mysqli_real_escape_string($connection, $_POST['description']);
                    $country = mysqli_real_escape_string($connection, $_POST['country']);
                    $institute = mysqli_real_escape_string($connection, $_POST['institute']);
                    $coursename = mysqli_real_escape_string($connection, $_POST['coursename']);
                    $coursecode = mysqli_real_escape_string($connection, $_POST['coursecode']);
                    $professor = mysqli_real_escape_string($connection, $_POST['professor']);
                    $ispaid = mysqli_real_escape_string($connection, $_POST['ispaid']);
                    $sellingprice = mysqli_real_escape_string($connection, $_POST['sellingprice']);
                    
                    /* For image */
                    $file = $_FILES['display_pic'];
                    $file_name = $_FILES['display_pic']['name'];
                    $file_tmp_name = $_FILES['display_pic']['tmp_name'];
                    $file_error = $_FILES['display_pic']['error'];

                    /* Code to allow only certain types of file */
                    $file_ext = explode('.', $file_name);
                    $file_actual_ext = strtolower(end($file_ext));
                    $allowed_types = array('jpg','jpeg','png');
                    if(in_array($file_actual_ext, $allowed_types)){
                        if($file_error === 0){
                            $file_destination = '../uploads/note_display_img/'.$file_name;
                            move_uploaded_file($file_tmp_name, $file_destination);
                            $display_pic =  $file_destination;
                        }else{
                            $display_pic_upload_error = "Failed to upload";
                        }
                    }else{
                        $display_pic_type_error  = "Please upload only jpeg , jpg and png files";
                    }
                                
                    if(!isset( $display_pic)){
                        $display_pic = $file_destination;
                    }

                    /* For Note upload */
                    $file = $_FILES['uploadnote'];
                    $file_name = $_FILES['uploadnote']['name'];
                    $file_type = $_FILES['uploadnote']['type'];
                    $file_tmp_name = $_FILES['uploadnote']['tmp_name'];
                    $file_error = $_FILES['uploadnote']['error'];

                    if ($file_name != '' && $file_type == 'application/pdf'){
                        if($file_error === 0){
                            $file_destination = '../uploads/note_upload_pdf/'.$file_name;
                            move_uploaded_file($file_tmp_name, $file_destination);
                            $uploadnote =  $file_destination;
                        }else{
                            $uploadnote_upload_error = "Failed to upload";
                        }
                    }else{
                        $uploadnote_type_error  = "Please upload only pdf file";
                    }
                                
                    if(!isset( $uploadnote) && $uploadnote != ''){
                        $uploadnote = $file_destination;
                    }
                    
                    /* For Note preview */
                    $file = $_FILES['notepreview'];
                    $file_name = $_FILES['notepreview']['name'];
                    $file_type = $_FILES['uploadnote']['type'];
                    $file_tmp_name = $_FILES['notepreview']['tmp_name'];
                    $file_error = $_FILES['notepreview']['error'];

                    if ($file_name != '' && $file_type == 'application/pdf'){
                        if($file_error === 0){
                            $file_destination = '../uploads/note_preview_pdf/'.$file_name;
                            move_uploaded_file($file_tmp_name, $file_destination);
                            $notepreview =  $file_destination;
                        }else{
                            $notepreview_upload_error = "Failed to upload";
                        }
                    }else{
                        $notepreview_type_error  = "Please upload only pdf file";
                    }
                                
                    if(!isset( $notepreview) && $uploadnote != ''){
                        $notepreview = $file_destination;
                    }
                    
                    /* For category */
                    $cquery = "SELECT * FROM note_categories WHERE Name = '$category'";
                    $category_id = mysqli_query($connection, $cquery);
                    if(!$category_id){
                        die(mysqli_error($connection));
                    }
                    $row = mysqli_fetch_assoc($category_id);
                    $note_category = mysqli_real_escape_string($connection, $row['ID']);
                    
                    /* For type */
                    $tquery = "SELECT * FROM note_types WHERE Name = '$type'";
                    $type_id = mysqli_query($connection, $tquery);
                    if(!$type_id){
                        die(mysqli_error($connection));
                    }
                    $row = mysqli_fetch_assoc($type_id);
                    $note_type = mysqli_real_escape_string($connection, $row['ID']);
                    
                    /* For country */
                    $conquery = "SELECT * FROM countries WHERE Name = '$country'";
                    $country_id = mysqli_query($connection, $conquery);
                    if(!$country_id){
                        die(mysqli_error($connection));
                    }
                    $row = mysqli_fetch_assoc($country_id);
                    $book_country = mysqli_real_escape_string($connection, $row['ID']);
                    
                    
                    $insertquery = "INSERT INTO seller_notes (SellerID, Status, ActionedBy, AdminRemarks, PublishedDate, Title, Category, DisplayPicture, NoteType, NumberofPages, Description, UniversityName, Country, Course, CourseCode, Professor, IsPaid, SellingPrice, NotesPreview, CreatedDate, CreatedBy, ModifiedDate, ModifiedBy, IsActive) VALUES ('$user_id', 6, '$user_id', '', NOW(), '$title', '$note_category', '$display_pic', '$note_type', '$no_of_pages', '$description','$institute', $book_country, '$coursename', '$coursecode', '$professor', $ispaid, '$sellingprice', '$notepreview', NOW(), '$user_id', NOW(), '', b'0')";
                    
                    $notequery = mysqli_query($connection, $insertquery);
                    
                    if($notequery){
                        
                        $isflag = 1;
                        $query = "true";
                        $last_id = mysqli_insert_id($connection);
                        $_SESSION['last_id'] = $last_id;
                        $_SESSION['title'] = $title;
                        $_SESSION['uploadnote'] = $uploadnote; 
                        $_SESSION['category'] = $category;
                        $_SESSION['display_pic'] = $display_pic;
                        $_SESSION['uploadnote'] = $uploadnote;
                        $_SESSION['type'] = $type;
                        $_SESSION['no_of_pages'] = $no_of_pages;
                        $_SESSION['description'] = $description;
                        $_SESSION['country'] = $country;
                        $_SESSION['institute'] = $institute;
                        $_SESSION['coursename'] = $coursename;
                        $_SESSION['coursecode'] = $coursecode;
                        $_SESSION['professor'] = $professor;
                        $_SESSION['ispaid'] = $ispaid;
                        $_SESSION['sellingprice'] = $sellingprice;
                        $_SESSION['notepreview'] = $notepreview;

                        $attech = "INSERT INTO seller_notes_attachements (NoteID, FileName, FilePath, CreatedDate, CreatedBy, ModifiedDate, ModifiedBy, IsActive) VALUES ('$last_id', '$title', '$uploadnote', NOW(), '$user_id', NOW(), '', b'0')";
                        $attechquery = mysqli_query($connection, $attech);  

                    } else {
                        ?>
                            <script>
                                alert('Your Note is not Submited.');
                            </script>
                        <?php
                    }
                       
                }
                
                if (isset($_POST['publish'])) {   
                       
                    if(isset($_GET['user_id'])){                           
                        $user_id = $_GET['user_id'];
                        $squery = "SELECT * FROM users WHERE ID = '$user_id'";
                        $user_details = mysqli_query($connection, $squery);
                        if(!$user_details){
                            die(mysqli_error($connection));
                        }
                        $row = mysqli_fetch_assoc($user_details);
                        $seller_name = $row['FirstName'];
                    }

                    $note_id = $_SESSION['last_id'];
                    $notetitle = $_SESSION['title'];
                    
                    $uquery = "UPDATE seller_notes SET Status = 7 WHERE ID = $note_id";
                    
                    $query = mysqli_query($connection, $uquery);
                    
                    if($query){
                       
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
                            $mail->addReplyTo($config_email, );    // If receiver replies to the email, it will be sent to this email address
                        
                            // Setting the email content
                            $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
                            $mail->Subject = "$seller_name sent his note for review";       //subject line of email
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
                                    <tbody>
                                        <tr style='height: 60px;'>
                                            <td class='text-3'>
                                                Hello Admins,    
                                            </td>
                                        </tr>
                                        <tr style='height: 60px;'>
                                            <td class='text-3'>
                                                We want to inform you that, $seller_name sent his note<br>
                                                $notetitle for review. Please look at the notes and take requiredactions.
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
                             
                            header("location:../include/dashboard.php"); 
                        
                            } catch (Exception $e) {
                                echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                            }
                        
                    } else {
                        ?>
                            <script>
                                alert('Your Note is not Published.');
                            </script>
                        <?php
                    }  
                } 
                ?>

                <?php 
                    if(isset($_GET['note_id']) && ($_GET['user_id'])){
                        $note_id = $_GET['note_id'];
                        $user_id = $_GET['user_id'];

                        $note_info = "SELECT * FROM seller_notes WHERE ID = $note_id AND SellerID = $user_id";
                        $note = mysqli_query($connection, $note_info);
                        if(!$note){
                            die(mysqli_error($connection));
                        }
                        $row = mysqli_fetch_assoc($note);

                        $title = $row['Title'];
                        $pages = $row['NumberofPages'];
                        $des = $row['Description'];
                        $uni = $row['UniversityName'];
                        $course = $row['Course'];
                        $ccode = $row['CourseCode'];
                        $prof = $row['Professor'];
                        $price = $row['SellingPrice'];
                    }
                ?>

                <!-- Basic Note Details -->
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title">Basic Note Details</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title1">Title <span>*</span></label>
                            <input type="text" name="title" class="form-control" id="title1" placeholder="Enter your notes title" value="<?php if(isset($_SESSION['title']) && $isflag == 1){echo $_SESSION['title'];} if(isset($_GET['note_id']) && ($_GET['user_id'])){echo $title;}?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dropdownCategory2">Category <span>*</span></label>
                            <select id="dropdownCategory2" name="category" class="form-control" value="<?php if(isset($_SESSION['category']) && $isflag == 1){echo $_SESSION['category'];} if(isset($_GET['note_id']) && ($_GET['user_id'])){echo $_SESSION['category'];}?>" required>
                                <option selected>Select your category</option>
                                <option>Computer Science</option>
                                <option>Medical</option>
                                <option>Low</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="display_pic">Display Picture </label>
                        <div class="uploader form-group">
                            <label for="display_pic">
                                <img src="../img/add-notes/upload-file.png" id="display_pic" class="img_preview" alt="preview">
                                <input type="file" name="display_pic" class="form-control-file image-upload1" id="display_pic" value="" onchange="picture(this);">
                                <script>
                                    function picture(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            reader.onload = function (e) {
                                                $('#display_pic')
                                                    .attr('src', e.target.result)
                                                    .width(50)
                                                    .height(50);
                                                };
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                            </label>
                        </div> 
                        <?php
                                if(isset($display_pic_upload_error)){
                                    echo "<p style='margin-left: 0px !important; text-align:left !important; color:red'>$display_pic_upload_error</p>";
                                }
                                if(isset($display_pic_type_error)){
                                    echo "<p style='margin-left: 0px !important; text-align:left !important; color:red'>$display_pic_type_error</p>";
                                }
                            ?>
                    </div>
                    <div class="col-md-6">
                        <label for="uploadnote">Upload Notes <span>*</span></label>
                        <div class="uploader form-group">
                            <label for="uploadnote">
                                <img src="../img/add-notes/upload-note.svg" id="uploadnote" class="upload_note" alt="preview">
                                <input type='file' name="uploadnote" class="form-control-file image-upload2" id="uploadnote" value="" onchange="notes(this);" required>
                                <script>
                                    function notes(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            reader.onload = function (e) {
                                                $('#uploadnote')
                                                    .attr('src', e.target.result)
                                                    .width(50)
                                                    .height(50);
                                                };
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                            </label>
                        </div>
                    </div>
                    <?php
                            if(isset($uploadnote_upload_error)){
                                echo "<p style='margin-left: 0px !important; text-align:left !important; color:red'>$uploadnote_upload_error</p>";
                            }
                            if(isset($uploadnote_type_error)){
                                echo "<p style='margin-left: 0px !important; text-align:left !important; color:red'>$uploadnote_type_error</p>";
                            }
                        ?>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dropdownType2">Type <span>*</span></label>
                            <select id="dropdownType2" name="type" class="form-control" value="" required>
                                <option selected>Select your note type</option>
                                <option>Handwritten Notes</option>
                                <option>University Notes</option>
                                <option>Novel</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pages1">Number of Pages <span>*</span></label>
                            <input type="text" name="no_of_pages" class="form-control" id="pages1"
                                placeholder="Enter number of note pages" value="<?php if(isset($_SESSION['no_of_pages']) && $isflag == 1){echo $_SESSION['no_of_pages'];} if(isset($_GET['note_id']) && ($_GET['user_id'])){echo $pages;} ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description1">Description <span>*</span></label>
                            <textarea class="form-control" id="description1" name="description"
                                placeholder="Enter your Description..." value="<?php if(isset($_SESSION['description']) && $isflag == 1){echo $_SESSION['description'];} if(isset($_GET['note_id']) && ($_GET['user_id'])){echo $des;} ?>" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- University and College Information -->
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title" style="margin-top: 40px;">Institution Information</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dropdownCountry2">Country <span>*</span></label>
                            <select id="dropdownCountry2" name="country" class="form-control" value="" required>
                                <option selected>Select your country</option>
                                <option>India</option>
                                <option>USA</option>
                                <option>UK</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="institution1">Institution Name</label>
                            <input type="text" name="institute" class="form-control" id="institution1"
                                placeholder="Enter your institution name" value="<?php if(isset($_SESSION['institute']) && $isflag == 1){echo $_SESSION['institute'];} if(isset($_GET['note_id']) && ($_GET['user_id'])){echo $uni;} ?>">
                        </div>
                    </div>
                </div>

                <!-- Course Details -->
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title" style="margin-top: 40px;">Coures Details</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="courseName1">Cource Name</label>
                            <input type="text" name="coursename" class="form-control" id="courseName1"
                                placeholder="Enter your course name" value="<?php if(isset($_SESSION['coursename']) && $isflag == 1){echo $_SESSION['coursename'];} if(isset($_GET['note_id']) && ($_GET['user_id'])){echo $course;} ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="courseCode1">Cource Code</label>
                            <input type="text" name="coursecode" class="form-control" id="courseCode1"
                                placeholder="Enter your course code" value="<?php if(isset($_SESSION['coursecode']) && $isflag == 1){echo $_SESSION['coursecode'];} if(isset($_GET['note_id']) && ($_GET['user_id'])){echo $ccode;} ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="professor1">Professor / lecturer</label>
                            <input type="text" name="professor" class="form-control" id="professor1"
                                placeholder="Enter your professor name" value="<?php if(isset($_SESSION['professor']) && $isflag == 1){echo $_SESSION['professor'];} if(isset($_GET['note_id']) && ($_GET['user_id'])){echo $prof;} ?>">
                        </div>
                    </div>
                </div>

                <!-- Selling Information -->
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title" style="margin-top: 40px;">Selling Information</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="sell1">Sell for <span>*</span></label><br>
                                <div id="sell-button">
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="free1">
                                            <input type="radio" class="form-check-input" id="free1" name="ispaid" value="0" required>Free
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="paid1">
                                            <input type="radio" class="form-check-input" id="paid1" name="ispaid" value="1" checked>Paid
                                        </label>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="sellPrice1">Sell Price <span>*</span></label>
                                    <input type="text" name="sellingprice" class="form-control" id="sellPrice1"
                                        placeholder="Enter your price" value="<?php if(isset($_SESSION['sellingprice']) && $isflag == 1){echo $_SESSION['sellingprice'];} if(isset($_GET['note_id']) && ($_GET['user_id'])){echo $price;} ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="notepreview">Note Preview <span>*</span></label>
                        <div class="uploader1 form-group">
                        <label for="notepreview">
                                <img src="../img/user-profile/upload.png" id="notepreview" class="note_preview" alt="preview">
                                <input type='file' name="notepreview" class="form-control-file image-upload2" id="notepreview" value="" onchange="notePreview(this);" required>
                                <script>
                                    function notePreview(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            reader.onload = function (e) {
                                                $('#notepreview')
                                                    .attr('src', e.target.result)
                                                    .width(50)
                                                    .height(50);
                                                };
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                            </label>
                        </div>
                        <?php
                            if(isset($notepreview_upload_error)){
                                echo "<p style='margin-left: 0px !important; text-align:left !important; color:red'>$notepreview_upload_error</p>";
                            }
                            if(isset($notepreview_type_error)){
                                echo "<p style='margin-left: 0px !important; text-align:left !important; color:red'>$notepreview_type_error</p>";
                            }
                        ?>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="row">
                    <div class="form-group">
                        <button type="submit" name="submit" id="btnSubmit1" class="btn" <?php echo isset($_POST['submit']) ? 'disabled="true"' : '';?> >SAVE</button>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="publish" id="btnSubmit1" class="btn" href="dashboard.php" <?php if($isflag == 0) {echo 'disabled';} else {echo 'enabled';} ?>>PUBLISH</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Notes Details -->

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

    <script>
        $(document).ready(function() {
            $("#free1").click(function() {
                $("#sellPrice1").attr("disabled", true);
            });
            $("#paid1").click(function() {
                $("#sellPrice1").attr("disabled", false);
            });                            
        });
    </script>
</body>

</html>