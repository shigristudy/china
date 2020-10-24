$(document).ready(function() {
  // On Scroll Price Table Section JS
  var priceTableOffsetTp = $(".bg-price-table-transcription").offset().top - 500;
  $(window).scroll(function() {
    var windScllTop = $(window).scrollTop();
    if (priceTableOffsetTp < windScllTop) {
      $(".panel-transcription").addClass("active");
    } else {
      $(".panel-transcription").removeClass("active");
    }
  });
  // On Scroll Box Information Section JS
  var boxInfoOffsetTp = $(".bg-esgz-transcription").offset().top - 500;
  $(window).scroll(function() {
    var windScllTop = $(window).scrollTop();
    if (boxInfoOffsetTp < windScllTop) {
      $(".box-esgz-information-transcription-pg-one").addClass("active");
      $(".box-esgz-information-transcription-pg-two").addClass("active");
      $(".box-esgz-information-transcription-pg-three").addClass("active");
      $(".box-esgz-information-transcription-pg-four").addClass("active");
    } else {
      $(".box-esgz-information-transcription-pg-one").removeClass("active");
      $(".box-esgz-information-transcription-pg-two").removeClass("active");
      $(".box-esgz-information-transcription-pg-three").removeClass("active");
      $(".box-esgz-information-transcription-pg-four").removeClass("active");
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