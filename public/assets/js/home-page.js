$(document).ready(function() {
  // Client Logo Slider JS  
  $(".client-logo-slick-slider-home").slick({
    arrows: false,
    dots: false,
    infinite: true,
    speed: 1000,
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [{
     breakpoint: 1024,
     settings: {
      slidesToShow: 4,
      slidesToScroll: 1
     }
    }, {
     breakpoint: 600,
     settings: {
      slidesToShow: 1,
      slidesToScroll: 1
     }
    }, {
     breakpoint: 480,
     settings: {
      slidesToShow: 1,
      slidesToScroll: 1
     }
    }]
  });
  // Testimonial Slider JS  
  $(".testimonials-slick-slider-home").slick({
    arrows: false,
    dots: true,
    infinite: true,
    speed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    responsive: [{
     breakpoint: 1024,
     settings: {
      slidesToShow: 1,
      slidesToScroll: 1
     }
    }, {
     breakpoint: 600,
     settings: {
      slidesToShow: 1,
      slidesToScroll: 1
     }
    }, {
     breakpoint: 480,
     settings: {
      slidesToShow: 1,
      slidesToScroll: 1
     }
    }]
  });
  // On Scroll Transcription, Translation and Speak Icon-Heading-Desc Section JS
  var ttsIhdOffsetHome = $(".bg-tts-icon-heading-desc-home").offset().top - 500;
  $(window).scroll(function() {
    var windScllTop = $(window).scrollTop();
    if (ttsIhdOffsetHome < windScllTop) {
      $(".panel-tts-ihd-home-one").addClass("active");
      $(".panel-tts-ihd-home-two").addClass("active");
      $(".panel-tts-ihd-home-three").addClass("active");
    } else {
      $(".panel-tts-ihd-home-one").removeClass("active");
      $(".panel-tts-ihd-home-two").removeClass("active");
      $(".panel-tts-ihd-home-three").removeClass("active");
    }
  });
  // On Scroll Company Information Section JS
  var compInfoOffsetHome = $(".bg-company-info-home").offset().top - 400;
  $(window).scroll(function() {
    var windScllTop = $(window).scrollTop();
    if (compInfoOffsetHome < windScllTop) {
      $(".company-info-home-one").addClass("active");
      $(".company-info-home-two").addClass("active");
    } else {
      $(".company-info-home-one").removeClass("active");
      $(".company-info-home-two").removeClass("active");
    }
  });
  // On Scroll Price Table Section JS
  var priceTableOffsetHome = $(".bg-price-table-home").offset().top - 700;
  $(window).scroll(function() {
    var windScllTop = $(window).scrollTop();
    if (priceTableOffsetHome < windScllTop) {
      $(".panel-tts-bap").addClass("active");
    } else {
      $(".panel-tts-bap").removeClass("active");
    }
  });
});
// On Window Load JS
$(window).on("load",function() {
  // Banner JS
  $(".banner-info-home").addClass("active");
  // On Scroll Transcription, Translation and Speech Production Box Section JS
  $(".panel-ttsp-home-one").addClass("active");
  $(".panel-ttsp-home-two").addClass("active");
  $(".panel-ttsp-home-three").addClass("active");
});