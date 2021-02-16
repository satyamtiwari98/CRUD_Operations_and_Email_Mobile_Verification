
<?php

require_once 'connection.php';

session_start();

use PHPMailer\PHPMailer\PHPMailer;

$email = $_POST['email'];

$number = $_POST['mobile'];



$_SESSION['email']=$email;
$_SESSION['mobile']=$number;


require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "enterYourEmailAddress";
$mail->Password = "enterYourPassword";
$mail->Port = 465;
$mail->SMTPSecure = "ssl";
$emailOtpForVerification = rand(1001,9999);

$mail->isHTML(true);
$mail->setFrom($email);
$mail->addAddress($email);
$mail->Subject = ("$email");
$mail->Body = 'Your OTP for Verification is: '.$emailOtpForVerification;




if($mail->send()) {

   $_SESSION['emailOTP']=$emailOtpForVerification;

} else {

    echo "<h1>Error 404 </h1>";

}


//  this is the end 



$mobileOtpForVerification = rand(1001,9999);

$fields = array(
    "sender_id" => "SMSINI",
    "message" => "2",
    "variables_values" => "Your OTP is $mobileOtpForVerification",
    "route" => "s",
    "numbers" => "$number",
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: 3WXsIyhJckal4TD6tuoSObfEAPV0GBM8Hq7niRNUjr2epQKCzwjTYQIeSmnvoRF9wzqL4DipkB6sAaxM",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

    $_SESSION['mobileOTP']=$mobileOtpForVerification;   
}

?>
