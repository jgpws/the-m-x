/**
 * Scripts to alter the behavior of Customizer controls for WooCommerce.
 */
(function () {
  wp.customize.bind("ready", function () {
    function hideShowWCSidebarControls() {
      let wcSidebarControl = document.querySelector(
        "#customize-control-the_mx_enable_wc_sidebar"
      );

      let wcSidebarControlIds = [
        "the_mx_wc_sidebar_layout",
        "the_mx_wc_sidebar_onpage",
      ];

      wcSidebarControlIds.forEach(function (element) {
        let control = document.querySelector("#customize-control-" + element);

        if (wp.customize.instance("the_mx_enable_wc_sidebar").get() === true) {
          control.style.display = "list-item";
        } else {
          control.style.display = "none";
        }
      });

      wcSidebarControl.addEventListener("change", hideShowWCSidebarControls);
    }

    hideShowWCSidebarControls();
  });
})();
