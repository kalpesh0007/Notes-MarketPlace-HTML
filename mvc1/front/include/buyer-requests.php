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
    <title>Buyer Requests</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/home/favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/data-table.css">

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
                            <a class="dropdown-item" href="user-profile.html">My Profile</a>
                            <a class="dropdown-item" href="my-downloads.html">My Downloads</a>
                            <a class="dropdown-item" href="my-sold-notes.html">My Sold Notes</a>
                            <a class="dropdown-item" href="my-rejected-notes.html">My Rejected Notes</a>
                            <a class="dropdown-item" href="#">Change Password</a>
                            <a class="dropdown-item" href="login.html" id="logout"><b>Logout</b></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html"><button type="button" class="btn btn-primary btn-login">Logout</button></a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <!-- Table -->
    <section class="dashboard-table" id="buyer-requests-table">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 heading">Buyer Requests</div>
                <div class="col-md-4 col-sm-12 search">
                    <div class="row">
                        <div class="col-md-8 col-sm-9 searchbar">
                            <div class="search-box text-left">
                                <img src="../img/dashboard/search-icon.svg">
                                <input type="text" class="search-input" id="searchtext1" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-3 search-button">
                            <button type="button" class="btn btn-primary search1 search-btn">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row booktable table-responsive">
                <table class="table table-hover table1 table-responsive">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 5%">Sr no.</th>
                            <th scope="col" style="width: 12%">Note Title</th>
                            <th scope="col" style="width: 9%">Category</th>
                            <th scope="col" style="width: 17%">Buyer</th>
                            <th scope="col" style="width: 13%">Phone No.</th>
                            <th scope="col" style="width: 5%">Sell Type</th>
                            <th scope="col" style="width: 6%">Price</th>
                            <th scope="col" style="width: 17%">Downloded Date/Time</th>
                            <th scope="col" style="width: 7%"></th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        $dselect = "SELECT * FROM downloads WHERE Seller = $user_id AND IsPaid = '1' AND Seller != Downloader";
                        $download = mysqli_query($connection, $dselect);
                        $count = mysqli_num_rows($download);
                        
                        for ($i = 1; $i <= $count; $i++) {
                            $row = mysqli_fetch_assoc($download);

                            $note_id = $row['NoteID'];
                            $note_title = $row['NoteTitle'];
                            $note_cat = $row['NoteCategory'];
                            $note_buyer = $row['Downloader'];
                            $note_sell_type = $row['IsPaid'];
                            $note_price = $row['PurchasedPrice'];
                            $note_date = $row['CreatedDate'];
                            $date = strtotime($note_date);

                            /* For buyer email */
                            $uselect = "SELECT * FROM users WHERE ID = $note_buyer";
                            $buyer_mail = mysqli_query($connection, $uselect);
                            if(!$buyer_mail){
                                die(mysqli_error($connection));
                            }
                            $row = mysqli_fetch_assoc($buyer_mail);
                            $book_buyer = $row['EmailID'];      
                            
                            /* For buyer mobile */
                            $uselect = "SELECT * FROM user_profile WHERE UserID = $note_buyer";
                            $buyer_phone = mysqli_query($connection, $uselect);
                            if(!$buyer_phone){
                                die(mysqli_error($connection));
                            }
                            $row = mysqli_fetch_assoc($buyer_phone);
                            $buyer_phone_code = $row['PhoneNumberCountryCode'];
                            $buyer_phone_no = $row['PhoneNumber'];      
                            
                    ?>  
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td id="magenta-text"><?php echo $note_title; ?></td>
                            <td><?php echo $note_cat; ?></td>
                            <td><?php echo $book_buyer; ?></td>
                            <td><?php echo $buyer_phone_code," ", $buyer_phone_no; ?></td>
                            <td><?php if($note_sell_type == 1){echo "Paid";} else {echo "Free";} ?></td>
                            <td><?php echo "$$note_price"; ?></td>
                            <td><?php echo date('d M Y, h:i:s', $date); ?></td>
                            <td>
                                <a href="<?php if(isset($user_id)){echo 'note-details.php?note_id='.$note_id.'&user_id='.$user_id;} else {echo 'note-details.php?note_id='.$note_id;}?>"><img src="../img/dashboard/eye.png"></a>
                                <a class="nav-link" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: initial; padding: 0;"><img src="../img/dashboard/dots.png"></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="../include/add-download.php<?php echo '?buyer_id='.$note_buyer.'&note_id='.$note_id; ?>">Yes, I Received</button>
                                </div>
                            </td>
                        </tr><?php
                        }
                        ?>
                    </tbody>
                </table>
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

    <!-- Datatable JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    
    <script>
    $(document).ready(function() {
        var table = $('.table1').DataTable({
            'sDom': '"top"i',
            "iDisplayLength": 10,
            language: {
                paginate: {
                    next: '<img src="../img/search/right-arrow.png">',
                    previous: '<img src="../img/search/left-arrow.png">'
                }
            },
            columnDefs: [{
                targets: [5],
                orderable: false,
            }]
        });

        $('.search1').click(function() {
            var x = $('#searchtext1').val();
            table.search(x).draw();
        });
    });
    </script>

</body>

</html>