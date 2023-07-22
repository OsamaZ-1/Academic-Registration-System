<?php
    $student_grades = $grade_dal->getGradesForStudent($student_id, $enrollment_date);
    $count = 0;
    foreach ($student_grades as $grade)
        if ($grade["Grade"] != NULL)
            ++$count;

    if ($count == count($student_grades))
        $student_dal->incrementYear($student_id);
?>