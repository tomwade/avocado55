<?php
/* Template Name: Contact */
get_header();

$map_link = get_field('google_maps_link');
?>

<div class="bg-icons bg-icons-4 bg-icons-5 bg-dark-100 text-white relative pt-14">
  <div class="mx-auto max-w-7xl px-6 pt-32 sm:pt-40 lg:px-16 pb-32">
    <div class="block md:flex gap-24">
      <div class="flex-1 mb-12 md:mb-0">
        <h2 class="mt-12 mb-4 text-sm text-offwhite font-semibold uppercase leading-tight tracking-subtitle"><?php echo get_field('page_label'); ?></h2>
        <h2 class="highlight-red max-w-4xl text-5xl font-medium tracking-tight text-white sm:text-7xl lg:col-span-2 xl:col-auto"><?php echo get_field('page_title'); ?></h2>
      </div>

      <div class="flex-1 space-y-6 leading-loose text-offwhite">
        <?php echo do_shortcode(get_field('contact_form')); ?>
      </div>
    </div>
  </div>
</div>

<style>
#curve-contact {
  margin: 0 0 -6.25rem 0rem;
}

#curve-contact path {
  fill: rgba(21, 21, 21, 1);
}

#curve-contact + * {
  padding-top: calc(5rem + 100px);
}
</style>

<div id="curve-contact" class="curve">
  <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
    <path d="M0,0V7.23C0,65.52,268.63,112.77,600,112.77S1200,65.52,1200,7.23V0Z"></path>
  </svg>
</div>

<div class="bg-offwhite py-20 overflow-hidden">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 space-y-12 md:space-y-0">
      <div>
        <h2 class="font-medium highlight-red text-4xl tracking-tight sm:text-6xl !leading-tight">Details</h2>

        <div class="mt-6 text-left space-y-6 leading-loose text-neutral-500 text-xl">
          <p>
            2nd Floor, 15 Greek Street, London, W1D 4DP<br />
            <?php if ($map_link) { ?>
              <a href="<?php echo $map_link; ?>" target="_blank" title="Get directions" class="text-red">Get directions</a>
            <?php } ?>
          </p>

          <p>
            <a href="tel:+44 (0) 20 3637 1412">+44 (0) 20 3637 1412</a>
          </p>

          <p>
            <a href="mailto:info@experience12.com" class="text-red">info@experience12.com</a>
          </p>
        </div>
      </div>

      <div>
        <?php if ($embed = get_field('google_maps_embed')) { ?>
          <a href="<?php echo $map_link; ?>" target="_blank" class="relative">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/map-marker.png" class="absolute z-1 left-1/2 top-1/2 h-auto w-12" style="transform: translateX(-50%) translateY(-100%);" />
            <img src="<?php echo $embed; ?>" class="-z-10 w-auto min-w-full min-h-full rounded-2xl" />
          </a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php
get_footer();
