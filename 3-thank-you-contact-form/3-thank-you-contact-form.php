<?php
/*
Plugin Name: 3. Thank You Contact Form - Shortcode
*/

if ( ! defined( 'ABSPATH' ) ) exit;

function thank_you_contact_form() {
  $content = '';

  $content .= '<form method="post" action="' . site_url() . '/thank-you">';

  $content .= '<input type="text" name="full_name" placeholder="Enter your full name">';
  $content .= '<br>';

  $content .= '<input type="email" name="email_address" placeholder="Your email address">';
  $content .= '<br>';

  $content .= '<input type="tel" name="phone_number" placeholder="Phone number (Optional)">';
  $content .= '<br>';

  $content .= '<textarea name="comments" placeholder="Comments"></textarea>';
  $content .= '<br>';

  $content .= '<input type="submit" name="thank_you_contact_form_submit" value="Submit your comments">';

  $content .= '</form>';

  return $content;
}

add_shortcode( 'thank-you-form', 'thank_you_contact_form' );

/**
 * Convert email body to html (e.g email)
 */
function set_html_content_type() {
  return 'text/html';
}

function thank_you_contact_form_capture() {
  if ( array_key_exists( 'thank_you_contact_form_submit', $_POST ) ) {
    $to = 'mahelhelou@gmail.com';
    $subject = 'My site form submission';

    $body = '';
    $body .= '<strong>Name: </strong>' . $_POST[ 'full_name' ] .  '<br>';
    $body .= '<strong>Email: </strong>' . $_POST[ 'email_address' ] .  '<br>';
    $body .= '<strong>Phone: </strong>' . $_POST[ 'phone_number' ] .  '<br>';
    $body .= '<strong>Comments: </strong>' . $_POST[ 'comments' ] .  '<br>';

    add_filter( 'wp_mail_content_type', 'set_html_content_type' );
    wp_mail( $to, $subject, $body );
    remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
  }
}

add_action( 'wp_head', 'thank_you_contact_form_capture' );