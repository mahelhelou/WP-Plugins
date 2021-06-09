<?php // Admin Dashboard Widgets

/**
 * Plugin Name: 5. Admin Dashboard Widgets
 */

/**
 * Widgets will appear in admin -> dashboard
 * You can re-organize the widgets
 */

function admin_dashboard_widgets() {
  // Create a generic widget
  wp_add_dashboard_widget(
    'admin-dashboard-widget-1',
    'Admin Dashboard Widget 1',
    'admin_dashboard_widgets_callback'
  );
}

add_action( 'wp_dashboard_setup', 'admin_dashboard_widgets' );

// View the generic widget
function admin_dashboard_widgets_callback() {
  echo '<h3>Everything will be ok very soon.</h3>';
}