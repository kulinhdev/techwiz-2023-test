// $("body").on("contextmenu", function (e) {
//     console.log(e);
// 	return false;
// });
// $(document).keydown(function (e) {
//     if (
//         e.ctrlKey &&
//         (e.keyCode === 67 ||
//             e.keyCode === 86 ||
//             e.keyCode === 85 ||
//             e.keyCode === 117)
//     ) {
//         return false;
//     }
//     if (e.which === 123) {
//         return false;
//     }
//     if (e.metaKey) {
//         return false;
//     }
//     if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
//         return false;
//     }
//     if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
//         return false;
//     }
//     if (
//         e.keyCode == 83 &&
//         (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)
//     ) {
//         return false;
//     }
//     if (
//         e.keyCode == 224 &&
//         (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)
//     ) {
//         return false;
//     }
//     if (e.ctrlKey && e.keyCode == 85) {
//         return false;
//     }
//     if (event.keyCode == 123) {
//         return false;
//     }
// });
(function ($) {
    "use strict";
    $(document).on("click", "#sidebarToggle", function (e) {
        e.preventDefault();
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
    });
    $("body.fixed-nav .sidebar").on(
        "mousewheel DOMMouseScroll wheel",
        function (e) {
            if ($window.width() > 768) {
                var e0 = e.originalEvent,
                    delta = e0.wheelDelta || -e0.detail;
                this.scrollTop += (delta < 0 ? 1 : -1) * 30;
                e.preventDefault();
            }
        }
    );
    $('[data-toggle="tooltip"]').tooltip();
    $(document).on("scroll", function () {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $(".scroll-to-top").fadeIn();
        } else {
            $(".scroll-to-top").fadeOut();
        }
    });
    $(document).on("click", "a.scroll-to-top", function (event) {
        var $anchor = $(this);
        $("html, body")
            .stop()
            .animate(
                { scrollTop: $($anchor.attr("href")).offset().top },
                1000,
                "easeInOutExpo"
            );
        event.preventDefault();
    });
})(jQuery);
