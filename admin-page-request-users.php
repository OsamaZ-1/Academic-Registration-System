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
   
   $user_dal=new User_DAL();
   $student_dal=new Student_DAL();
   //get all users have request to be student
   $users_requests=$user_dal->getUserRequestToJoinSite();
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
            <section id="users_accounts_request_section">
            <div class="container mt-5 bg-light rounded shadow p-5 mb-5 mx-sm-3 mx-lg-auto">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-12 col-md-10 col-lg-6">
                        <h2 class="page-title">Users Request To Have Accounts</h2>
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