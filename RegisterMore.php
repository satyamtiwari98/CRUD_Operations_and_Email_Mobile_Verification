<?php

    require_once 'connection.php';
    session_start();

    $target_dir = "Uploads/";
    

    if(isset($_POST["submit"])) {
      $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      $check = getimagesize($_FILES["file"]["tmp_name"]);
    
      if($check !== false) {
    
        // echo "File is an image - " . $check["mime"] . ".";
    
        $uploadOk = 1;
    
      } else {
    
        echo "File is not an image.";
        $uploadOk = 0;
    
      }
    
    
    // Check if file already exists

if (file_exists($target_file)) {

  echo "Sorry, file already exists.";
  $uploadOk = 0;

}

// Check file size

if ($_FILES["file"]["size"] > 500000) {

  echo "Sorry, your file is too large.";
  $uploadOk = 0;

}

// Allow certain file formats

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {

  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;

}

// Check if $uploadOk is set to 0 by an error

if ($uploadOk == 0) {

  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file

} else {

  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

    $fileName = htmlspecialchars( basename( $_FILES["file"]["name"]));
    // echo "<br><br>".$fileName;

  } else {

    echo "Sorry, there was an error uploading your file.";

  }
  
}
}


    if(isset($_POST['submit'])) {

        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $email = $_SESSION['email'];
        $pass = $_POST['pass'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $mobile = $_SESSION['mobile'];
        $msg = $_POST['yesORno'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $zip = $_POST['zipCode'];

        


        $sqlQuery = "INSERT into User (`name`,`fname`,`mname`,`email`,`pass`,`gender`,`dob`,`mobile`,`msg`,`address`,`city`,`zip`,`img`) VALUES ('$name','$fname','$mname','$email','$pass','$gender','$dob','$mobile','$msg','$address','$city','$zip','Uploads/$fileName')";

        if($connect->query($sqlQuery)==True) {

            echo "You have been registered successfully";
            header('location:index.php');

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

  <h1>Registration Form</h1>

  <form action="" method="post" enctype="multipart/form-data">

    <label for="">Name :- </label>
    <input type="text" name="name" id="" placeholder="Enter Your Name" required>

    <br><br>

    <label for="">Father's Name :- </label>
    <input type="text" name="fname" placeholder="Enter Your Father's Name" required>

    <br><br>

    <label for="">Mother's Name :- </label>
    <input type="text" name="mname" placeholder="Enter Your Mother Name" required>
    
    <br><br>
    
    <label for="">Email :- </label>
    <input type="text" name="email" value="<?php echo $_SESSION['email'];?>" disabled>
    
    <br><br>
    
    <label for="">Password :- </label>
    <input type="password" name="pass" placeholder="Enter Your Password">
    
    <br><br>
    
    <label for="">Gender :- </label>
    <input type="radio" name="gender" value="male">Male</input>
    <input type="radio" name="gender" value="female">Female</input>
    <input type="radio" name="gender" value="others">Others</input>
    
    <br><br>
    
    <label for="">Date Of Birth :- </label>
    <input type="date" name="dob" >
    
    <br><br>
    
    <label for="">Mobile Number :- </label>
    <input type="number" name="mobile" value="<?php echo $_SESSION['mobile'];?>" disabled>
    
    <br><br>
    
    <label for="">Do you want to recieve text on this number or not???</label>
    <input type="radio" name="yesORno" value="yes">Yes</input>
    <input type="radio" name="yesORno" value="no">No</input>
    
    <br><br>
    
    <label for="">Address :- </label>
    <input type="text" name="address" placeholder="Enter Your Address">
    
    <br><br>
    
    <label for="">City :- </label>
    <input type="text" name="city" placeholder="Enter your city">
    
    <br><br>
    
    <label for="">Zip Code</label>
    <input type="number" name="zipCode" placeholder="Enter Your Zip Code">
    
    <br><br>
    
    
    <label for="">File To Upload</label>
    <input type="file" name="file">
    
    <br><br>
    
    <input type="submit" value="Register" name="submit" class="btn btn-success">
    
  </form>

  </div>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    
    
  </body>
</html>