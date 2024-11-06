<?php
$subtitle = get_sub_field('subtitle');
$title = get_sub_field('title');
$checkmarks = get_sub_field('checkmarks');
$content = get_sub_field('content');
$button_text = get_sub_field('button_text');
$below_button_text = get_sub_field('below_button_text');
$background_image = get_sub_field('background_image');
?>

<div class="py-20 relative min-h-screen text-white">

  <?php echo wp_get_attachment_image($background_image, 'hd', false, ['class' => 'absolute-cover object-cover -z-10']); ?>

  <div class="container">
    <div class="text-center">
      <?php if ($subtitle): ?>
        <div class="subtitle mb-2 inverted"><span class="gradient-text inverted"><?php echo $subtitle; ?></span></div>
      <?php endif; ?>


      <?php if ($title): ?>
        <div class="grid-container">
          <div class="col-span-12 lg:col-span-8 lg:col-start-3">
            <h2 class="h2 gradient-text inverted"><?php echo $title; ?></h2>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($checkmarks): ?>
        <div class="flex flex-col md:flex-row items-center justify-center gap-x-4 gap-y-3 mt-6">
          <?php foreach ($checkmarks as $checkmark): ?>
            <div class="flex items-center gap-2">
              <div class="w-5 h-5 rounded-full bg-white grid place-items-center text-black">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="16px" height="16px"
                  fill="currentColor">
                  <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
                </svg>
              </div>
              <span class="link text-left"><?= $checkmark['text']; ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if ($content): ?>
        <div class="grid-container">
          <div class="col-span-12 md:col-span-8 md:col-start-3 lg:col-span-6 lg:col-start-4 xl:col-span-4 xl:col-start-5">
            <p class="p mt-6">
              <?php echo $content; ?>
            </p>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <div class="grid-container mt-10">
      <div class="col-span-12 md:col-span-10 md:col-start-2 lg:col-span-8 lg:col-start-3 xl:col-span-6 xl:col-start-4">
        <form action="" data-form-id="inquiry-form" class="grid md:grid-cols-2 text-lg gap-6">
          <input
            class="col-span-1 md:col-span-2 bg-transparent border-b border-b-white/20 outline-none py-3 focus:px-4 focus:border-b-white transition-all"
            type="text" placeholder="Full Name" required>
          <input
            class="md:col-span-1 bg-transparent border-b border-b-white/20 outline-none py-3 focus:px-4 focus:border-b-white transition-all"
            type="email" placeholder="Email" required>
          <input
            class="md:col-span-1 bg-transparent border-b border-b-white/20 outline-none py-3 focus:px-4 focus:border-b-white transition-all"
            type="tel" placeholder="Phone">
          <textarea
            class="col-span-1 md:col-span-2 bg-transparent border-b border-b-white/20 outline-none py-3 focus:px-4 focus:border-b-white transition-all resize-none"
            rows="8" name="" id="" placeholder="Message"></textarea>
          <div class="flex flex-col items-center justify-center md:col-span-2">
            <button type="submit" class="button secondary inverted opacity-50"><?php echo $button_text; ?></button>
            <p class="p mt-4 text-center"><?php echo $below_button_text; ?></p>
          </div>
        </form>
      </div>
    </div>

  </div>

</div>