<?php
session_start();

//connect to database
require_once ('connDB.php'); 
// Check connection
if($conn=== false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$userType = $_SESSION['userType'];
//ensures someone is logged inbefore allowing them to create a profile
if(!isset($_SESSION['username'])) {

    header("Location: home.html");
    exit();
} else{
    $username = $_SESSION['username'];

}

?>

<!DOCTYPE>

<head>
    <link href="admin-logout.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Welcome to LittyLit</title>
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,700,400italic,700italic' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Girassol:400,700,400italic,700italic' rel='stylesheet'>
</head>

<html>

<body>
    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand pl-4" href="#" style="font-size: 60px; color: #3F3D56">LittyLit</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav d-lg-flex align-items-center mt-3">
                    <a class="nav-item h-100 nav-link" href="#">
                        <h5>Search Orders</h5>
                    </a>
                    <a class="nav-item h-100 nav-link" href="#">
                        <h5>Search Users</h5>
                    </a>
                    <a class="nav-item h-100 nav-link" href="#">
                        <h5>Search Books</h5>
                    </a>
                    <a class="nav-item h-100 nav-link" href="admin-myAccount.php">
                        <h5>My Account</h5>
                    </a>
                    <a class="nav-item h-100 nav-link" href="#">
                        <h5>Reports</h5>
                    </a>
                </div>
            </div>
        </nav>

        <div class="container-fluid text-center">
            <div class="row h-30 content">
                <div class="col-sm-2 sidenav justify-content-center" style="background-color: #2C6777;">
                    <div class="row align-items-center bottom-margin">
                        <div class="avatarMargin col-1">
                            <div class="row align-items-center d-flex float-right">
                                <img src="https://cdn-icons-png.flaticon.com/512/147/147142.png" width="45px"
                                    height="45px" style="vertical-align: middle;">
                            </div>
                        </div>
                        <div class="col-8 pl-2">
                            <div class="row">
                                <div class="col-12 mt-3 d-flex float-left bottom-margin nowrap">
                                <h5><?php echo $_SESSION['username'];?></h5>
                                </div>
                                <div class="col-12 d-flex float-left">
                                    <p>Administrator</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="background-color: lightgrey">
                    <h4 class="sidebar"><a href="#">
                            Account Details
                        </a></h4>
                    <h4 class="sidebar"><a href="#admin-logout.php">
                            Logout
                        </a></h4>
                </div>
                <div class="col-sm-10 text-left">
                    <div class="ml-3 mt-5">
                        <h3>Are you sure you want to log out?</h3>
                        <button class="btn-lg btn-primary mt-3"
                            style="background-color: #C8D8E4; border-width: 0px"><a href="logout.php" style="color: #3F3D56">Logout</a></button>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer pl-4">
            <p>CSCI 4050 Final Project by Andrew Humble, Elodie Collier, Nisha Rajendra, and Manmeet Gill.</p>
        </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>