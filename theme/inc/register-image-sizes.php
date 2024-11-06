<?php

function millingmade_register_image_sizes()
{
  add_image_size('sm', 300);
  add_image_size('md', 768);
  add_image_size('lg', 1024);
  add_image_size('xl', 1536);
  add_image_size('hd', 1920);
}

add_action('after_setup_theme', 'millingmade_register_image_sizes');

add_filter('intermediate_image_sizes', 'remove_default_img_sizes', 10, 1);

function remove_default_img_sizes($sizes)
{
  $targets = ['thumbnail', 'medium', 'medium_large', 'large', '1536x1536', '2048x2048'];

  foreach ($sizes as $size_index => $size) {
    if (in_array($size, $targets)) {
      unset($sizes[$size_index]);
    }
  }

  return $sizes;
}