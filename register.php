<?php
$servername = "127.0.0.2";
$username = "root";
$password = "Nitish123@";
$database = "loginpage";
$showAlert=false;
$showerror=false;

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST["username"];
    $email = $_POST["email"];
    $cpassword = $_POST["cpassword"];
    $password = $_POST["password"];
    $sql="SELECT * FROM `login` where `Name`='$name'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0){
        $showerror=true;
        $show="Name is already Taken";
    }
    else{
        // Use prepared statements to prevent SQL injection
        if($password==$cpassword){
            $hash=password_hash($password,PASSWORD_DEFAULT);
            $stmt="INSERT INTO `login` (`Name`, `email`, `password`) VALUES ('$name', '$email', '$hash')";
            $result=mysqli_query($conn,$stmt);
            $showAlert=true;
    
        }
        else{
    
            $showerror=true;
            $show="Your password and Comfirm password is not same";
        }

    }

    
    
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="stylet.css">
    <link rel="stylesheet" href="media.css">
    <style>

        .balling {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color:rgba(242, 243, 216, 0.7) !important;
        }
        .login-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 380px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .login-container span{
            font-size: 15px;
        }
        .login-container input {
            width: 85%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #0056b3;
        }
        .signup-link {
            display: block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
        .signup-link:hover {
            text-decoration: underline;
        }
        /*.hack{
            justify-content: start;
            align-items: center;
        }*/

    </style>
</head>

<body>
    <header>
    <?php
        if($showAlert){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Success!</strong> You are login Successfully
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>×</span>
                </button>
              </div>";
        }
        if($showerror){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Error!</strong> $show
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>×</span>
                </button>
              </div>";
        
        }
        
    ?>

    </header>

    <main >
        <div  class="balling">
            <div class="login-container">
                <h2 class="fw-bolder">SIGN UP</h2>
                <div class="hack text-start mx-3" >
                <form action="/Restaurant/register.php" method="POST">
                    Name<br>
                    <input type="text" name="username" placeholder="Username" required><br>
                    Email<br>
                    <input type="email" name="email" placeholder="email" required>
                    <br>
                    <span>Password</span>
                    <input type="password" name="password" placeholder="Password" required>
                    <br>
                    <span>Comfirm Password</span>
                    <input type="password" name="cpassword" placeholder="Password" required>
                    <button type="submit" class="btn btn-success">Sign In</button>
                </form>
                <div class="my-3">
                Have an account?<a href="index.php" class="signup-link d-inline mx-1">login</a>
                </div>
                    
                </div>
            </div>
        </div>
    </main>
</body>
</html>
