<?php
if($_POST){
    if(isset($_POST['courseCode'])){
        require("../classes/dal.php");
        require("../classes/courses_dal.php");
        $courses_dal=new Course_DAL();
        $courseCode=$_POST['courseCode'];

        $data=$courses_dal->getCourseAsCode($courseCode);
        echo json_encode($data);
    }
}

?>