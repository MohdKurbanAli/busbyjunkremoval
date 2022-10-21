var JunkTruck_Woo_Module;

(function ($) {
  "use strict";

  JunkTruck_Woo_Module = {
    init: function () {
      this.wooHeaderCart();
      this.wooProductElementsPos();
      this.wooProductQtyBtns();
    },

    wooHeaderCart: function () {
      var headerCartButton = $(".header-cart__link-wrap"),
        toggleButton = function (e) {
          e.preventDefault();
          $(".header-cart__content").toggleClass("show");
        };

      headerCartButton.on("click", toggleButton);
    },

    wooProductElementsPos: function () {
      if (jQuery(".single-product .summary .onsale").size() > 0) {
        $(".single-product .product").each(function () {
          var onsale = $(this).find(".summary .onsale"),
            thumb = $(this).find(".images");

          onsale.appendTo(thumb);
        });
      }

      if (jQuery(".single-product .summary .sku_wrapper").size() > 0) {
        $(".summary").each(function () {
          $(this).find(".product_meta").addClass("product_meta__footer");

          var sku = $(this).find(".product_meta .sku_wrapper"),
            summary = $(this).find(".product_title");

          sku.prependTo(this).wrap('<div class="product_meta"></div>');
        });
      }

      if (jQuery(".single-product .summary .product_meta").size() > 0) {
        $(".summary .product_meta span").each(function () {
          var tagged = $(this).html().replace(/,/g, "");
          $(this).html(tagged);
        });
      }

      if (jQuery(".single-product #comments").size() > 0) {
        $(".commentlist .review").each(function () {
          var rating = $(this).find(".star-rating"),
            author = $(this).find(".woocommerce-review__author");

          rating.appendTo(author);
        });
      }
    },

    wooProductQtyBtns: function () {
      if (
        jQuery(
          ".woocommerce .quantity input.qty, .woocommerce-page .quantity input.qty"
        ).size() > 0
      ) {
        jQuery(this).find(".input-text.qty").attr("type", "text");
        var $testProp = $(
          "div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)"
        ).find("qty");
        if ($testProp && $testProp.prop("type") != "date") {
          // Quantity buttons
          $("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)")
            .addClass("buttons_added")
            .append('<span class="plus"></span>')
            .append('<span class="minus"></span>');

          // Target quantity inputs on product pages
          $("input.qty:not(.product-quantity input.qty)").each(function () {
            var min = parseFloat($(this).attr("min"));

            if (min && min > 0 && parseFloat($(this).val()) < min) {
              $(this).val(min);
            }
          });

          $(document).on("click", ".plus, .minus", function () {
            // Get values
            var $qty = $(this).closest(".quantity").find(".qty"),
              currentVal = parseFloat($qty.val()),
              max = parseFloat($qty.attr("max")),
              min = parseFloat($qty.attr("min")),
              step = $qty.attr("step");

            // Format values
            if (!currentVal || currentVal === "" || currentVal === "NaN")
              currentVal = 0;
            if (max === "" || max === "NaN") max = "";
            if (min === "" || min === "NaN") min = 0;
            if (
              step === "any" ||
              step === "" ||
              step === undefined ||
              parseFloat(step) === "NaN"
            )
              step = 1;

            // Change the value
            if ($(this).is(".plus")) {
              if (max && (max == currentVal || currentVal > max)) {
                $qty.val(max);
              } else {
                $qty.val(currentVal + parseFloat(step));
              }
            } else {
              if (min && (min == currentVal || currentVal < min)) {
                $qty.val(min);
              } else if (currentVal > 0) {
                $qty.val(currentVal - parseFloat(step));
              }
            }

            // Trigger change event
            $qty.trigger("change");
          });
        }
      }
    },
  };

  $("div[id='tab-description']:not(:has(.elementor))").addClass("container");

  JunkTruck_Woo_Module.init();
})(jQuery);
