
        window.addEventListener("resize", function () {
            "use strict"; window.location.reload();
        });
        document.addEventListener("DOMContentLoaded", function () {
            /////// Prevent closing from click inside dropdown
            document.querySelectorAll('.dropdown-menu').forEach(function (element) {
                element.addEventListener('click', function (e) {
                    e.stopPropagation();
                });
            })
            // make it as accordion for smaller screens
            if (window.innerWidth < 992) {
                // close all inner dropdowns when parent is closed
                document.querySelectorAll('.navbar .dropdown').forEach(function (everydropdown) {
                    everydropdown.addEventListener('hidden.bs.dropdown', function () {
                        // after dropdown is hidden, then find all submenus
                        this.querySelectorAll('.submenu')
                            .forEach(function (everysubmenu) {
                                // hide every submenu as well
                                everysubmenu
                                    .style
                                    .display =
                                    'none';
                            });
                    })
                });
                document.querySelectorAll('.dropdown-menu a').forEach(function (element) {
                    element.addEventListener('click', function (e) {
                        let nextEl = this.nextElementSibling;
                        if (nextEl && nextEl.classList
                            .contains('submenu')) {
                            // prevent opening link if link needs to open dropdown
                            e.preventDefault();
                            console.log(nextEl);
                            if (nextEl.style.display ==
                                'block') {
                                nextEl.style.display =
                                    'none';
                            }
                            else {
                                nextEl.style.display =
                                    'block';
                            }
                        }
                    });
                })
            }
            // end if innerWidth
        });
        // DOMContentLoaded  end
        // OffCanvas Menu
        (function () {
            'use strict'
            document.querySelector('#navbarSideCollapse').addEventListener('click', function () {
                document.querySelector('.offcanvas-collapse').classList.toggle('open')
            })
})()

//Header Fixed
$(function () {
    var header = $(".header-rw");

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 50) {
            header.addClass("scrolled");
        } else {
            header.removeClass("scrolled");
        }
    });

});
//Quantity
var input = document.querySelector('#qty');
var btnminus = document.querySelector('.qtyminus');
var btnplus = document.querySelector('.qtyplus');

