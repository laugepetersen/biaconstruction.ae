<?php
$blocks_location = 'template-parts/blocks/block';
$block_args = $args['block_args'] ?? ['blocks'];
?>

<div class="blocks">
  <?php if (have_rows(...$block_args)): ?>
    <?php while (have_rows(...$block_args)):
      the_row(); ?>

      <?php
      $layout = get_row_layout();
      $template = locate_template($blocks_location . '-' . $layout . '.php');
      $anchor = get_sub_field('block_settings')['anchor'];

      ?>
      <section class="block my-20" data-layout="<?php echo esc_attr($layout); ?>" id="<?php echo $anchor; ?>">
        <?php if ($template): ?>
          <?php get_template_part($blocks_location, $layout); ?>
        <?php else: ?>
          <?php get_template_part($blocks_location, 'missing'); ?>
        <?php endif; ?>
      </section>

    <?php endwhile; ?>
  <?php endif; ?>
</div>