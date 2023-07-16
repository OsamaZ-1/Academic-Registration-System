$(document).ready(function(){
    $("#admins_table").dataTable();
    $("#add_admin_btn").on("click",function(){
        window.location.href="admin-page-add-admin.php";
    });
    $("#add_admin_form").on('submit',function(){
        var formData = new FormData(this);
        
        $.ajax({
            url: "actions/add_admin.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (dataResult) {
              if (dataResult.result) {
                swal("Add Admin Success", "", "success").then((value) => {
                  window.location.href='admin-page-show-admins.php';
                });
              } else {
                swal("Add Admin Failed", dataResult.error, "error");
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {
              console.log("Error: " + textStatus + " " + errorThrown);
            },
          });
          
        return false;
    });
    $(".edit_user_btn").on("click",function(){
        var id=parseInt($(this).parent().parent().find("td:eq(0)").text());
        window.location.href='edit_user.php?id='+id;
    });
    
    $("#edit_user_form").on('submit',function(){
        var formData = new FormData(this);
        
        $.ajax({
            url: "actions/edit_user.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
           
            dataType: "json",
            success: function (dataResult) {
              if (dataResult.result) {
                swal("Edit user Success", "", "success").then((value) => {
                  window.location.href='show_users.php';
                });
              } else {
                swal("Edit user Failed", dataResult.error, "error");
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {
              console.log("Error: " + textStatus + " " + errorThrown);
            },
          });
          
        return false;
    });
    $(".delete_admin_btn").on("click",function(){
        var id=parseInt($(this).parent().parent().find("td:eq(0)").text());
        var title=$(this).parent().parent().find("td:eq(1)").text();
        swal({
            title: "Delete admin",
            text: "Do You Want To Delete admin " + title,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
               $.ajax({
            url: "actions/delete_admin.php",
            type: "POST",
            data: {id:id},
            dataType: "json",
            success: function (dataResult) {
              if (dataResult.result) {
                swal("Delete admin Success", "", "success").then((value) => {
                  window.location.href='admin-page-show-admins.php';
                });
              } else {
                swal("Delete admin Failed", dataResult.error, "error");
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {
              console.log("Error: " + textStatus + " " + errorThrown);
            },
          });
            } else {
              swal("Your admin is safe!");
            }
          });
        
        
    });
});