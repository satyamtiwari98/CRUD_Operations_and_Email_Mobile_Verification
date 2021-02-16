<?php

    require_once 'connection.php';
    session_start();
    $id = $_GET['id'];

    if(isset($_POST['submit'])) {

        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $mobile = $_POST['mobile'];
        $msg = $_POST['yesORno'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $zip = $_POST['zipCode'];


        $sqlQuery = "UPDATE User set `name`='$name',`fname`='$fname',`mname`='$mname',`email`='$email',`pass`='$pass',`gender`='$gender',`dob`='$dob',`mobile`='$mobile',`msg`='$msg',`address`='$address',`city`='$city',`zip`='$zip' where `id`='$id'";

        if($connect->query($sqlQuery)==True) {

            echo "You have been registered successfully";
            header('location:display.php');

        }else {

            echo "You have entered something wrong. Please Try Again!!!";

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
    <title>Full User Registration</title>
  </head>
  <body>
  <div class="container-fluid">
  <h1>Update Your Data</h1>
  <?php
  
$sql = "SELECT * from User where `id` ='$id' ";

$result = $connect->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
  ?>
  <form action="" method="post">

    <label for="">Name :- </label>
    <input type="text" name="name" id="" placeholder="Enter Your Name" value="<?php echo $row["name"];?>" required>
    
    <br><br>
    
    <label for="">Father's Name :- </label>
    <input type="text" name="fname" placeholder="Enter Your Father's Name" value="<?php echo $row["fname"];?>" required>
    
    <br><br>
    
    <label for="">Mother's Name :- </label>
    <input type="text" name="mname" placeholder="Enter Your Mother Name" value="<?php echo $row["mname"];?>" required>
    
    <br><br>
    
    <label for="">Email :- </label>
    <input type="text" name="email" value="<?php echo $row["email"];?>">
    
    <br><br>
    
    <label for="">Password :- </label>
    <input type="password" name="pass" placeholder="Enter Your Password" value="<?php echo $row["pass"]; ?>">
    
    <br><br>
    
    <label for="">Gender :- </label>
    <input type="radio" name="gender" value="male">Male</input>
    <input type="radio" name="gender" value="female">Female</input>
    <input type="radio" name="gender" value="others">Others</input>
    
    <br><br>
    
    <label for="">Date Of Birth :- </label>
    <input type="date" name="dob" value="<?php echo $row["dob"];?>">
    
    <br><br>
    
    <label for="">Mobile Number :- </label>
    <input type="number" name="mobile" value="<?php echo $row["mobile"];?>">
    
    <br><br>
    
    <label for="">Do you want to recieve text on this number or not???</label>
    <input type="radio" name="yesORno" value="yes">Yes</input>
    <input type="radio" name="yesORno" value="no">No</input>
    
    <br><br>
    
    <label for="">Address :- </label>
    <input type="text" name="address" placeholder="Enter Your Address" value="<?php echo $row["address"];?>">
    
    <br><br>
    
    <label for="">City :- </label>
    <input type="text" name="city" placeholder="Enter your city" value="<?php echo $row["city"];?>">
    
    <br><br>
    
    <label for="">Zip Code</label>
    <input type="number" name="zipCode" placeholder="Enter Your Zip Code" value="<?php echo $row["zip"];?>">
    
    <br><br>
    
    <input type="submit" value="update" name="submit" class="btn btn-success">
    

  </form>

  <?php

    }

}

?>

  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>