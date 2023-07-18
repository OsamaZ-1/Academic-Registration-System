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
   require("templates/login_validate.php");
   require("templates/permissions.php");
   
   $student_dal=new Student_DAL();
   $status=0;
   if($_GET){
    if(isset($_GET['status'])){
        $status=(int)$_GET['status'];
        if($status<0 ||$status>2){
            exit;
        }
    }
    else {
        exit;
    }
   }
   $request_students=$student_dal->getStudentsRequestsRejestrationAsStatus($status);
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
            <section id="student_register_courses_request_section">
            <div class="container mt-5 bg-light rounded shadow p-5 mb-5 mx-sm-3 mx-lg-auto">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-12 col-md-10 col-lg-6">
                        <h2 class="page-title">
                            <?php
                             if($status==0){
                                echo "Students Request To Register Courses";
                             }
                             else if($status==1){
                                echo "Rejected Registrations";
                             }
                             else if($status==2){
                                echo "Accepted Registration";
                             }
                            ?>
                        </h2>
                        <hr>
                    </div>
                </div>
                <?php if($status==0){ ?>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <button class="btn btn-outline-danger btn-lg px-3 py-1" id="delete_all_student_request_btn">Delete All</button>
                    </div>
                </div>
                <?php }?>
                <div class="row">
                    <div class="col-12 overflow-auto p-3">
                        <table class="table table-striped" id="student_register_courses_request_table">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Full Name</td>
                                    <td>Email</td>
                                    <td>Courses</td>
                                    <?php if($status==0){ ?>
                                    <td>Student Message</td>
                                    <td>Actions</td>
                                    <?php
                                     } else { ?>
                                        <td>Status</td>
                                    <?php }
                                         ?> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 foreach($request_students as $v){
                                ?>
                                <tr>
                                    <td><?php echo $v['StudentId']; ?></td>
                                    <td><?php echo $v['Fname'].' '.$v['Lname'] ?></td>
                                    <td><?php echo $v['Email'] ?></td>
                                    <td><?php echo $v['Courses'] ?></td>
                                    <?php if($status==0){ ?>
                                    <td><?php echo $v['StudentMessage']; ?></td>
                                    <td class="">
                                        <div class="btn-group">
                                            <button class="btn btn-outline-success accept-student-registration-btn"><i
                                                    class="fa-solid fa-check fa-lg mx-2 mt-2 rounded"></i>Accept</button>
                                            <button class="btn btn-outline-danger reject-student-registration-btn"><i
                                                    class="fa-solid fa-x fa-lg mx-2 mt-2 rounded"></i>Reject</button>
                                            <button class="btn btn-outline-primary manage-student-registration-btn"><i
                                                    class="fa-solid fa-list-check fa-lg mx-2 mt-2 rounded"></i>Manage
                                                Registration</button>
                                        </div>
                                    </td>
                                    <?php } else if($status==2) { ?>
                                        <td style="color:green;">Accepted</td>
                                    <?php } else if($status==1) {
                                        ?>
                                        <td style="color:red;">Rejected</td>
                                    <?php
                                    }  ?>
                                </tr>

                                <?php } ?>
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
                <!-- Blank End -->
            </div>
        </div>
    </div>

<!--scripts start-->
<?php
    require("templates/admin-scripts.php");
?>
<!--scripts end-->
<script src="js/admin-page-js.js"></script>
</body>
</html>