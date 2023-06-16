<?php
    class Course_DAL extends DAL{
        public function getCourses($year, $semester, $major){
            $sql = "SELECT * FROM courses WHERE `Year` = $year AND Semester = $semester AND Major = $major";
            return $this->getData($sql);
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
    }
?>