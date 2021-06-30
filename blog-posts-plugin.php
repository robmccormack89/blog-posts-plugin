<?php
/*
Plugin Name: Blog Posts Section by RMcC
Plugin URI: #
Description: Add a blog posts section to a page using the [blog_posts_section] shortcode. Ideal for the Homepage. This plugin is translation-ready.
Version: 1.0.0
Author: robmccormack89
Author URI: #
Version: 1.0.0
License: GNU General Public License v2 or later
License URI: LICENSE
Text Domain: blog-posts-section
Domain Path: /languages/
*/

// don't run if someone access this file directly
defined('ABSPATH') || exit;

// define some constants
if (!defined('BLOG_POSTS_PATH')) define('BLOG_POSTS_PATH', plugin_dir_path( __FILE__ ));
if (!defined('BLOG_POSTS_URL')) define('BLOG_POSTS_URL', plugin_dir_url( __FILE__ ));
if (!defined('BLOG_POSTS_BASE')) define('BLOG_POSTS_BASE', dirname(plugin_basename( __FILE__ )));

// require the composer autoloader
if (file_exists($composer_autoload = __DIR__.'/vendor/autoload.php')) require_once $composer_autoload;

// then require the main plugin class. this class extends Timber/Timber which is required via composer
new Rmcc\BlogPostsSection;

// require action functions 
require_once('inc/functions.php');