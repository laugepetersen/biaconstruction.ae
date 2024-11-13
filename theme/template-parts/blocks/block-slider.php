<?php
$subtitle = get_sub_field('subtitle');
$title = get_sub_field('title');
$content = get_sub_field('content');
$buttons = get_sub_field('buttons');
?>

<div class="overflow-hidden">
  <div class="container">
    <div class="grid-container gap-y-0" data-fade>
      <?php if ($subtitle): ?>
        <div class="col-span-12 text-center">
          <div class="subtitle mb-2"><span class="gradient-text"><?php echo $subtitle; ?></span></div>
        </div>
      <?php endif; ?>
      <div class="col-span-12 lg:col-span-10 lg:col-start-2 xl:col-span-8 xl:col-start-3 text-center">
        <?php if ($title): ?>
          <h2 class="h2 gradient-text"><?php echo $title; ?></h2>
        <?php endif; ?>
      </div>
      <?php if ($content): ?>
        <p class="p text-center col-span-12 lg:col-span-6 lg:col-start-4 xl:col-span-4 xl:col-start-5 mt-4">
          <?php echo $content; ?>
        </p>
      <?php endif; ?>
    </div>

    <div class="swiper slider !overflow-visible mt-10">
      <div class="swiper-wrapper cursor-grab">
        <?php
        if (have_rows('slides')):
          for ($i = 0; have_rows('slides'); $i++):
            the_row(); ?>
            <div class="swiper-slide">
              <div class="<?php echo $i % 2 === 0 ? 'pt-10' : '' ?>">
                <div class="aspect-[2/3] bg-black relative">
                  <div class="h4 absolute bottom-4 text-white z-30 left-5"><?php the_sub_field('title'); ?>
                  </div>
                  <div class="absolute bottom-0 left-0 w-full h-1/3 z-20 bg-gradient-to-t from-black/80 to-transparent">
                  </div>
                  <?php if ($image = get_sub_field('image')): ?>
                    <?php echo wp_get_attachment_image($image, 'md', false, ['class' => 'absolute object-cover w-full h-full z-10']); ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php
          endfor;
        endif; ?>
      </div>
    </div>

  </div>

  <?php if ($buttons): ?>
    <div class="mt-10 relative">
      <div class="absolute-center w-full h-[1px] bg-black/10 -z-10"></div>
      <div class="flex items-center gap-2 justify-center">
        <?php foreach (get_sub_field('buttons') as $button): ?>
          <a href="<?php echo $button['link']['url']; ?>" class="button primary"
            target="<?php echo $button['link']['target']; ?>"><?php echo $button['link']['title']; ?></a>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>

</div>