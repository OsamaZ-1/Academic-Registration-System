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

        public function getStudentGrades($student_id, $year, $semester)
        {
            $sql = "SELECT C.CourseCode, 
                           C.CourseName,
                           C.Credits,
                           C.Optional,
                           G.Grade
                           FROM Courses As C, Grades AS G
                           WHERE G.CourseId = C.CourseId 
                           AND G.StudentId = '{$student_id}' 
                           AND C.Year = '{$year}' 
                           AND C.Semester = '{$semester}'";
            $grades = $this -> getData($sql);
            return $grades;
        }
    }
?>