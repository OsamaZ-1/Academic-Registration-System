<?php
  session_start();

  require("classes/dal.php");
  require("classes/courses_dal.php");
  require("classes/student_dal.php");
  $student_dal = new Student_DAL();

  $student_email = $_SESSION["email"];
  $student_password = $_SESSION["pass"];
  $student_id = $_SESSION["Id"];
  
  $student_info = $student_dal -> getStudentInfo($student_id);
  $student_name = $student_info[0]["Fname"];
  $student_image = $student_dal -> getStudentImage($student_id);
  $year = $student_dal -> getStudentYear($student_id);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grades Page</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/user-page.css">
  <link rel="stylesheet" href="FontAwesome/css/all.css">
</head>
<body>
  <?php include('student-navbar.php'); ?>
  <main>
    <h1 class="page-title">Student Grades</h1>
    <div class="container">
      <form id="grades-form" name="form1" action="" method="POST">
        <select class="academic-year" name="year-grades" onchange="form1.submit()">
          <option>Select Academic Year</option>
          <?php 
              
          
              for($i=1; $i<=$year; $i++)
              { 
                echo "<option value='$i'"; 
                if(isset($_POST["year-grades"]) && $_POST["year-grades"] == $i ) 
                  echo 'selected'; 
                echo " >Year $i</option>";
              }
          ?>
        </select>
      </form>
      <div class="grades-section">
            <?php if(isset($_POST["year-grades"]) && $_POST["year-grades"]!= "Select Academic Year") { $year_grades = $_POST["year-grades"];?>
            <div class="colors">
                <div class="passed status">
                  <p>Passed</p>
                </div>
                <div class="compensation status">
                  <p>Compensation</p>
                </div>
                <div class="failed status">
                  <p>Failed</p>
                </div>
            </div>
            <div class="grades-tables">
                <div>
                    <table id="firstYear2" class="courses-table table-toggle">
                      <?php
                        $temp_course_sem = 1;
                        require("templates/fill_grades_tables.php");
                      ?>
                    </table>
                    <div class="average">
                    <?php $average = $student_dal -> getAverage($student_id, $year_grades, 1); 
                          echo "Average: ".round($average,2); 
                          if($average>=55) echo "<br/><span style='color: green;'>Courses with Grades marked as Compensation are Passed</span>";
                          else echo "<br/><span style='color:red;'>Courses with Grades marked as Compensation are Failed</span>"; ?>
                    </div>
                </div>
                <div>
                    <table id="firstYear2" class="courses-table table-toggle">
                      <?php
                        $temp_course_sem = 2;
                        require("templates/fill_grades_tables.php");
                      ?>
                    </table>
                    <div class="average">
                    <?php $average = $student_dal -> getAverage($student_id, $year_grades, 2); 
                          echo "Average: ".round($average,2);
                          if($average>=55) echo "<br/><span style='color: green;'>Courses with Grades marked as Compensation are Passed</span>";
                          else echo "<br/><span style='color: red;'>Courses with Grades marked as Compensation are Failed</span>"; ?>
                    </div>
                </div>
            </div>
            <?php } ?>
      </div>
    </div>
  </main>
</body>
</html>