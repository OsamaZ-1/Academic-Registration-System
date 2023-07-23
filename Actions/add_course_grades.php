<?php
 if($_POST){
    if(isset($_POST['courseCode']) && isset($_POST['studentsId']) && isset($_POST['session1Grades']) && isset($_POST['session2Grades']) && isset($_POST['enrollDates'])){
        $courseCode=$_POST['courseCode'];
        $studentsId=$_POST['studentsId'];
        $session1Grades=$_POST['session1Grades'];
        $session2Grades=$_POST['session2Grades'];
        $enrollDates=$_POST['enrollDates'];

        require('../classes/dal.php');
        require('../classes/grades_dal.php');
        require('../classes/courses_dal.php');
        $course_dal=new Course_DAL();
        $grades_dal=new Grades_DAL();
        $courseId=$course_dal->getIdFromCode($courseCode);
        $j=0;
        $error='';
        for($i=0;$i<count($session1Grades);$i++){

            $finalGrade = $session1Grades[$i];
            if ($session2Grades[$i] != "NaN")
                $finalGrade = $session2Grades[$i];
            else{
                $session2Grades[$i] = NULL;
            }

            if ($session2Grades[$i] == NULL){
                $edit_grade=$grades_dal->editStudentCourseGrade($courseId,$studentsId[$i],(float)$finalGrade, (float)$session1Grades[$i], $session2Grades[$i], $enrollDates[$i]);
            }
            else{
                $edit_grade=$grades_dal->editStudentCourseGrade($courseId,$studentsId[$i],(float)$finalGrade, (float)$session1Grades[$i], (float)$session2Grades[$i], $enrollDates[$i]);
            }

            if($edit_grade){
                $j++;
            }
            else {
                $error=$edit_grade;
                break;
            }
        }
        if(count($session1Grades)==$j){
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