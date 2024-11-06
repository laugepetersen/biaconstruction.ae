<?php
$subtitle = get_sub_field('subtitle');
$title = get_sub_field('title');
$content = get_sub_field('content');
$projects = get_sub_field('projects');
$show_all = get_sub_field('show_all');
$buttons = get_sub_field('buttons');
?>

<div class="container">

  <div>

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
  </div>

  <?php if ($projects && !$show_all): ?>

    <div class="grid gap-8 mt-10">
      <?php foreach ($projects as $project): ?>
        <?php $gallery = get_field('gallery', $project); ?>

        <div class="">

          <?php if (count($gallery) >= 3): ?>
            <div class="grid grid-cols-[4fr_1fr] gap-0.5 items-start relative">
              <div class="aspect-[4/5] md:aspect-square lg:aspect-video bg-black relative">
                <?php echo wp_get_attachment_image($gallery[0], 'xl', false, ['class' => 'absolute-cover w-full h-full object-cover']); ?>
              </div>
              <div class="h-full flex flex-col gap-0.5">
                <div class="aspect-[4/5] md:aspect-square lg:aspect-video bg-black relative">
                  <?php echo wp_get_attachment_image($gallery[1], 'md', false, ['class' => 'absolute-cover w-full h-full object-cover']); ?>
                </div>
                <div class="h-full bg-black relative">
                  <?php echo wp_get_attachment_image($gallery[2], 'md', false, ['class' => 'absolute-cover w-full h-full object-cover']); ?>
                </div>
              </div>
              <a href="<?php echo get_the_permalink($project); ?>" class="absolute-cover z-10"></a>
            </div>
          <?php endif; ?>

          <div class="grid grid-cols-[4fr_1fr] gap-0.5 items-center mt-2">
            <div class="flex justify-between items-center">
              <h3 class="h3 mr-3"><a
                  href="<?php echo get_the_permalink($project); ?>"><?php echo get_the_title($project) ?></a>
              </h3>
              <div class="subtitle"><span class="gradient-text"><?php the_field('project_type', $project); ?></span></div>
            </div>
            <div class="w-[28px] h-[28px] rounded-full gradient-border grid place-items-center ml-auto">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="16px" height="16px"
                fill="currentColor">
                <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
              </svg>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  <?php elseif ($show_all): ?>

    <?php $all_projects = get_posts([
      'post_type' => 'project',
      'posts_per_page' => -1,
      'fields' => 'ids',
    ]); ?>
    <div class="grid gap-x-8 gap-y-20 grid-cols-1 lg:grid-cols-2">
      <?php foreach ($all_projects as $index => $project): ?>
        <?php
        $title = get_the_title($project);
        $permalink = get_the_permalink($project);
        $gallery = get_field('gallery', $project);
        $type = get_field('project_type', $project);
        ?>
        <div class="relative group <?php echo $index % 3 === 1 ? 'lg:top-40' : ''; ?>">
          <div class="grid grid-cols-[4fr_1fr] relative">
            <a href="<?php echo $permalink; ?>" class="absolute-cover z-10"></a>
            <div class="aspect-square md:aspect-square bg-black relative">
              <?php if ($gallery[0]): ?>
                <?php echo wp_get_attachment_image($gallery[0], 'xl', false, ['class' => 'absolute-cover w-full h-full object-cover']); ?>
              <?php endif; ?>
            </div>
            <div class="flex flex-col gap-0.5">
              <div class="aspect-[4/5] md:aspect-square  bg-black relative">
                <?php if ($gallery[1]): ?>
                  <?php echo wp_get_attachment_image($gallery[1], 'md', false, ['class' => 'absolute-cover w-full h-full object-cover']); ?>
                <?php endif; ?>
              </div>
              <div class="h-full bg-black relative">
                <?php if ($gallery[2]): ?>
                  <?php echo wp_get_attachment_image($gallery[2], 'md', false, ['class' => 'absolute-cover w-full h-full object-cover']); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="grid grid-cols-[4fr_1fr] gap-0.5 mt-2 items-center">
            <div class="flex justify-between items-center">
              <h3 class="h3"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
              <div class="subtitle"><span class="gradient-text"><?php echo $type; ?></span></div>
            </div>

            <div class="w-[28px] h-[28px] rounded-full gradient-border grid place-items-center ml-auto">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="16px" height="16px"
                fill="currentColor">
                <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
              </svg>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
    </div>

  <?php endif; ?>

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