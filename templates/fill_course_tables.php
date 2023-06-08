<tr>
    <th colspan="4" align="center" class="table-title">Primary Courses</th>
</tr>
<tr>
    <th class="attributes">Course Code</th>
    <th class="attributes">Course Name</th>
    <th class="attributes">Credits</th>
    <th class="attributes">Choose</th>
</tr>
<tbody>
<?php
    $courses = $courses_dal->getCourses($temp_course_year, $temp_course_sem, $student_major);
    $optional_courses = array();
    foreach ($courses as $c){
        if ($c["Optional"] != 1){
?>
<tr>
    <td><?php echo $c["CourseCode"]; ?></td>
    <td><?php echo $c["CourseName"]; ?></td>
    <td><?php echo $c["Credits"]; ?></td>
    <td>
       <div class="checkbox-wrapper-64">
         <label class="switch">
           <input type='checkbox' class="course-checkbox" name="select-box" value="<?php echo $c['CourseId']; ?>" onchange="countCredits()" />
           <span class="slider"></span>
          </label>
        </div>
        <input type='hidden' name="select-credit" value="<?php echo $c['Credits']; ?>" />
    </td>
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
    <td>
       <div class="checkbox-wrapper-64">
         <label class="switch">
          <input type='checkbox' name="select-box" value="<?php echo $c['CourseId']; ?>" onchange="countCredits()" />
          <span class="slider"></span>
         </label>
       </div>
       <input type='hidden' name="select-credit" value="<?php echo $c['Credits']; ?>" />
    </td>
</tr>
<?php
        }
    }
?>
</tbody>