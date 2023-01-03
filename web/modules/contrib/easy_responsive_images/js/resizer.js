/**
 * @file
 * Attach the ResizeObserver to responsive images to load the best image style.
 */
(function (Drupal) {

  'use strict';

  Drupal.behaviors.easyResponsiveImages = {
    attach: function (context) {

      // Fetch all images containing a "data-srcset" attribute.
      const images = context.querySelectorAll('img[data-srcset]');

      // Find the best suitable image to display.
      const updateImage = function(image) {
        const imgWidth = Math.floor(image.clientWidth);
        const parentWidth = Math.floor(image.parentNode.clientWidth);
        const availableWidth = parentWidth > imgWidth ? parentWidth : imgWidth;
        const attrWidth = image.getAttribute('width');
        const sources = image.getAttribute('data-srcset').split(',');
        const currentSrc = image.getAttribute('src');

        // If the selected image is already bigger than the available width,
        // we do not update the image.
        if (attrWidth && attrWidth > availableWidth) {
          return;
        }

        // Find the best matching source based on actual image space.
        let source, responsiveImgPath, responsiveImgWidth;
        for (source of sources) {
          let array = source.split(' ');
          responsiveImgPath = array[0];
          responsiveImgWidth = array[1].slice(0, -1);
          if (availableWidth < responsiveImgWidth) {
            break;
          }
        }

        if (responsiveImgPath === currentSrc) {
          return;
        }

        // Clear the image src attribute to force the image to update and work
        // around browser caching issues.
        image.src = '';

        // Update the "src" with the new image and also set the "width"
        // attribute to easily check if we need a new image after resize.
        image.src = responsiveImgPath;
        image.setAttribute('width', responsiveImgWidth);

        // Update the image width/height onload to make it easier for the
        // browser to show the image.
        image.onload = function() {
          this.setAttribute('width', Math.floor(this.width));
          this.setAttribute('height', Math.floor(this.height));
        };
      };

      // Create a ResizeObserver to update the image "src" attribute when its
      // parent container resizes.
      const observer = new ResizeObserver(entries => {
        for (let entry of entries) {
          const images = entry.target.querySelectorAll('img[data-srcset]');
          images.forEach(image => {
            updateImage(image);
          });
        }
      });

      // Attach the ResizeObserver to the image containers.
      images.forEach(image => {
        updateImage(image);
        observer.observe(image.parentNode);
      });

    }
  };

})(Drupal);
