<!DOCTYPE html>
<html lang="en">

<head>
    <!--header start-->
    <?php
      require("templates/admin-header.php");
    ?>
    <!--header end-->
</head>

<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>
<body>
    <?php
      session_start();
      require("classes/dal.php");
      require("classes/user_dal.php");
      require("classes/student_dal.php");
      require("classes/courses_dal.php");
      require("templates/login_validate.php");
      require("templates/permissions.php");

      $courses_dal = new Course_DAL();
      $user_dal= new User_DAL();
      $student_dal= new Student_DAL();

      $course_students = NULL;
      if(isset($_GET["courseCode"]))
      { 
        //get all courses
        $course_students = $student_dal -> getStudentsInCourse($_GET["courseCode"]);  
      }
      else exit;
    ?>
    <div class="main-container d-flex">
        <!--sidebar start-->
        <?php
        require("templates/admin-sidebar.php");
        ?>
        <!--sidebar end-->

        <!--Main content nav and body start-->
        <div class="content openSide">
            <!--navbar start-->
            <?php
            require("templates/admin-navbar.php");
            ?>
            <!--navbar end-->
            <!--breadcrumb start-->
            <?php
             require("templates/admin-breadcrumb.php");
            ?>

            <div class="container-fluid">
                <section id="students-grades-section">
                    <div class="container mt-5 bg-light rounded shadow p-5 mb-5 mx-sm-3 mx-lg-auto">
                        <div class="row d-flex justify-content-center">
                            <div class="row p-3">
                              <!-- Import link -->
                              <div class="col-md-12 head">
                                <div class="float-start mb-4">
                                  <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i>Import Grades</a>
                                </div>
                              </div>
                              <!-- Excel file upload form -->
                              <div class="col-md-12" id="importFrm" style="display: none;">
                                <form class="row g-3" action="" enctype="multipart/form-data" id="import_course_grades_form">
                                  <input type="hidden" name="course_code_value" value="<?php echo $_GET["courseCode"]; ?>" />
                                  <div class="col-auto">
                                    <label for="fileInput" class="visually-hidden">File</label>
                                    <input type="file" class="form-control" name="file" id="fileInput" />
                                  </div>
                                  <div class="col-auto">
                                    <input type="submit" class="btn btn-primary mb-3" name="importSubmit" value="Import" id="import_accounts">
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-10 col-lg-6">
                                <h2 class="page-title">Students Grades Assignment</h2>
                                <h2 class="text-center course_code"><?php echo $_GET['courseCode']; ?></h2>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 overflow-auto p-3">
                                <table class="table table-striped" id="courses_grades_table">
                                    <thead>
                                        <tr>
                                            <td>Student ID</td>
                                            <td>Full Name</td>
                                            <td>1st Session Grade</td>
                                            <td>2nd Session Grade</td>
                                            <td>Grade</td>
                                            <td>Enrollment Date</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                              foreach($course_students as $cs){
                                ?>
                                        <tr>
                                            <td class="p-2 studentId"><?php echo $cs['StudentId']; ?></td>
                                            <td class="p-2"><?php echo $cs['Fname']." ".$cs["Lname"]; ?></td>
                                            <td class="p-2"><?php echo $cs['SessionOne']; ?></td>
                                            <td class="p-2"><?php echo $cs['SessionTwo']; ?></td>
                                            <td class="p-2"><input type="number" name="student_grade"
                                                    class="form-control student_course_grade" min="0" max="100"
                                                    pattern="/^[0-9][0-9]?$|^100$/" value="<?php echo $cs['Grade']; ?>" /></td>
                                            <td class="p-2"><?php echo $cs['EnrollmentDate']; ?></td>
                                          </tr>
                                        <?php
                              }
                              ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-outline-primary btn-lg" id="submit_course_grades">Submit Grades</button>
                          </div>
                        </div>
                    </div>

                </section>
                <!--footer start -->
                <?php
                  require("templates/admin-footer.php");
                  ?>
                <!-- footer end -->
            </div>
        </div>
    </div>
    <!--scripts start-->
    <?php
      require("templates/admin-scripts.php");
    ?>
    <!--scripts end -->
    <script src="js/admin-page-import-grades.js"></script>
</body>
</html>