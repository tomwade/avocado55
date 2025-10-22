<div class="h-screen relative isolate overflow-hidden bg-gradient-to-b from-indigo-100/20 pt-14 bg-[#FF1F2E]" style="min-height: 768px">
  <?php if ($image = get_sub_field('background_image')) { ?>
    <div class="absolute inset-0 z-1" style="background: linear-gradient(90deg, #1A1A1A 12.92%, rgba(17, 17, 17, 0) 63.75%); opacity: 0.8;"></div>
    <img src="<?php echo $image['url']; ?>" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center">
  <?php } ?>

  <div class="absolute top-1/2 transform -translate-y-1/2 z-2">
    <div class="mx-auto max-w-7xl px-6 py-32 sm:py-40 lg:px-16">
      <h1 class="mt-12 mb-4 text-sm text-offwhite font-semibold uppercase leading-tight tracking-subtitle"><?php echo get_sub_field('label'); ?></h2>
      <h2 class="max-w-xl text-4xl font-medium tracking-tight text-white sm:text-7xl lg:col-span-2 xl:col-auto"><?php echo get_sub_field('title'); ?></h2>
    </div>
  </div>
</div>
