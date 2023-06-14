<?php
    $course_id = $c["CourseId"];

    if ($temp_course_year == 1){
        //disable all 1st year courses if the student passed with average
        if ($passedWithAvg)
            echo "disabled";
        //disable only passed courses if student passed with credits
        else if ($student_grades[$course_id] > 49.99 || ($compensation && $student_grades[$course_id] > 39.99))
            echo "disabled";
    }

    else if ($student_year >= $temp_course_year){
        //if student passed with average then there is no need to disable any checkboxes from 2nd year table
        //so only check for pre-requisites and disable checkboxes in tables that are not 2nd year or are but without passing by average
        if ($temp_course_year != 2 || ($temp_course_year == 2 && !$passedWithAvg)){

            //check if course has pre-requisite
            $pre_requisite = $c["Prerequisite"];
            if ($pre_requisite != ""){
                //check if student passed all pre-requisites
                $pre_requisite_arr = explode("-", $pre_requisite);
                foreach ($pre_requisite_arr as $pre){
                    $pre_id = $courses_dal->getIdFromCode($pre);

                    //if pre-requisite does not have a mark: check it, else assume pre-requisite is failed and disable
                    if (array_key_exists($pre_id, $student_grades)){
                        $pre_grade = $student_grades[$pre_id];
                        //disable courses where the student failed the pre-requisites
                        if ($pre_grade < 40.00 || (!$compensation && $pre_grade < 50.00)){
                            echo "disabled";
                            break;
                        }
                    }
                    else{
                        echo "disabled";
                    }
                }
            }
        }
        //check if there is a mark for the student in the db
        if (array_key_exists($course_id, $student_grades)){

            //disable courses with passed marks
            $course_grade = $student_grades[$course_id];
            if ($course_grade > 49.99  || ($compensation && $course_grade > 39.99))
                echo "disabled";
        }
    }
    else{
        //disable courses from future years
        echo "disabled";
    }
?>