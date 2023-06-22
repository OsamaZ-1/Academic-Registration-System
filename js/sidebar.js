function inList(value, array) {
    for (var i = 0; i < array.length; i++) {
      if (value == array[i]) {
        return true;
      }
    }
    return false;
  }
  function activateSlideBar() {
    var pageURL = $(location).attr("href");
    var splitPageUrl = pageURL.split("//");
    var splitServerPageUrl = splitPageUrl[1].split("/");
    var pageNameArray = splitServerPageUrl[2].split("?");
    var pageName = pageNameArray[0];
    var dashbord = ["admin-page.php"];
    var students=['admin-page-student-request-rejester.php','admin-page-manage-student-regestration.php'];
    var users=['admin-page-request-users.php'];
    if (inList(pageName, dashbord)) {
      $(".dashbord").addClass(" active");
    } else if (inList(pageName, students)) {
      $(".students").addClass(" active");
    } else if (inList(pageName, users)) {
      $(".request-users").addClass(" active");
    } 
  }
  
  $(document).ready(function () {
    activateSlideBar();
  });
  