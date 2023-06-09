<tr>
    <th colspan="4" align="center" class="table-title">Semester <?php echo $temp_course_sem;?>  Grades</th>
</tr>
<tr>
    <th class="attributes">Course Code</th>
    <th class="attributes">Course Name</th>
    <th class="attributes">Credits</th>
    <th class="attributes">Grade</th>
</tr>
<tbody>
<?php
    $grades = $student_dal->getStudentGrades($student_id, $year_grades, $temp_course_sem);
    $optional_courses = array();
    foreach ($grades as $c){
        if ($c["Optional"] != 1){
?>
<tr>
    <td><?php echo $c["CourseCode"]; ?></td>
    <td><?php echo $c["CourseName"]; ?></td>
    <td><?php echo $c["Credits"]; ?></td>
    <td <?php if($c["Grade"]>=40 && $c["Grade"]<50) echo 'class="compensation"';
              else if($c["Grade"]<40) echo 'class="failed"';
              else echo 'class="passed"';
        ?>
    ><?php echo $c["Grade"]; ?></td>
</tr>
<?php
        }else{
            array_push($optional_courses, $c);
        }
    }

    if (count($optional_courses) > 0){
?>
<tr>
    <th colspan="4" align="center" class="table-title">Optional Courses</th>
</tr>
<?php
        foreach ($optional_courses as $c){
?>
<tr>
    <td><?php echo $c["CourseCode"]; ?></td>
    <td><?php echo $c["CourseName"]; ?></td>
    <td><?php echo $c["Credits"]; ?></td>
    <td <?php if($c["Grade"]>=40 && $c["Grade"]<50) echo 'class="compensation"';
              else if($c["Grade"]<40) echo 'class="failed"';
              else echo 'class="passed"';
        ?>
    ><?php echo $c["Grade"]; ?></td>
</tr>
<?php
        }
    }
?>
</tbody>