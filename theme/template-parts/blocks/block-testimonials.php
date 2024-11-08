<?php
$subtitle = get_sub_field('subtitle');
$title = get_sub_field('title');
$content = get_sub_field('content');
$testimonials = get_sub_field('testimonials');
$background_image = get_sub_field('background_image');
$buttons = get_sub_field('buttons');
?>

<div class="bg-black pt-40 pb-20 relative text-white md:text-right">
  <div class="absolute-cover">
    <?php echo wp_get_attachment_image($background_image, 'xl', false, ['class' => 'absolute-cover object-cover']); ?>
  </div>

  <div class="container relative z-10">
    <?php if ($subtitle): ?>
      <div class="grid-container">
        <div class="col-span-12 xl:col-span-11">
          <div class="subtitle inverted mb-2"><span class="gradient-text inverted"><?php echo $subtitle; ?></span></div>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($title): ?>
      <div class="grid-container">
        <div class="col-span-12 lg:col-span-8 lg:col-end-13 xl:col-end-12 ">
          <h2 class="h2 gradient-text inverted"><?= $title; ?></h2>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($content): ?>
      <div class="grid-container">
        <div class="col-span-12 md:col-span-8 md:col-end-13 lg:col-span-6 xl:col-span-4 lg:col-end-13 xl:col-end-12">
          <p class="p mt-4"><?= $content; ?></p>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php if ($testimonials): ?>
  <div class="relative -top-10">
    <div class="container">
      <div class="grid-container">

        <div class="grid col-span-12 xl:col-span-10 xl:col-end-12 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16">
          <?php foreach ($testimonials as $testimonial): ?>
            <?php
            $profile_picture = get_field('profile_picture', $testimonial);
            $name = get_the_title($testimonial);
            $company_title = get_field('company_title', $testimonial);
            $review = get_field('review', $testimonial);
            ?>
            <div class="flex flex-col items-center text-center gap-2">
              <div class="bg-dark rounded-full relative h-20 w-20 border-2 border-white overflow-hidden">
                <?php echo wp_get_attachment_image($profile_picture, 'sm', false, ['class' => 'absolute-cover object-cover']); ?>
              </div>
              <div class="flex items-center gap-1 my-2">
                <?php foreach (range(1, 5) as $i): ?>
                  <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_70_2890)">
                      <path
                        d="M10.1653 15L4.2873 18.09L5.4103 11.545L0.654297 6.91L7.2263 5.955L10.1653 0L13.1043 5.955L19.6763 6.91L14.9203 11.545L16.0433 18.09L10.1653 15Z"
                        fill="currentColor" />
                    </g>
                  </svg>
                <?php endforeach; ?>
              </div>
              <p class="text-lg leading-7 opacity-80"><?= $review; ?></p>
              <p class="p text-black opacity-100 font-medium"><?= $name; ?></p>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </div>
<?php endif; ?>

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