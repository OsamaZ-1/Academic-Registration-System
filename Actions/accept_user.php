<?php
if($_POST){
    if(isset($_POST['id'])){
        require("../classes/dal.php");
        require("../classes/user_dal.php");
        require("../classes/student_dal.php");
        $id=(int)$_POST['id'];
        $user_dal=new User_DAL();
        $student_dal=new Student_DAL();
        $user=$user_dal->getRequestUser($id);
        $add_student=$student_dal->addStudent($user['UserId'],$user['Fname'],$user['Lname'],$user['Email'],$user['Password'],1,1,'2022-2023');
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