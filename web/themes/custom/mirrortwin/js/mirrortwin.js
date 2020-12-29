/**
 * @file
 * Placeholder file for custom sub-theme behaviors.
 *
 */
(function ($, Drupal) {

  /**
   * Use this behavior as a template for custom Javascript.
   */
  Drupal.behaviors.exampleBehavior = {
    attach: function (context, settings) {
      $('.menu-icon', context).on('click', (e) => {
        $('.menu-icon').toggleClass('open');
      })
    }
  };

})(jQuery, Drupal);
