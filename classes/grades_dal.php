<?php

    class Grades_DAL extends DAL{

      public function getAllStudentsGrades()
      {
          $sql = "SELECT C.CourseCode, 
                         C.CourseName,
                         C.Credits,
                         G.StudentId,
                         S.Fname,
                         S.Lname,
                         M.Major,
                         G.Grade
                         FROM Courses As C, Grades AS G, Students AS S, Majors AS M
                         WHERE G.CourseId = C.CourseId 
                         AND S.StudentId = G.StudentId
                         AND M.Id = S.Major
                         AND G.Grade IS NOT NULL
                  ";
          $grades = $this -> getData($sql);
          return $grades;
      }

      public function editStudentCourseGrade($courseId,$studentId,$courseGrade){
        $conn = $this->getConnection();
        $courseId= mysqli_real_escape_string( $conn, $courseId );
        $studentId= mysqli_real_escape_string( $conn, $studentId );
        $courseGrade= mysqli_real_escape_string( $conn, $courseGrade );
        $sql="UPDATE Grades SET Grades.Grade=$courseGrade WHERE Grades.StudentId=$studentId AND Grades.CourseId=$courseId";
        return $this->update($sql);
      }
      
    }

?>