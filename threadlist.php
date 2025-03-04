<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  .git{
    margin-top: -27px !important;
  }
</style>
<body>
<?php 
$servername = "127.0.0.2";
$username = "root";
$password = "Nitish123@";
$database = "loginpage";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
  $row2 = "SELECT * FROM `category`";
  $result2 = mysqli_query($conn, $row2);
while ($sql2 = mysqli_fetch_assoc($result2)) {

  $id2 = $sql2["category_id"];}
echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="money.php/#contact">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              I-Service
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="threadlist.php?catid=' . $id2 . '">Restaurant service</a></li>
              <li><a class="dropdown-item" href="threadlist.php?catid=' . $id2 . '">Restaurant Infrastructure</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="threadlist.php?catid=' . $id2 . '">Restaurant Menu</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>';

?>
</body>
</html>

<?php

$servername = "127.0.0.2";
$username = "root";
$password = "Nitish123@";
$database = "loginpage";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
?>
<?php
$id = $_GET['catid'];
$sql = "SELECT * FROM `category` WHERE category_id=$id";
$result = mysqli_query($conn, $sql);
$nose=true;
while ($row = mysqli_fetch_assoc($result)) {
    $catname = $row['category_name'];
    $catdesc = $row['category_description'];
    
}

?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $id = $_GET['catid'];
    $descrition = $_POST['elaborate'];
    $commentby=$_POST["serno"];
    $sql3 = "INSERT INTO `thread`(`thread_title`,`thread_description`,`thread_cat_id`,`user_cat_id`) VALUE ('$title','$descrition','$id','$commentby')";
    $result2 = mysqli_query($conn, $sql3);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4 fw-bold">Welcome to <?php echo $catname; ?> forums</h1>
            <p class="lead"> <?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not
                post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                questions. Remain respectful of other members at all times.</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
    <h1 class=" container my-4">Start Discussion</h1>
    <div class="container my-4">
        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post" class="wite">
            <input type="hidden" name="serno" value="<?php echo $_SESSION["user_id"]?>">
            <div class="mb-3">
                <label for="title" class="form-label"><h4>Title</h4></label>
                <input type="text" class="form-control" id="title" name="title" minlength="5" required>
            </div>
            <div class="mb-3">
                <label for="elaborate" class="form-label"><h4>Elaborate Your View</h4></label>
                <textarea class="form-control" id="elaborate" name="elaborate" rows="3" minlength="30" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
    <h1 class="container my-4">Browse Question</h1>
    <?php 
    $sq="SELECT*FROM `thread` WHERE thread_cat_id=$id";
    $res=mysqli_query($conn,$sq);

    while($ro=mysqli_fetch_assoc($res)){
        $nose=false;
        $title=$ro["thread_title"];
        $description=$ro["thread_description"];
        $thread_id=$ro["thread_id"];
        $wanada=$ro["user_cat_id"];
        $sq2="SELECT Name FROM `login` WHERE user_no='$wanada'";
        $res2=mysqli_query($conn,$sq2);
        $row5=mysqli_fetch_assoc($res2);
        echo'<div class="container my-2">
        <i class="fa-solid fa-user me-0"></i>
        <a href=thread.php?threadid='.$thread_id.' class="text-dark mt-0"><h4 class="d-inline">'.$title.'</h4></a>
        <p class="fw-bold text-end ">'.$named.'</p>
        <p class="fw-normal ms-4 git">'.$description.'</p>

    </div>
    <hr>';
    

    }
    if($nose){
        echo'
            <div class="container my-4">
                <div class="jumbotron">
                    <h1 class="display-4 fw-bold">NO Result Found</h1>
                    <p class="lead">You will the first to start a Disscusion</p>
                    <hr class="my-4">
                </div>
            </div>
            ';

    }
    
    
    ?>
         <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>
        <script src="java.js"></script>  
</body>

</html>