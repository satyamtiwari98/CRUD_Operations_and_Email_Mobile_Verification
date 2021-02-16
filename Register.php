<?php

session_start();

if(isset($_POST['submit'])) {

    $_SESSION['email']=$_POST['email'];
    $_SESSION['mobile']=$_POST['mobile'];

}


if(isset($_POST['verify'])) {

    $emailOTP=$_POST['emailOTP'];
    $mobileOTP=$_POST['mobileOTP'];

    if($emailOTP==$_SESSION['emailOTP'] && $mobileOTP==$_SESSION['mobileOTP']) {

        header('location:RegisterMore.php');

    }else {

        echo "wrong otp please try again!!!";

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

    <title>Register Here</title>
  </head>
  <body>
    <div class="container-fluid">


    <form action="" method="POST" id="formData">

    <label for="">Email :- </label>
    <input type="email" name="email" id="" placeholder="Enter Your Email Address" required>
    <br><br>
    <label for="">Mobile Number :- </label>
    <input type="number" name="mobile" id="" placeholder="Enter Your Mobile Number" required>
    <br><br>
    <input type="submit" value="Verify" id="submit" class="btn btn-success">
    <a href="index.php">If You have registered with us.Please click here to login into your account.</a>


    </form>
    <form action="" method="post" id="otpVerify">

    <input type="text" name="emailOTP" id="emailOTP" placeholder="Enter Your OTP You Get In Your Email." required>
    <br><br>
    <input type="text" name="mobileOTP" id="mobileOTP" placeholder="Enter Your OTP You Get In Your Mobile Number" required>
    <br><br>
    <input type="submit" value="Submit" name="verify" class="btn btn-success">
    </form>



    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>

        $(document).ready(function () {

            $('#submit').click(function(event) {

                event.preventDefault();
                $('#formData').css('display','none');
                $('#otpVerify').css('display','block');

                $.ajax({
                    url : 'verify.php',
                    type : 'POST',
                    data : $('#formData').serialize(),
                    success : function(data){

                    }
                })
            })
        });
        
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


  </body>
</html>