(($, Drupal) => {
  Drupal.behaviors.stickyNav = {
    attach(context) {
      $("#block-mirrortwin-main-menu", context)
        .once("stickyNav")
        .stick_in_parent({ parent: '#inner-wrap' });

        $(".c-header-mobile-wrapper", context)
          .once("stickyNav")
          .stick_in_parent({ parent: '#inner-wrap' });
    }
  };
})(jQuery, Drupal);
