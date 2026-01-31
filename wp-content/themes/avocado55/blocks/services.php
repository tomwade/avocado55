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

<section class="relative bg-brand-light py-16 lg:py-24 overflow-hidden">
  <!-- Background watermark -->
  <div class="absolute top-0 left-0 w-80 lg:w-[500px] -translate-x-1/4 -translate-y-1/4 opacity-100 pointer-events-none">
    <img 
      src="<?php echo get_template_directory_uri(); ?>/assets/images/avacado-mark-grayscale.png" 
      alt="" 
      class="w-full h-auto"
      aria-hidden="true"
    />
  </div>

  <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
    <!-- Title Section -->
    <?php if ($title) : ?>
      <h2 class="text-3xl lg:text-5xl font-light text-gray-900 italic leading-tight max-w-4xl mb-8 [&>strong]:font-semibold [&>strong]:text-brand-green">
        <?php echo $title; ?>
      </h2>
    <?php endif; ?>

    <!-- Explore Services Link -->
    <a href="/services/" class="inline-flex items-center gap-2 text-sm font-medium text-gray-900 mb-12 group">
      Explore our services
      <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-brand-cta text-white transition-transform group-hover:translate-x-1">
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </span>
    </a>

    <!-- Services Grid -->
    <?php if ($services) : ?>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach ($services as $service) : 
          // Get data from the Service post type
          $service_id = $service->ID;
          $service_title = get_the_title($service_id);
          $icon = get_field('icon', $service_id);
          $description = get_field('description', $service_id);
          $url = get_permalink($service_id);
        ?>
          <a href="<?php echo esc_url($url); ?>" class="block bg-white rounded-xl p-6 lg:p-8 shadow-sm hover:shadow-md transition-shadow">
            <!-- Icon -->
            <?php if ($icon) : ?>
              <div class="w-14 h-14 bg-brand-green rounded-xl flex items-center justify-center mb-6">
                <img 
                  src="<?php echo esc_url($icon['url']); ?>" 
                  alt="" 
                  class="w-8 h-8 object-contain"
                  aria-hidden="true"
                />
              </div>
            <?php endif; ?>

            <!-- Title -->
            <?php if ($service_title) : ?>
              <h3 class="text-lg font-semibold text-brand-green mb-3">
                <?php echo esc_html($service_title); ?>
              </h3>
            <?php endif; ?>

            <!-- Description -->
            <?php if ($description) : ?>
              <p class="text-gray-600 text-sm leading-relaxed">
                <?php echo $description; ?>
              </p>
            <?php endif; ?>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
