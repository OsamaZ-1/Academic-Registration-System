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
      require("templates/login_validate.php");
      require("templates/permissions.php");
      if($_GET){
        if(isset($_GET['stdId'])){
            $stdId=(int)$_GET['stdId'];
        }
        else {
            exit;
        }
      }
      else {
        exit;
      }
      $student_dal=new Student_DAL();
      $student=$student_dal->getStudentAsID($stdId);

      $majors=$student_dal->getAllMajors();
      
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
                                <h2 class="page-title">Student Account</h2>
                                <hr>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6 col-md-10 col-sm-12">
                                <form action="" id="manage_student_account_form">
                                    <input type="number" name="stdId" id="stdId_id" value="<?php echo $stdId; ?>" required hidden>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="fname_id" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="fname_id" name="fname"
                                                    placeholder="" value="<?php echo $student['Fname']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="lname_id" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="lname_id" name="lname"
                                                    placeholder="" value="<?php echo $student['Lname']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email_id" class="form-label">Email</label>
                                        <input type="email" pattern="^[a-zA-Z]+[0-9a-zA-Z]*[_\-\.]?[a-zA-Z0-9]+@(gmail|hotmail).com$" class="form-control" id="email_id" name="email"
                                            placeholder="@example.com" value="<?php echo $student['Email']; ?>" required>
                                    </div>
                                    <input type="password" name="password" id="password_id" value="<?php echo $student['Password'] ?>" required hidden>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="majors_id" class="form-label">Majors</label>
                                                <select name="majors" id="majors_id" class="form-select">
                                                    <?php
                                                      foreach($majors as $v){
                                                    ?>
                                                    <option value="<?php echo $v['Id']; ?>"
                                                        <?php if($v['Id']==$student['Major']){ echo 'selected'; } ?>>
                                                        <?php echo $v['Major'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="year_id" class="form-label">Year</label>
                                                <input type="number" class="form-control" name="year" id="year_id"
                                                    value="<?php echo $student['Year']; ?>" min="1" max="5" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="enrollment_date_id" class="form-label">Enrollment Date</label>
                                                <input type="text" class="form-control" name="enrollment_date" id="enrollment_date_id"
                                                    value="<?php echo $student['EnrollmentDate']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success btn-lg">Save</button>
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
    <script src="js/admin-page-manage-student-account.js"></script>
</body>

</html>