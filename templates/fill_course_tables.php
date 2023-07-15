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

    //get the number of courses in this semester
    $semCount = $courses_dal->getYearCourseCount($student_major, $temp_course_year, $temp_course_sem);

    //if student didn't pass first year deny enrolling in Masters
    if ($temp_course_year == 1 && !$passedWithAvg)
        $enrollInMaster = false;
        
    
    if($enrollInMaster)
    {   //if student passed first year check the second year to determine if he can enroll in masters or not
        if($temp_course_year==2)
        {   //get the number of courses of first year
            $previousYearSem1 = $courses_dal -> getYearCourseCount($student_major, $temp_course_year - 1, 1);
            $previousYearSem2 = $courses_dal -> getYearCourseCount($student_major, $temp_course_year - 1, 2);
            $sum = $previousYearSem1 + $previousYearSem2;
            
            //if year2 sem2 get the number of courses of year2 sem1 courses
            if($temp_course_sem == 2)
            {
                $prevSem = $courses_dal -> getYearCourseCount($student_major, $temp_course_year, 1);
                $sum = $sum + $prevSem;
                
            }

            //loop the grades of this semester to check if there's unpassed course
            for ($i = $sum + 1; $i <= $sum+$semCount; ++$i){
            $grade = $student_grades["".$i];
            if ($grade < 40 || ($grade >= 40 && $grade < 50 && !$compensation)){
                $enrollInMaster = false;
                break;
            }
          }
        }
        
        //test grades of year 3
        if($temp_course_year==3)
        {   
            //get the number of courses of year2
            $previousYearSem1 = $courses_dal -> getYearCourseCount($student_major, $temp_course_year - 1, 1);
            $previousYearSem2 = $courses_dal -> getYearCourseCount($student_major, $temp_course_year - 1, 2);
            $sum1 = $previousYearSem1 + $previousYearSem2;

            //get the number of courses of year 1
            $previousYearSem1 = $courses_dal -> getYearCourseCount($student_major, $temp_course_year - 2, 1);
            $previousYearSem2 = $courses_dal -> getYearCourseCount($student_major, $temp_course_year - 2, 2);
            $sum2 = $previousYearSem1 + $previousYearSem2;

            $sum = $sum1 + $sum2;

            //if year3 sem2 get the number of courses of year3 sem1 courses
            if($temp_course_sem == 2)
            {
                $prevSem = $courses_dal -> getYearCourseCount($student_major, $temp_course_year, 1);
                $sum = $sum + $prevSem;
            }

            //loop the grades of this semester to check if there's unpassed course
            for ($i = $sum + 1; $i <= $sum+$semCount; ++$i){
            $grade = $student_grades["".$i];
            if ($grade < 40 || ($grade >= 40 && $grade < 50 && !$compensation)){
                $enrollInMaster = false;
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