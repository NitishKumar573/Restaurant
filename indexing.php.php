<?php
session_start();
$servername = "127.0.0.2";
$username = "root";
$password = "Nitish123@";
$database = "loginpage";


// Create connection
$conn = new mysqli($servername, $username, $password, $database);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $filename = $_FILES["filename"]["name"];
  $tempfile = $_FILES["filename"]["tmp_name"];
  $folder = "image/" . $filename;
  move_uploaded_file($tempfile, $folder);
  $title = $_POST['title'];
  $description = $_POST['commt'];
  $sq = "INSERT INTO `category` (`image`,`category_name`,`category_description`) VALUE ('$folder','$title','$description') ";
  $res = mysqli_query($conn, $sq);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    body{
      background-color: black !important;

    }
    body h1,h2,h3,h4,h5,h6,p{
      color: azure !important;
    }

    .clad {
      width: 150px !important;
      margin-left:41% ;

      text-align: center;
    }

    .dite {
      /*margin-right: 60px !important;*/
      margin-left: 155px !important;
      color: black !important;
      background-color: beige;
      padding-top: 10px;
      padding-bottom: 12px;
      border: 3px solid black;
    }

    .dite .title {
      width: 100% !important;
    }

    form {
      width: 90%;
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

  <title>i-Discuss</title>
</head>

<body>
<?php 
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
  
  <h1 class="text-center fw-bolder " id="nav">I-Discuss:Disscuss About Us</h1>
  <div class="container mb-5 px-2  dite ">
    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST" enctype="multipart/form-data">
      <h4>Image</h4>
      <input type="file" class="file mt-1 mb-3" name="filename">
      <h4>Title</h4>
      <input type="text" class="form-control fw-bolder title my-4 mt-4" name="title">
      <h4>Description</h4>
      <textarea class="form-control my-4 fw-bolder" id="commt" name="commt" rows="3" minlength="15" required></textarea>
      <input type="submit" name="submit" value="upload file" class="clad btn btn-success btn-lg mb-2">

    </form>
  </div>

  <?php
  $servername = "127.0.0.2";
  $username = "root";
  $password = "Nitish123@";
  $database = "loginpage";


  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);
  $row = "SELECT * FROM `category`";
  $result = mysqli_query($conn, $row);

  while ($sql = mysqli_fetch_assoc($result)) {
    $id = $sql["category_id"];
    /*$row2="SELECT * FROM `category`";
    $result2=mysqli_query($conn,$row2);
    while($sql2=mysqli_fetch_assoc($result2)){*/
    echo '
          <div class="container content" id="well">
            <img src="' . $sql["image"] . '">
              <h3>' . $sql["category_name"] . '</h3>
              <p>' . $sql["category_description"] . '</p>
              <a href="threadlist.php?catid=' . $id . '" class="btn btn-primary">View Thread<a/>
          </div>
    
          ';
  }



  ?>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
  integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>

  // Define a JavaScript variable using PHP
  let user = "<?php echo isset($_SESSION["user"]) ? $_SESSION["user"] : ''; ?>";

  // Get the element with class "wanda"
  const brave = document.querySelector(".dite");

  // Show the element only if the username is "Manish1"
  if (user == "Nitish123") {
    brave.style.display = 'flex';
  }
  else {
    brave.style.display = 'none';
  }
</script>

<script src="java.js">

</script>





</body>

</html>