<?php
  require("classes/dal.php");
  require("classes/courses_dal.php");
  $courses_dal = new Course_DAL();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Page</title>
</head>
<body>
  <div>
    <input type='text' id='credit-counter' value='0' disabled/>
  </div>
  <div>
    <span><h3>Second Year Courses</h2> <input type='button' value='^' onclick="toggleDiv(2)"/></span>
    <div id="table-div-2" style="display: flex; justify-content: space-around;">
      <div>
        <p>1st Semester: </p>
        <table id="secondYear1" border="1" cellspacing="10">
          <?php
            $temp_course_year = 1;
            $temp_course_sem = 1;
            require("templates/fill_course_tables.php");
          ?>
        </table>
      </div>
      <div>
        <p>2nd Semester</p>
        <table id="secondYear2" border="1" cellspacing="10">
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
  <span><h3>Third Year Courses</h2> <input type='button' value='^' onclick="toggleDiv(3)" /></span>
    <div id="table-div-3" style="display: flex; justify-content: space-around;">
      <div>
        <p>1st Semester: </p>
        <table id="thirdYear1" border="1" cellspacing="10">
          <?php
            $temp_course_year = 3;
            $temp_course_sem = 1;
            require("templates/fill_course_tables.php");
          ?>
        </table>
      </div>
      <div>
        <p>2nd Semester</p>
        <table id="thirdYear2" border="1" cellspacing="10">
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
  <span><h3>Fourth Year Courses</h2> <input type='button' value='^' onclick="toggleDiv(4)" /></span>
    <div id="table-div-4" style="display: flex; justify-content: space-around;">
      <div>
        <p>1st Semester: </p>
        <table id="fourthYear1" border="1" cellspacing="10">
          <?php
            $temp_course_year = 4;
            $temp_course_sem = 1;
            require("templates/fill_course_tables.php");
          ?>
        </table>
      </div>
      <div>
        <p>2nd Semester</p>
        <table id="fourthYear2" border="1" cellspacing="10">
          <?php
            $temp_course_year = 4;
            $temp_course_sem = 2;
            require("templates/fill_course_tables.php");
          ?>
        </table>
      </div>
    </div>
  </div>
</body>
<script src="js/userPageScript.js"></script>
</html>