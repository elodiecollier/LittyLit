<?php
session_start();

//connect to database
require_once ('connDB.php'); 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$userType = $_SESSION['userType'];

if(!isset($_SESSION['username'])) {

    header("Location: home.html");
    exit();
} else{
    $username = $_SESSION['username'];
}

?>


<!DOCTYPE>

<head>
    <link href="customer-browseCatalog.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Welcome to LittyLit</title>
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Girassol' rel='stylesheet'>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>
</head>

<body>

    <main>
        <!-- <ul>
            <li><a class="active" href="home.html">LittyLit</a></li>
            <a href="#" class="MyBooks"><img src="CustCart.png" alt="cart" style="width:45px;height:40px;"></a>
            <a href="#" class = "MyBooks"><b>My Account</b></a>
            <a href="#" class = "MyBooks"><b>My Books</b></a>
          </ul> -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand pl-4" href="#" style="font-size: 60px; color: #3F3D56">LittyLit</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav d-lg-flex align-items-center mt-3">
                    <a class="nav-item h-100 nav-link" href="#">
                        <h5>My Books</h5>
                    </a>
                    <a class="nav-item h-100 nav-link" href="#">
                        <h5>My Account</h5>
                    </a>
                    <a class="nav-item h-100 mb-3 nav-link" href="#"><img src="../images/cart.png" height="60px"
                            width="60px"></a>
                </div>
            </div>
        </nav>

        <div class="container-fluid mt-5">
            <div class="mx-auto text-center" style="width: 400px;">
                <div class="input-group rounded">
                    <input type="search" id="inputEmail" class="form-control rounded" placeholder="Search!"
                        aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-2" id="search-addon">
                        <i class="fa fa-search" id="icon" aria-hidden="true"></i>
                    </span>
                </div>
                <pre>Title       Genre       Author       ISBN</pre>
            </div>
        </div>

        <div class="col-sm-12 pt-4">
            <div class="row justify-content-center">
                <?php?>
                    <a href="">
                    <div class="card ml-4 mr-4 mt-4 mb-4">
                        <div class="col-sm-12 justify-content-center">
                            <div class="row">
                                <img class="card-img-top mx-auto mt-5" src="../images/Gatsby.png"
                                    alt="Place Holder Book" style="height: 10rem; width: 8rem; display:block">
                                <div class="card-body ml-1">
                                    <div class="row justify-content-center">
                                        <h4 class="card-title">The Great Gatsby</h4>
                                    </div>
                                    <div class="row justify-content-center">
                                        <p class="card-text"> F. Scott Fitzgerald</p>
                                    </div>
                                    <div class="row pt-1 justify-content-center">
                                        <h5 class="card-text">$5.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                <?php?>
            </div>
        </div>

    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>