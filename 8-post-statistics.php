<?php // Post Statistics Plugin

/**
 * Plugin Name: 8. Post Statistics
 * Description: A simple plugin that shows the post statistics
 * Author: Mahmoud El Helou
 * Author URI: https://linkedin.com/in/mahelhelou
 */

if ( ! class_exists( 'PostStatistics' ) ) {
  class PostStatistics {
    function __construct() {
      add_action( 'admin_menu', [ $this, 'admin_page'] );
      add_action( 'admin_init', [ $this, 'settings'] );
    }

    public function admin_page() {
      add_options_page( 'Post Statistics Settings', 'Post Statistics', 'manage_options', 'post-statistics-settings-page', [ $this, 'admin_page_html' ] );
    }

    public function admin_page_html() { ?>
      <div class="wrap">
        <h1>Post Statistics Settings</h1>
      </div>
    <?php }

    public function settings() {
      /**
       * Use this function once for each option
       * Standard wordpress sanitization 'sanitize_callback'
       * We can use a custom validation function
       */
      register_setting( '', '', '' );
      register_setting( $option_group:string, $option_name:string, $args:array )
    }
  }
}

$post_statistics = new PostStatistics();