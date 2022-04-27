<!DOCTYPE>

<head>
  <link href="login.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <title>Welcome to LittyLit</title>
  <link href='https://fonts.googleapis.com/css?family=Nunito:400,700,400italic,700italic' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Girassol:400,700,400italic,700italic' rel='stylesheet'>
</head>

<body>

<?php
include "vendorLogin.php";
include "customerLogin.php";
?>



  <main>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand pl-4" href="home.html"
        style="font-size: 60px; color: #3F3D56; font-family: Girassol;">LittyLit</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav d-lg-flex align-items-center mt-3">

        </div>
      </div>
    </nav>


    <div class="container-fluid mt-4 text-center">
      <h6 class="m-1" style="font-family: Nunito; color: rgba(63, 61, 86, 1)">Don't have an account? Click <a href="registration.php" class="linkHere">here</a> to register!</h6>
      <div class="row h-75 justify-content-md-center" style="background-image: url('undraw_road_to_knowledge_m8s0.svg'); background-size: contain; background-repeat: no-repeat; background-position: center;">
        <div class="col-5 m-4 p-2" style="background-color: rgba(43, 103, 119, 0.6); border-radius: 25px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
          <h1 class="m-3 display-3 " style="font-family: Girassol; color: #ffffff"> LittyLit</h1>
          <h3 class="font-weight-bold" style="font-family: Nunito; color: #ffffff">Customer Login</h3>

          <form method="post" action="customerLogin.php">
            <div class="row m-5 form-group">
              <label style="color: #ffffff; font-family: Nunito">Username</label>
              <input type="text" class="form-control p-3" aria-describedby="emailHelp" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);" name="username" required>
            </div>
            <div class="row m-5 form-group">
              <label style="color: #ffffff; font-family: Nunito">Password</label>
              <input type="password" class="form-control p-3" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);" name="password" required>
            </div>
            <button style="background-color: rgba(63, 61, 86, 1); border: 2px solid rgba(63, 61, 86, 1); box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);" type="submit" class="btn btn-primary btn-lg px-5 m-3" name="submit1">Login</button>
          </form>
        </div>



        <div class="col-5 m-4 p-2" style="background-color: rgba(43, 103, 119, 0.6); border-radius: 25px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
          <h1 class="m-3 display-3 " style="font-family: Girassol; color: #ffffff"> LittyLit</h1>
          <h3 class="font-weight-bold" style="font-family: Nunito; color: #ffffff">Vendor Login</h3>

          <form method="post" action="vendorLogin.php">
            <div class="row m-5 form-group">
            <label style="color: #ffffff; font-family: Nunito">Username</label>
              <input type="text" class="form-control p-3" aria-describedby="emailHelp" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);" name="username" required>
            </div>
            <div class="row m-5 form-group">
            <label style="color: #ffffff; font-family: Nunito">Password</label>
              <input type="password" class="form-control p-3" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);" name="password" required>
            </div>
            <button style="background-color: rgba(63, 61, 86, 1); border: 2px solid rgba(63, 61, 86, 1); box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);" type="submit" class="btn btn-primary btn-lg px-5 m-3" name="submit2">Login</button>
          </form>
          
        </div>
      </div>
    </div>
    <footer class="footer pl-4">
      <p style="font-family: Nunito;">CSCI 4050 Final Project by Andrew Humble, Elodie Collier, Nisha Rajendra, and Manmeet Gill.</p>
  </footer>
  </main>
</body>

