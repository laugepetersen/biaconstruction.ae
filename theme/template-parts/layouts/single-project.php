<?php get_template_part('template-parts/hero-banners/hero-banner', 'project'); ?>

<section class="my-20">
  <div class="container">
    <div class="grid grid-cols-1 lg:grid-cols-6 gap-3">
      <?php foreach (get_field('gallery') as $index => $image): ?>
        <?php
        $col_span = 'lg:col-span-6';
        $aspect_ratio = 'lg:aspect-video';
        $size = 'lg';
        switch (($index + 1) % 7) {
          case 0:
            $col_span = 'lg:col-span-6';
            $aspect_ratio = 'lg:aspect-video';
            $size = 'lg';
            break;
          case 1:
            $col_span = 'lg:col-span-3';
            $aspect_ratio = 'lg:aspect-square';
            $size = 'md';
            break;
          case 2:
            $col_span = 'lg:col-span-3';
            $aspect_ratio = 'lg:aspect-square';
            $size = 'md';
            break;
          case 3:
            $col_span = 'lg:col-span-6';
            $aspect_ratio = 'lg:aspect-video';
            $size = 'lg';
            break;
          case 4:
          case 5:
          case 6:
            $col_span = 'lg:col-span-2';
            $aspect_ratio = 'lg:aspect-[3/4]';
            $size = 'md';
            break;
        }
        ?>
        <div class="<?php echo $col_span; ?>" data-fade>
          <div class="relative <?php echo $aspect_ratio; ?>">
            <?php echo wp_get_attachment_image($image, 'md', false, ['class' => 'lg:absolute-cover lg:object-cover w-full h-auto']); ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
</section>

<?php get_template_part('template-parts/render-blocks'); ?>

<div class="footer-blocks">
  <?php get_template_part('template-parts/render-blocks', null, ['block_args' => ['blocks', 'option']]); ?>
</div>