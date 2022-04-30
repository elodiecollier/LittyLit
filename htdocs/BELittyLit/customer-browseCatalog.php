<?php
session_start();

//connect to database
require_once('connDB.php');
// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$userType = $_SESSION['userType'];

if (!isset($_SESSION['username'])) {

    header("Location: home.html");
    exit();
} else {
    $username = $_SESSION['username'];
}

$getBooksQuery = "SELECT username, title, author, price, imgPath FROM book;";
$values = $conn->query($getBooksQuery);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];
    $filter = $_POST['radio'] ?? "";
    if ($search == "") {
        $getBooksQuery = "SELECT username, title, author, price, imgPath FROM book;";
        $values = $conn->query($getBooksQuery);
    } else {
        if ($filter == "title") {
            $getBooksQuery = "SELECT username, title, author, price, imgPath FROM book WHERE title LIKE '%" . $search . "%';";
        } else if ($filter == "author") {
            $getBooksQuery = "SELECT username, title, author, price, imgPath FROM book WHERE author LIKE '%" . $search . "%';";
        } else if ($filter == "isbn") {
            $getBooksQuery = "SELECT username, title, author, price, imgPath FROM book WHERE isbn='" . $search . "';";
        } else if ($filter == "genre") {
            $getBooksQuery = "SELECT username, title, author, price, imgPath FROM book WHERE genre LIKE '%" . $search . "%';";
        }
        $values = $conn->query($getBooksQuery);
    }
}
# 
# $price = isset($books['price']) ? htmlspecialchars($books['price']) : '';
# $author = isset($books['author']) ? htmlspecialchars($books['author']) : '';
# $title = isset($books['title']) ? htmlspecialchars($books['title']) : '';
#                <?php while ($row = mysqli_fetch_array($values)) {?/>
#                <?php }?/>
?>

<!DOCTYPE>

<head>
    <link href="customer-browseCatalog.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Welcome to LittyLit</title>
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Girassol' rel='stylesheet'>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
</head>

<body>

    <main>
        <?php include 'elements/customer-header.html'; ?>
        <div class="container-fluid mt-5">
            <div class="mx-auto text-center" style="width: 400px;">
                <form method="post">

                    <div class="form-group rounded">
                        <div class="row">
                            <div class="col-11">
                                <input type="search" name="search" id="inputEmail" class="form-control rounded" placeholder="Search!" aria-label="Search" aria-describedby="search-addon" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);" />
                            </div>
                            <div class=" col-1" style="align-items: center; display: flex; margin-left: -1rem;">
                                <button class="input-group-text border-2" style=" border-width: 0rem; background-color: #C8D8E4; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                                    <i class="fa fa-search" id="icon" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radio" id="inlineRadio1" value="title" style="box-shadow: none !important;" checked>
                        <label class=" form-check-label" for="inlineRadio1">Title</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radio" id="inlineRadio2" value="genre" style="box-shadow: none !important;">
                        <label class="form-check-label" for="inlineRadio2">Genre</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radio" id="inlineRadio3" value="author" style="box-shadow: none !important;">
                        <label class="form-check-label" for="inlineRadio3">Author</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radio" id="inlineRadio3" value="isbn" style="box-shadow: none !important;">
                        <label class="form-check-label" for="inlineRadio3">ISBN</label>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-12 pt-4">
            <div class="row justify-content-center">
                <?php while ($row = mysqli_fetch_array($values)) { ?>
                    <a href="">
                        <div class="card ml-4 mr-4 mt-4 mb-4">
                            <div class="col-sm-12 justify-content-center">
                                <div class="row">
                                    <img class="card-img-top mx-auto mt-5" src="<?php echo $row['imgPath'] ?>" alt="Place Holder Book" style="height: 10rem; width: 8rem; display:block">
                                    <div class="card-body ml-1">
                                        <div class="row justify-content-center">
                                            <h4 class="card-title text-center" style="font-size: 1.2rem;"><?php echo $row['title'] ?></h4>
                                        </div>
                                        <div class="row justify-content-center">
                                            <p class="card-text"><?php echo $row['author'] ?></p>
                                        </div>
                                        <div class="row pt-1 justify-content-center">
                                            <h5 class="card-text"><?php echo "$" . number_format($row['price'], 2) ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
        <?php include 'elements/footer.html'; ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>