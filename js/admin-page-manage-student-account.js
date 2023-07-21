$(document).ready(function(){
    $("#manage_student_account_form").on("submit",function(){
        formData=new FormData(this);
        $.ajax({
            url: "Actions/manage-student-account.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (dataResult) {
              if (dataResult.result) {
                swal("Edit Student Account Success", "", "success").then((value) => {
                  window.location.href='admin-page-import-users.php';
                });
              } else {
                swal("Edit Student Account Failed", dataResult.error, "error");
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {
              console.log("Error: " + textStatus + " " + errorThrown);
            },
          });
          
        return false;
    });
});