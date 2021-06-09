<?php // Easy Tutorials Plugin

/**
 * Plugin Name: 6. Easy Tutorials
 */

// Add plugin security
defined( 'ABSPATH' ) or die( 'Hey, ary you trying to hack our website? Please don\'t to that!' );

if ( ! class_exists( 'Easy_Tutorials' ) ) {
  class Easy_Tutorial {

    function __construct() {
      add_action( 'init', array( $this, 'custom_post_type' ) ); // Go to search in $this class, and find the method of 'custom_post_type'
    }

    function activation() {
      // Generated CPT
      $this->custom_post_type();
      // Flush rewrite rules (Always do it in activation & deactivation)
      flush_rewrite_rules();
    }

    function deactivation() {
      // Flush rewrite rules
      flush_rewrite_rules();
    }

    // function uninstall() {} // We use '/uninstall.php' for this purpose

    function custom_post_type() {
      register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
    }

  }
}

$easy_tutorial = new Easy_Tutorial();

register_activation_hook( __FILE__, array( $easy_tutorial, 'activation' ) );
register_deactivation_hook( __FILE__, array( $easy_tutorial, 'deactivation' ) );