<?php
if($_POST){
    if(isset($_POST['stdId'])){
        require("../classes/dal.php");
        require("../classes/student_dal.php");
        require("../classes/courses_dal.php");
        $stdId=(int)$_POST['stdId'];
        $student_dal=new Student_DAL();
        $courses_dal=new Course_DAL();
        
        $editStatusRegester=$student_dal->editStatusRegester($stdId,0);
        if($editStatusRegester==1){
            $result=$student_dal->editRegesterCoursesAdminMessage($stdId,'We Reject The Regester Of Courses');
            if($result==1){
            $v=array(
                'result'=>true,
                'error'=>'no error'
            );
        } else {
            $v=array(
                'result'=>false,
                'error'=>$result
            );
        }
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