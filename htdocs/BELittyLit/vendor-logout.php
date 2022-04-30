<?php
session_start();

//connect to database
require_once('connDB.php');

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (!isset($_SESSION['username'])) {

    header("Location: home.html");
    exit();
} else {
    $username = $_SESSION['username'];
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
}
$getValuesQuery = "SELECT firstName, lastName, password, email, birthday, strAddress, city, state, zip FROM userInfo WHERE username='" . $_SESSION['username'] . "';";

$values = $conn->query($getValuesQuery);
$row = $values->fetch_assoc();

$firstName = isset($row['firstName']) ? htmlspecialchars($row['firstName']) : '';
$lastName = isset($row['lastName']) ? htmlspecialchars($row['lastName']) : '';
$password = $row['password'];
$email = $row['email'];
$birthday = $row['birthday'];
$strAddress = isset($row['strAddress']) ? htmlspecialchars($row['strAddress']) : '';
$city = isset($row['city']) ? htmlspecialchars($row['city']) : '';
$state = $row['state'];
$zip = $row['zip'];

?>

<!DOCTYPE>

<head>
    <link href="userLogout.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Welcome to LittyLit</title>
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,700,400italic,700italic' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Girassol:400,700,400italic,700italic' rel='stylesheet'>
</head>

<html>

<body>
    <main>
        <?php include 'elements/vendor-header.html'; ?>

        <div class="container-fluid text-center">
            <div class="row h-30 content">
                <div class="col-sm-2 sidenav justify-content-center" style="background-color: #2C6777;">
                    <div class="row align-items-center bottom-margin">
                        <div class="avatarMargin col-1">
                            <div class="row align-items-center d-flex float-right">
                                <img src="https://cdn-icons-png.flaticon.com/512/147/147142.png" width="45px" height="45px" style="vertical-align: middle;">
                            </div>
                        </div>
                        <div class="col-8 pl-2">
                            <div class="row">
                                <div class="col-12 mt-3 d-flex float-left bottom-margin nowrap">
                                    <h5><?php echo $firstName ?></h5>
                                </div>
                                <div class="col-12 d-flex float-left">
                                    <p>Vendor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="background-color: lightgrey">
                    <h4 class="sidebar"><a href="#">
                            Account Details
                        </a></h4>
                    <h4 class="sidebar"><a href="vendor-logout.php">
                            Logout
                        </a></h4>
                </div>
                <div class="col-sm-10 text-left">
                    <div class="ml-3 mt-5">
                        <h3>Are you sure you want to log out?</h3>
                        <button class="btn-lg btn-primary mt-3" style="background-color: #C8D8E4; border-width: 0px"><a href="logout.php" style="color: #3F3D56">Logout</a></button>
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