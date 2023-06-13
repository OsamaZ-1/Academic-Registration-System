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

        public function getAverage($student_id, $year, $semester){
            $sql = "SELECT C.CourseId, G.Grade
                    FROM Courses As C, Grades AS G
                    WHERE G.CourseId = C.CourseId 
                    AND G.StudentId = $student_id 
                    AND C.Year = $year
                    AND C.Semester = $semester";

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

            return $gradeSum / $creditSum;
        }

        public function passedWithAverage($student_id){
            $avg1 = $this->getAverage($student_id, 1, 1);
            $avg2 = $this->getAverage($student_id, 1, 2);
            $avg = ($avg1 + $avg2) / 2;

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

        public function updateStudentEmailPassword($studentId, $email, $password)
        {   
            
            $sql = "UPDATE Students SET
                    Email = '{$email}',
                    Password = '{$password}'
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
        
        public function addStudent($student_id,$fname,$lname,$email,$password,$major,$year,$enrolment_date){
            $conn = $this->getConnection();
            $student_id= mysqli_real_escape_string( $conn, $student_id );
            $fname= mysqli_real_escape_string( $conn, $fname);
            $lname= mysqli_real_escape_string( $conn, $lname );
            $email= mysqli_real_escape_string( $conn, $email );
            $password= mysqli_real_escape_string( $conn, $password );
            $major= 1;
            $year= 1;
            $enrolment_date='2022-2023';
            $sql="INSERT
            INTO
                students(
                    students.StudentId,
                    students.Fname,
                    students.Lname,
                    students.Email,
                    students.Password,
                    students.Major,
                    students.Year,
                    students.EnrollmentDate
                )
            VALUES(
                $student_id,
                '$lname',
                '$fname',
                '$email',
                '$password',
                $major,
                $year,
                '$enrolment_date'
            )";
            return $this->update($sql);
        }
    }
?>