if (input !== undefined && btnminus !== undefined && btnplus !== undefined && input !== null && btnminus !== null && btnplus !== null) {

    var min = Number(input.getAttribute('min'));
    var max = Number(input.getAttribute('max'));
    var step = Number(input.getAttribute('step'));

    function qtyminus(e) {
        var current = Number(input.value);
        var newval = (current - step);
        if (newval < min) {
            newval = min;
        } else if (newval > max) {
            newval = max;
        }
        input.value = Number(newval);
        e.preventDefault();
    }

    function qtyplus(e) {
        var current = Number(input.value);
        var newval = (current + step);
        if (newval > max) newval = max;
        input.value = Number(newval);
        e.preventDefault();
    }

    btnminus.addEventListener('click', qtyminus);
    btnplus.addEventListener('click', qtyplus);

}
//Food Category Start
$(document).ready(function () {
    var owl = $("#testimonial");
    owl.owlCarousel({
        margin: 0,
        nav: true,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4500,
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

//Floting Input
$('.is-floating-label input, .is-floating-label textarea').on('focus blur', function (e) {
    $(this).parents('.is-floating-label').toggleClass('is-focused', (e.type === 'focus' || this.value.length > 0));
}).trigger('blur');

//Build A Box
jQuery(document).ready(function () {
    // click on next button
    jQuery('.form-wizard-next-btn').click(function () {
        var parentFieldset = jQuery(this).parents('.wizard-fieldset');
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        var next = jQuery(this);
        var nextWizardStep = true;
        parentFieldset.find('.wizard-required').each(function () {
            var thisValue = jQuery(this).val();

            if (thisValue == "") {
                jQuery(this).siblings(".wizard-form-error").slideDown();
                nextWizardStep = false;
            }
            else {
                jQuery(this).siblings(".wizard-form-error").slideUp();
            }
        });
        if (nextWizardStep) {
            next.parents('.wizard-fieldset').removeClass("show", "400");
            currentActiveStep.removeClass('active').addClass('activated').next().addClass('active', "400");
            next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show", "400");
            jQuery(document).find('.wizard-fieldset').each(function () {
                if (jQuery(this).hasClass('show')) {
                    var formAtrr = jQuery(this).attr('data-tab-content');
                    jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function () {
                        if (jQuery(this).attr('data-attr') == formAtrr) {
                            jQuery(this).addClass('active');
                            var innerWidth = jQuery(this).innerWidth();
                            var position = jQuery(this).position();
                            jQuery(document).find('.form-wizard-step-move').css({ "left": position.left, "width": innerWidth });
                        } else {
                            jQuery(this).removeClass('active');
                        }
                    });
                }
            });
        }
    });
    //click on previous button
    jQuery('.form-wizard-previous-btn').click(function () {
        var counter = parseInt(jQuery(".wizard-counter").text());;
        var prev = jQuery(this);
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        prev.parents('.wizard-fieldset').removeClass("show", "400");
        prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show", "400");
        currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active', "400");
        jQuery(document).find('.wizard-fieldset').each(function () {
            if (jQuery(this).hasClass('show')) {
                var formAtrr = jQuery(this).attr('data-tab-content');
                jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function () {
                    if (jQuery(this).attr('data-attr') == formAtrr) {
                        jQuery(this).addClass('active');
                        var innerWidth = jQuery(this).innerWidth();
                        var position = jQuery(this).position();
                        jQuery(document).find('.form-wizard-step-move').css({ "left": position.left, "width": innerWidth });
                    } else {
                        jQuery(this).removeClass('active');
                    }
                });
            }
        });
    });
    //click on form submit button
    jQuery(document).on("click", ".form-wizard .form-wizard-submit", function () {
        var parentFieldset = jQuery(this).parents('.wizard-fieldset');
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        parentFieldset.find('.wizard-required').each(function () {
            var thisValue = jQuery(this).val();
            if (thisValue == "") {
                jQuery(this).siblings(".wizard-form-error").slideDown();
            }
            else {
                jQuery(this).siblings(".wizard-form-error").slideUp();
            }
        });
    });
    // focus on input field check empty or not
    jQuery(".form-control").on('focus', function () {
        var tmpThis = jQuery(this).val();
        if (tmpThis == '') {
            jQuery(this).parent().addClass("focus-input");
        }
        else if (tmpThis != '') {
            jQuery(this).parent().addClass("focus-input");
        }
    }).on('blur', function () {
        var tmpThis = jQuery(this).val();
        if (tmpThis == '') {
            jQuery(this).parent().removeClass("focus-input");
            jQuery(this).siblings('.wizard-form-error').slideDown("3000");
        }
        else if (tmpThis != '') {
            jQuery(this).parent().addClass("focus-input");
            jQuery(this).siblings('.wizard-form-error').slideUp("3000");
        }
    });
});

//Plan Images
function show1() {
    document.getElementById('div1').style.display = 'none';
}
function show2() {
    document.getElementById('div1').style.display = 'block';
}
//Multiple Select
$(document).ready(function () {
    //Chosen
    $(".multipleChosen").chosen({
        placeholder_text_multiple: "Start Typing" //placeholder
    });
    //Select2
    $(".multipleSelect2").select2({
        placeholder: "Start Typing" //placeholder
    });
})
//Show Search Box
//function searchBox() {
 //   var x = document.getElementById('text').value;
 //   var y = document.getElementById('keyword_searcher');
 //   if (x.length > 0) {
 //       y.style.display = 'block';
 //   } else {
 //       y.style.display = 'none';
//    }
//}

//document.getElementById("text").addEventListener("onkeyup", function () {
 //   searchBox();
//})
$('input[name=creditcard-s]').click(function () {
    if (this.className == "visa2-s") {
        $("#show-me").show('slow');
    } else {
        $("#show-me").hide('slow');
    }
});