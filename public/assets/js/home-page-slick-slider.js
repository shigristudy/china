$(document).ready(function() {
  // Client Logo Slider JS  
  $(".client-logo-slick-slider-home").slick({
    arrows: false,
    dots: false,
    infinite: true,
    speed: 700,
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
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
    speed: 700,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
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
  // Important Accordian JS
  $(".accordion-home > h4:first").addClass("active");
  $(".accordion-home > div:not(:first)").hide();
  $(".accordion-home > h4").click(function() {
    $(this).next("div").slideToggle("slow").siblings("div:visible").slideUp("slow");
    $(this).toggleClass("active");
    $(this).siblings("h4").removeClass("active");
  }); 
});