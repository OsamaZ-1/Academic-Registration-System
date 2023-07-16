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
   require("templates/login_validate.php");
   require("templates/permissions.php");
   
   $user_dal=new User_DAL();
   $student_dal=new Student_DAL();
   $course_dal=new Course_DAL();
   //get all info
   $total_students=$student_dal->getTotalStudents();
   $total_students_request_register_courses=$student_dal->getTotalRequestsRegisterCourses();
   $total_courses=$course_dal->getTotalCourses();
   $total_users_request=$user_dal->getTotalRequestUsers();
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
            <!--breadcrumb end-->
            
            <div class="container-fluid">
            <section id="admin_dashbord">
            <div class="row">
                    <!--blank start -->
                    <div class="container-fluid pt-4 px-4">
                        <div class="row g-4">
                            <div class="col-sm-6 col-xl-3">
                                <div class="label shadow-sm body-content
                                        rounded d-flex align-items-center
                                        justify-content-between p-4 bg-light">
                                    <i class="fa-solid fa-users fa-3x dashbord-icons"></i>
                                    <div class="ms-3">
                                        <p class="mb-2">Total Req Users</p>
                                        <h6 class="mb-0">
                                          <?php echo $total_users_request; ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="shadow-sm body-content rounded
                                        d-flex align-items-center
                                        justify-content-between p-4 bg-light">
                                    <i class="fa fa-solid fa-user-graduate fa-3x dashbord-icons"></i>
                                    <div class="ms-3">
                                        <p class="mb-2">Total Students</p>
                                        <h6 class="mb-0">
                                          <?php echo $total_students; ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="shadow-sm body-content rounded
                                        d-flex align-items-center
                                        justify-content-between p-4 bg-light">
                                    <i class="fa-solid fa-book fa-3x dashbord-icons"></i>
                                    <div class="ms-3">
                                        <p class="mb-2">Total Courses</p>
                                        <h6 class="mb-0">
                                         <?php echo $total_courses; ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="shadow-sm body-content rounded
                                        d-flex align-items-center
                                        justify-content-between p-4 bg-light">
                                    <i class="fa fa-solid fa-user-graduate fa-2x dashbord-icons"></i>
                                    <div class="ms-3">
                                        <p class="mb-2">Total Reg Crs Reqs</p>
                                        <h6 class="mb-0">
                                            <?php echo $total_students_request_register_courses; ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- labels end -->  
                </div>
            </section>
                <!--footer start -->
                <?php
                  require("templates/admin-footer.php");
                  ?>
                <!-- footer end -->
                <!-- Blank End -->
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