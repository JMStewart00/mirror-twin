/**
 * @file
 * Initialize slick on media card sliders.
 * https://kenwheeler.github.io/slick/
 */

 (($, Drupal) => {
  Drupal.behaviors.sliderBase = {
    attach(context) {
      const customPrevArrow = `<button type="button" class="c-slider__button c-slider__button--prev slick-prev" aria-label="${Drupal.t(
        "Go to the previous slide."
      )}">
        <i class="fas fa-chevron-left fa-2x o-icon" aria-hidden="true"></i>
      </button>`;

      const customNextArrow = `<button type="button" class="c-slider__button c-slider__button--next slick-next" aria-label="${Drupal.t(
        "Go to the next slide."
      )}">
        <i class="fas fa-chevron-right fa-2x o-icon" aria-hidden="true"></i>
      </button>`;

      $(".c-slider")
        .once("sliderBase")
        .each((key, item) => {
          // Set the base settings for slider
          const slickSettings = {
            accessibility: true,
            arrows: true,
            autoplay: false,
            slide: ".c-slider__item",
            dots: false,
            swipeToSlide: true,
            slidesToShow:  4,
            nextArrow: customNextArrow,
            prevArrow: customPrevArrow,
            infinite: true,
            slidesToScroll: 1,
            responsive: [
              {
                breakpoint: 768,
                settings: {
                  slidesToShow: 2
                }
              }
            ],
            customPaging() {
              return $('<button type="button" />');
            }
          };

          // Apply settings for the slider
          $(item, context).slick(slickSettings);

          function setSlickButtonPosition() {
            // Get slide height for the slider
            const slideHeight = $(item)
              .find(".c-slider__item")
              .height();

            // Calculate half of both the slide and button height
            const buttonHeight = slideHeight / 2 - 46;

            // Update top value
            if (buttonHeight > 50) {
              $(item)
                .find(".slick-arrow")
                .css("top", `${buttonHeight}px`);
            }
          }

          $(window).on("resize orientationchange", () => {
            $(item, context).slick("resize");
            setSlickButtonPosition();
          });

          // Run once on init
          setSlickButtonPosition();
        });
    }
  };
})(jQuery, Drupal);
