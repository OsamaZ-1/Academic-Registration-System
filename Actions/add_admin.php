<?php
 session_start();
 if($_POST){
    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password'])){
        require("../classes/dal.php");
        require("../classes/user_dal.php");
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $user_dal=new User_DAL();
        $add_admin=$user_dal->addAdmin($fname,$lname,$email,$hashedPassword);
        if($add_admin==1){
            $v=array(
                'result'=>true,
                'error'=>'no error'
            );
        }
        else {
            $v=array(
                'result'=>false,
                'error'=>$add_admin
            );
        }
        $dataResult=$v;
        echo json_encode($dataResult);
    }
 }

?>