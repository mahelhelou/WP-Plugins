<?php // Admin Menu Page Plugin

/**
 * Plugin Name: 2. Admin Menu Page
 */

function example_admin_menu_page_options_create() {
  add_menu_page(
    'Header & Footer Scripts',
    'Site Scripts',
    'manage_options',
    'admin-menu-options',
    'example_admin_menu_page_options_display'
  );

}

add_action( 'admin_menu', 'example_admin_menu_page_options_create' );

function example_admin_menu_page_options_display() {
  // Update options (Hint: Update option will create the option if the option is not exist!)
  if ( array_key_exists( 'update_options_submit', $_POST ) ) {
    update_option( 'example_header_scripts', $_POST[ 'header_scripts' ] );
    update_option( 'example_footer_scripts', $_POST[ 'footer_scripts' ] ); ?>

    <div id="updated settings-error notice is-dismissible">
      <strong>Your options has been saved.</strong>
    </div>
  <?php }

  // Get saved options
  $header_scripts = get_option( 'example_header_scripts', 'none' );
  $footer_scripts = get_option( 'example_footer_scripts', 'none' );

?>



  <!-- Create an options form (Submit new options) -->
  <div class="wrap">
    <h2>Update Site Scripts (Header & Footer)</h2>

    <form method="post" action="">
      <label for="header_scripts">Header Scripts</label>
      <textarea name="header_scripts" id="header_scripts" class="large-text"><?php echo $header_scripts ?></textarea>

      <label for="footer_scripts">Footer Scripts</label>
      <textarea name="footer_scripts" id="footer_scripts" class="large-text"><?php echo $footer_scripts ?></textarea>

      <button name="update_options_submit" class="button button-primary">Update Scripts</button>
    </form>
  </div>

<?php }

// Display header scripts
function header_scripts_display() {
  $header_scripts = get_option( 'example_header_scripts', 'none' );
  echo $header_scripts;
}

add_action( 'wp_head', 'header_scripts_display' );

// Display footer scripts
function footer_scripts_display() {
  $footer_scripts = get_option( 'example_footer_scripts', 'none' );
  echo $footer_scripts;
}

add_action( 'wp_footer', 'footer_scripts_display' );