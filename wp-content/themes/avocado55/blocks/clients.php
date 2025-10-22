<div class="bg-dark-100 text-white">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-center text-white text-sm font-semibold uppercase tracking-title"><?php echo get_sub_field('title'); ?></h2>
    <div class="mx-auto mt-10 grid max-w-lg grid-cols-2 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-4 sm:gap-x-10 md:grid-cols-5 lg:max-w-5xl">
      <?php foreach (get_sub_field('clients') as $i => $client) { ?>
        <?php if (has_post_thumbnail($client->ID)) { ?>
          <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id( $client->ID), 'full'); ?>
          <img src="<?php echo $image[0]; ?>" class="max-h-20 w-full object-contain" alt="<?php echo get_the_title($client->ID); ?>" />
        <?php } ?>
      <?php } ?>
    </div>
  </div>
</div>
