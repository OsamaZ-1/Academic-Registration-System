<?php
  session_start();

  require("classes/dal.php");
  require("classes/student_dal.php");

  $student_dal = new Student_DAL();

  $student_email = $_SESSION["email"];
  $student_password = $_SESSION["pass"];
  $student_id = $_SESSION["Id"];
  
  $student_info = $student_dal -> getStudentInfo($student_email, $student_password);
  $student_name = $student_info[0]["Fname"];
  $student_lname = $student_info[0]["Lname"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Profile</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/profile.css">
  <link rel="stylesheet" href="FontAwesome/css/all.css">
</head>
<body>
  <?php include('student-navbar.php'); ?>
  <main>
    <div class="container">
      <h1>Student Profile</h1>
      <form name="profile-info" action="" method="POST">
        <div class="form-inputs" id="img-row">
          <img id="profile-pic" src="images/profile-pic.jpeg" width="150" height="150"/>
          <div class="round">
            <input type="file" name="student-image" class="img-upload"/>
            <i class="fa-solid fa-camera fa-xl" style="color:rgb(236, 44, 44);"></i>
          </div>
        </div>
        <div class="form-inputs inputs-labels">
          <input type="text" name="fname" id="s-name" value="<?php echo $student_name; ?>" readonly />
          <label for="s-name">First Name</label>
          <input type="text" name="lname" id="s-lname" value="<?php echo $student_lname; ?>" readonly />
          <label for="s-lname">Last Name</label>
        </div>
        <div class="form-inputs inputs-labels">
          <input type="text" name="email" id="email" value="<?php echo $student_email; ?>" />
          <label for="email">Email</label>
          <input type="text" name="password" id="password" value="<?php echo $student_password; ?>" />
          <label for="password">Password</label>
        </div>
        <div class="form-inputs">
          <input type="submit" name="submit" value="Update Changes" />
        </div>
      </form>
    </div>
  </main>
</body>
</html>