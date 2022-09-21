<?php
/**
 * Plugin Name: 10. Site Icon Plugin
 * Author: Mahmoud El Helou
 * Author URI: https://linkedin.com/in/mahelhelou
 * Description: A simple plugin to show site icon.
 * Version: 1.0.0
 * Author: Morten Rand-Hendriksen
 */

add_action( 'wp_head', 'wp_site_icon' );

function wp_site_icon() {
  $site_icon_url = get_site_icon_url();

  if ( !empty( $site_icon_url ) ) {
    wp_site_icon();
  } else {
    $icon = plugin_dir_path( __FILE__ ) . 'site-icon.png'; ?>

<link rel="shortcut icon" href="<?php echo esc_url( $icon ); ?>" />

<?php }
}