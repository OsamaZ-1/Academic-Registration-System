//For Table Filters
$(document).ready(function(){
  $("#students_grades_table").dataTable();
  $("#courses_table").dataTable();
  $("#courses_grades_table").dataTable();

  $('#courses_table').on('click', '.btn-assign-grades', function () {
     var courseCode=$(this).parent().parent().find("td:eq(0)").text();
     window.location.href='admin-page-course-grades-assign.php?courseCode='+courseCode;
  });

  $('#submit_course_grades').on('click',function(){
    let courseCode=$('.course_code').text();
    let gradesArray=[];
    let studentsIdArray=[];
    $('.student_course_grade').each(function() {
      var textFieldValue = $(this).val();
      gradesArray.push(textFieldValue);
    });
    $('.studentId').each(function(){
      var stdId=parseInt($(this).text());
      studentsIdArray.push(stdId);
    });

    $.ajax({
      url: "Actions/add_course_grades.php",
      type: "POST",
      data: {
        courseCode:courseCode,
        studentsId:studentsIdArray,
        courseGrades:gradesArray
      },
      dataType: "json",
      success: function (dataResult) {
        if (dataResult.result) {
          swal(
            "Submit Course Grade Success",
            "You Submit The Grades Of Course "+courseCode,
            "success"
          ).then((value) => {
            window.location.href='admin-page-assign-grades.php';
          });
        } else {
          swal("Submit Course Grade Failed!!", dataResult.error, "error");
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: " + textStatus + " " + errorThrown);
      },
    });
  });
});

