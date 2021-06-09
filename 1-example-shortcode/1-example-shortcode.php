<?php // Example shortcode plugin

/**
 * Plugin Name: 1. Example Shortcode
 * Author: Mahmoud El Helou
 */

function example_shortcode() {
  $content = '<h2>This is a simple plugin</h2>';
  $content .= '<p>We are here to learn plugins baiscs</p>';

  return $content;
}

add_shortcode( 'example', 'example_shortcode' );