
<?php
session_start();
$insert=false;
$update=false;
$delete=false;
$servername = "127.0.0.2";
$username = "root";
$password = "Nitish123@";
$database = "loginpage";


// Create connection
$conn = new mysqli($servername, $username, $password, $database);
if(isset($_GET['delete'])){
  $sno=$_GET['delete'];
  $sqd="DELETE FROM `notes` WHERE  `serialno`='$sno'";
  $res=mysqli_query($conn,$sqd);
  if($res){
    $delete=true;
    }

  if($delete){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been Deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }

}
if($_SERVER['REQUEST_METHOD'] == "POST"){
  /*$verse=($_POST['snoEdit']);*/
  if(isset($_POST['snoEdit'])){
    $sno=$_POST["snoEdit"];
    $tit=$_POST['titleEdit'];
    $descr = $_POST['descriptionEdit'];
    $sqr="UPDATE `notes` SET `name`='$tit',`description`='$descr' WHERE `serialno`='$sno'";
    $run=mysqli_query($conn,$sqr);
    if($run){
      $update=true;
    }
    if($update){
      echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your note has been Updated successfully
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>×</span>
        </button>
      </div>";
    }

  }
  else{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $username=$_POST['username'];
    $sql = "INSERT INTO `notes` (`name`, `description`,`username`) VALUES ('$title', '$description','$username')";
    $result = mysqli_query($conn, $sql);
    if($result){
        $insert=true;
    }
    if($insert){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your note has been inserted successfully
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>×</span>
        </button>
      </div>";
    }
  }

    
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <style>
        .body{
            background-color: aquamarine;
            text-align: center;
        }
        main {
            font-family: Arial, sans-serif;
            /*display: flex;*/
            justify-content: center;
            align-items: start;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .form-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            margin-top: 30px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
            
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #hen{
            text-align: center !important;
            background-color: beige;
            padding-bottom: 25px;
            margin-bottom: -1.5rem;
        }
    </style>
</head>
<body>
    <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="/login/Restaurant/notes.php" method="POST">
 
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="titleEdit">Note Title</label>
              <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="descriptionEdit">Note Description</label>
              <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
            </div> 
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class=" yeton btn btn-primary" id="yes">Save changes</button>
            <!--<button type="submit" class="yeton">Add Notes</button>-->
          </div>
        </form>
      </div>
    </div>
  </div>
    <header>
        <h1 id="hen" class="pt-3">Adding Notes to iNote</h1>
    </header>
    <main>
        <div class="form-container mt-4">
            <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="POST">
               <input type="hidden" name="username" value="<?php echo $_SESSION["user"]?>">
                <label for="title">Notes Title:</label>
                <input type="text" id="title" name="title" placeholder="Enter note title" required>
                
                <label for="description">Note Description:</label>
                <textarea id="description" name="description" rows="3" placeholder="Enter note description" required></textarea>
                
                <button type="submit">Add Notes</button>
            </form>
        </div>
        <!-- Display Notes -->

        <div class="table-container mt-4">
            <h2>Saved Notes</h2>
        </div>
            <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
</style>

    <table class="table" id="myTable">
    <thead>
        <tr>
            <th scope="col">S.No</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $username = $_SESSION["user"];
        $sql = "SELECT * FROM `notes` where `username`='$username'";
        $result=mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) > 0) {
            $sno = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td class='hello'  id='het'>" . $sno . "</td>
                    <td class='hello' id='bet'>" .$row['name'] . "</td>
                    <td class='hello'>" . $row['description'] . "</td>
                    <td> <button class='edit btn btn-sm btn-primary' id=".$row['serialno'].">Edit</button>
                    <button class='delete btn btn-sm btn-primary'id=d".$row['serialno'].">Delete</button>  </td>
                    </tr>";
                $sno++;
            }
        }
        ?>
    </tbody>
</table>

        </div>
         <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
    $('#myTable').DataTable();
    });
  </script>
  <script src="note.js"></script>

</main>
</body>
</html>
<?php
 
?>