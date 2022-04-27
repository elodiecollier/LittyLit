<?php
    
   
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        session_set_cookie_params(0);
    }

    require('connDB.php');
    // connect to the db
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $strAddress = $_POST['strAddress'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $userType = $_POST['userType'];
        $promotion = 0;
        $verification = 0;


        if (empty($firstName) || empty($lastName) || empty($username) || empty($password) || empty($email) || empty($birthday) || empty($strAddress) || empty($city) || empty($state) || empty($zip) || empty($userType)) {
            echo "<div class=echo><h6 id=malign>Please fill out all the fields.</h6></div>";
        }
        else if (strlen($password) < 7) {
            echo "<div class=echo><h6 id=malign>Password must be more than 6 characters.</h6></div>";
            // return;
        } 
        else {
            //here we check for duplicates within the db if you want to create a new account
            $checkDuplicate = "SELECT * FROM userInfo WHERE username='$username' OR email='$email' LIMIT 1";
            $result = mysqli_query($conn, $checkDuplicate);

            $user = mysqli_fetch_assoc($result);

            if ($user) { // if user exists
                if ($user['username'] === $username) {
                    echo "<div class=echo><h6 id=malign>Username already exists!</h6></div>";
                } //if

                if ($user['email'] === $email) {
                    echo "<div class=echo><h6 id=malign>Email already exists!</h6></div>";
                } //if
            } else {
                echo("INSIDE ELSE FOR INSERT");
                //if user name does not exist, we can create a new account and insdert it into the db
                $query = "INSERT INTO userInfo VALUES('$firstName', '$lastName', '$username', '$password', '$email', '$birthday', '$strAddress','$city', '$state', '$zip','$userType','$promotion','$verification')";
                mysqli_query($conn, $query);
                if(isset($_SESSION['username'])) {
                
                    header('Location: home.html');
                    exit();
                } 
                else if (isset($_POST['username'])) {
                    $username = $_POST['username'];
                    $_SESSION['username'] = $username;
                    $url = "verification.php";
                    header('Location: home.html');

                    //header(string: 'Location: ' . "cp.php");
                    exit();
                }
            }
        }
    }


        
     
?>
<!DOCTYPE html>

<head>
    <link href="registration.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>LittyLit</title>
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Girassol' rel='stylesheet'>
    <link rel="icon" href="/images/favicon.ico?" type="image/x-icon">
</head>

<body class="d-flex flex-column min-vh-100">
    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand pl-4" href="home.html" style="font-size: 60px; color: #3F3D56;">LittyLit</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <!-- Page Content -->
        <div class="container-fluid text-center">
            <div class="row h-100 content justify-content-center">
                <!-- Main Page Portion -->
                <div class="col-sm-10">
                    <div class="ml-4 mt-5">
                        <h1>LittyLit</h1>
                        <h3>Let's get you registered!</h3>
                        <form method="post">
                        <div class="pt-2 row justify-content-center">
                                <div class="col-8 t-2 form-group">
                                    <div class="col-9 t-2 form-group form-check form-check-inline">
                                            <h6 class="mr-5 px-4" style="font-family: Nunito;">I am registering as a...</h6>
                                            <input type="radio" id="Customer" name="userType" value="1" class="m-3">
                                            <label for="Customer">Customer</label><br>
                                            <input type="radio" id="Vendor" name="userType" value="2" class="m-3">
                                            <label for="Vendor">Vendor</label><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2 row justify-content-center">
                                <div class="col-4">
                                    <div class="pt-2 form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" placeholder="First Name" class="form-control" id="firstName" name="firstName" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="pl-2 pt-2 form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" placeholder="Last Name" class="form-control" id="lastName" name="lastName" required>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2 row justify-content-center">
                                <div class="col-8 t-2 form-group">
                                    <label for="email">Email</label>
                                    <input type="text" placeholder="Email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="pt-2 row justify-content-center">
                                <div class="col-4">
                                    <div class="pt-2 form-group">
                                        <label for="username">Username</label>
                                        <input type="text" placeholder="Username" class="form-control" id="username" name="username" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="password">Password</label>
                                    <div class="pl-2 pt-2 form-group">
                                        <input type="password" placeholder="Password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2 row justify-content-center">
                                <div class="col-4">
                                    <div class="pt-2 form-group">
                                    <label for="username">Birthday</label>
                                        <input type="text" placeholder="YYYY-MM-DD" class="form-control" id="birthday" name="birthday" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="pl-2 pt-2 form-group">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-8">
                                    <hr>
                                </div>
                            </div>
                            <div class="pt-2 row justify-content-center">
                                <div class="col-8 t-2 form-group">
                                <label for="address">Street Address</label>
                                    <input type="text" placeholder="Street Address" class="form-control" id="strAddress" name="strAddress" required>
                                </div>
                            </div>
                            <div class="pt-2 mb-4 row justify-content-center">
                                <div class="col-3">
                                    <div class="pt-2 form-group">
                                     <label for="city">City</label>
                                        <input type="text" placeholder="City" class="form-control" id="city" name="city" required>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="pt-2 form-group">
                                    <label for="state">State</label>
                                        <input type="text" placeholder="GA" class="form-control" id="state" name="state" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="pl-2 pt-2 form-group">
                                    <label for="password">Zip Code</label>
                                        <input type="text" placeholder="Zip" class="form-control" id="zip" name="zip" required>
                                    </div>
                                </div>
                            </div>
                            <button class="btn-lg btn-primary mt-3" style="background-color: #C8D8E4; border-width: 0px; color: #3F3D56" type="submit">
                                    Continue
                            </button>
                        </form> 
                    </div>
                    <div class="row justify-content-center">
                        <h6 class="m-3" style="font-family: Nunito; font-size: 80%;">Already have an account? Click <a href="/login">here</a> to login.</h6>
                        <div class="col-8 text-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        
        <footer class="footer pl-4 mt-auto">
            <p>CSCI 4050 Final Project by Andrew Humble, Elodie Collier, Nisha Rajendra, and Manmeet Gill.</p>
        </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>