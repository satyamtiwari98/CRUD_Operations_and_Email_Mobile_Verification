<?php

    require_once 'connection.php';

    if(isset($_POST['submit'])) {

        session_start();

        $email = $_POST['email'];
        $pass = $_POST['password'];


        $sqlQuery = "SELECT * from User where `email`='$email' AND `pass`='$pass'";
        
        $result = $connect->query($sqlQuery);
        

        if($result->num_rows > 0) {

            $_SESSION['email']=$email;
            $_SESSION['password']=$pass;

            header('location:display.php');

        } else {

            echo "Email and password enetered by are wrong please recheck it and try again !!!!";

            session_destroy();
            $connect->close();

        }

    }

?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Cedcoss</title>
  </head>
  <body>
    <div class="container-fluid">

    <h1>Welcome To Cedcoss</h1>
    
    <form action="" method="post">
    
    <label for="">Email :-</label>
    <input type="email" name="email" placeholder="Enter your email address" required>
    
    <br>
    <br>
    
    <label for="">Password :- </label>
    <input type="password" name="password" placeholder="Enter your password" required>
    
    <br>
    <br>
    
    <input type="submit" class="btn btn-success" name="submit" value="LogIn">
    
    <a href="Register.php">Register Here</a>
    
    </form>
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    
  </body>
</html>
