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
   require("classes/student_dal.php");
   require("classes/courses_dal.php");
   $student_dal=new Student_DAL();
   $course_dal=new Course_DAL();
   //get all users have request to be student
   if($_GET){
    if(isset($_GET['stdId'])){
        $stdId=(int)$_GET['stdId'];
    }
    else {
        exit;
    }
   }
   $student_info=$student_dal->getStudentRequestRegiterCourses($stdId);
   $student=$student_dal->getStudentAsID($stdId);
   $courses_string=$student_info['Courses'];
   $courses=explode('-', $courses_string);
   $all_courses=$course_dal->getCoursesExceptRegistered($courses);
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
                <section id="student_info_section">
                    <div class="container mt-5 bg-light rounded shadow p-5 mb-5 mx-sm-3 mx-lg-auto">
                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-12 col-md-10 col-lg-6">
                                <h2 class="page-title">Student Information</h2>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table" id="student_info_table">
                                    <tr>
                                        <td class="text-start"><strong>Studentd
                                                ID:</strong><span><?php echo $student['StudentId']; ?></span></td>
                                        <td class="text-end"><strong>Student
                                                Name:</strong><?php echo $student['Fname'].' '.$student['Lname']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="2"><strong>Studentd
                                                Email:</strong><?php echo $student['Email']; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="manage_student_section">
                    <div class="container mt-3 bg-light rounded shadow p-5 mb-5 mx-sm-3 mx-lg-auto">
                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-12 col-md-10 col-lg-6">
                                <h2 class="page-title">Student Register Courses</h2>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 overflow-auto p-3">
                                <table id="student_courses_table" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Crse ID</th>
                                            <th>Crse Code</th>
                                            <th>Crse Title</th>
                                            <th>Crse Credits</th>
                                            <th>Crse Semester</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                               for($i=0;$i<count($courses);$i++){
                                $course_info=$course_dal->getCourseAsCode($courses[$i]);
                            ?>

                                        <tr>
                                            <td><?php echo $course_info['CourseId']; ?></td>
                                            <td><?php echo $course_info['CourseCode']; ?></td>
                                            <td><?php echo $course_info['CourseName']; ?></td>
                                            <td><?php echo $course_info['Credits']; ?></td>
                                            <td><?php echo $course_info['Semester']; ?></td>
                                            <td>
                                                <button class="btn btn-outline-danger delete-course-from-student-btn"><i
                                                        class="fa-sharp fa-solid fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="" colspan="6">
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-center">
                                                        <button class="btn btn-outline-success w-50"
                                                            id="add_course_to_student_btn" data-bs-toggle="modal" data-bs-target="#coursesModal"><i
                                                                class="fa-solid fa-plus fa-lg mx-2"></i>Add
                                                            Course</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="container-fluid mt-2">
                                    <div class="row mt-2">
                                        <div class="col-12 d-flex justify-content-center">
                                            <textarea class="form-control form-control-lg rounded"
                                                placeholder="Add Admin Message" id="admin_message" cols="10"
                                                rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12 d-flex justify-content-center">
                                            <button
                                                class="btn btn-outline-danger mx-3 reject-student-registration-submit-btn"><i
                                                    class="fa-solid fa-x fa-lg mx-2 mt-2 rounded"></i>Reject</button>
                                            <button class="btn btn-outline-primary" id="submit-student-registration-btn"><i class="fa-solid fa-check fa-lg mx-2 mt-2"></i>Submit
                                                Registration</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--footer start -->
                <?php
                  require("templates/admin-footer.php");
                   ?>
                <!-- footer end -->
                <!--modal start-->
                <div class="modal fade" tabindex="-1" id="coursesModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Course To Student</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5>Select One Course:</h5><hr>
                                <select class="form-select form-select-lg" name="" id="select_courses">
                                   
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="add_course_to_student_modal_btn">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--modal end-->
                <!-- Blank End -->
            </div>
        </div>
    </div>
    <!--scripts start-->
    <?php
  require("templates/admin-scripts.php");
?>
    <!--scripts end-->
    <script src="js/admin-page-manage-std-js.js"></script>
</body>

</html>