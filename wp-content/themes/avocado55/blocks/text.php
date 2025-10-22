<div class="overflow-hidden <?php echo (get_sub_field('style') == 'light') ? 'my-20 bg-white text-neutral-800' : 'py-20 bg-dark-100 text-white'; ?> text-<?php echo get_sub_field('alignment'); ?>">
  <div class="container max-w-screen-<?php echo (get_sub_field('content')) ? get_sub_field('content_width') : 'lg'; ?> mx-auto px-4 sm:px-6 lg:px-8">
    <?php if ($label = get_sub_field('label')) { ?>
      <h2 class="mb-4 text-sm <?php echo (get_sub_field('style') == 'light') ? 'text-neutral-400' : 'text-offwhite'; ?> font-semibold uppercase leading-tight tracking-subtitle"><?php echo $label; ?></h2>
    <?php } ?>

    <h2 class="<?php echo (get_sub_field('content')) ? 'font-medium' : 'font-normal'; ?> highlight-red text-4xl tracking-tight sm:text-6xl !leading-tight"><?php echo get_sub_field('title'); ?></h2>

    <?php if ($content = get_sub_field('content')) { ?>
      <div class="mt-6 text-left space-y-6 leading-loose text-neutral-500 text-xl post-content"><?php echo $content; ?></div>
    <?php } ?>
  </div>
</div>
