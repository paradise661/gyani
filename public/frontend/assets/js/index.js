(function ($) {
    "use strict";

    $(".single-item").slick({
        nextArrow:
            '<button class="next"><i class="fa-solid fa-chevron-right"></i></button>',
        prevArrow:
            '<button class="previous"><i class="fa-solid fa-chevron-left"></i></button>',
    });

    //Update Header Style and Scroll to Top
    function headerStyle() {
        if ($(".main-header").length) {
            var windowpos = $(window).scrollTop();
            var siteHeader = $(".header-style-one");
            var scrollLink = $(".scroll-to-top");
            var sticky_header = $(".main-header .sticky-header");
            if (windowpos > 100) {
                sticky_header.addClass("fixed-header animated slideInDown");
                scrollLink.fadeIn(300);
            } else {
                sticky_header.removeClass("fixed-header animated slideInDown");
                scrollLink.fadeOut(300);
            }
            if (windowpos > 1) {
                siteHeader.addClass("fixed-header");
            } else {
                siteHeader.removeClass("fixed-header");
            }
        }
    }
    headerStyle();

    //Submenu Dropdown Toggle
    if ($(".main-header li.dropdown ul").length) {
        $(".main-header .navigation li.dropdown").append(
            '<div class="dropdown-btn"><i class="fa fa-angle-down"></i></div>'
        );
    }

    //Mobile Nav Hide Show
    if ($(".mobile-menu").length) {
        var mobileMenuContent = $(".main-header .main-menu .navigation").html();

        $(".mobile-menu .navigation").append(mobileMenuContent);
        $(".sticky-header .navigation").append(mobileMenuContent);
        $(".mobile-menu .close-btn").on("click", function () {
            $("body").removeClass("mobile-menu-visible");
        });

        //Dropdown Button
        $(".mobile-menu li.dropdown .dropdown-btn").on("click", function () {
            $(this).prev("ul").slideToggle(500);
            $(this).toggleClass("active");
        });

        //Menu Toggle Btn
        $(".mobile-nav-toggler").on("click", function () {
            $("body").addClass("mobile-menu-visible");
        });

        //Menu Toggle Btn
        $(".mobile-menu .menu-backdrop, .mobile-menu .close-btn").on(
            "click",
            function () {
                $("body").removeClass("mobile-menu-visible");
            }
        );
    }

    $(window).on("scroll", function () {
        headerStyle();
    });
})(window.jQuery);
