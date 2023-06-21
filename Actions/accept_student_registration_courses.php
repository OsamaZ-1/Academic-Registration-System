<?php
if($_POST){
    if(isset($_POST['stdId'])){
        require("../classes/dal.php");
        require("../classes/student_dal.php");
        require("../classes/courses_dal.php");
        $stdId=(int)$_POST['stdId'];
        $courses=$_POST['courses'];
        $student_dal=new Student_DAL();
        $courses_dal=new Course_DAL();
        
        $editStatusRegester=$student_dal->editStatusRegester($stdId,2);
        if($editStatusRegester==1){
            for($i=0;$i<count($courses);$i++){
                $course=$courses_dal->getCourseAsCode($courses[$i]);
                $result=$student_dal->addRegesterStudentCourse($stdId,$course['CourseId'],$course['Major'],'2022-2023');
            }
            $v=array(
                'result'=>true,
                'error'=>'no error'
            );
        }
        else {
            $v=array(
                'result'=>false,
                'error'=>$editStatusRegester
            );
        }

        $dataResult=$v;
        echo json_encode($dataResult);
    }
}

?>