<?php
$title = get_the_title();
$project_type = get_field('project_type');
$checkmarks = get_field('checkmarks');
$description = get_field('description');
$file_url = get_field('downloadable_pdf');
?>

<section class="pt-nav">

  <div class="pt-40">

    <div class="container">
      <div class="grid gap-8">

        <div class="grid-container">
          <div class="col-span-12 lg:col-span-8 xl:col-span-6 xl:col-start-2">
            <?php if ($project_type): ?>
              <div class="subtitle mb-2">
                <p class="gradient-text"><?= $project_type; ?></p>
              </div>
            <?php endif; ?>
            <h1 class="h1"><?= $title; ?></h1>
            <?php if ($checkmarks): ?>
              <div class="flex flex-wrap gap-6 items-center mt-6">
                <?php foreach ($checkmarks as $checkmark): ?>
                  <div class="flex items-center gap-2">
                    <div class="w-5 h-5 rounded-full bg-black grid place-items-center text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="16px" height="16px"
                        fill="currentColor">
                        <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
                      </svg>
                    </div>
                    <p class="font-medium text-base"><?= $checkmark['item']; ?></p>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <?php if ($description): ?>
          <div class="grid-container">
            <div class="col-span-12 md:col-span-5 md:col-start-8 lg:col-start-7 xl:col-span-4 xl:col-start-7">
              <p class="p"><?= $description; ?></p>
              <?php if ($file_url): ?>
                <a download="BIA Case Study - <?= $title ?>" href="<?= $file_url; ?>"
                  class="text-base font-medium mt-4 inline-flex items-center gap-2" target="_blank">
                  <svg width="24" height="24" viewBox="0 0 512 512">
                    <path
                      d="M256,409.7,152.05,305.75,173.5,284.3l67.33,67.32V34h30.34V351.62L338.5,284.3,360,305.75ZM445.92,351v93.22a3.61,3.61,0,0,1-3.47,3.48H69.15a3.3,3.3,0,0,1-3.07-3.48V351H35.74v93.22A33.66,33.66,0,0,0,69.15,478h373.3a33.85,33.85,0,0,0,33.81-33.82V351Z"
                      fill="currentColor" />
                  </svg>
                  <span>Download PDF</span>
                </a>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

      </div>

    </div>

  </div>

</section>