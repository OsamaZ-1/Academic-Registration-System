<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignUp Page</title>
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
      <div class="login-container signup-container">
        <form action="" method="POST">
          <h1>SignUp</h1>
          <?php if(isset($_POST["signup"])) echo "<p style='text-align:center; color:#f00; margin-top:-1.7em;'>Account Already exists</p>"; ?>
          <div class="input-box">
            <input type="text" name="fname" required/>
            <span>First Name</span>
            <i class="fa-solid fa-user fa-lg" style="color: #fff;"></i>
          </div>
          <div class="input-box">
            <input type="text" name="lname" required/>
            <span>Last Name</span>
            <i class="fa-solid fa-user fa-lg" style="color: #fff;"></i>
          </div>
          <div class="input-box">
            <input type="text" name="email" pattern="^[a-zA-Z]+[0-9a-zA-Z]*[_\-\.]?[a-zA-Z0-9]+@(gmail|hotmail).com$" required/>
            <span>Email</span>
            <i class="fa-solid fa-envelope fa-lg" style="color: #fff;"></i>
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
            <a href="login.php">Login</a>
          </div>
          <div class="button-shadow">
            <input type="submit" class="submit-button" name="signup" value="SignUp" />
            <div class="after"></div>
          </div>
        </form>
        <?php
            
            require("DB-Connection.php");
            $conn = db_connect();

            if(isset($_POST["signup"]) && $conn)
            {
              $user_fname = ucfirst($_POST["fname"]);
              $user_lname = ucfirst($_POST["lname"]);
              $user_email = $_POST["email"];
              $user_password = $_POST["password"];
 
              $email_exist = "SELECT ID FROM Users WHERE Email = '{$user_email}'";
              $result = $conn -> query($email_exist);

              if(!($result -> num_rows>0))
              { 
                  $sql = "INSERT INTO Users (Fname, Lname, Email, Password, Admin) VALUES('$user_fname', '$user_lname', '$user_email', '$user_password', 0)";
                  if($result = $conn -> query($sql))
                  { 
                    $conn -> close();
                    header("Location: login.php?Registered=1");
                  } 
              }
                
            }

            $conn -> close();   
         ?>
      </div>
    </div>
  </main>
  <?php require("footer.php"); ?>
  <script src="js/pass-visible-invisible.js"></script>
</body>
</html>