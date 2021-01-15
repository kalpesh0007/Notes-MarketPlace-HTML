$(".toggle-password").click(function() {

    $(this).toggleClass("src", "../img/pre-login/eye.png");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
});


/* =========================================
              Navigation
============================================ */

function stickyHeader() {
  var headerHeight = jQuery('.navbar').innerHeight() / 2;
  var scrollTop = jQuery(window).scrollTop();;
  if (scrollTop > headerHeight) {
      jQuery('body').addClass('stickyNav')
      $(".navbar img").attr("src", "../img/home/logo.png");
  } else {
      jQuery('body').removeClass('stickyNav')
      $(".navbar img").attr("src", "../img/home/top-logo.png");
  }
}

jQuery(document).ready(function () {
  stickyHeader();
});

jQuery(window).scroll(function () {
  stickyHeader();  
});
jQuery(window).resize(function () {
  stickyHeader();
});