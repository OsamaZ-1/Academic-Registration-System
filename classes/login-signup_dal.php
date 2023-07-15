<?php
    class LoginSignup_DAL extends DAL {

        public function login($email, $password){

          //Check if the user requesting to Login is an Admin
          $sql1 = "SELECT Admin FROM Users WHERE Email = '{$email}' AND Password = '{$password}'";
          //Check if the user requesting to Login is a Student
          $sql2 = "SELECT Id FROM Students WHERE Email = '{$email}' AND Password = '{$password}'";

          $result1 = $this -> getData($sql1);
          $result2 = $this -> getData($sql2);

          if($result1[0]["Admin"] == 1)
            return "Admin";
          else if(!empty($result2))
            return "Student";

        }

        public function getUserInfo($user_email,$user_password){
          $conn = $this->getConnection();
        $stmt = $conn->prepare( 'SELECT users.Id,users.Email,users.Password FROM users WHERE users.Email=? AND users.Password=?' );
        $stmt->bind_param( 'ss', $user_email, $user_password );
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        if ($user) {
            $user['validate']=true;
            return $user;
        } else {
           $user=array("validate"=>false);
           return $user;
        }
        $stmt->close();
        $conn->close();
        }
    }
?>