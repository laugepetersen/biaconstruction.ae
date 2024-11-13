<?php
$title = get_the_title();
$large_content = get_field('large_content');
$small_content = get_field('small_content');
?>

<section class="pt-nav">

  <div class="pt-40">

    <div class="container">
      <div class="grid gap-8">

        <div class="grid-container" data-fade>
          <div class="col-span-12 lg:col-span-8 xl:col-span-6 xl:col-start-2">
            <h1 class="h1"><?= $title; ?></h1>
          </div>
        </div>

        <?php if ($large_content): ?>
          <div class="grid-container" data-fade>
            <div class="col-span-12 md:col-span-6 xl:col-span-5 xl:col-start-2">
              <h3 class="h3"><?= $large_content; ?></h3>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($small_content): ?>
          <div class="grid-container" data-fade>
            <div class="col-span-12 md:col-span-5 md:col-start-8 lg:col-start-7 xl:col-span-4 xl:col-start-7">
              <p class="p"><?= $small_content; ?></p>
            </div>
          </div>
        <?php endif; ?>

      </div>

    </div>

  </div>

</section>