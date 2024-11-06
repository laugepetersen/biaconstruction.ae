<?php
$subtitle = get_sub_field('subtitle');
$title = get_sub_field('title');
$content = get_sub_field('content');
$team = get_sub_field('team_members');
?>


<div class="container">



  <?php if ($title): ?>
    <div class="grid-container">
      <div class="col-span-12 lg:col-span-8 xl:col-start-2">
        <?php if ($subtitle): ?>
          <div class="subtitle mb-2"><span class="gradient-text"><?php echo $subtitle; ?></span></div>
        <?php endif; ?>
        <h2 class="h2 gradient-text"><?php echo $title; ?></h2>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content): ?>
    <div class="grid-container">
      <div class="col-span-12 md:col-span-8 lg:col-span-6 xl:col-span-4 xl:col-start-2">
        <p class="p mt-4">
          <?php echo $content; ?>
        </p>
      </div>
    </div>
  <?php endif; ?>

  <div class="grid-container mt-10">
    <?php foreach ($team as $member): ?>
      <div class="col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
        <div class="relative aspect-square md:aspect-[4/5]">
          <?php echo wp_get_attachment_image(get_field('profile_picture', $member), 'md', false, ['class' => 'absolute-cover object-cover object-top ']); ?>
        </div>
        <div class="mt-2 flex flex-col items-start">
          <h4 class="h4 !leading-tight"><?php echo get_the_title($member); ?></h4>
          <p class="text-xs font-medium tracking-wider uppercase leading-none text-black/80 mt-2 mb-3">
            <?php echo get_field('company_title', $member); ?>
          </p>
          <div class="flex items-center gap-1 opacity-80">
            <?php foreach (get_field('languages', $member) as $language): ?>
              <div class="subtitle">
                <p class="gradient-text"><?php echo $language['language']; ?></p>
              </div>

            <?php endforeach; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</div>