<?php session_destroy(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/footer.css"> 
  <link rel="stylesheet" href="css/login-signup-page.css">
  <link rel="stylesheet" href="FontAwesome/css/all.css">
</head>
<body>
  <?php require("header.php"); ?>
  <main>
    <div class="outer-container">
      <div class="login-container">
        <form action="" method="POST">
          <h1>Login</h1>
          <?php if(isset($_POST["login"])) echo "<p id='message' style='text-align:center; color:#f00; margin-top:-1.5em;'>Wrong Email or Password!</p>";
                else if($_GET["Registered"]==1) echo "<p id='message' style='text-align:center; color:#0ef; margin-top:-1.5em;'>Registered, Wait for Acceptance</p>"; 
                else if($_GET["PasswordChanged"]==1) echo "<p id='message' style='text-align:center; color:#0ef; margin-top:-1.5em;'>Password Changed Successfully</p>";
          ?>
          <div class="input-box">
            <input type="text" name="email" required/>
            <span>Email</span>
            <i class="fa-solid fa-user fa-lg" style="color: #fff;"></i>
          </div>
          <div class="input-box">
            <input type="password" name="password" required/>
            <span>Password</span>
            <span class="eye-icons">
              <i class="fa-solid fa-eye fa-lg" style="color: #fff;"></i>
              <i class="fa-solid fa-eye-slash fa-lg" style="color: #fff;"></i>
            </span>
          </div>
          <div class="link">
            <a href="forgot-password.php">Forgot Password</a>
            <a href="signup.php">SignUp</a>
          </div>
          <div class="button-shadow">
            <input type="submit" class="submit-button" name="login" value="Login" />
            <div class="after"></div>
          </div>
        </form>
        <?php 

            require("DB-Connection.php");
            $conn = db_connect();

            if(isset($_POST["login"]) && $conn)
            {
          
              $user_email = $_POST["email"];
              $user_password = $_POST["password"];
              
              //Check if the user requesting to Login is an Admin
              $sql1 = "SELECT Admin FROM Users WHERE Email = '{$user_email}' AND Password = '{$user_password}'";
              $result1 = $conn -> query($sql1);

              //Check if the user requesting to Login is a Student
              $sql2 = "SELECT Id FROM Students WHERE Email = '{$user_email}' AND Password = '{$user_password}'";
              $result2 = $conn -> query($sql2);

                if($result1 -> num_rows>0)
                { 
                  $row = $result1 -> fetch_assoc();
                  if($row["Admin"] == 1)
                  { 
                    $conn -> close();
                    header("Location: admin-page.html");
                  }
           
                }
                else if($result2 -> num_rows >0)
                {
                  $conn -> close();
                  header("Location: user-page.html");
                }
            }
            else if(!$conn)
            { 
              $conn -> close();
              die("Connection failed " . mysqli_connect_error());
            } 
          ?>
      </div>
    </div>
  </main>
  <?php require("footer.php"); ?>
  <script src="js/pass-visible-invisible.js"></script>
  <script src="js/remove-message.js"></script>
</body>
</html>