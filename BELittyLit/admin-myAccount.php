<?php
session_start();

//connect to database
require_once('connDB.php');
// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//ensures someone is logged inbefore allowing them to create a profile
if (!isset($_SESSION['username'])) {

    header("Location: home.html");
    exit();
} else {
    $username = $_SESSION['username'];
}

?>

<!DOCTYPE>

<head>
    <link href="myAccount.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Welcome to LittyLit</title>
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,700,400italic,700italic' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Girassol:400,700,400italic,700italic' rel='stylesheet'>
</head>

<html>

<body>

    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand pl-4" href="home.html" style="font-size: 60px; color: #3F3D56">LittyLit</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
        <div class="row">
            <div class="col-md-6 text-center" style="background-color:#C8D8E4;">
                <img style="padding: 14%;" src="./images/undraw_click_here_re_y6uq.svg" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-6 text-center" style="background-color:#2B6777;">
                <h1 class="display-1" style="color: #ffffff; font-family: Nunito; margin-top: 15%; font-size: 60px; margin-top: 5%;">My Account</h2>
                    <p style="color: #ffffff; font-family: Nunito; margin-left: 5%; margin-right: 5%; font-size: 22px;">Shopping with us is easy - all of your personal info
                        saved here for you to reference and manage whenever you
                        need to.</p>
                    <a href="admin-editMyAccount.php"><button type="button" class="btn btn-light">Account Details</button></a> <br>
                    <a href="admin-logout.php"><button type="button" class="btn btn-light">Logout</button></a><br>
            </div>
        </div>

        <footer class="footer pl-4">
            <p style="font-family: Nunito;">CSCI 4050 Final Project by Andrew Humble, Elodie Collier, Nisha Rajendra, and Manmeet Gill.</p>
        </footer>
    </main>
</body>