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
    <title>Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/home/favicon.ico">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap">

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

    <!-- Dashboard Top -->
    <section class="dashboard-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 title">
                    <h3>Dashboard</h3>
                </div>
                <div class="col-md-6 col-sm-6 add-btn">
                    <a href="add-notes.php" id="btnAdd" class="btn" title="add-note" role="button">ADD MORE</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 boxes">
                            <div class="myearning">
                                <div class="earning-img text-center">
                                    <img src="../img/dashboard/earning-icon.svg"><br>
                                    <span class="heading">My Earning</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 boxes">
                            <div class="sold-box">
                                <div class="sold">
                                <?php
                                    $dselect = "SELECT * FROM downloads WHERE IsSellerHasAllowedDownload = 1 AND AttachmentPath IS NOT NULL AND Seller != Downloader ";
                                    $downloads = mysqli_query($connection, $dselect);
                                    $dcount = mysqli_num_rows($downloads);
                                ?>
                                    <span class="heading" href="my-downloads.php"><?php echo $dcount; ?></span><br>
                                    <span class="sub-heading">Numbers of notes Sold</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 boxes">
                            <div class="sold-box">
                                <div class="earning">
                                    <span class="heading">$10,00,000</span><br>
                                    <span class="sub-heading">Money Earned</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 boxes">
                            <div class="download-box">
                                <span class="heading">38</span><br>
                                <span class="sub-heading">My Downloads</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 boxes">
                            <div class="reject-box">
                                <span class="heading">12</span><br>
                                <span class="sub-heading">My Rejected Notes</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 boxes">
                            <div class="request-box">
                                <span class="heading">102</span><br>
                                <span class="sub-heading">Buyer Requests</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Table 1  -->
    <section class="dashboard-table">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 heading">In Progress Notes</div>
                <div class="col-md-4 col-sm-12 search">
                    <div class="row">
                        <div class="col-md-8 col-sm-9 searchbar">
                            <div class="search-box text-left">
                                <img src="../img/dashboard/search-icon.svg">
                                <input type="text" class="search-input" id="searchtext1" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-md-4 search-button">
                            <button type="button" class="btn btn-primary search1 search-btn">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row booktable table-responsive">
                <table class="table table-hover table1 table-responsive">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 12%">Added date</th>
                            <th scope="col" style="width: 36%">title</th>
                            <th scope="col" style="width: 20%">category</th>
                            <th scope="col" style="width: 16%">status</th>
                            <th scope="col" style="width: 10%">actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $select = "SELECT * FROM seller_notes WHERE Status IN (6, 7, 8)";
                            $squery = mysqli_query($connection, $select);
                            $count = mysqli_num_rows($squery);
                            for ($i = 1; $i <= $count; $i++) {
                                $progress_row = mysqli_fetch_assoc($squery);
                                $note_id = $progress_row['ID'];
                        ?>      
                        <tr>
                            <td><?php
                                    $pdate = $progress_row['PublishedDate'];
                                    $date = strtotime($pdate);
                                    echo date('d-m-Y', $date); ?></td>
                            <td><?php echo $progress_row['Title']; ?></td>
                            <td><?php
                                    $cateid = $progress_row['Category'];
                                    $categoryquery = "SELECT * FROM note_categories WHERE ID = '$cateid' AND IsActive = b'1'";
                                    $categorydata = mysqli_query($connection, $categoryquery);
                                    $category = mysqli_fetch_assoc($categorydata);
                                    echo $category['Name']; ?></td>
                            <td><?php 
                                    $statusid = $progress_row['Status'];
                                    $statusquery = "SELECT * FROM reference_data WHERE ID = '$statusid' AND IsActive = b'1'";
                                    $statusdata = mysqli_query($connection, $statusquery);
                                    $status = mysqli_fetch_assoc($statusdata);
                                    echo $status['DataValue']; ?></td>
                            <td><?php
                                    if($progress_row["Status"] == 6){
                                    ?>
                                        <a href="<?php if(isset($user_id)){echo 'add-notes.php?user_id='.$user_id.'&note_id='.$note_id;} else {echo 'add-notes.php?note_id='.$note_id;}?>"><img src="../img/dashboard/edit.png" alt="view"></a>
                                        <a href="#"><img src="../img/dashboard/delete.png" alt="delete"></a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="<?php if(isset($user_id)){echo 'note-details.php?user_id='.$user_id.'&note_id='.$note_id;} else {echo     'note-details.php?note_id='.$note_id;}?>"><img src="../img/dashboard/eye.png" alt="view"></a>
                                    <?php
                                    }
                                    ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody> 
                </table>
            </div>
        </div>
    </section>
    
    <!-- Dashboard Table 2 -->
    <section class="dashboard-table">
        <div class="container">
            <div class="row">
                <div class="col-md-8 heading">Published Notes</div>
                <div class="col-md-4 search">
                    <div class="row">
                        <div class="col-md-8 searchbar">
                            <div class="search-box text-left">
                                <img src="../img/dashboard/search-icon.svg">
                                <input type="text" class="search-input" id="searchtext2" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-md-4 search-button">
                            <button type="button" class="btn btn-primary search2 search-btn">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row booktable table-responsive">
                <table class="table table-hover table2 table-responsive">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 10%">Added date</th>
                            <th scope="col" style="width: 30%">title</th>
                            <th scope="col" style="width: 18%">category</th>
                            <th scope="col" style="width: 10%">Sell Type</th>
                            <th scope="col" style="width: 10%">Price</th>
                            <th scope="col" style="width: 10%">Actions</th>
                        </tr>
                    </thead> 
                    <tbody>
                        
                        <?php
                            $select = "SELECT * FROM seller_notes WHERE Status = 9";
                            $squery = mysqli_query($connection, $select);
                            $count = mysqli_num_rows($squery);
                            for ($i = 1; $i <= $count; $i++) {
                                $published_row = mysqli_fetch_assoc($squery);
                                $note_id = $published_row['ID'];
                        ?>      

                        <tr>
                            <td><?php
                                    $pdate = $published_row['PublishedDate'];
                                    $date = strtotime($pdate);
                                    echo date('d-m-Y', $date); ?></td>
                            <td><?php echo $published_row['Title']; ?></td>
                            <td><?php
                                    $cateid = $published_row['Category'];
                                    $categoryquery = "SELECT * FROM note_categories WHERE ID = '$cateid' AND IsActive = b'1'";
                                    $categorydata = mysqli_query($connection, $categoryquery);
                                    $category = mysqli_fetch_assoc($categorydata);
                                    echo $category['Name']; ?></td>
                            <td><?php
                                    $note_sell_type = $published_row['IsPaid'];
                                    if($note_sell_type == 1){echo "Paid";} else {echo "Free";} ?></td>
                            <td><?php 
                                    $note_price = $published_row['SellingPrice'];
                                    echo "$$note_price"; ?></td>
                            <td><a href="<?php if(isset($user_id)){echo 'note-details.php?user_id='.$user_id.'&note_id='.$note_id;} else {echo             'note-details.php?note_id='.$note_id;}?>"><img src="../img/dashboard/eye.png" alt="view"></a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
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
            "iDisplayLength": 5,
            language: {
                paginate: {
                    next: '<img src="../img/search/right-arrow.png">',
                    previous: '<img src="../img/search/left-arrow.png">'
                }
            },
            columnDefs: [{
                targets: [4],
                orderable: false,
            }]
        });

        $('.search1').click(function() {
            var x = $('#searchtext1').val();
            table.search(x).draw();
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        var table = $('.table2').DataTable({
            'sDom': '"top"i',
            "iDisplayLength": 5,
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

        $('.search2').click(function() {
            var x = $('#searchtext2').val();
            table.search(x).draw();
        });
    });
</script>

</body>

</html>