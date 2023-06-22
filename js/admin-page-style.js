$(document).ready(function(){
    $(".open-btn").on("click", function() {
        $("#slide_nav").addClass("active");
        $("#slide_nav").addClass("openSide");
        $(".content").addClass("openSide");
        $("#slide_nav").removeClass("closeSide");
        $(".content").removeClass("closeSide");
        $(".open-btn").removeClass("displayIt");
    });
    $(".close-btn").on("click", function() {
        $("#slide_nav").removeClass("active");
        $("#slide_nav").removeClass("openSide");
        $(".content").removeClass("openSide");
        $("#slide_nav").addClass("closeSide");
        $(".content").addClass("closeSide");

        $(".open-btn").addClass("displayIt");
    });
});