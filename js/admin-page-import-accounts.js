$(document).ready(function(){
  $("#users_accounts_request_table").dataTable();
  $("#import_accounts_form").on('submit',function(){

      var formData = new FormData(this);
      $.ajax({
          url: "actions/import_students_accounts.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          dataType: "json",
          success: function (dataResult) {
            if (dataResult.result) {
              swal("Import Accounts Success", "", "success").then((value) => {
                window.location.href='admin-page-import-users.php';
              });
            } else {
              swal("Import Accounts Failed", dataResult.error, "error");
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error: " + textStatus + " " + errorThrown);
          },
        });
        
      return false;
  });

  
  $('#users_accounts_request_table').on('click', '.manage-student-account-btn', function () {
    var id = parseInt($(this).parent().parent().parent().find("td:eq(0)").text());
    window.location.href="admin-page-manage-student-account.php?stdId="+id;
 });
});