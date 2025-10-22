<div class="bg-icons bg-icons-2 <?php echo (get_sub_field('style') == 'light') ? 'my-20 bg-white text-neutral-800' : 'py-20 bg-dark-100 text-white'; ?>">

  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <?php if ($label = get_sub_field('label')) { ?>
      <h2 class="mt-12 mb-4 text-sm <?php echo (get_sub_field('style') == 'light') ? 'text-red' : 'text-offwhite'; ?> font-semibold uppercase leading-tight tracking-subtitle"><?php echo $label; ?></h2>
    <?php } ?>

    <?php if ($title = get_sub_field('title')) { ?>
      <h3 class="highlight-blue text-4xl sm:text-5xl !leading-tight max-w-4xl"><?php echo $title; ?></h3>
    <?php } ?>

    <?php if ($link = get_sub_field('button_link')) { ?>
      <a href="<?php echo $link; ?>" class="mt-8 button slide arrow"><?php echo get_sub_field('button_text'); ?></a>
    <?php } ?>

    <div class="mt-12">
      <div class="mx-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-0.5 overflow-hidden sm:-mx-8">
        <?php foreach (get_sub_field('services') as $service) { ?>
          <div class="rounded-xl border-b-4 border-transparent hover:border-[#ff0000] transition-colors duration-250 p-8">
            <?php if ($service['icon']) { ?>
              <img class="max-h-20 mb-3" src="<?php echo $service['icon']; ?>" alt="<?php echo esc_attr($service['title']); ?>">
            <?php } ?>
            <h5 class="mb-2 text-xl font-medium leading-loose <?php echo (get_sub_field('style') == 'light') ? 'text-neutral-800' : 'text-white'; ?>"><?php echo $service['title']; ?></h5>
            <p class="text-sm font-medium leading-relaxed <?php echo (get_sub_field('style') == 'light') ? 'text-neutral-500' : 'text-neutral-500'; ?>"><?php echo $service['text']; ?></p>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

</div>
