<?php
    class Student_DAL extends DAL {

        public function getStudentMajor($email, $password){
            $sql = "SELECT Major FROM Students WHERE Email = '$email' AND Password = '$password'";
            $major = $this -> getData($sql);
            return $major[0]["Major"];
        }

        public function getStudentInfo($email, $password)
        {
            $sql = "SELECT * FROM Students WHERE Email = '{$email}' AND Password = '{$password}'";
            $info = $this -> getData($sql);
            return $info;
        }
    }
?>