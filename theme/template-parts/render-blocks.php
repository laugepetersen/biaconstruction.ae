<div class="blocks">
  <?php if (have_rows('blocks')): ?>
    <?php while (have_rows('blocks')):
      the_row(); ?>

      <?php
      $layout = get_row_layout();
      $template = locate_template('template-parts/blocks/block-' . $layout . '.php');
      ?>
      <section class="block my-20" data-layout="<?php echo esc_attr($layout); ?>">
        <?php if ($template): ?>
          <?php get_template_part('template-parts/blocks/block', $layout); ?>
        <?php else: ?>
          <?php get_template_part('template-parts/blocks/block', 'missing'); ?>
        <?php endif; ?>
      </section>

    <?php endwhile; ?>
  <?php endif; ?>
</div>