// Add namespace for media:image element
add_filter( 'rss2_ns', function(){
  echo 'xmlns:media="http://search.yahoo.com/mrss/"';
});

// insert the image object into the RSS (see MB-191)
add_action('rss2_item', function(){
  global $post;
  if (has_post_thumbnail($post->ID)){
    $thumbnail_ID = get_post_thumbnail_id($post->ID);
    $thumbnail = wp_get_attachment_image_src($thumbnail_ID, 'full');
    if (is_array($thumbnail)) {
      echo '<media:content url="' . $thumbnail[0] . '" medium="image" />';
    }
  }
});
