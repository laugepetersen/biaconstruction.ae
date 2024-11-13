<?php

$blocks = get_sub_field('blocks');

?>

<div class="container" data-fade>
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-3 gap-x-8">
    <?php foreach ($blocks as $block): ?>
      <div class="aspect-square grid items-end bg-black text-white relative overflow-hidden">
        <div class="relative z-10 p-10 pb-8">
          <div class="relative z-10">
            <div class="subtitle inverted">
              <p class="gradient-text inverted"><?= $block['subtitle'] ?></p>
            </div>
            <h3 class="h3 gradient-text inverted mt-3 mb-2"><?= $block['title'] ?></h3>
            <div class="p max-w-lg wysiwyg"><?= $block['content'] ?></div>
          </div>
        </div>
        <?php echo wp_get_attachment_image($block['background_image'], 'lg', false, ['class' => 'absolute-cover object-cover w-full h-full z-0']); ?>
        <div class="absolute w-full bottom-0 left-0 z-0 bg-gradient-to-t from-black/80 to-transparent h-[80%]"></div>
      </div>
    <?php endforeach; ?>
  </div>
</div>