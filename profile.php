<?php
  session_start();

  require("classes/dal.php");
  require("classes/student_dal.php");

  $student_dal = new Student_DAL();

  $student_email = $_SESSION["email"];
  $student_password = $_SESSION["pass"];
  $student_id = $_SESSION["Id"];
  
  $student_info = $student_dal -> getStudentInfo($student_email, $student_password);
  $student_image = $student_dal -> getStudentImage($student_id);
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
  <?php require("templates/user-scripts.php"); ?>
  <script src="js/otp.js" defer></script>
  <script src="js/profile.js" defer></script>
</head>
<body>
  <?php include('student-navbar.php'); ?>
  <main>
    <div class="container">
      <h1>Student Profile</h1>
      <p id="old-email" style="display: none;"><?php echo $student_email; ?></p>
      <form name="profile-info" action="" method="POST" enctype="multipart/form-data">
        <div class="form-inputs" id="img-row">
          <span class="image-container"><img id="profile-pic" <?php echo 'src="data:image/jpeg;base64,'.base64_encode($student_image["Image"]).'" width="150" height="150"/>';?></span>
          <div class="round">
            <input type="file" name="student-image" class="img-upload" accept="image/jpeg, image/png, image/jpg"/>
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
          <button type="button" class="verify-email">Verify Email</button>
        </div>
        <div class="otp-field">
            <input type="number" name="otp[]" class="otp-input" />
            <input type="number" name="otp[]" class="otp-input" disabled />
            <input type="number" name="otp[]" class="otp-input" disabled />
            <input type="number" name="otp[]" class="otp-input" disabled />
        </div>
        <div id="verified-icon"><i class="fa-solid fa-circle-check fa-2xl" style="color: #0ef;"></i></div>
        <div id="not-verified-icon"><i class="fa-solid fa-circle-xmark fa-2xl" style="color: #f00;"></i></div>
        <button type="button" id="verify-button">Verify OTP</button>
        <div class="form-inputs inputs-labels">
          <input type="submit" name="submit" id="submit-button" value="Update Changes" />
          <button class="cancel"><a href="user-page.php">Cancel</a></button>
        </div>
      </form>
      <?php
            
            if(isset($_POST["submit"]))
            {
              $fNameInput = $_POST["fname"];
              $lNameInput = $_POST["lname"];
              $emailInput = $_POST["email"];
              $passwordInput = $_POST["password"];
              
             

              $_SESSION["email"] = $emailInput;
              $_SESSION["pass"] = $passwordInput;
              $result = null;

              if(!empty($_FILES["student-image"]["name"])) 
              {        // Get file info 
                  $fileName = basename($_FILES["student-image"]["name"]); 
                  $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

                  $allowTypes = array('jpg','png','jpeg'); 
                  if(in_array($fileType, $allowTypes)) 
                  {  
                     $image = $_FILES['student-image']['tmp_name']; 
                     $imgContent = addslashes(file_get_contents($image)); 
                     $result = $student_dal -> updateStudentProfile($student_id, $emailInput, $passwordInput, $imgContent);
                      
                  }
               }
               else
               {
                 $result = $student_dal -> updateStudentEmailPassword($student_id, $emailInput, $passwordInput);
               }

               if($result)
              {
                    
                      echo "<script>window.location.href='user-page.php';</script>";
                      exit;

              }
            }
        ?>
    </div>
  </main>
  <script src="https://smtpjs.com/v3/smtp.js"></script>
</body>
</html>