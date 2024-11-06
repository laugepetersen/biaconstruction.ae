<?php

function wpdocs_kantbtrue_init()
{
  register_post_type('Testimonial', array(
    'labels' => array(
      'name' => 'Testimonials',
      'singular_name' => 'Testimonial',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Testimonial',
    ),
    'menu_icon' => 'dashicons-format-quote',
    'public' => true,
    'capability_type' => 'post',
    'supports' => array('title', 'thumbnail'),
    'show_in_rest' => true
  ));

  register_post_type('Team Member', array(
    'labels' => array(
      'name' => 'Team Members',
      'singular_name' => 'Team Member',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Team Member',
    ),
    'menu_icon' => 'dashicons-groups',
    'public' => true,
    'capability_type' => 'post',
    'supports' => array('title', 'thumbnail'),
    'show_in_rest' => true
  ));

  register_post_type('Project', array(
    'labels' => array(
      'name' => 'Projects',
      'singular_name' => 'Project',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Project',
    ),
    'menu_icon' => 'dashicons-portfolio',
    'public' => true,
    'rewrite' => array('slug' => 'projects'),
    'capability_type' => 'post',
    'supports' => array('title', 'thumbnail'),
    'show_in_rest' => true
  ));
}

add_action('init', 'wpdocs_kantbtrue_init');