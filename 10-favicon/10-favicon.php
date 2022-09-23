<?php
/*
  Plugin Name: 10. Site Favicon
  Version: 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'SiteFavicon' ) ) {
  class SiteFavicon {

    function __construct() {
      add_action( 'wp_head', [$this, 'site_icon'] );
    }

    function site_icon() {
      $site_icon_url = get_site_icon_url();

      if ( $site_icon_url ) {
        wp_site_icon();
      } else {
        $icon = plugins_url( 'favicon.ico', __FILE__ ); ?>

<link rel="shortcut icon" href="<?php echo esc_url( $icon ); ?>">
<?php }
    }

  }
}

$siteFavicon = new SiteFavicon();