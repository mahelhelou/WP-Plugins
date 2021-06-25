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
      add_action( 'admin_menu', [$this, 'admin_page'] );
      add_action( 'admin_init', [$this, 'settings'] );
      add_filter( 'the_content', [$this, 'post_statistics_display'] );
    }

    public function admin_page() {
      add_options_page( 'Post Statistics Settings', 'Post Statistics', 'manage_options', 'post-statistics-settings-page', [$this, 'admin_page_html'] );
    }

    public function settings() {
      // Settings sections
      add_settings_section( 'wpps_first_section', NULL, NULL, 'post-statistics-settings-page' );

      /**
       * Use this function once for each option
       * 'sanitize_callback': A standard wordpress function that sanitizes the input fields
       * We can use a custom validation function
       */

      // Location field
      add_settings_field( 'wpps_location', 'Display Location', [$this, 'location_html'], 'post-statistics-settings-page', 'wpps_first_section' );
      register_setting( 'wpps_options', 'wpps_location', ['sanitize_callback' => [$this, 'sanitize_location'], 'default' => '0'] );

      // Headline field
      add_settings_field( 'wpps_headline', 'Headline Text', [$this, 'headline_html'], 'post-statistics-settings-page', 'wpps_first_section' );
      register_setting( 'wpps_options', 'wpps_headline', ['sanitize_callback', 'sanitize_text_field', 'default' => 'Post Statistics'] );

      // Show/Hide word count
      add_settings_field( 'wpps_wordcount', 'Word Count', [$this, 'checkbox_html'], 'post-statistics-settings-page', 'wpps_first_section', ['option_name' => 'wpps_wordcount'] );
      register_setting( 'wpps_options', 'wpps_wordcount', ['sanitize_callback', 'sanitize_text_field', 'default' => '1'] );

      // Show/Hide character countt
      add_settings_field( 'wpps_charactercount', 'Character Count', [$this, 'checkbox_html'], 'post-statistics-settings-page', 'wpps_first_section', ['option_name' => 'wpps_charactercount'] );
      register_setting( 'wpps_options', 'wpps_charactercount', ['sanitize_callback', 'sanitize_text_field', 'default' => '1'] );

      // Show/Hide read time
      add_settings_field( 'wpps_readtime', 'Read Time', [$this, 'checkbox_html'], 'post-statistics-settings-page', 'wpps_first_section', ['option_name' => 'wpps_readtime'] );
      register_setting( 'wpps_options', 'wpps_readtime', ['sanitize_callback', 'sanitize_text_field', 'default' => '1'] );
    }

    // Callbacks
    // Location field callback
    public function location_html() {?>
      <select name="wpps_location">
        <option value="0" <?php selected( get_option( 'wpps_location' ), '0' ); ?>>Beginning of the post</option>
        <option value="1" <?php selected( get_option( 'wpps_location' ), '1' ); ?>>End of the post</option>
      </select>
    <?php }

    // Headline field callback
    public function headline_html() { ?>
      <input type="text" name="wpps_headline" value="<?php echo esc_attr( get_option( 'wpps_headline' ) ); ?>">
    <?php }

    // Word count callback
    /* public function wordcount_html() { ?>
      <input type="checkbox" name="wpps_wordcount" value="1" <?php esc_attr( checked( get_option( 'wpps_wordcount' ), '1' ) ); ?>>
    <?php } */

    // Character count callback
    /* public function charactercount_html() { ?>
      <input type="checkbox" name="wpps_charactercount" value="1" <?php esc_attr( checked( get_option( 'wpps_charactercount' ), '1' ) ); ?>>
    <?php } */

    // Read time callback
    /* public function readtime_html() { ?>
      <input type="checkbox" name="wpps_readtime" value="1" <?php esc_attr( checked( get_option( 'wpps_readtime' ), '1' ) ); ?>>
    <?php } */

    public function checkbox_html( $args ) { ?>
      <input type="checkbox" name="<?php echo $args['option_name'] ?>" value="1" <?php checked( get_option( $args['option_name'] ), '1' ) ?>>
    <?php }

    // Admin page callback
    public function admin_page_html() { ?>
      <div class="wrap">
        <h1>Post Statistics Settings</h1>
        <form action="options.php" method="POST">
        <?php
          settings_fields( 'wpps_options' );
          do_settings_sections( 'post-statistics-settings-page' );
          submit_button();
        ?>
        </form>
      </div>
    <?php }

    // Data validation
    public function sanitize_location( $input ) {
      if ( $input != '0' && $input != '1' ) {
        add_settings_error( 'wpps_location', 'wpps_location_error', 'Display location must be either beginning or end.' );
        return get_option( 'wpps_location' );
      }

      return $input;
    }

    /**
     * Display post statistics
     * Apply this function if a) We're in the single post screen and b) One of the post statistics checkboxes has been checked
     */
    public function post_statistics_display( $content ) {
      if ( ( is_main_query() && is_single() ) && (
        get_option( 'wpps_wordcount', '1' ) ||
        get_option( 'wpps_charactercount', '1' ) ||
        get_option( 'wpps_readtime', '1' )
      ) ) {
        return $this->post_statistics_html( $content );
      }

      return $content . ' No condition has been met!';
    }

    // Echo html of display post statistics
    public function post_statistics_html( $content ) {
      $html = 'Eman';

      return $content . $html;
    }
  }
}

$post_statistics = new PostStatistics();