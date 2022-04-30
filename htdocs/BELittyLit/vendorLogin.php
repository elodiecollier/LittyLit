<?php
session_set_cookie_params(0);

session_start();

require('connDB.php');
//connects to db
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $emptyUP = false;

  if (empty($username) || empty($password)) {
    echo "<div class=echo><h6>Please fill out all fields.</h6></div>";
  } else {

    $sql = "SELECT * FROM userInfo WHERE username='$username' AND password = '$password' AND userType=2 LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
      echo "<div class=echo><h6>Username or password is incorrect.</h6></div>";
    } else {

      if (isset($_SESSION['username'])) {

        header('Location: vendor-myAccount.php');
        exit();
      } else if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $_SESSION['username'] = $username;
        $userType = $_POST['userType'];
        $_SESSION['userType'] = 1;
        $url = "vendor-myAccount.php";
        header('Location: vendor-myAccount.php');


        exit();
      }
    }
  }
}
