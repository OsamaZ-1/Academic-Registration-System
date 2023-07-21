$(document).ready(function(){
    $("#import_course_grades_form").on('submit',function(){
  
        var formData = new FormData(this);
        $.ajax({
            url: "actions/import_course_grades.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (dataResult) {
              if (dataResult.result) {
                swal("Import Grades Success", "", "success").then((value) => {
                  window.location.reload();
                });
              } else {
                swal("Import Grades Failed", dataResult.error, "error");
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {
              console.log("Error: " + textStatus + " " + errorThrown);
            },
          });
          
        return false;
    });
  });