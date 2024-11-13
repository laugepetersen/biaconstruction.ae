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
    <div class="text-center" data-fade>
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
        <form data-form-id="inquiry-form" class="grid md:grid-cols-2 text-lg gap-6">
          <div class="response-message hidden md:col-span-2"></div>
          <input type="hidden" name="action" value="handle_contact_form">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('contact_form_nonce'); ?>">
          <input data-fade
            class="col-span-1 md:col-span-2 bg-transparent border-b border-b-white/20 outline-none py-3 focus:px-4 focus:border-b-white transition-all"
            type="text" placeholder="Full Name" name="full_name" required>
          <input data-fade
            class="md:col-span-1 bg-transparent border-b border-b-white/20 outline-none py-3 focus:px-4 focus:border-b-white transition-all"
            type="email" placeholder="Email" name="email" required>
          <input data-fade
            class="md:col-span-1 bg-transparent border-b border-b-white/20 outline-none py-3 focus:px-4 focus:border-b-white transition-all"
            type="tel" placeholder="Phone" name="phone" required>
          <textarea data-fade
            class="col-span-1 md:col-span-2 bg-transparent border-b border-b-white/20 outline-none py-3 focus:px-4 focus:border-b-white transition-all resize-none"
            rows="8" name="message" id="" placeholder="Message"></textarea>
          <div class="flex flex-col items-center justify-center md:col-span-2">
            <button type="submit" class="button primary inverted">
              <span class="button-text"><?php echo $button_text; ?></span>
              <span class="button-loader hidden"></span>
            </button>
            <p class="p mt-4 text-center"><?php echo $below_button_text; ?></p>
          </div>
        </form>


      </div>
    </div>

  </div>

</div>

<div class="toast-notification" role="alert">
  <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
  </svg>
  <span class="toast-message"></span>
</div>