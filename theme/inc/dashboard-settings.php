<?php
// set permalink
function millingmade_set_permalink()
{
  global $wp_rewrite;
  $wp_rewrite->set_permalink_structure('/%postname%/');
}
add_action('init', 'millingmade_set_permalink');

/**
 * Disable theme actions.
 */
function millingmade_disable_actions()
{
  // Disable Theme File Editor
  define('DISALLOW_FILE_EDIT', TRUE);
}
add_action('admin_init', 'millingmade_disable_actions');


// Disable Gutenberg on the back end.
add_filter('use_block_editor_for_post', '__return_false');

// Disable Gutenberg for widgets.
add_filter('use_widgets_block_editor', '__return_false');

add_action('wp_enqueue_scripts', function () {
  // Remove CSS on the front end.
  wp_dequeue_style('wp-block-library');

  // Remove Gutenberg theme.
  wp_dequeue_style('wp-block-library-theme');

  // Remove inline global CSS on the front end.
  wp_dequeue_style('global-styles');

  // Remove classic-themes CSS for backwards compatibility for button blocks.
  wp_dequeue_style('classic-theme-styles');
}, 20);