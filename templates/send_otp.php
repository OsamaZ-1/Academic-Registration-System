<?php 
   
   //Import PHPMailer classes into the global namespace
   //These must be at the top of your script, not inside a function
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;

   //Load Composer's autoloader
   require ('vendor/autoload.php'); 
   
   if(!isset($_POST["verify-otp"])) //if we submit otp and it is wrong don't regenerate another one
  {
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //Generate a 4 digit OTP
    $_SESSION["otp"] = strval(rand(1000,9999));
              
    try {
          //Server settings
                        
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = 'lufcfs.noreply@gmail.com';                     //SMTP username
          $mail->Password   = 'kzwukeiooqlxlues';                               //SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
          $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

          //Recipients
          $mail->setFrom('lufcfs.noreply@gmail.com', 'LUFCFS');
          $mail->addAddress($_SESSION["user_email"]);     //Add a recipient

          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = 'OTP Verification Code';
          $mail->Body    = "Use this code to verify your email <b>{$_SESSION['otp']}</b>";

          $mail->send();
          echo "<p id='notification' style='text-align:center; font-size:1.5vw; color:#0ef; margin-top: 0.7em;'>We have sent you and OTP</p>";
        } catch (Exception $e) {
            echo "<p id='notification' style='text-align:center; font-size:1.5vw; color:#f00; margin-top: 0.7em;'>We couldn't send an OTP. Try Again!</p>";
        }
   }
?>