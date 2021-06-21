<h1>My WordPress Blog</h1>
<h2>Just one of the best sites on the Internet</h2>
<p>This paragraph is only the best paragraph that exists in all of the WordPress blogs on the Internet. Read it and enjoy.</p>

<h1><?php _e('My WordPress Blog', 'tutsplus'); ?></h1>
<h2><?php _e('Just one of the best sites on the Internet', 'tutsplus'); ?></h2>
<p><?php _e('This paragraph is only the best paragraph that exists in all of the WordPress blogs on the Internet. Read it and enjoy.', 'tutsplus'); ?></p>

<?php
register_sidebar(
  array(
      'name' => 'Custom Sidebar',
      'id' => 'sidebar'
  )
);

register_sidebar(
  array(
      'name' => __('Custom Sidebar', 'tutsplus'),
      'id' => 'sidebar'
  )
);

/**
 * Remember, internationalization should only apply to static text. It's not the developer's responsibility to provide internationalization of page content, post content, and so on.
 */

echo '<h2>' . esc_html__( 'Blog Options', 'my-text-domain' ) . '</h2>';

esc_html_e( 'Using this option you will make a fortune!', 'my-text-domain' );
?>

<div class="site-info">
  <a href="http://wordpress.org/" ><?php esc_html_e( 'Proudly powered by WordPress.', 'my-text-domain' ); ?></a>
</div><!-- .site-info -->

<p>
<?php
$url = 'http://example.com';
$link = sprintf( wp_kses( __( 'Check out this link to my <a href="%s">website</a> made with WordPress.', 'my-text-domain' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $url ) );
echo $link;
?>
</p>

printf( esc_html( _n( 'We deleted %d spam message.', 'We deleted %d spam messages.', $count, 'my-text-domain'  ) ), $count );