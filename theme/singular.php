<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _tw
 */
?>
<?php get_header(); ?>
<main>
  <?php if (have_posts()):
    while (have_posts()):
      the_post(); ?>

      <?php get_template_part('template-parts/layouts/single', get_post_type()); ?>

    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>