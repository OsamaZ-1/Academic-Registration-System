<?php
if($_POST){
    if(isset($_POST['id'])){
        require("../classes/dal.php");
        require("../classes/user_dal.php");
        require("../classes/student_dal.php");
        require("../classes/courses_dal.php");
        $id=(int)$_POST['id'];
        $currentYear = date('Y');
        $enrollment_date=(string)((int)$currentYear-1).'-'.$currentYear;

        $user_dal=new User_DAL();
        $student_dal=new Student_DAL();
        $course_dal=new Course_DAL();
        $user=$user_dal->getRequestUser($id);
        
        //check if student id or email already exist in student table
        $idExist = $student_dal -> idExist($user['UserId']);
        $emailExist = $student_dal -> emailExist($user['Email']);
        
        if($idExist)
        {
            $v=array(
                'result'=>false,
                'error'=>'account with same id exist'
            );
            echo json_encode($v);
            exit;
        }
        if($emailExist)
        {
            $v=array(
                'result'=>false,
                'error'=>'account with same email exist'
            );
            echo json_encode($v);
            exit;
        }

        $add_student=$student_dal->addStudent($user['UserId'],$user['Fname'],$user['Lname'],$user['Email'],$user['Password'],1,1,$enrollment_date);
        $first_semester_courses=$course_dal->getCourses(1,1, 1);
        $second_semester_courses=$course_dal->getCourses(1,2,1);
        for($i=0;$i<count($first_semester_courses);$i++){
            $fs_result=$student_dal->addRegesterStudentCourse($user['UserId'],$first_semester_courses[$i]['CourseId'],1,'2022-2023');
            if(!$fs_result){
                $v=array(
                    'result'=>false,
                    'error'=>$fs_result
                );
                echo json_encode($v);
                exit;
            }
        }
        for($i=0;$i<count($second_semester_courses);$i++){
            $ss_result=$student_dal->addRegesterStudentCourse($user['UserId'],$second_semester_courses[$i]['CourseId'],1,'2022-2023');
            if(!$ss_result){
                $v=array(
                    'result'=>false,
                    'error'=>$ss_result
                );
                echo json_encode($v);
                exit;
            }
        }
        if($add_student){
            $delete_user=$user_dal->deleteUser($id);
            if($delete_user){
                $v=array(
                    'result'=>true,
                    'error'=>'no error'
                );
            }
            else {
                $v=array(
                    'result'=>false,
                    'error'=>$delete_user
                );
            }
        }
        else {
            $v=array(
                'result'=>false,
                'error'=>$add_student
            );
        }
        $dataResult=$v;
        echo json_encode($dataResult);
    }
}

?>