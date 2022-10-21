var JunkTruck_Theme_JS;

(function ($) {
  "use strict";

  JunkTruck_Theme_JS = {
    init: function () {
      this.page_preloader_init();
      this.iframe_video_size_init();
      this.toTopInit();
      this.responsiveMenuInit();
      this.magnificPopupInit();
      this.swiperInit();
    },

    page_preloader_init: function (self) {
      if ($(".page-preloader-cover")[0]) {
        $(".page-preloader-cover")
          .delay(500)
          .fadeTo(500, 0, function () {
            $(this).remove();
          });
      }
    },

    iframe_video_size_init: function (self) {
      if (jQuery("body.single-post .entry-content p iframe").size() > 0) {
        jQuery(".is-type-video, .entry-content p").each(function () {
          jQuery(this)
            .find("iframe")
            .css({ height: (jQuery(this).width() * 9) / 16 + "px" });
        });
      }
    },

    toTopInit: function () {
      if ($.isFunction(jQuery.fn.UItoTop)) {
        $().UItoTop({
          text: '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 444.819 444.819" xml:space="preserve"><path d="M433.968,278.657L248.387,92.79c-7.419-7.044-16.08-10.566-25.977-10.566c-10.088,0-18.652,3.521-25.697,10.566 L10.848,278.657C3.615,285.887,0,294.549,0,304.637c0,10.28,3.619,18.843,10.848,25.693l21.411,21.413 c6.854,7.23,15.42,10.852,25.697,10.852c10.278,0,18.842-3.621,25.697-10.852L222.41,213.271L361.168,351.74 c6.848,7.228,15.413,10.852,25.7,10.852c10.082,0,18.747-3.624,25.975-10.852l21.409-21.412 c7.043-7.043,10.567-15.608,10.567-25.693C444.819,294.545,441.205,285.884,433.968,278.657z"/></svg>',
          scrollSpeed: 600,
        });
      }
    },

    responsiveMenuInit: function () {
      if (typeof junktruckResponsiveMenu !== "undefined") {
        junktruckResponsiveMenu();
      }
    },

    magnificPopupInit: function () {
      if (typeof $.magnificPopup !== "undefined") {
        //MagnificPopup init
        $('[data-popup="magnificPopup"]').magnificPopup({
          type: "image",
        });

        $(".gallery > .gallery-item a")
          .filter("[href$='.png'],[href$='.jpg']")
          .magnificPopup({
            type: "image",
            gallery: {
              enabled: true,
              navigateByImgClick: true,
            },
          });
      }
    },

    swiperInit: function () {
      if (typeof Swiper !== "undefined") {
        //Swiper carousel init
        var mySwiper = new Swiper(".swiper-container", {
          // Optional parameters
          loop: true,
          spaceBetween: 10,
          autoHeight: true,

          // Navigation arrows
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
        });
      }
    },
  };

  JunkTruck_Theme_JS.init();
})(jQuery);
