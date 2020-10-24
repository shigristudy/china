// On Scroll Logo - Navbar Add and Remove BG JS
$(window).scroll(function(){
    if ($(window).scrollTop() >= 10) {
        $(".bg-logo-navbar-desktop-home").addClass('active');
        $(".bg-logo-hamburger-menu-mob-tab-home").addClass('active'); // For Mobile + Tab
        $(".menu-listing").addClass("active");
    } else {
        $(".bg-logo-navbar-desktop-home").removeClass('active');
        $(".bg-logo-hamburger-menu-mob-tab-home").removeClass('active'); // For Mobile + Tab
        $(".menu-listing").removeClass("active");
    }
});