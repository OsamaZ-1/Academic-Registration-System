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
      require("templates/login_validate.php");
      require("templates/permissions.php");

      $user_dal= new User_DAL();   
      $admins=$user_dal->getAdmins();
      //get all admins
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
                                <h2 class="page-title">Admins</h2>
                                <hr>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6 col-md-10 col-sm-12">
                                <form action="" id="add_admin_form">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="fname_id" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="fname_id" name="fname"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="lname_id" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="lname_id" name="lname"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email_id" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email_id" name="email"
                                            placeholder="@example.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_id" class="form-label">Password</label>
                                        <input type="text" class="form-control" id="password_id" name="password"
                                            placeholder="">
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success btn-lg">Add</button>
                                        </div>
                                    </div>
                                </form>
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
    <script src="js/admin-page-admins.js"></script>
</body>

</html>