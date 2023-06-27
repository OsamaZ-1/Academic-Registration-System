<?php
 if($_POST){
    if(isset($_POST['courseCode']) && isset($_POST['studentsId']) && isset($_POST['courseGrades'])){
        $courseCode=$_POST['courseCode'];
        $studentsId=$_POST['studentsId'];
        $courseGrades=$_POST['courseGrades'];
        require('../classes/dal.php');
        require('../classes/grades_dal.php');
        require('../classes/courses_dal.php');
        $course_dal=new Course_DAL();
        $grades_dal=new Grades_DAL();
        $courseId=$course_dal->getIdFromCode($courseCode);
        $j=0;
        $error='';
        for($i=0;$i<count($courseGrades);$i++){
            $edit_grade=$grades_dal->editStudentCourseGrade($courseId,$studentsId[$i],(float)$courseGrades[$i]);
            if($edit_grade){
                $j++;
            }
            else {
                $error=$edit_grade;
                break;
            }
        }
        if(count($courseGrades)==$j){
            $v=array(
                'result'=>true,
                'error'=>'no error'
            );
        }
        else {
            $v=array(
                'result'=>false,
                'error'=>$error
            );
        }
        echo json_encode($v);
    }
 }

?>