<?php
    require('connDB.php');
?>

<!DOCTYPE html>
<head>
    <link href="admin-searchUsers.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Welcome to LittyLit</title>
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Girassol' rel='stylesheet'>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

</head>
<body>

    <main>
        <!-- <ul>
            <li><a class="active" href="home.html">LittyLit</a></li>
            <a href="#" class = "MyBooks"><b>Reports</b></a>
            <a href="#" class = "MyBooks"><b>My Account</b></a>
            <a href="#" class = "MyBooks"><b>Search Books</b></a>
            <a href="#" class = "MyBooks"><b>Search Users</b></a>
            <a href="#" class = "MyBooks"><b>Search Orders</b></a>
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
                        <h5>Search Orders</h5>
                    </a>
                    <a class="nav-item h-100 nav-link" href="#">
                        <h5>Search Users</h5>
                    </a>
                    <a class="nav-item h-100 nav-link" href="#">
                        <h5>Search Books</h5>
                    </a>
                    <a class="nav-item h-100 nav-link" href="#">
                        <h5>My Account</h5>
                    </a>
                    <a class="nav-item h-100 nav-link" href="#">
                        <h5>Reports</h5>
                    </a>
                </div>
            </div>
        </nav>

        <!-- This should be generic html code -->
        <form method="post">
        <div class="container-fluid mt-5" id = "Search">
            <div class="mx-auto text-center" style="width: 400px;">
                <h1 id="header">Search Users</h1><br>
                <div class="input-group rounded">
                    
                    <input type="text" id="inputEmail" class="form-control rounded" placeholder="username" name="Search" />
                    <input type="submit" name="submit">
                  </div>
                  <p id="para">Enter username associated with the person</p>
              </div>
        </div>
        </form>
</main>
</body>
</html>



<?php

if (isset($_POST["submit"])) {
	$username = $_POST["Search"];
	$res = $conn->query("SELECT * FROM `userInfo` WHERE username = '$username'");
    $results = mysqli_num_rows($res);
    if ($results > 0) {
        while ($row = mysqli_fetch_object($res)) {
            ?>
		<div class="container">
            <div class="row">
                <div class="col-lg" id="left" >
                    <h1><?php echo $row->firstName; ?> <?php echo $row->lastName; ?></h1>
                    <h2><?php echo $row->email; ?></h2>
                </div>
                <div class="col-lg" id="right" >

                    <button onclick="window.location.href='#'" id="EditText">Edit</button><br>
                </div>
            </div>
        </div>
<?php 
        }
    }

	
		
		
		else{
			echo "Name Does not exist";
		}


}

?>


