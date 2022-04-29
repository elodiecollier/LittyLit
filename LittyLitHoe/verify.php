<?php



if (isset($_POST["verify_email"]))
{
    $verification_code = $_POST["verification_code"];

    require_once ('connDB.php');  

    $sql = "UPDATE userInfo SET email_verified_at = NOW() WHERE verification_code = '" . $verification_code . "'"; 
    $result = mysqli_query($conn, $sql);

    // echo mysqli_affected_rows($conn);

    if (mysqli_affected_rows($conn) == 0) {
        // echo mysqli_affected_rows($conn);
        // echo "<p>Wrong verification Code</p>";
        header("Location: verify.php");
        // die("Verification Code Failed.");
    } else {
        // echo "<p>You can login now</p>";
        $val = "UPDATE userInfo SET verified = 1 WHERE verification_code = '" . $verification_code . "'"; 
        $pls = mysqli_query($conn, $val);
        header("Location: customer-myAccount.php ");

    }

    exit();
}

?>


<head>
    <link href="verification.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>LittyLit</title>
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Girassol' rel='stylesheet'>
</head>
<body>

    <main>
        <!-- <ul>
            <li><a class="active" href="home.html">LL</a></li>
          </ul> -->
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand pl-4" href="#" style="font-size: 60px; color: #3F3D56">LittyLit</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <form method = "POST">
          <div class="container mt-5">
                <h1>Welcome to <span>LittyLit</span></h1>
                <h2>We sent you an email containing a 6-digit verification code. </h2>
                <!-- <div class="Code"> -->

                
                <input type = "text" name = "verification_code" class = "Code" placeholder="Enter Verification Code" required />
                <!-- </div> -->
                <input type="submit" class = "Login" name="verify_email" value = "Verify Email">
                
          </div>
          </form>

    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>