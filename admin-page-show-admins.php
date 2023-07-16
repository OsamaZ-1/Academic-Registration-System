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
                  <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-success btn-lg" id="add_admin_btn">Add Admin</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 overflow-auto p-3">
                        <table class="table table-striped" id="admins_table">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Full Name</td>
                                    <td>Email</td>
                                    <td>Password</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach($admins as $v){
                                ?>
                                <tr>
                                  <td class="p-2"><?php echo $v['Id']; ?></td>
                                  <td class="p-2"><?php echo $v['Fname'].' '.$v['Lname']; ?></td>
                                  <td class="p-2"><?php echo $v['Email']; ?></td>
                                  <td class="p-2"><?php echo $v['Password']; ?></td>
                                  <td class="d-flex">
                                        <button class="btn btn-outline-warning edit_admin_btn mx-1"><i
                                                class="fas fa-edit"></i></i></button>
                                        <button class="btn btn-outline-danger delete_admin_btn mx-1"><i
                                                class="fas fa-trash-alt"></i></button>
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