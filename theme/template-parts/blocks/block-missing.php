<?php $layout = get_row_layout(); ?>

<div class="container py-4">
  <div class="max-w-screen-sm mx-auto p-4 border border-dashed border-red-700 text-red-700">
    <?php echo 'Missing template for layout: ' . esc_html($layout); ?>
    <br>
    <?php echo 'Expected at: template-parts/blocks/block-' . esc_html($layout) . '.php'; ?>
  </div>
</div>