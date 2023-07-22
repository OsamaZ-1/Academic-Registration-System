<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require("header.php"); ?>
  <title>OTP Verification</title>
  <link rel="stylesheet" href="css/otp.css"> 
  <script src="js/otp.js" defer></script>
</head>
<body>
    <?php require("navbar.php"); ?>
    <main>
      <div class="div container">
        <div class="check-icon"><i class="fa fa-circle-check fa-2xl" style="color: #53d5fd;"></i></div>
        <?php require("templates/send_otp.php"); ?>
        <h1>OTP Verification</h1>
        <form action="" method="POST">
          <div class="input-field">
            <input type="number" name="otp[]" class="otp-input" />
            <input type="number" name="otp[]" class="otp-input" disabled />
            <input type="number" name="otp[]" class="otp-input" disabled />
            <input type="number" name="otp[]" class="otp-input" disabled />
          </div>
          <input type="submit" name="verify-otp" value="Verify OTP" id="verify-button" disabled/> 
        </form>
        <?php 
              if(isset($_POST["verify-otp"]))
              {
                $otp_inputs = $_POST["otp"];
                $otp = "";
                foreach($otp_inputs as $digit)
                  $otp .=$digit;
                
                if($otp == $_SESSION["otp"])
                  header("Location: change-password.php");
                else
                  echo "<p id='notification' style='text-align:center; font-size:1.5vw; color:#f00; margin-top: 1em;'>Wrong OTP!!!</p>";
              }       
        ?>
        <p class="failed">Didn't recieve a code? <span><a href="otp-verification.php">Resend Code</a></span></p>
      </div>
    </main>
    <?php require("footer.php"); ?>
  </body>
</html>
