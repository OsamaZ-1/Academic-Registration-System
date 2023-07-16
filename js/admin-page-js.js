$(document).ready(function(){
    $("#users_accounts_request_table").dataTable();
    $("#student_register_courses_request_table").dataTable();
    $("#delete_all_student_request_btn").on("click",function(){
      $.ajax({
        url: "http://localhost/Academic-Registration/Actions/delete_all_students_register_courses.php",
        type: "POST",
        data: {
          delete:1
        },
        dataType: "json",
        success: function (dataResult) {
          if (dataResult.result) {
            swal("Delete All Students Register Courses Success", "", "success").then((value) => {
              window.location.reload();
            });
          } else {
            swal("Delete All Students Register Courses Failed", dataResult.error, "error");
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: " + textStatus + " " + errorThrown);
        },
      });
    });
    $(".accept-student-account-btn").on("click",function(){
        var id = parseInt($(this).parent().parent().parent().find("td:eq(0)").text());
        $.ajax({
            url: "http://localhost/Academic-Registration/Actions/accept_user.php",
            type: "POST",
            data: {
              id: id,
            },
            dataType: "json",
            success: function (dataResult) {
              if (dataResult.result) {
                swal("Accept User Success", "", "success").then((value) => {
                  window.location.reload();
                });
              } else {
                swal("Accept User Failed", dataResult.error, "error");
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {
              console.log("Error: " + textStatus + " " + errorThrown);
            },
          });
    });

    $(".reject-student-account-btn").on("click",function(){
        var id = parseInt($(this).parent().parent().parent().find("td:eq(0)").text());
        $.ajax({
            url: "http://localhost/Academic-Registration/Actions/reject_user.php",
            type: "POST",
            data: {
              id: id,
            },
            dataType: "json",
            success: function (dataResult) {
              if (dataResult.result) {
                swal("Reject User Success", "You Reject The Request Of Student To Have Account", "success").then((value) => {
                  window.location.reload();
                });
              } else {
                swal("Reject User Failed", dataResult.error, "error");
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {
              console.log("Error: " + textStatus + " " + errorThrown);
            },
          });
    });

    $(".accept-student-registration-btn").on("click",function(){
      var stdId = parseInt($(this).parent().parent().parent().find("td:eq(0)").text());
      var courses_string=$(this).parent().parent().parent().find("td:eq(3)").text()
      var courses=courses_string.split('-');
        $.ajax({
            url: "Actions/accept_student_registration_courses.php",
            type: "POST",
            data: {
              stdId:stdId,
              courses:courses
            },
            dataType: "json",
            success: function (dataResult) {
              if (dataResult.result) {
                swal("Accept Student Rejester", "You Accept The Request Of Student To Rejester Courses", "success").then((value) => {
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

    $(".reject-student-registration-btn").on("click",function(){
      var stdId = parseInt($(this).parent().parent().parent().find("td:eq(0)").text());
        $.ajax({
            url: "http://localhost/Academic-Registration/Actions/reject_student_registration_courses.php",
            type: "POST",
            data: {
              stdId:stdId,
            },
            dataType: "json",
            success: function (dataResult) {
              if (dataResult.result) {
                swal("Reject Student Rejester", "You Reject The Request Of Student To Rejester Courses", "success").then((value) => {
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

    $(".manage-student-registration-btn").on('click',function(){
      var stdId = parseInt($(this).parent().parent().parent().find("td:eq(0)").text());
      window.location.href='admin-page-manage-student-regestration.php?stdId='+stdId;
    });
});