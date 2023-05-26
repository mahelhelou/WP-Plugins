<?php
/*
Plugin Name: 5. Admin Dashboard Widgets
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'AdminWidgets' ) ) {
  class AdminWidgets {
    function __construct() {
      add_action( 'wp_dashboard_setup', [$this, 'admin_dashboard_widgets'] );
    }

    function admin_dashboard_widgets() {
      // Create a generic widget
      wp_add_dashboard_widget(
        'admin-dashboard-widget-1',
        'Admin Dashboard Widget 1',
        'admin_dashboard_widgets_callback'
      );
    }

    function admin_dashboard_widgets_callback() {
      echo '<h3>Everything will be ok very soon.</h3>';
    }
  }
}

$adminWidgets = new AdminWidgets();