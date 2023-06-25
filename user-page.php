<?php
  session_start();

  require("classes/dal.php");
  require("classes/courses_dal.php");
  require("classes/student_dal.php");
  
  $courses_dal = new Course_DAL();
  $student_dal = new Student_DAL();

  $student_email = $_SESSION["email"];
  $student_password = $_SESSION["pass"];
  $student_id = $_SESSION["Id"];
  
  $student_info = $student_dal -> getStudentInfo($student_email, $student_password);
  $student_name = $student_info[0]["Fname"];
  $student_year = $student_info[0]["Year"];
  $student_major = $student_info[0]["Major"];
  $student_image = $student_dal -> getStudentImage($student_id);
  $student_grades = $student_dal->getGradesAssocArray($student_id);

  $passedWithAvg = $student_dal->passedWithAverage($student_id); 
  
  $studentRegisteredInCourses = $student_dal -> studentRegisteredInCourses($student_id);
  

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
  <?php include('student-navbar.php');?>
 <main>
  <h1 class="page-title">Courses Registration</h1>
  <div class="container">
    <form action="" method="POST">
      <div>
        <input type='text' id='credit-counter' value='0' disabled/>
      </div>
      <!--First Year Section -->
      <div>
        <div class="year-title"><h3>First Year Courses</h2><button type="button" class="arrow-buttons" onclick="toggleDiv(1)"><i class="fa-solid fa-angle-up fa-xl"></i></button></div>
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
            <p>2nd Semester: </p>
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
      <!--Second Year Section -->
      <div>
        <div class="year-title"><h3>Second Year Courses</h2> <button type="button" class="arrow-buttons" onclick="toggleDiv(2)"><i class="fa-solid fa-angle-up fa-xl"></i></button></div>
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
            <p>2nd Semester:</p>
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
      <!--Third Year Section -->
      <div>
        <div class="year-title"><h3>Third Year Courses</h2> <button type="button" class="arrow-buttons" onclick="toggleDiv(3)"><i class="fa-solid fa-angle-up fa-xl"></i></button></div>
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
            <p>2nd Semester:</p>
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
     <!--Fourth Year Section -->
     <div>
      <div class="year-title"><h3>Fourth Year Courses</h2> <button type="button" class="arrow-buttons" onclick="toggleDiv(4)"><i class="fa-solid fa-angle-up fa-xl"></i></button></div>
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
          <p>2nd Semester:</p>
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
    <div class="register-courses">
      <textarea name="msg" class="message" cols="30" rows="10" placeholder="Enter Message Here!"></textarea>
      <input type="submit" name="submit" value="Register Courses" <?php if(($studentRegisteredInCourses) && ($studentRegisteredInCourses[0]["Status"] == 0 || $studentRegisteredInCourses[0]["Status"] == 1)) echo 'disabled' ; ?>/>
    </div>
   </form> 
   <?php
         if(isset($_POST["submit"]))
         {  
            //get all the ids of primary courses selected by student
            $temp1 = $_POST['select-box'];
            $primaryCourses = '';
            foreach($temp1 as $key => $value)
            { 
              $courseCode = $courses_dal -> getCodeFromId($value);
              $primaryCourses = $primaryCourses.'-'.$courseCode;
            }

            //get all the ids of optional courses selected by student
            $temp2 = array();
            for($i=1; $i<=6; $i++)
              array_push($temp2, $_POST['optional-box-'.$i]);

            $optionalCourses = '';
            foreach($temp2 as $optional)
              foreach($optional as $key => $value)
                { 
                  $courseCode = $courses_dal -> getCodeFromId($value);
                  $optionalCourses = $optionalCourses.'-'.$courseCode;
                }
            
            //format the string to cut the - from beginning
            $choosenCourses = substr($primaryCourses.$optionalCourses, 1, strlen($primaryCourses.$optionalCourses));
            
            $studentMessage = $_POST['msg'];
            
            $result = null;
            //check if student has chosen some courses otherwise registration can't be completed
            if($choosenCourses)
             $result = $student_dal -> registerCourses($student_id, $choosenCourses, $studentMessage);            
            
            if($result) echo '<span style="text-align: center; color: #16FF00;">Successfully Registered Courses</span>';
            else echo '<span style="text-align: center; color: #D21312;">Failed Registering Courses</span>';
              
         }
   ?>
  </div>
  <input type="hidden" id="max-allowed-credits" value="<?php if ($student_year <= 2) echo 60; else echo 72;?>" />
 </main>
</body>
<script src="js/userPageScript.js"></script>
</html>