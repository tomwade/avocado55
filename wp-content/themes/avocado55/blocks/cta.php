<div class="py-20 text-white bg-icons bg-icons-<?php echo get_sub_field('background_icons'); ?>" style="background-color: <?php echo get_sub_field('background_colour'); ?>">
  <?php if (get_sub_field('cta_type') != 'left') { ?>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <?php if (get_sub_field('label')) { ?>
        <h2 class="mt-12 mb-4 text-sm text-offwhite font-semibold uppercase leading-tight tracking-subtitle"><?php echo get_sub_field('label'); ?></h2>
      <?php } ?>
      <h3 class="highlight-red text-4xl sm:text-6xl leading-tight max-w-3xl"><?php echo get_sub_field('title'); ?></h3>
      <?php if (get_sub_field('button_text')) { ?>
        <a href="<?php echo get_sub_field('button_link'); ?>" class="mt-8 button slide arrow"><?php echo get_sub_field('button_text'); ?></a>
      <?php } ?>
    </div>
  <?php } else { ?>
    <div class="my-12 container mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2">
      <div>
        <?php if (get_sub_field('label')) { ?>
          <h2 class="mt-12 mb-4 text-sm text-offwhite font-semibold uppercase leading-tight tracking-subtitle"><?php echo get_sub_field('label'); ?></h2>
        <?php } ?>
        <h3 class="highlight-red text-5xl sm:text-6xl leading-tight max-w-3xl"><?php echo get_sub_field('title'); ?></h3>
      </div>

      <?php if (get_sub_field('button_text')) { ?>
        <div class="relative sm:text-right">
          <a href="<?php echo get_sub_field('button_link'); ?>" class="mt-8 button slide arrow sm:absolute sm:top-1/2 sm:right-0 sm:transform sm:-translate-y-1/2"><?php echo get_sub_field('button_text'); ?></a>
        </div>
      <?php } ?>
    </div>
  <?php } ?>
</div>
