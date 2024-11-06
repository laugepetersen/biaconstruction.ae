<?php
// This theme uses wp_nav_menu() in two locations.
register_nav_menus(
  array(
    'header' => __('Header', '_tw'),
    'footer-1' => __('Footer Menu 1', '_tw'),
    'footer-2' => __('Footer Menu 2', '_tw'),
  )
);

add_action('after_setup_theme', '_tw_setup');