<?php
$first_column = get_sub_field('first_column');
$second_column = get_sub_field('second_column');
?>

<div class="container grid gap-0 lg:gap-y-6">
  <div class="grid-container">
    <div class="wysiwyg col-span-12 md:col-span-6 xl:col-span-5 xl:col-start-2">
      <?php echo $first_column; ?>
    </div>
  </div>
  <div class="grid-container">
    <div class="wysiwyg col-span-12 md:col-span-5 md:col-start-8 lg:col-start-7 xl:col-span-4 xl:col-start-7">
      <?php echo $second_column; ?>
    </div>
  </div>
</div>