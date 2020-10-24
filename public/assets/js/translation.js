$(document).ready(function() {
  // On Scroll Icon + Heading and Description Section JS
  var ihdOffsetTrap = $(".bg-ihd-tts-pg").offset().top - 500;
  $(window).scroll(function() {
    var windScllTop = $(window).scrollTop();
    if (ihdOffsetTrap < windScllTop) {
      $(".tts-ihd-ott-one").addClass("active");
      $(".tts-ihd-ott-two").addClass("active");
      $(".tts-ihd-ott-three").addClass("active");
      $(".tts-ihd-ott-four").addClass("active");
    } else {
      $(".tts-ihd-ott-one").removeClass("active");
      $(".tts-ihd-ott-two").removeClass("active");
      $(".tts-ihd-ott-three").removeClass("active");
      $(".tts-ihd-ott-four").removeClass("active");
    }
  });
  // On Scroll Price Table Section JS
  var priceTableOffsetTrap = $(".bg-price-table-ts-pg").offset().top - 500;
  $(window).scroll(function() {
    var windScllTop = $(window).scrollTop();
    if (priceTableOffsetTrap < windScllTop) {
      $(".panel-ts").addClass("active");
    } else {
      $(".panel-ts").removeClass("active");
    }
  });
});
// On Window Load JS
$(window).on("load",function() {
  // Banner JS
  $(".banner-tts-heading-desc-pg").addClass("active");
  // Icon with Description Section JS
  $(".bg-iwd-tts-pg").addClass("active");
});