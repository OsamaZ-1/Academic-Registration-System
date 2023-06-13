<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
   $user_dal=new User_DAL();
   $student_dal=new Student_DAL();
   //get all users have request to be student
   $users_requests=$user_dal->getUserRequestToJoinSite();
  ?>
    <div class="container-fluid w-100 p-0 m-0">
        <!--navbar start-->
        <!--navbar end-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="images/LU-logo.png" alt="" class="navbar-img">
                    <span class="navbar-title">LU-STDRG</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavCollapse"
                    aria-controls="navbarNavCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end ms-auto" id="navbarNavCollapse">
                    <ul class="navbar-nav navbarItems">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--BreadCrumb Start-->
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
        <!--BreadCrumb end-->
        <!--content start-->
        <section id="users_accounts_request_section">
            <div class="container mt-5 bg-light rounded shadow p-5 mb-5 mx-sm-3 mx-lg-auto">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-12 col-md-10 col-lg-6">
                        <h2 class="page-title">Users Request To Hava Accounts</h2>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 overflow-auto p-3">
                        <table class="table table-striped" id="users_accounts_request_table">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>User ID</td>
                                    <td>Full Name</td>
                                    <td>Email</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach($users_requests as $v){
                                ?>
                                <tr>
                                  <td class="p-2"><?php echo $v['Id']; ?></td>
                                  <td class="p-2"><?php echo $v['UserId']; ?></td>
                                  <td class="p-2"><?php echo $v['Fname'].' '.$v['Lname']; ?></td>
                                  <td class="p-2"><?php echo $v['Email']; ?></td>
                                  <td class="p-2">
                                        <div class="btn-group">
                                            <button
                                                class="btn btn-outline-success accept-student-account-btn p-2 mx-2"><i
                                                    class="fa-solid fa-check fa-lg mx-2 rounded"></i>Accept</button>
                                            <button
                                                class="btn btn-outline-danger reject-student-account-btn p-2 mx-2"><i
                                                    class="fa-solid fa-x fa-lg mx-2 rounded"></i>Reject</button>
                                        </div>
                                    </td>
                                </tr>
                              <?php
                              }
                              ?><!--
                                <tr>
                                    <td>1</td>
                                    <td>moh@gmail.com</td>
                                    <td>64646</td>
                                    <td class="d-flex">
                                        <div class="btn-group">
                                            <button
                                                class="btn btn-outline-success accept-student-account-btn p-2 mx-2"><i
                                                    class="fa-solid fa-check fa-lg mx-2"></i>Accept</button>
                                            <button
                                                class="btn btn-outline-danger reject-student-account-btn p-2 mx-2"><i
                                                    class="fa-solid fa-x fa-lg mx-2"></i>Reject</button>
                                        </div>
                                    </td>
                                </tr>-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

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
                                <tr>
                                    <td>1</td>
                                    <td>Mohammad Abo ALfoul</td>
                                    <td>moh@gmail.com</td>
                                    <td>I1101,I1102,I1103,I1102,I1103,I1102,I1103,I1102,I1103</td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!--content end-->
    </div>

    <script src="js/jQuery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/datatable.js"></script>
    <script src="js/sweetalert.js"></script>
    <script src="js/admin-page-js.js"></script>
</body>
</html>