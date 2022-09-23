<?php

/*
Plugin Name: 12. Twitter Feed
*/

if ( ! class_exists( 'TwitterFeed' ) ) {
  class TwitterFeed {
		function __construct() {
			add_shortcode( 'twitterfeed', [$this, 'twitter_feed'] );
		}

		function twitter_feed( $atts ) {
			extract( shortcode_atts( [
				'username' => 'mahelhelou'
			], $atts ) );


			if ( empty( $username ) ) $username = 'mahelhelou';
			$username = sanitize_text_field( $username );

			$output = '<p><a class="twitter-timeline" href="';
			$output .= esc_url( 'https://twitter.com/' . $username );
			$output .= '">Tweets by ' . esc_html( $username );
			$output .= '</a></p><script async ';
			$output .= 'src="//platform.twitter.com/widgets.js" ';
			$output .= 'charset="utf-8"></script>';

			return $output;
		}
  }
}

$twitterFeed = new TwitterFeed();