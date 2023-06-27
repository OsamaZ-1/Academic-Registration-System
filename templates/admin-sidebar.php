<div class="slidebar sticky-top openSide" id="slide_nav">
    <div class="header-box px-4 py-4 d-flex
                    justify-content-between mb-3">
        <h1 class="fs-4"><span class="bg-white text-dark rounded
                            shadow px-2 me-2">LU</span><span class="text-white">Admin</span></h1>
        <button class="btn close-btn px-1 py-0
                        text-white"><i class="fa-solid fa-stream"></i></button>
    </div>
    <ul class="list-unstyled px-3">
        <!--Start Dashboard-->
        <li class="mb-4"><a href="admin-page.php" class="text-decoration-none px-3 py-2 d-block dashbord"><i
                    class="fa-solid fa-home fa-lg"></i> <span class="mx-2">Dashbord</span></a></li>
        <!--End Dashboard-->
        <!--Start Users-->
        <li class="mb-4"><a href="admin-page-request-users.php" class="text-decoration-none
                            px-3 py-2 d-block request-users"> <i class="fa-solid fa-users fa-lg"></i></i>
                <span class="mx-2">Users</span></a></li>
        <!--End Users-->
        <!--Start Grades DropDown-->
        <li class="nav-item dropdown mb-4 w-100 grades"><a href="#" class="nav-link dropdown-toggle text-decoration-none
                                    px-3 py-2 d-block grades" data-bs-toggle="collapse" data-bs-target="#grades-collapse"
                aria-expanded="false"> <i class="fa fa-solid fa-graduation-cap fa-lg"></i>
                <span class="mx-2">Grades</span></a>
            <div class="collapse bg-transparent border-0" id="grades-collapse">
                <a href="admin-page-display-grades.php" class="dropdown-item display_grades">Display Grades</a>
                <a href="admin-page-assign-grades.php" class="dropdown-item assign_grades">Assign Grades</a>
            </div>
        </li>
        <!--End Grades DropDown-->
        <!--Start Students DropDown-->
        <li class="nav-item dropdown mb-4 w-100 students"><a href="#" class="nav-link dropdown-toggle text-decoration-none
                                    px-3 py-2 d-block students" data-bs-toggle="collapse" data-bs-target="#students-collapse"
                aria-expanded="false"> <i class="fa fa-solid fa-user-graduate fa-lg"></i>
                <span class="mx-2">Students</span></a>
            <div class="collapse bg-transparent border-0" id="students-collapse">
                <a href="admin-page-student-request-rejester.php?status=0" class="dropdown-item request_register">Request Register</a>
                <a href="admin-page-student-request-rejester.php?status=1" class="dropdown-item rejected_register">Rejected</a>
                <a href="admin-page-student-request-rejester.php?status=2" class="dropdown-item accepted_register">Accepted</a>
            </div>
        </li>
        <!--End Students DropDown-->
        <!--Start Users DropDown-->
        <li class="nav-item dropdown mb-4 w-100 users"><a href="show_users.php" class="nav-link dropdown-toggle text-decoration-none
                                    px-3 py-2 d-block" data-bs-toggle="collapse" data-bs-target="#user-collapse"
                aria-expanded="false"> <i class="fa-solid fa-user fa-lg"></i>
                <span class="mx-2">Users</span></a>
            <div class="collapse bg-transparent border-0" id="user-collapse">
                <a href="show_users.php" class="dropdown-item all_users">All Users</a>
                <a href="#" class="dropdown-item all_user_types">Users Types</a>
            </div>
        </li>
        <!--End Users DropDown-->
    </ul>
</div>