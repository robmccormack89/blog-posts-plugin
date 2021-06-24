<?php
namespace Rmcc;
use Timber\Timber;

class BlogPostsSection extends Timber {

  public function __construct() {
    parent::__construct();
    
    // timber stuff. the usual stuff
    add_filter('timber/twig', array($this, 'add_to_twig'));
    add_filter('timber/context', array($this, 'add_to_context'));
    
    // shortcode for the markup
    add_shortcode('blog_posts_section', 'blog_posts_section'); // see inc/functions.php
    
    // enqueue plugin assets
    add_action('wp_enqueue_scripts', array($this, 'blog_posts_assets'));
    
    // add_filter( 'blog-posts-section', array($this, 'my_plugin_load_my_own_textdomain'), 10, 2 );
    add_action('plugins_loaded', array($this, 'plugin_text_domain_init'));
    
    add_action('plugins_loaded', array($this, 'timber_locations'));
  }
  
  public function timber_locations() {
    // if timber::locations is empty (another plugin hasn't already added to it), make it an array
    if(!Timber::$locations) Timber::$locations = array();
    // add a new views path to the locations array
    array_push(
      Timber::$locations, 
      BLOG_POSTS_PATH . 'views'
    );
  }
  
  public function plugin_text_domain_init() {
    load_plugin_textdomain('blog-posts-section', false, BLOG_POSTS_BASE. '/languages');
  }
  
  public function blog_posts_assets() {
    wp_enqueue_style(
      'blog-posts-section',
      BLOG_POSTS_URL . 'public/css/blog-posts-section.css'
    );
  }
  
  public function add_to_twig($twig) { 
    if(!class_exists('Twig_Extension_StringLoader')){
      $twig->addExtension(new Twig_Extension_StringLoader());
    }
    return $twig;
  }

  public function add_to_context($context) {
    return $context;    
  }

}