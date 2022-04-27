<?php
    
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
      session_set_cookie_params(0);
    }

    require('connDB.php');
    //connects to db
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $emptyUP = false;

        if (empty($username) || empty($password)) {
            echo "<div class=echo><h6>Please fill out all fields.</h6></div>";
        } else {

        $sql = "SELECT * FROM userInfo WHERE username='$username' AND password = '$password' AND userType=1 LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);

        if (!$user) {
            echo "<div class=echo><h6>Username or password is incorrect.</h6></div>";         
        } else {

          if(isset($_SESSION['username'])) {

            header('Location: customer-myAccount.php');
            exit();
          } else if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $firstName = $_POST['firstName'];
            $_SESSION['username'] = $username;
            $userType = $_POST['userType'];
            $_SESSION['userType'] = 1;
            $url = "customer-myAccount.php";
            header('Location: customer-myAccount.php');

  
            exit();
          }

        }
        
      }


     }

?>