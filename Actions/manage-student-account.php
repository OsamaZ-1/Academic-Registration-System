<?php
 if($_POST){
    if(isset($_POST['stdId']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['majors']) && isset($_POST['year']) && isset($_POST['enrollment_date'])){
        require("../classes/dal.php");
        require("../classes/student_dal.php");
        $stdId=(int)$_POST['stdId'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $majors=$_POST['majors'];
        $year=$_POST['year'];
        $enrollment_date=$_POST['enrollment_date'];
        $student_dal=new Student_DAL();
        $email_exist=$student_dal->isEmailExist($stdId,$email);
        if(!$email_exist){
            $edit_student=$student_dal->updateStudentAccount($stdId,$fname,$lname,$email,$password,$majors,$year,$enrollment_date);
            if($edit_student==1){
                $v=array(
                    'result'=>true,
                    'error'=>'no error'
                    );
            }
            else {
                $v=array(
                    'result'=>false,
                    'error'=>$edit_student
                    );
            }
        }
        else {
            $v=array(
                'result'=>false,
                'error'=>'email exist to another student'
                );
        }
        echo json_encode($v);
    }
 }
?>