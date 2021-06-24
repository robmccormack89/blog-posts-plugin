<?php

function blog_posts_section() {
  
  $context = Timber::context();
  
  // get first latest post
  $args = array(
   'post_type'             => 'post',
   'post_status'           => 'publish',
   'posts_per_page'        => '1',
  );
  $context['latest_posts_one'] = new Timber\PostQuery($args);
  
  // get first latest post
  $args = array(
   'post_type'             => 'post',
   'post_status'           => 'publish',
   'posts_per_page'        => '3',
   'offset' => '1',
  );
  $context['latest_posts_three'] = new Timber\PostQuery($args);
  
  
  $out = Timber::compile('blog-posts.twig', $context);
  return $out;
}