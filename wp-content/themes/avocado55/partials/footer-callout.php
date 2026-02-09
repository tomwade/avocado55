<?php
/**
 * Footer Callout Partial
 * 
 * A CTA section that appears above the footer on all pages.
 * Based on the feature.php block logic with hardcoded content.
 */
?>

<div class="relative overflow-hidden bg-[#416257] text-white">
  <div class="relative z-2 mx-auto max-w-7xl px-6 lg:px-8">
    <!-- Chevron Image -->
    <div class="hidden lg:block absolute -top-4 bottom-0 right-0 pointer-events-none">
      <img 
        src="<?php echo get_template_directory_uri(); ?>/assets/images/avacado-mark.png" 
        alt="" 
        class="w-auto h-full"
        aria-hidden="true"
      />
    </div>

    <div class="max-w-2xl space-y-6 py-24 sm:py-32">
      <h2 class="text-6xl font-medium <?php echo esc_attr(avocado55_animation_class(1)); ?>">Ready to find your best way forward? Let's start with a conversation.</h2>
      <p class="text-lg <?php echo esc_attr(avocado55_animation_class(2)); ?>">Tell us where you are today, we'll help you map the next step.</p>

      <a href="/contact/" target="_blank" class="button button--brand-cta <?php echo esc_attr(avocado55_animation_class(3)); ?>">Contact us</a>
    </div>
  </div>
</div>
