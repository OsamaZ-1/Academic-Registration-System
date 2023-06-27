//For Table Filters
$(document).ready(function(){
  $("#students_grades_table").dataTable();
  $("#courses_table").dataTable();
  $("#courses_grades_table").dataTable();

  $('.btn-assign-grades').on('click',function(){
     var courseCode=$(this).parent().parent().find("td:eq(0)").text();
     window.location.href='admin-page-course-grades-assign.php?courseCode='+courseCode;
  });
});

