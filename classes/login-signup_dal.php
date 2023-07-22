<?php
    class LoginSignup_DAL extends DAL {

        public function login($email, $password){

          //Check if the user requesting to Login is an Admin
          $sql1 = "SELECT Admin,Password FROM Users WHERE Email = '{$email}'";
          //Check if the user requesting to Login is a Student
          $sql2 = "SELECT StudentId,Password FROM Students WHERE Email = '{$email}'";

          $result1 = $this -> getData($sql1);
          $result2 = $this -> getData($sql2);
          
          if($result1[0]["Admin"] == 1 && password_verify($password, $result1[0]["Password"]))
            return "Admin";
          else if(!empty($result2) && password_verify($password, $result2[0]["Password"]))
              return $result2[0]["StudentId"];

        }

        public function getUserInfo($user_email,$user_password){
          $conn = $this->getConnection();
        $stmt = $conn->prepare( 'SELECT users.Id,users.Email,users.Password FROM users WHERE users.Email=?');
        $stmt->bind_param( 's', $user_email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        
        if ($user) {
            $user['validate']=true;
            $stmt->close();
            $conn->close();
            return $user;
        } else {
           $user=array("validate"=>false);
           $stmt->close();
           $conn->close();
           return $user;
        }
        
        
        }
    }
?>