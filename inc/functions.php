<?php

function blog_posts_section() {

  $context = Timber::context();

  $args = array(
   'post_type'             => 'post',
   'post_status'           => 'publish',
   'posts_per_page'        => '3',
  );
  $context['latest_posts'] = new Timber\PostQuery($args);

  $out = Timber::compile('blog-posts.twig', $context);
  return $out;
}
