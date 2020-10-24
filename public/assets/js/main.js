$(document).ready(function() {

	// Hamburger Menu and Navbar JS ( Mobile + Tab )
	$(".burger-menu").click(function() {
		$(".fixed-navbar-menu-mob-tab").addClass("active");
		$(".bg-blur").addClass("active");
		$("body").addClass("active");
	});
	$(".bg-blur").click(function() {
		$(".fixed-navbar-menu-mob-tab").removeClass("active");
		$(this).removeClass("active");
		$("body").removeClass("active");
	});
	// Navbar Menu JS ( Mobile + Tab )
	$(".menu-listing-mob-tab > li > a").click(function() {
		// e.preventDefault();
		$(".menu-listing-mob-tab > li > a").parent().removeClass("active");
		$(this).parent().addClass("active");
		$(".menu-listing-mob-tab > li > ul").slideUp(), $(this).next().is(":visible") || $(this).next().slideDown()
	});
	// Scroll To Top JS
  var scrollToTopoffset = 200;
  var scrollToTopDuration = 500;
  $(window).scroll(function() {
    if($(this).scrollTop() > scrollToTopoffset) {
      $(".scroll-to-top-home").addClass("active");
    } else {
      $(".scroll-to-top-home").removeClass("active");
    }
  });
  $(".scroll-to-top-home > a").click(function() {
    $('html,body').animate({scrollTop: 0},2000);
  });
  $("p > a.question").click(function () {
      $('body,html').animate({ scrollTop: $('body').height() }, 2000);
  });
  $("li > a.contact_us").click(function () {
      $('body,html').animate({ scrollTop: $('body').height() }, 2000);
  });
  // Search JS
  $(".menu-listing > li > a > i.header-search, .search-in-mob-tab > i").click(function() {
  	$("body").addClass("active");
  	$(".fixed-search-pop-up-home").addClass("active");
  });
  $(".search-pop-up-close-home > img").click(function() {
  	$("body").removeClass("active");
  	$(".fixed-search-pop-up-home").removeClass("active");
  });
});
$(window).on('load', function() { // makes sure the whole site is loaded 
  // $('#status').fadeOut(); // will first fade out the loading animation 
  // $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  // 
  $('body').addClass("loaded");
});