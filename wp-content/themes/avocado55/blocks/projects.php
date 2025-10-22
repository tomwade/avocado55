<div class="py-20 bg-white">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-9 grid grid-cols-2">
      <h2 class="font-medium text-5xl leading-tight highlight-red"><?php echo get_sub_field('title'); ?></h2>
      <div class="text-right">
        <a href="<?php echo site_url('projects'); ?>" class="button slide arrow">View all</a>
      </div>
    </div>

    <ul role="list" class="columns-1 sm:columns-2 gap-16 xl:gap-20">
      <?php foreach (get_sub_field('projects') as $i => $project) { ?>
        <?php if (has_post_thumbnail($project->ID)) { ?>
          <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($project->ID), 'full'); ?>

          <li class="group relative mb-12 break-inside-avoid">
            <a href="<?php echo get_the_permalink($project->ID); ?>" class="absolute inset-0 z-2"></a>
            <div class="relative w-full overflow-hidden rounded-xl">
              <a href="<?php echo get_the_permalink($project->ID); ?>" class="play absolute inset-0 hidden group-hover:block"></a>
              <img src="<?php echo $image[0]; ?>" alt="<?php echo esc_attr(get_the_title($project->ID)); ?>" class="w-full object-cover">
            </div>
            <hgroup class="text-center">
              <h4 class="mt-5 block truncate text-sm font-semibold text-gray-400 uppercase leading-tight tracking-subtitle"><?php echo get_field('client', $project->ID); ?></h4>
              <h3 class="mt-2 block truncate text-2xl font-medium text-gray-900"><?php echo get_field('title', $project->ID); ?></h3>
            </hgroup>
          </li>
        <?php } ?>
      <?php } ?>
    </ul>
  </div>
</div>
