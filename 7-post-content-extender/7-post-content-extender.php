<?php // Post Content Extender

/*
Plugin Name: 7. Post Name Extender
Description: A really simple plugin to add text at the end of the post
Author: Mahmoud Elhelou
Author URI: https://linkedin.com/in/mahelhelou
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'PostContentExtender' ) ) {
  class PostContentExtender {
    function __construct() {
      add_filter( 'the_content', [$this, 'post_content_extender'] );
    }

    function post_content_extender( $content ) {
      // Apply only the filter on post's page & NOT on post types
      if ( is_single() && is_main_query() ) {
        return $content . '<p><strong>Created by: </strong>' . the_author() . '</p>';
      }

      return $content;
    }
  }
}

$postContentExtender = new PostContentExtender();