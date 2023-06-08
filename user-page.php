<?php
  session_start();

  require("classes/dal.php");
  require("classes/courses_dal.php");
  require("classes/student_dal.php");

  $courses_dal = new Course_DAL();
  $student_dal = new Student_DAL();

  $student_email = $_SESSION["email"];
  $student_password = $_SESSION["pass"];

  $student_major = $student_dal -> getStudentMajor($student_email, $student_password);
  
  $student_info = $student_dal -> getStudentInfo($student_email, $student_password);
  $student_name = $student_info[0]["Fname"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Page</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/user-page.css">
  <link rel="stylesheet" href="FontAwesome/css/all.css">
  <style>
    .table-toggle {
      display: none;
      justify-content: space-around;
    }
  </style>
</head>
<body>
 <header>
  <nav class="navbar">
    <div class="logo-title">
      <figure class="logo">
        <img src="images/LU-logo.png" width="500" height="500" alt="LU-logo">
      </figure>
      <h1><a href="user-page.php">LU-STDRG<a></h1>
      </div>
      <div class="links">
        <ul>
          <li><a href="user-page.php">Home</a></li>
          <li><a href="user-page.php">Grades</a></li>
        </ul>
        <div class="profile">
          <span id="student-name"><?php echo $student_name; ?></span>
          <button id="profile-picture"><img src="images/profile-pic.jpeg" width="50" height="50" alt="Profile Pic" /></button>
        </div>
      </div>
   </nav>
 </header>
 <main>
  <h1 class="page-title">Courses Registration</h1>
  <div class="container">
  <div>
    <input type='text' id='credit-counter' value='0' disabled/>
  </div>
  <div>
    <div class="year-title"><h3>First Year Courses</h2><button class="arrow-buttons" onclick="toggleDiv(1)"><i class="fa-solid fa-angle-up fa-xl"></i></button></div>
    <div id="table-div-1" class="table-toggle">
      <div>
        <p>1st Semester: </p>
        <table id="firstYear1" class="courses-table">
          <?php
            $temp_course_year = 1;
            $temp_course_sem = 1;
            require("templates/fill_course_tables.php");
          ?>
        </table>
      </div>
      <div>
        <p>2nd Semester</p>
        <table id="firstYear2" class="courses-table">
          <?php
            $temp_course_year = 1;
            $temp_course_sem = 2;
            require("templates/fill_course_tables.php");
          ?>
        </table>
      </div>
    </div>
  </div>
  
  <div>
    <div class="year-title"><h3>Second Year Courses</h2> <button class="arrow-buttons" onclick="toggleDiv(2)"><i class="fa-solid fa-angle-up fa-xl"></i></button></div>
    <div id="table-div-2" class="table-toggle">
      <div>
        <p>1st Semester: </p>
        <table id="secondYear1" class="courses-table">
          <?php
            $temp_course_year = 2;
            $temp_course_sem = 1;
            require("templates/fill_course_tables.php");
          ?>
        </table>
      </div>
      <div>
        <p>2nd Semester</p>
        <table id="secondYear2" class="courses-table">
          <?php
            $temp_course_year = 2;
            $temp_course_sem = 2;
            require("templates/fill_course_tables.php");
          ?>
        </table>
      </div>
    </div>
  </div>
  <div>
  <div class="year-title"><h3>Third Year Courses</h2> <button class="arrow-buttons" onclick="toggleDiv(3)"><i class="fa-solid fa-angle-up fa-xl"></i></button></div>
    <div id="table-div-3" class="table-toggle">
      <div>
        <p>1st Semester: </p>
        <table id="thirdYear1" class="courses-table">
          <?php
            $temp_course_year = 3;
            $temp_course_sem = 1;
            require("templates/fill_course_tables.php");
          ?>
        </table>
      </div>
      <div>
        <p>2nd Semester</p>
        <table id="thirdYear2" class="courses-table">
          <?php
            $temp_course_year = 3;
            $temp_course_sem = 2;
            require("templates/fill_course_tables.php");
          ?>
        </table>
      </div>
    </div>
  </div>
  <div>
  <div class="year-title"><h3>Fourth Year Courses</h2> <button class="arrow-buttons" onclick="toggleDiv(4)"><i class="fa-solid fa-angle-up fa-xl"></i></button></div>
    <div id="table-div-4" class="table-toggle">
      <div>
        <p>1st Semester: </p>
        <table id="fourthYear1" class="courses-table">
          <?php
            $temp_course_year = 4;
            $temp_course_sem = 1;
            require("templates/fill_course_tables.php");
          ?>
        </table>
      </div>
      <div>
        <p>2nd Semester</p>
        <table id="fourthYear2" class="courses-table">
          <?php
            $temp_course_year = 4;
            $temp_course_sem = 2;
            require("templates/fill_course_tables.php");
          ?>
        </table>
      </div>
    </div>
  </div>
  </div>
 </main>
 <script src="js/userPageScript.js"></script>
</body>
</html>