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
    }

?>