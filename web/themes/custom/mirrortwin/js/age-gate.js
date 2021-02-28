/**
 * @file
 * Age Gate modal behaviors.
 *
 */
(function ($, Drupal) {

  /**
   * Use this behavior as a template for custom Javascript.
   */
  Drupal.behaviors.ageGate = {
    attach: function (context, settings) {
      if (!$.cookie("mirrorTwinAgeGate") || $.cookie("mirrorTwinAgeGate") === 'false') {
        $("#ageGate").modal({
          escapeClose: false,
          clickClose: false,
          showClose: false,
          fadeDuration: 500,
          fadeDelay: 0.80
        });
      }

      if (!$.cookie("mirrorTwinAgeGate")) {
        $.cookie("mirrorTwinAgeGate", false);
      }

      const yesBtn = $('#ageGateYes');

      // Set an expiration date for 1 day from now, arbitrary amt of time.
      const expiryDate = new Date();
      expiryDate.setMonth(expiryDate.getDay() + 1);
      // On the form submit button click, set a cookie.
      yesBtn.on("click", () => {
        console.log('clicked');
        $.cookie("mirrorTwinAgeGate", true, { expires: expiryDate });
        $.modal.close();
      });

    }
  };

})(jQuery, Drupal);
