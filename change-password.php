<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require("header.php"); ?>
  <link rel="stylesheet" href="css/change-password.css">
  <title>Change Password</title>
</head>
<body>
  <?php require("navbar.php"); ?>
  <main>
    <div class="container">
      <div class="lock-icon"><i class="fa-solid fa-unlock-keyhole fa-xl" style="color: #53d5fd;"></i></div>
      <h1>Change Your Password</h1>
      <?php if(isset($_POST["update"])) echo "<p style='text-align:center; color:#f00; margin-top: 1em;'>Error Changing Password</p>"; ?>
      <form action="" method="POST">
        <div class="input-field">
          <div class="input-box">
            <input type="text" name="email" value="<?php echo $_SESSION["user_email"]; ?>" readonly/>
            <i class="fa-solid fa-envelope fa-lg" style="color: #fff;"></i>
          </div>
          <div class="input-box">
            <input type="password" name="password" placeholder="Enter New Password"/>
            <span class="eye-icons">
              <i class="fa-solid fa-eye fa-lg" style="color: #fff;"></i>
              <i class="fa-solid fa-eye-slash fa-lg" style="color: #fff;"></i>
            </span>  
          </div>
          <input type="submit" name="update" value="change password" />
        </div>
      </form>
      <?php 

            if(isset($_POST["update"]))
            { 
              require("classes/dal.php");
              require("classes/student_dal.php");
              $student_dal = new Student_DAL();

              $email = $_SESSION["user_email"];
              $password = $_POST["password"];
              
              $result = $student_dal -> updateAccountPassword($email, $password);

              if($result)
              { 
                header("Location: login.php?PasswordChanged=1");
              }
            }
          
      ?>
    </div>
  </main>
  <?php require("footer.php"); ?>
  <script src="js/pass-visible-invisible.js"></script>
</body>
</html>