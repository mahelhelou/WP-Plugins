<?php
/*
  Plugin Name: 11. Email Page Link
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'EmailPageLink' ) ) {
	class EmailPageLink {
		function __construct() {
			add_filter( 'the_content', [$this, 'email_page_link'] );
		}

		function email_page_link( $content ) {
			$mail_icon_url = plugins_url( 'mailicon.png', __FILE__ );

			$email_page_content = '<div class="email_link">';
			$email_page_content .= '<a title="Email article link"';
			$email_page_content .= 'href="mailto:mahelhelou@gmail.com?';
			$email_page_content .= 'subject="Check this interesting article titled ';
			$email_page_content .= get_the_title();
			$email_page_content .= '&body="Hi!%0A%0AYou might enjoy this article entitled ';
			$email_page_content .= get_the_title() . '.%0A%0A';
			$email_page_content .= get_permalink();
			$email_page_content .= '%0A%0AEnjoy!">';
			$email_page_content .= '<img alt="Email icon" src="';
			$email_page_content .= esc_url( $mail_icon_url );
			$email_page_content .= '" /></a></div>';

			return $content . $email_page_content;

		}
	}
}

$emailPageLink = new EmailPageLink();