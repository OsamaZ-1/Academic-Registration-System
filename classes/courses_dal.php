<?php
    class Course_DAL extends DAL{

        public function getCourses($year, $semester, $major){
            $sql = "SELECT * FROM courses WHERE `Year` = $year AND Semester = $semester AND Major = $major";
            return $this->getData($sql);
        }

        public function getAllCourses()
        {
            $sql = "SELECT C.CourseCode,
                           C.CourseName,
                           C.Year,
                           C.Semester,
                           C.Optional,
                           M.Major
                    FROM Courses AS C, Majors AS M
                    WHERE C.Major = M.Id";

            return $this -> getData($sql);
        }

        public function getCourseAsCode($code){
            $conn = $this->getConnection();
            $code= mysqli_real_escape_string( $conn, $code );
            $sql="SELECT
            courses.CourseId,
            courses.CourseCode,
            courses.CourseName,
            courses.Credits,
            courses.Prerequisite,
            courses.Major,
            courses.Year,
            courses.Semester,
            courses.Optional
        FROM
            courses
        WHERE
            courses.CourseCode = '$code'";
            return $this->getDataAssoc($sql);
        }

        public function getCourseCreditsAssoc($year){
            $sql = "SELECT CourseId, Credits FROM Courses WHERE `Year` = $year";
            $res = $this->getData($sql);
            $arr = array();
            foreach ($res as $r){
                $arr += array($r["CourseId"] => $r["Credits"]);
            }
    
            return $arr;
        }

        public function getIdFromCode($code){
            $sql = "SELECT CourseId FROM Courses WHERE CourseCode = \"$code\"";
            $res = $this->getData($sql);
            return $res[0]["CourseId"];
        }

        public function getCodeFromId($id){
            $sql = "SELECT CourseCode FROM Courses WHERE CourseId = \"$id\"";
            $res = $this->getData($sql);
            return $res[0]["CourseCode"];
        }

        public function getOptionalCourseGroup($course_id){
            $sql = "SELECT `Group` FROM `optional_groups` WHERE CourseId = $course_id";
            $res = $this->getData($sql);
            return $res[0]["Group"];
        }

        public function getMaxCreditsOfGroup($group){
            $sql = "SELECT Credits FROM `optional_groups` WHERE `Group` = $group LIMIT 1";
            $res = $this->getData($sql);
            return $res[0]["Credits"];
        }

        public function getTotalCourses(){
            $sql="SELECT COUNT(courses.CourseId) AS 'total_courses' FROM courses";
            $res=$this->getDataAssoc($sql);
            return $res['total_courses'];
        }

        public function getCoursesExceptRegistered($courses){
            $connection = $this->getConnection();
            $escapedValues = array_map(function ($value) use ($connection) {
                return "'" . mysqli_real_escape_string($connection, $value) . "'";
            }, $courses);
            $courses_string=implode(',', $escapedValues);
            $sql="SELECT courses.CourseCode,courses.CourseName FROM courses WHERE courses.CourseCode NOT IN (".$courses_string.")";
            
            return $this->getData($sql);
        }

        public function getYearCourseCount($major, $year, $sem){
            $sql="SELECT COUNT(courses.CourseId) AS 'total_courses' FROM courses WHERE Major = $major AND `Year` = $year AND Semester = $sem";
            $res=$this->getDataAssoc($sql);
            return $res['total_courses'];
        }

    }
?>