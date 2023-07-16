<?php
 if($_POST){
    if(isset($_POST['id'])){
        $id=(int)$_POST['id'];
        require("../classes/dal.php");
        require("../classes/user_dal.php");
        $user_dal=new User_DAL();
        $delete_admin=$user_dal->deleteAdmin($id);
        if($delete_admin==1){
            $v=array(
                'result'=>true,
                'error'=>'no error'
            );
        }
        else {
            $v=array(
                'result'=>false,
                'error'=> $delete_admin
            );
        }
        $data=$v;
        echo json_encode($data);
    }
 }
?>