$(document).ready(function(){
    $("#users_accounts_request_table").dataTable();
    $("#student_register_courses_request_table").dataTable();
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
});