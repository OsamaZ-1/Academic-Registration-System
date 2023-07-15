<tr>
    <th colspan="5" align="center" class="table-title">Primary Courses</th>
</tr>
<tr>
    <th class="attributes">Course Code</th>
    <th class="attributes">Course Name</th>
    <th class="attributes">Credits</th>
    <th class="attributes">Prerequisite</th>
    <th class="attributes">Choose</th>
</tr>
<tbody>
<?php
    //check if student can pass some courses with compensation, this will be used to disable passed courses later
    if ($temp_course_year < $student_year)
        $compensation = $student_dal->getAverage($student_id, $temp_course_year, $temp_course_sem) > 54.99;

    //if this is the M1 table, check if the student is allowed to study M1
    if ($temp_course_year == 4){
        //get number of courses of first year
        $firstYearCount = $course_dal->getYearCourseCount($student_major, 1);
        $noMasters = false;
        //if student passed first year and does not carry any courses, check courses of other years
        if ($passedWithAvg){
            for ($i = $firstYearCount + 1; $i <= count($student_grades); ++$i){
                $grade = $student_grades["".$i];
                if ($grade < 40 || ($grade >= 40 && $grade < 50 && !$compensation)){
                    $noMasters = true;
                    break;
                }
            }
        }
    }

    //get courses to fill in the array
    $courses = $courses_dal->getCourses($temp_course_year, $temp_course_sem, $student_major);
    $optional_courses = array();
    foreach ($courses as $c){
        if ($c["Optional"] != 1){
?>
<tr>
    <td><?php echo $c["CourseCode"]; ?></td>
    <td><?php echo $c["CourseName"]; ?></td>
    <td><?php echo $c["Credits"]; ?></td>
    <td><?php echo $c["Prerequisite"]; ?></td>
    <td>
       <div class="checkbox-wrapper-64">
         <label class="switch">
           <input type='checkbox' class="course-checkbox" name="select-box[]" value="<?php echo $c['CourseId']; ?>" onchange="countCredits()" <?php require("disable_checkbox.php");?>/>
           <span class="slider"></span>
          </label>
        </div>
        <input type='hidden' name="select-credit" value="<?php echo $c['Credits']; ?>" />
    </td>
</tr>
<?php
        }else{
            //echo "<script>console.log('Debugging: getting group of $cc')</script>";
            $group = $courses_dal->getOptionalCourseGroup($c["CourseId"]);
            if (!array_key_exists($group, $optional_courses))
                $optional_courses += array($group => array());
            array_push($optional_courses[$group], $c);
        }
    }

    if (count($optional_courses) > 0){
        foreach ($optional_courses as $g => $group_courses){
            $maxCredits = $courses_dal->getMaxCreditsOfGroup($g);

?>
<tr>
    <th colspan="5" align="center" class="table-title">Optional Courses (Choose <?php echo $maxCredits;?> credits)</th>
    <input type="hidden" id="max-credits-<?php echo $g; ?>" value="<?php echo $maxCredits; ?>" />
</tr>
<?php
            foreach ($group_courses as $c){
?>
<tr>
    <td><?php echo $c["CourseCode"]; ?></td>
    <td><?php echo $c["CourseName"]; ?></td>
    <td><?php echo $c["Credits"]; ?></td>
    <td><?php echo $c["Prerequisite"]; ?></td>
    <td>
       <div class="checkbox-wrapper-64">
         <label class="switch">
          <input type='checkbox' name="optional-box-<?php echo $g.'[]'; ?>" value="<?php echo $c['CourseId']; ?>" onchange="optionalCourseCreditCounter(<?php echo $g; ?>)" <?php require("disable_checkbox.php");?>/>
          <span class="slider"></span>
         </label>
       </div>
       <input type='hidden' name="optional-credit-<?php echo $g; ?>" value="<?php echo $c['Credits']; ?>" />
    </td>
</tr>
<?php
            }
        }
    }
?>
</tbody>