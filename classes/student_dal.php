<?php
    class Student_DAL extends DAL {
        public function getStudentMajor($email, $pass){
            $sql = "SELECT Major FROM students WHERE Email = '$email' AND `Password` = '$pass'";
            $major = $this->getData($sql);
            return $major[0]["Major"];
        }
    }
?>