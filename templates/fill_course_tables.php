<tr>
    <td colspan="4" align="center"><b>Primary Courses</b></td>
</tr>
<tr>
    <th>Course Code</th>
    <th>Course Name</th>
    <th>Credits</th>
    <th>Choose</th>
</tr>
<tbody>
<?php
    $courses = $courses_dal->getCourses($temp_course_year, $temp_course_sem);
    $optional_courses = array();
    foreach ($courses as $c){
        if ($c["Optional"] != 1){
?>
<tr>
    <td><?php echo $c["CourseCode"]; ?></td>
    <td><?php echo $c["CourseName"]; ?></td>
    <td><?php echo $c["Credits"]; ?></td>
    <td><input type='checkbox' value="<?php echo $c['CourseId']; ?>" /></td>
</tr>
<?php
        }else{
            array_push($optional_courses, $c);
        }
    }

    if (count($optional_courses) > 0){
?>
<tr>
    <td colspan="4" align="center"><b>Optional Courses</b></td>
</tr>
<?php
        foreach ($optional_courses as $c){
?>
<tr>
    <td><?php echo $c["CourseCode"]; ?></td>
    <td><?php echo $c["CourseName"]; ?></td>
    <td><?php echo $c["Credits"]; ?></td>
    <td><input type='checkbox' name="select-box" value="<?php echo $c['CourseId']; ?>" /></td>
</tr>
<?php
        }
    }
?>
</tbody>