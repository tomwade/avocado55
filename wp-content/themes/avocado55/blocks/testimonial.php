<?php
/**
 * Testimonial Block
 * 
 * Displays a full-width testimonial quote with brand background.
 */

$quote = get_sub_field('quote');
$attribution = get_sub_field('attribution');
?>

<section class="bg-brand-cta py-16 lg:py-24">
  <div class="mx-auto max-w-4xl px-6 lg:px-8 text-center">
    
    <!-- Logo Mark -->
    <div class="mb-8 <?php echo esc_attr(avocado55_animation_class(1)); ?>">
      <img 
        src="<?php echo get_template_directory_uri(); ?>/assets/images/avacado-mark.png" 
        alt="" 
        class="w-12 h-auto mx-auto"
        aria-hidden="true"
      />
    </div>

    <!-- Quote -->
    <?php if ($quote) : ?>
      <blockquote class="text-2xl lg:text-4xl font-light text-white leading-relaxed mb-8 <?php echo esc_attr(avocado55_animation_class(2)); ?>">
        "<?php echo esc_html($quote); ?>"
      </blockquote>
    <?php endif; ?>

    <!-- Attribution -->
    <?php if ($attribution) : ?>
      <p class="text-sm text-white/80 <?php echo esc_attr(avocado55_animation_class(3)); ?>">
        <?php echo esc_html($attribution); ?>
      </p>
    <?php endif; ?>

  </div>
</section>
