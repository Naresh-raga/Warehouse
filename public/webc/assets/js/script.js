// Hide Navbar on scroll down
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-80px"; /* width horizontal navbar */
  }
  prevScrollpos = currentScrollPos;

}

const mainNavigation = document.querySelector(".main-navigation");
const overlay = mainNavigation.querySelector(".overlay");
const toggler = mainNavigation.querySelector(".navbar-toggler");

const openSideNav = () => mainNavigation.classList.add("active");
const closeSideNav = () => mainNavigation.classList.remove("active");
toggler.addEventListener("click", openSideNav);
overlay.addEventListener("click", closeSideNav); 

// Scroll to top
document.addEventListener("DOMContentLoaded", function () {
    window.addEventListener('scroll', function () {
        if (window.scrollY > 150) {
            document.getElementById('navbar_top').classList.add('fixed-top');
            // add padding top to show content behind navbar
            navbar_height = document.querySelector('.navbar').offsetHeight;
            document.body.style.paddingTop = navbar_height + 'px';
        } else {
            document.getElementById('navbar_top').classList.remove('fixed-top');
            // remove padding top from body
            document.body.style.paddingTop = '0';
        }
    });
});

$(function () {
  var header = $(".navigation-bar");

  $(window).scroll(function () {
      var scroll = $(window).scrollTop();
      if (scroll >= 50) {
          header.addClass("scrolled");
      } else {
          header.removeClass("scrolled");
      }
  });

});

$(document).ready(function () {
  var owl = $("#service-slider");
  owl.owlCarousel({
      margin: 30,
      nav: true,
      loop: true,
      dots:false,
      autoplay: false,
      autoplayTimeout: 4500,
      responsive: {
          0: {
              items: 1,
          },
          600: {
              items: 2,
          },
          1000: {
              items: 3,
          },
      },
  });
});

$(document).ready(function () {
    var owl = $("#testimonial");
    owl.owlCarousel({
        margin: 30,
        nav: true,
        loop: true,
        dots:false,
        autoplay: false,
        autoplayTimeout: 3500,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });
  });


var btn = $('#button-top');
$(window).scroll(function() {
if ($(window).scrollTop() > 300) {
    btn.addClass('show');
} else {
    btn.removeClass('show');
}
});

btn.on('click', function(e) {
e.preventDefault();
$('html, body').animate({scrollTop:0}, '300');
});