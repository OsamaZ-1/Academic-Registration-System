<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/forgot-password.css">
  <link rel="stylesheet" href="FontAwesome/css/all.css">
</head>
<body>
  <?php require("header.php"); ?>
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
            require("DB-Connection.php");
            $conn = db_connect();

            if(isset($_POST["verify-email"]) && $conn)
            { 
              $user_email = $_POST["email"];
              $conn = db_connect();
              
              $sql = "SELECT Id FROM Users WHERE Email = '{$user_email}'";
              $result = $conn -> query($sql);

              if($result -> num_rows > 0)
              { 
                  session_start();
                  $_SESSION["user_email"] = $user_email;
                  $conn -> close();
                  header("Location: otp-verification.php");
              }
            }
            
            $conn -> close();     
       ?>
    </div>
  </main>
  <?php require("footer.php"); ?>
  <script src="js/remove-message.js"></script>
</body>
</html>