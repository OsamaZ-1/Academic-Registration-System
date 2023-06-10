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

        public function getGradesAssocArray($student_id){
            $sql = "SELECT CourseId, Grade FROM Grades WHERE StudentId = $student_id";
            $res = $this->getData($sql);
            $arr = array();
            foreach ($res as $r){
                $arr += array($r["CourseId"] => $r["Grade"]);
            }
            return $arr;
        }

        public function passedWithAverage($student_id){
            $sql = "SELECT C.CourseId, G.Grade
                    FROM Courses As C, Grades AS G
                    WHERE G.CourseId = C.CourseId 
                    AND G.StudentId = $student_id 
                    AND C.Year = 1";

            $grades = $this->getData($sql);

            $course_dal = new Course_DAL();
            $credits = $course_dal->getCourseCreditsAssoc(1);

            $creditSum = 0;
            $gradeSum = 0;
            foreach ($grades as $g){
                $grade = $g["Grade"];
                $credit = $credits[$g["CourseId"]];
                $gradeSum += $grade*$credit;
                $creditSum += $credit;
            }

            $avg = $gradeSum / $creditSum;
            if ($avg > 49.99)
                return true;
            return false;
        }

        public function updateStudentProfile($studentId, $email, $password, $image)
        {   
            
            $sql = "UPDATE Students SET
                    Email = '{$email}',
                    Password = '{$password}',
                    Image = '{$image}'
                    WHERE StudentId = $studentId";
            
            $result = $this -> update($sql);
            
            return $result;
        }

        public function getStudentImage($student_id)
        {
            $sql = "SELECT Image FROM Students WHERE StudentId = $student_id";

            $result = $this -> getDataAssoc($sql);
            return $result;
        }
    }
?>