$(document).ready(function() {
  // Important Accordian JS
    $(".accordion-home > div").hide();
    $(".accordion-home > h4").click(function() {
    $(this).next("div").slideToggle("slow").siblings("div:visible").slideUp("slow");
    $(this).toggleClass("active");
    $(this).siblings("h4").removeClass("active");
  });
});