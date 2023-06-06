<?php
    class Course_DAL extends DAL{
        public function getCourses($year, $semester, $major){
            $sql = "SELECT * FROM courses WHERE `Year` = $year AND Semester = $semester AND Major = $major";
            return $this->getData($sql);
        }
    }
?>