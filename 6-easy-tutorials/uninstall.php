<?php // Uninstall Plugin - Trigger

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) die;

// 1. Delete data (Book custom post type posts) from DB using wp_delete_post()
$book = get_posts( [
  'post_type'     => 'book',
  'numberposts'   => -1
] );

foreach ( $books as $book ) {
  wp_delete_post( $book->ID, true ); // true: Delete the post regardless the status
}

// 2. Delete data (Book custom post type posts) from DB using $wpdb
global $wpdb;

// Delete posts
$wpdb->query( "DELETE FROM " . $wpdb->prefix . "posts WHERE post_type = 'book'" );

// 1. Delete post meta
$wpdb->query( "DELETE FROM " . $wpdb->prefix . "postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );

// 2. Delete post meta
$wpdb->query( "DELETE FROM " . $wpdb->prefix . "postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );

// 3. Delete post term relationship
$wpdb->query( "DELETE FROM " . $wpdb->prefix . "term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" );