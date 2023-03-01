/**
 * @file
 * Age Gate modal behaviors.
 *
 */
(function ($, Drupal) {

    /**
     * Use this behavior as a template for custom Javascript.
     */
    Drupal.behaviors.popUp = {
      attach: function (context, settings) {
        $('#popUp', context).once('age-gate').each(function () {
  
          if (!$.cookie("mirrorTwinPopUp") || $.cookie("mirrorTwinPopUp") === 'false') {
            $("#popUp").modal({
              escapeClose: false,
              clickClose: false,
              showClose: false,
              fadeDuration: 500,
              fadeDelay: 0.80
            });
          }
  
          if (!$.cookie("mirrorTwinPopUp")) {
            $.cookie("mirrorTwinPopUp", false);
          }
  
          const yesBtn = $('#popUpYes');
          const noBtn = $('#popUpNo');
  
          // Set an expiration date for 1 day from now, arbitrary amt of time.
          const expiryDate = new Date();
          expiryDate.setMonth(expiryDate.getDay() + 1);
          // On the form submit button click, set a cookie.
          noBtn.on("click", (e) => {
            e.preventDefault();
            $.cookie("mirrorTwinPopUp", true, { expires: 1 });
            $.modal.close();
          });

          yesBtn.on("click", (e) => {
            $.cookie("mirrorTwinPopUp", true, { expires: 100 });
            $.modal.close();
          });
  
        });
      },
    };
  
  })(jQuery, Drupal);
  