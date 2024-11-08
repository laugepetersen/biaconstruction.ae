<?php
$subtitle = get_field('subtitle');
$title = get_field('title');
$links = get_field('links');
$slides = get_field('slides');
?>

<section class="min-h-[80vh] bg-black text-white grid relative overflow-hidden">

  <div class="container mt-auto pt-nav relative z-10">
    <div class="grid-container">
      <div class="pt-20 pb-10 col-span-12 xl:col-span-6 xl:col-start-2">
        <div class="mb-10">
          <div class="mb-6">
            <?php if ($subtitle): ?>
              <div class="subtitle inverted mb-2"><span class="gradient-text inverted"><?php echo $subtitle; ?></span>
              </div>
            <?php endif; ?>
            <?php if ($title): ?>
              <h1 class="h1 gradient-text inverted"><?php echo $title; ?></h1>
            <?php endif; ?>
          </div>
          <?php if ($links): ?>
            <div class="flex items-center gap-9">
              <?php foreach ($links as $link): ?>
                <div class="-m-2">
                  <div
                    class="flex items-center gap-2 p-2 pr-3 rounded-full hover:bg-white/10 hover:backdrop-blur transition-all relative">
                    <a href="<?php echo $link['link']['url']; ?>" class="w-full h-full top-0 left-0 absolute z-10"></a>
                    <div class="w-5 h-5 rounded-full bg-white grid place-items-center text-black">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="16px" height="16px"
                        fill="currentColor">
                        <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
                      </svg>
                    </div>
                    <span class="link"><?= $link['link']['title']; ?></span>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="flex gap-1 hero-pagination"></div>
      </div>
    </div>
  </div>

  <?php if ($slides): ?>
    <div class="absolute-cover z-0">
      <div class="absolute top-0 left-0 w-[150vw] h-full translate-x-[-25vw] z-10 gradient-radial"></div>
      <div class="swiper hero-banner-slider absolute-cover">
        <div class="swiper-wrapper">
          <?php foreach ($slides as $image_id): ?>
            <div class="swiper-slide">
              <?php echo wp_get_attachment_image($image_id, 'xl', false, ['class' => 'absolute-cover w-full h-full object-cover']); ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

</section>
<div class="h-4 bg-black"></div>