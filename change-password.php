<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/change-password.css">
  <link rel="stylesheet" href="FontAwesome/css/all.css">
</head>
<body>
  <?php require("header.php"); ?>
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
            require("DB-Connection.php");
            $conn = db_connect();

            if(isset($_POST["update"]) && $conn)
            { 
              $email = $_SESSION["user_email"];
              $password = $_POST["password"];
              
              $sql = "UPDATE Users SET Password = '{$password}' WHERE Email = '{$email}'";

              if($conn -> query($sql))
              { 
                $conn -> close();
                header("Location: login.php?PasswordChanged=1");
              }
            }
            
            $conn -> close();
      ?>
    </div>
  </main>
  <?php require("footer.php"); ?>
  <script src="js/pass-visible-invisible.js"></script>
</body>
</html>