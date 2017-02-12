<?php
header( 'Content-Type: application/rss+xml; charset=UTF-8', true ) ;
echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n"; // must be UTF-8 ?>
<rss version="2.0">
<channel>
  <ttl><?php echo \absint( \apply_filters( 'alexa_feed_ttl', 30 ) ); ?></ttl>
<?php
  $alexa_query_args = \apply_filters( 'alexa_feed_query_args', array(
    'post_type'           => 'post',
    'ignore_sticky_posts' => true,
    'posts_per_rss'       => 5 // note that Amazon will only read up to 5 posts
  ) );
  $alexa_query = new \WP_Query( $alexa_query_args );

  if ( $alexa_query->have_posts() ) {
    while ( $alexa_query->have_posts() ) : $alexa_query->the_post();
    ?>
    <item>
      <title><?php \the_title_rss(); ?></title>
      <link><?php \the_permalink_rss(); ?></link>
      <pubDate><?php echo date( 'Y-m-d\TH:i:s\Z', \get_post_time( 'U', true ) ); ?></pubDate>
      <description><?php echo \wp_strip_all_tags( \get_the_content() ); ?></description>
      <guid>urn:uuid:<?php printf( '%s', \Alexa\generate_alexa_uuid() ); ?></guid>
    </item>
    <?php
    endwhile;
  } else {
    // using this to test
    ?><item>
      <title><?php \bloginfo( 'name' ); ?></title>
      <link><?php echo \esc_url( \site_url() ); ?></link>
      <pubDate><?php echo date( 'r', time() ); ?></pubDate>
      <description><?php \bloginfo( 'description' ); ?></description>
      <guid><?php echo \esc_url( \site_url() ); ?></guid>
    </item><?php
  }
?>
</channel>
</rss>
<?php
