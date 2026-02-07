<?php
/**
 * Partner Card Partial
 * 
 * Displays a partner card with logo, title, excerpt, and optional link.
 * Can have a background image with dark green overlay.
 * 
 * Expected $args:
 * - logo (array): Image array with url, alt
 * - title (string): Partner title
 * - excerpt (string): Short description
 * - link (array): Optional link array with url, title, target
 * - background_image (array): Optional background image array
 */

$logo = $args['logo'] ?? null;
$title = $args['title'] ?? '';
$excerpt = $args['excerpt'] ?? '';
$link = $args['link'] ?? null;
$background_image = $args['background_image'] ?? null;

// Determine if we have a background image
$has_bg_image = !empty($background_image['url']);
$bg_class = $has_bg_image ? 'bg-brand-green' : 'bg-brand-light';
$text_class = $has_bg_image ? 'text-white' : 'text-brand-green';
$excerpt_class = $has_bg_image ? 'text-white/80' : 'text-gray-600';
?>

<div class="relative <?php echo esc_attr($bg_class); ?> rounded-2xl overflow-hidden min-h-[300px] flex flex-col justify-between p-6 lg:p-8">
  
  <?php if ($has_bg_image) : ?>
    <!-- Background Image with Overlay -->
    <img 
      src="<?php echo esc_url($background_image['url']); ?>" 
      alt="" 
      class="absolute inset-0 w-full h-full object-cover"
      aria-hidden="true"
    />
    <div class="absolute inset-0 bg-brand-green/80"></div>
  <?php endif; ?>

  <div class="relative z-10 flex flex-col h-full justify-between">
    <!-- Top Section: Logo -->
    <?php if ($logo && !empty($logo['url'])) : ?>
      <div class="mb-8">
        <div class="h-8 w-auto flex overflow-hidden">
          <img 
            src="<?php echo esc_url($logo['url']); ?>" 
            alt="<?php echo esc_attr($logo['alt'] ?: $title); ?>" 
            class="max-w-full max-h-full object-contain"
          />
        </div>
      </div>
    <?php endif; ?>

    <!-- Middle Section: Title & Excerpt -->
    <div class="flex-grow mb-8">
      <?php if ($title) : ?>
        <h3 class="text-xl lg:text-2xl font-semibold <?php echo esc_attr($text_class); ?> mb-4">
          <?php echo esc_html($title); ?>
        </h3>
      <?php endif; ?>

      <?php if ($excerpt) : ?>
        <p class="<?php echo esc_attr($excerpt_class); ?> text-sm leading-relaxed">
          <?php echo $excerpt; ?>
        </p>
      <?php endif; ?>
    </div>

    <!-- Bottom Section: Link Button -->
    <?php if ($link && !empty($link['url'])) : ?>
      <div>
        <a 
          href="<?php echo esc_url($link['url']); ?>" 
          target="<?php echo esc_attr($link['target'] ?: '_self'); ?>" 
          class="inline-flex items-center justify-center px-5 py-2.5 border <?php echo $has_bg_image ? 'border-white text-white hover:bg-white hover:text-brand-green' : 'border-brand-green text-brand-green hover:bg-brand-green hover:text-white'; ?> font-medium text-sm rounded transition-colors"
        >
          <?php echo esc_html($link['title'] ?: 'Find out more'); ?>
        </a>
      </div>
    <?php endif; ?>
  </div>

</div>
