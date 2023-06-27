<?php
 if($_POST){
    if(isset($_POST['delete'])){
        require("../classes/dal.php");
        require("../classes/student_dal.php");
        $student_dal=new Student_DAL();
        $delete_all=$student_dal->deleteAllStudentRegisterCourses();
        if($delete_all){
            $v=array(
                'result'=>true,
                'error'=>'no error'
            );
        }
        else {
            $v=array(
                'result'=>false,
                'error'=>$delete_all
            );
        }
        echo json_encode($v);
    }
 }
?>