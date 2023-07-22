<!DOCTYPE html>
<html lang="en">
<head>
  <?php require("header.php"); ?>
  <link rel="stylesheet" href="css/forgot-password.css">
  <title>Forgot Password</title>
</head>
<body>
  <?php require("navbar.php"); ?>
  <main>
    <div class="container">
      <div class="check-icon"><i class="fa fa-circle-check fa-2xl" style="color: #53d5fd;"></i></div>
      <h1>Change By Email</h1>
      <?php if(isset($_POST["verify-email"])) echo "<p id='message' style='text-align:center; font-size:1.5vw; color:#f00; margin-top:-1.7em;'>Email Doesn't Exist</p>"; ?>
      <form action="" method="POST">
        <div class="email">
          <input type="text" name="email" pattern="^[a-zA-Z]+[0-9a-zA-Z]*[_\-\.]?[a-zA-Z0-9]+@(gmail|hotmail).com$" placeholder="Enter your email" required/>
          <i class="fa-solid fa-envelope fa-lg" style="color: #fff;"></i>
        </div>
        <input type="submit" name="verify-email" value="Verify Email">
      </form>
      <?php 
      
            if(isset($_POST["verify-email"]))
            {   
              require("classes/dal.php");
              require("classes/student_dal.php");
              $student_dal = new Student_DAL();

              $user_email = $_POST["email"];
              
              $result = $student_dal -> emailExist($user_email);

              if($result)
              { 
                  session_start();
                  $_SESSION["user_email"] = $user_email;
                  header("Location: otp-verification.php");
              }
            }
            
              
       ?>
    </div>
  </main>
  <?php require("footer.php"); ?>
  <script src="js/remove-message.js"></script>
</body>
</html>