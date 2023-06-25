<!DOCTYPE html>
<html lang="en">
  <head>
    <!--header start-->
    <?php
      require("templates/admin-header.php");
    ?>
    <!--header end-->
  </head>
  <body>
    <?php
      session_start();
      require("classes/dal.php");
      require("classes/user_dal.php");
      require("classes/student_dal.php");
      require("classes/grades_dal.php");

      $grades_dal = new Grades_DAL();
      $user_dal= new User_DAL();
      $student_dal= new Student_DAL();

      //get all students grades
      $grades = $grades_dal -> getAllStudentsGrades();
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
                    <div class="col-sm-12 col-md-10 col-lg-6">
                        <h2 class="page-title">Students Grades</h2>
                        <hr>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 overflow-auto p-3">
                        <table class="table table-striped" id="students_grades_table">
                            <thead>
                                <tr>
                                    <td>Student ID</td>
                                    <td>Full Name</td>
                                    <td>Major</td>
                                    <td>Course Code</td>
                                    <td>Course Name</td>
                                    <td>Credits</td>
                                    <td>Grade</td>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach($grades as $v){
                                ?>
                                <tr>
                                  <td class="p-2"><?php echo $v['StudentId']; ?></td>
                                  <td class="p-2"><?php echo $v['Fname'].' '.$v['Lname']; ?></td>
                                  <td class="p-2"><?php echo $v['Major']; ?></td>
                                  <td class="p-2"><?php echo $v['CourseCode']; ?></td>
                                  <td class="p-2"><?php echo $v['CourseName']; ?></td>
                                  <td class="p-2"><?php echo $v['Credits']; ?></td>
                                  <td class="p-2"><?php echo $v['Grade']; ?></td>
                                </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                        </table>
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
<script src="js/admin-page-js.js"></script>
  </body>
</html>