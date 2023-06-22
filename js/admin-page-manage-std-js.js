$(document).ready(function () {
  $("#student_courses_table").dataTable();
  $(".reject-student-registration-submit-btn").on("click", function () {
    var stdId = parseInt(
      $("#student_info_table")
        .find("tr:eq(0)")
        .find("td:eq(0)")
        .find("span:eq(0)")
        .text()
    );
    $.ajax({
      url: "http://localhost/Academic-Registration/Actions/reject_student_registration_courses.php",
      type: "POST",
      data: {
        stdId: stdId,
      },
      dataType: "json",
      success: function (dataResult) {
        if (dataResult.result) {
          swal(
            "Reject Student Rejester",
            "You Reject The Request Of Student To Rejester Courses",
            "success"
          ).then((value) => {
            window.location.reload();
          });
        } else {
          swal("Reject Student Rejester", dataResult.error, "error");
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: " + textStatus + " " + errorThrown);
      },
    });
  });
  $(".delete-course-from-student-btn").on("click", function () {
    $(this).closest("tr").remove();
  });
  $("#add_course_to_student_btn").on("click", function () {

    var coursesCodeArray = [];
    // Iterate over each row in the table body
    $("#student_courses_table tbody tr").each(function () {
      var value = $(this).find("td:eq(1)").text();
      // Add the row to the array
      coursesCodeArray.push(value);
    });
    $('#select_courses').empty();
    $.ajax({
        url: "http://localhost/Academic-Registration/Actions/get_courses_not_registed.php",
        type: "POST",
        data: {
            coursesCodeArray: coursesCodeArray,
        },
        dataType: "json",
        success: function (response) {
            $.each(response, function(index, course) {
                // Access the student properties
                var courseCode=course.CourseCode;
                $('#select_courses').append("<option value='"+courseCode+"'>"+courseCode+"</option>");
                //add to select
                /*var studentInfo = 'ID: ' + studentId + ', Name: ' + studentName + ', Age: ' + studentAge;
                $('#studentList').append('<li>' + studentInfo + '</li>');*/
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: " + textStatus + " " + errorThrown);
        },
      });
  });

  $("#add_course_to_student_modal_btn").on("click", function () {
    var courseCode=$('#select_courses').val();
    $.ajax({
        url: "http://localhost/Academic-Registration/Actions/get_course_as_code.php",
        type: "POST",
        data: {
            courseCode: courseCode,
        },
        dataType: "json",
        success: function (course) {
            var row='<tr><td>'+course.CourseId+'</td><td>'+course.CourseCode+'</td><td>'+course.CourseName+'</td><td>'+course.Credits+'</td><td>'+course.Semester+'</td><td><button class="btn btn-outline-danger delete-course-from-student-btn"><i class="fa-sharp fa-solid fa-trash"></i></button></td></tr>';
            $('#student_courses_table').append(row);
            $('#coursesModal').modal('hide');
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: " + textStatus + " " + errorThrown);
        },
      });
  });

  $('#submit-student-registration-btn').on('click',function(){
    var stdId = parseInt(
        $("#student_info_table")
          .find("tr:eq(0)")
          .find("td:eq(0)")
          .find("span:eq(0)")
          .text()
      );
    var message=$("#admin_message").val();
    var coursesCodeArray = [];
    // Iterate over each row in the table body
    $("#student_courses_table tbody tr").each(function () {
      var value = $(this).find("td:eq(1)").text();
      // Add the row to the array
      coursesCodeArray.push(value);
    });
    $.ajax({
        url: "http://localhost/Academic-Registration/Actions/accept_student_registration_submited.php",
        type: "POST",
        data: {
            stdId:stdId,
            courses: coursesCodeArray,
            adminMessage:message
        },
        dataType: "json",
        success: function (response) {
            if(response.result==1){
                swal("Student Registration Success", "You Submit The Register of Student In Courses", "success").then((value) => {
                    window.location.href="admin-page-student-request-rejester.php?status=2";
                  });
            }
            else {
                swal("Student Registration Failed", response.error, "danger");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: " + textStatus + " " + errorThrown);
        },
      });
  });
});
