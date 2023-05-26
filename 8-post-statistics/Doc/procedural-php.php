<?php // Post Statistics Plugin

/**
 * Plugin Name: 8. Post Statistics
 * Description: A simple plugin that shows the post statistics
 * Author: Mahmoud Elhelou
 * Author URI: https://linkedin.com/in/mahelhelou
 */

add_action( 'admin_menu', 'post_statistics_settings_page' );

function post_statistics_settings_page() {
  add_options_page( 'Post Statistics Settings', 'Post Statistics', 'manage_options', 'post-statistics-settings-page', 'post_statistics_settings_page_display' );
}

function post_statistics_settings_page_display() { ?>
  <h2>Hello</h2>
<?php }