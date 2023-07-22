<?php
 
if(isset($_POST["student-id"]) && isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["password"]))
{   
    require("../classes/dal.php");
    require("../classes/student_dal.php");
    require("../classes/user_dal.php");
    $student_dal = new Student_DAL();
    $user_dal = new User_DAL();
              
    $user_id = $_POST["student-id"];
    $user_fname = ucfirst($_POST["fname"]);
    $user_lname = ucfirst($_POST["lname"]);
    $user_email = $_POST["email"];
    $user_password = $_POST["password"];
    
    $studentIdExist = $student_dal -> idExist($user_id);
    $studentEmailExist = $student_dal -> emailExist($user_email);
    

    
    $result = "";
    if($studentIdExist)
      $result .= "student with same id exist ";
    if($studentEmailExist && $result == "")
      $result .= "student with same email exist";
    else if($studentEmailExist)
      $result .= "- student with same email exist" ;
      
      
    if($result == "")
    {
      $sql_result = $user_dal ->addUser($user_id, $user_fname, $user_lname, $user_email, $user_password);
    }

    
    if($result == "" && $sql_result)
    {
        $v=array(
                  'result'=>true,
                  'error'=>'no error'
                );
    }
    else 
    {
        $v=array(
                  'result'=>false,
                  'not found'=>$result,
                  'error'=>$result
                );
    }
    $dataResult=$v;
    echo json_encode($dataResult);
            
  
  }
?>