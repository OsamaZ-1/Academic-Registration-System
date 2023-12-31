<!DOCTYPE html>
<html lang="en">
<head>
  <?php require("header.php"); ?>
  <link rel="stylesheet" href="css/login-signup-page.css">
  <title>SignUp Page</title>
</head>
<body>
  <?php require("navbar.php"); ?>
  <main>
    <div class="outer-container signup-outer-container" >
      <div class="login-container signup-container">
        <form action="" method="POST" id="signup_form">
          <h1>SignUp</h1>
          <div class="input-box">
            <input type="text" name="student-id" required/>
            <span>Student Id</span>
            <i class="fa-solid fa-id-card fa-lg" style="color: #fff;"></i>
          </div>
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
      </div>
    </div>
  </main>
  <?php require("footer.php"); 
        require("templates/user-scripts.php"); ?>
  <script src="js/pass-visible-invisible.js"></script>
  <script src="js/user-signup.js"></script>
</body>
</html>