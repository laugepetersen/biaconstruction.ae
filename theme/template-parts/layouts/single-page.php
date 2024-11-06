<?php if (is_front_page()): ?>
  <?php get_template_part('template-parts/hero-banners/hero-banner-front-page'); ?>
<?php else: ?>
  <?php get_template_part('template-parts/hero-banners/hero-banner-page'); ?>
<?php endif; ?>

<?php get_template_part('template-parts/render-blocks'); ?>