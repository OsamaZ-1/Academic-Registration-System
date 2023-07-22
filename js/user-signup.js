$(document).ready(function(){
  $("#signup_form").on('submit',function(){
      var formData = new FormData(this);
      $.ajax({
          url: "actions/user_signup.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          dataType: "json",
          success: function (dataResult) {
            if (dataResult.result) {
              swal("Successfully Registered Wait for Acceptance", "", "success").then((value) => {
                window.location.href='login.php';
              });
            } else {
              swal("Unsuccessfull Registration", dataResult.error, "error");
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error: " + textStatus + " " + errorThrown);
          },
        });
        
      return false;
  });});