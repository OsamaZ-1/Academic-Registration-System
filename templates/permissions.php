<?php
  $page_url=$_SERVER['REQUEST_URI'];
  $page_array=explode('/',$page_url);
  $page_name_with_get=$page_array[count($page_array)-1];
  $page_array_with_get=explode('?',$page_name_with_get);

  //page name
  $page_name=$page_array_with_get[0];
  //user type
  $user_type=$_SESSION['user_type'];

  $dal_permissions=new DAL();
  $validate_enter_page=$dal_permissions->getEnterPagePermission($user_type,$page_name);

  if(count($validate_enter_page)==0){
    unset($_SESSION["email"]);
    unset($_SESSION["pass"]);
    unset($_SESSION["Id"]);
    unset($_SESSION['user_type']);
    echo "<script>window.location.href='login.php'</script>";
  }

?>
