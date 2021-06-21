<?php // Easy Tutorials Plugin

/**
 * Plugin Name: 6. Easy Tutorials
 */

// Add plugin security
defined( 'ABSPATH' ) or die( 'Hey, ary you trying to hack our website? Please don\'t to that!' );

if ( ! class_exists( 'Easy_Tutorials' ) ) {
  class Easy_Tutorial {

    function __construct() {
      add_action( 'init', [ $this, 'custom_post_type' ] ); // Go to search in $this class, and find the method of 'custom_post_type'
    }

    /**
     * Register admin scripts
     */
    function register_admin_scripts() {
      add_action( 'admin_enqueue_scripts', [ $this, 'easy_tutorial_admin_scripts' ] );
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

    /**
     * Enqueue admin scripts
     * Call the scripts using register_admin_scripts method
     */
    function easy_tutorial_admin_scripts() {
      wp_enqueue_style( 'easy-tutorial-styles', plugins_url( '/assets/css/styles.css', __FILE__ ) );
      wp_enqueue_script( 'easy-tutorial-scripts', plugins_url( '/assets/js/scripts.js', __FILE__ ) );
    }

  }
}

$easy_tutorial = new Easy_Tutorial;
$easy_tutorial->register_admin_scripts();

register_activation_hook( __FILE__, [ $easy_tutorial, 'activation' ] );
register_deactivation_hook( __FILE__, [ $easy_tutorial, 'deactivation' ] );