<?php
if($_POST){
    if(isset($_POST['coursesCodeArray'])){
        require("../classes/dal.php");
        require("../classes/courses_dal.php");
        $courses_dal=new Course_DAL();
        $coursesArray=$_POST['coursesCodeArray'];

        $data=$courses_dal->getCoursesExceptRegistered($coursesArray);
        echo json_encode($data);
    }
}

?>