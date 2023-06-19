<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/datatable.css">
    <link rel="stylesheet" href="FontAwesome/css/all.min.css">
    <link rel="stylesheet" href="css/admin-page-style.css">
    <title>Admin Page</title>
    
</head>
<body>
<?php
   session_start();
   require("classes/dal.php");
   require("classes/user_dal.php");
   require("classes/student_dal.php");
   $student_dal=new Student_DAL();
   $request_students=$student_dal->getStudentsRequestsRejestration();
  ?>
<div class="main-container d-flex">
        <!--sidebar start-->
        <div class="slidebar sticky-top openSide" id="slide_nav">
    <div class="header-box px-4 py-4 d-flex
                    justify-content-between">
        <h1 class="fs-4"><span class="bg-white text-dark rounded
                            shadow px-2 me-2">LU</span><span class="text-white">Admin</span></h1>
        <button class="btn close-btn px-1 py-0
                        text-white"><i class="fa-solid fa-stream"></i></button>
    </div>
    <ul class="list-unstyled px-3">
        <li class="mb-3 dashbord"><a href="dashbord.php" class="text-decoration-none px-3 py-2 d-block active"><i
                    class="fa-solid fa-home fa-lg"></i> <span class="mx-2">Dashbord</span></a></li>
        <li class="mb-3 request-users"><a href="#" class="text-decoration-none
                            px-3 py-2 d-block"> <i class="fa-solid fa-users fa-lg"></i></i>
                <span class="mx-2">Users</span></a></li>
        <li class="mb-3 students-request"><a href="#" class="text-decoration-none
                            px-3 py-2 d-block"> <i class="fa-solid fa-user-graduate fa-lg"></i></i>
                <span class="mx-2">Students</span></a></li>
        
        <li class="nav-item dropdown mb-3 w-100 users"><a href="show_users.php" class="nav-link dropdown-toggle text-decoration-none
                                    px-3 py-2 d-block" data-bs-toggle="collapse" data-bs-target="#user-collapse"
                aria-expanded="false"> <i class="fa-solid fa-user fa-lg"></i>
                <span class="mx-2">Users</span></a>
            <div class="collapse bg-transparent border-0" id="user-collapse">
                <a href="show_users.php" class="dropdown-item all_users">All Users</a>
                <a href="#" class="dropdown-item all_user_types">Users Types</a>
            </div>
        </li>
    </ul>
</div>

        <!--sidebar end-->

        <!--Main content nav and body start-->
        <div class="content openSide">
            <!--navbar start-->
            <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <div class="container-fluid">
              <ul class="nav justify-content-start">
                  <div class="d-flex justify-content-between">
                    <button class="btn px-1 py-0 open-btn"><i class="fa-solid
                                    fa-stream"></i></button>
                     <a class="navbar-brand fs-4" href="#"></a>
                    </div>
                 </ul>
                <a class="navbar-brand" href="#">
                    <img src="images/LU-logo.png" alt="" class="navbar-img">
                    <span class="navbar-title">LU FSADMIN</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavCollapse"
                    aria-controls="navbarNavCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end ms-auto" id="navbarNavCollapse">
                    <ul class="navbar-nav navbarItems">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">LOGOUT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
            <!--navbar end-->
            <!--breadcrumb start-->
            <div class="row" id="breadcrumb_navbar">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <h2 class="page-title text-white">Admin Page</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Academic System</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Admin Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            <!--breadcrumb end-->
            
            <div class="container-fluid">
            <section id="student_register_courses_request_section">
            <div class="container mt-5 bg-light rounded shadow p-5 mb-5 mx-sm-3 mx-lg-auto">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-12 col-md-10 col-lg-6">
                        <h2 class="page-title">Users Request To Register Courses</h2>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 overflow-auto p-3">
                        <table class="table table-striped" id="student_register_courses_request_table">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Full Name</td>
                                    <td>Email</td>
                                    <td>Courses</td>
                                    <td>Actions</td>
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
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
                <!--footer start -->
                <div class="row shadow-sm body-content p-4 m-3 rounded footer">
    <div class="col-12 col-sm-6 text-center text-sm-start">
        &copy; <a href="#">Your Site Name</a>, All Right
        Reserved.
    </div>
    <div class="col-12 col-sm-6 text-center text-sm-end">
        Designed By <a href="#"></a>
    </div>
</div>
                <!-- footer end -->
                <!-- Blank End -->
            </div>
        </div>
    </div>

<script src="js/jQuery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/datatable.js"></script>
<script src="js/sweetalert.js"></script>
<script src="js/admin-page-js.js"></script>
<script>
    $(document).ready(function(){
    $(".open-btn").on("click", function() {
        $("#slide_nav").addClass("active");
        $("#slide_nav").addClass("openSide");
        $(".content").addClass("openSide");
        $("#slide_nav").removeClass("closeSide");
        $(".content").removeClass("closeSide");
        $(".open-btn").removeClass("displayIt");
    });
    $(".close-btn").on("click", function() {
        $("#slide_nav").removeClass("active");
        $("#slide_nav").removeClass("openSide");
        $(".content").removeClass("openSide");
        $("#slide_nav").addClass("closeSide");
        $(".content").addClass("closeSide");

        $(".open-btn").addClass("displayIt");
    });
});
</script>
</body>
</html>