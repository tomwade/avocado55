<?php
/**
 * Services Block
 * 
 * Displays a services overview section with a large title,
 * link to services page, and a grid of service cards.
 * Services are referenced from the Service post type.
 */

$title = get_sub_field('title');
$services = get_sub_field('services'); // Returns array of post objects
?>

<section class="relative py-16 lg:py-24 overflow-hidden">
  <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
    <?php if ($title) : ?>
      <!-- Background watermark -->
      <div class="hidden lg:block absolute left-0 -translate-x-1/2 -top-16 opacity-100 pointer-events-none z-1">
        <img 
          src="<?php echo get_template_directory_uri(); ?>/assets/images/avacado-mark-grayscale.png" 
          alt="" 
          class="w-auto h-[440px] <?php echo esc_attr(avocado55_animation_class(0)); ?>"
          aria-hidden="true"
        />
      </div>

      <div class="relative z-2">
      <h2 class="text-3xl lg:text-5xl font-semibold text-brand-green leading-tight max-w-5xl mb-8 [&>span]:font-semibold [&>span]:text-brand-cta <?php echo esc_attr(avocado55_animation_class(1)); ?>">
          <?php echo $title; ?>
        </h2>

        <!-- Explore Services Link -->
        <a href="/services/" class="inline-flex items-center gap-2 text-sm font-medium text-gray-900 mb-12 group <?php echo esc_attr(avocado55_animation_class(2)); ?>">
          Explore our services
          <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-brand-cta text-white transition-transform group-hover:translate-x-1">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </span>
        </a>
      </div>
    <?php endif; ?>

    <!-- Services Grid -->
    <?php if ($services) : ?>
      <div class="relative z-2 grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php $service_index = 3; foreach ($services as $service) : ?>
          <?php get_template_part('partials/service-card', null, ['service_id' => $service->ID, 'animation_delay' => $service_index]); ?>
        <?php $service_index++; endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
