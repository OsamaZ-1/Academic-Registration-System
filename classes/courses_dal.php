<?php
    class Course_DAL extends DAL{
        public function getCourses($year, $semester){
            $conn = $this->getConnection();
            $sql = "SELECT * FROM courses WHERE `Year` = $year AND Semester = $semester";
            return $this->getData($sql);
        }
    }
?>