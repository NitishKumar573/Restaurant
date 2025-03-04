<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
              Dropdown
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
<script>



</script>
<?php
session_start();
$servername = "127.0.0.2";
$username = "root";
$password = "Nitish123@";
$database = "loginpage";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
$id = $_GET['threadid'];
$sql = "Select * from `thread` where `thread_id`=$id";
$result = mysqli_query($conn, $sql);
$nor = true;
while ($row = mysqli_fetch_assoc($result)) {
  $thre=$row["user_cat_id"];
  $sql2="Select Name from `login` where `user_no`='$thre' ";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_assoc($result2);
  $na=$row2["Name"];

    echo '<div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4 fw-bold">' . $row['thread_title'] . '</h1>
            <p class="lead">' . $row['thread_description'] . '</p>
            <hr class="my-4">
            
            <h3 class="fw-normal d-inline"> Posted By <h3 class="fw-bold d-inline made"><strong>'.$na.'</strong></h3></h3>

            
        </div>
    </div>';
  }
    


;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST["comment"];
    $comment_by=$_POST["sno"];
    $hack=$_POST["hidden"];
    $sq = "INSERT INTO `comment`(`comment_content`,`thread_id`,`comment_by`) VALUE ('$comment','$id','$comment_by')";
    $res = mysqli_query($conn, $sq);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thred</title>
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
    <div class="mb-3 container">
        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
            <label for="elaborate" class="form-label">
                <h3>Post Your Comment</h3>
            </label>
            <textarea class="form-control" id="comment" name="comment" rows="3" minlength="15" required></textarea>
            <input type="hidden" name="sno" value="<?php echo $row['user_no']?>">
            <input type="hidden" name="hidden" value="<?php echo $_SESSION["Naam"]?>" class="hidden">
            <button type="submit" class="btn btn-success mt-3">Post</button>
        </form>
        <?php


        ?>

    </div>

    <div class="container">
        <h1>Comments</h1>
        <?php 
        $sql2 = "Select * from `comment` where `thread_id`=$id";
        $result2 = mysqli_query($conn, $sql2);
        while ($row2 = mysqli_fetch_assoc($result2)){
          $post=$row2["comment_content"];
          $yet=$row2["comment_by"];
          $sql3 = "SELECT Name FROM `login` WHERE user_no='$yet'";
          $result3 = mysqli_query($conn, $sql3);
          $row3 = mysqli_fetch_assoc($result3);
          $comme=$row3['Name'];


          
            echo'
            <div class="container my-2">
                <i class="fa-solid fa-user me-2"></i>
                <h5 class="d-inline">'.$comme.'</h5>
                <p class="fw-normal ms-2">'.$post.'</p>
            
            </div>
            ';
            $nor = false;
        }

        ?>
        <?php if ($nor) {
            echo '<div class="container my-4">
                <div class="jumbotron">
                    <h1 class="display-4 fw-bold">NO Comment</h1>
                    <p class="lead">You will the first to   Comment</p>
                    <hr class="my-4">
                </div>
            </div>';

        } ?>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>
        <script src="java.js"></script>
</body>

</html>