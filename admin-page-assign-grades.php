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
      require("classes/courses_dal.php");

      $courses_dal = new Course_DAL();
      $user_dal= new User_DAL();
      $student_dal= new Student_DAL();

      //get all courses
      $courses = $courses_dal -> getAllCourses();
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
                        <h2 class="page-title">Courses</h2>
                        <hr>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 overflow-auto p-3">
                        <table class="table table-striped" id="courses_table">
                            <thead>
                                <tr>
                                    <td>Course Code</td>
                                    <td>Course Name</td>
                                    <td>Major</td>
                                    <td>Year</td>
                                    <td>Semester</td>
                                    <td>Optional</td>
                                    <td>Action</td> 
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach($courses as $c){
                                ?>
                                <tr>
                                  <td class="p-2"><?php echo $c['CourseCode']; ?></td>
                                  <td class="p-2"><?php echo $c['CourseName'] ?></td>
                                  <td class="p-2"><?php echo $c['Major']; ?></td>
                                  <td class="p-2"><?php echo $c['Year']; ?></td>
                                  <td class="p-2"><?php echo $c['Semester']; ?></td>
                                  <td class="p-2">
                                    <?php 
                                        if($c['Optional']==0){
                                          echo "No";
                                        }
                                        else {
                                          echo "Yes";
                                        }
                                      ?>
                                  </td>
                                  <td class="p-2"><button class="btn btn-outline-primary p-2 btn-assign-grades">Assign Grades</button></td>
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
  <script src="js/admin-page-grades.js"></script>
  </body>
</html>