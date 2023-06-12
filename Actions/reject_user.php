<?php
if($_POST){
    if(isset($_POST['id'])){
        require("../classes/dal.php");
        require("../classes/user_dal.php");
        $id=(int)$_POST['id'];
        $user_dal=new User_DAL();
        $user=$user_dal->getRequestUser($id);
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
        $dataResult=$v;
        echo json_encode($dataResult);
    }
}

?>