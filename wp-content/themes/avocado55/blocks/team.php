<div class="py-20">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <?php if (get_sub_field('label')) { ?>
      <h2 class="mt-12 mb-4 text-sm text-gray-400 font-semibold uppercase leading-tight tracking-subtitle"><?php echo get_sub_field('label'); ?></h2>
    <?php } ?>

    <h3 class="highlight-red text-4xl sm:text-6xl font-medium leading-tight max-w-xl"><?php echo get_sub_field('title'); ?></h3>

    <ul role="list" class="mt-12 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
      <?php foreach (get_sub_field('team_members') as $team) { ?>
        <li class="group relative mb-4 break-inside-avoid">
          <div class="relative w-full overflow-hidden rounded-xl">
            <?php if ($image = get_field('image', $team->ID)) { ?>
              <img src="<?php echo $image['sizes']['team_member']; ?>" alt="<?php echo esc_attr(get_the_title($team->ID)); ?>" class="w-full object-cover">
            <?php } ?>
          </div>
          <hgroup class="text-center">
            <h3 class="mt-5 block text-xl xl:text-2xl font-medium text-gray-900"><?php echo get_the_title($team->ID); ?></h3>
            <h4 class="mt-2 block text-sm font-semibold text-gray-400 uppercase leading-tight tracking-subtitle"><?php echo get_field('job', $team->ID); ?></h4>
          </hgroup>
        </li>
      <?php } ?>
    </ul>

  </div>
</div>
