<?php
/**
 * Feature Header Partial
 * 
 * A reusable feature header with background image overlay.
 * Used for featured stories on archive pages.
 * 
 * Expected $args:
 * - background_image (string): URL of the background image
 * - badge (string, optional): Badge text (e.g., "Featured")
 * - subtitle (string, optional): Small text above the title
 * - title (string): Main heading
 * - link_url (string): URL for the CTA button
 * - link_text (string): Text for the CTA button
 */

$background_image = $args['background_image'] ?? '';
$badge = $args['badge'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$title = $args['title'] ?? '';
$link_url = $args['link_url'] ?? '';
$link_text = $args['link_text'] ?? 'Read story';
?>

<div class="relative overflow-hidden bg-brand-green">
  <?php if ($background_image) : ?>
    <!-- Background Image with Overlay -->
    <img 
      src="<?php echo esc_url($background_image); ?>" 
      alt="" 
      class="absolute inset-0 h-full w-full object-cover object-center"
    >
    <div class="absolute inset-0 bg-[#416257]/60"></div>
  <?php endif; ?>

  <div class="z-2 mx-auto max-w-7xl px-6 lg:px-8">
    <div class="max-w-2xl mx-auto text-white text-center space-y-4 py-24 sm:py-32">
      
      <?php if ($badge) : ?>
        <span class="absolute top-8 left-8 inline-block bg-[#CCFC80] text-brand-green text-xs font-medium px-3 py-1.5 rounded <?php echo esc_attr(avocado55_animation_class(1)); ?>">
          <?php echo esc_html($badge); ?>
        </span>
      <?php endif; ?>

      <?php if ($subtitle) : ?>
        <p class="text-sm uppercase tracking-wider text-white/80 <?php echo esc_attr(avocado55_animation_class(2)); ?>">
          <?php echo esc_html($subtitle); ?>
        </p>
      <?php endif; ?>

      <?php if ($title) : ?>
        <h1 class="text-3xl lg:text-4xl font-medium leading-tight <?php echo esc_attr(avocado55_animation_class(3)); ?>">
          <?php echo esc_html($title); ?>
        </h1>
      <?php endif; ?>

      <?php if ($link_url) : ?>
        <div class="pt-2">
          <a 
            href="<?php echo esc_url($link_url); ?>" 
            class="inline-flex items-center justify-center text-sm px-4 py-2 border border-white text-white font-medium rounded hover:bg-white hover:text-brand-green transition-colors <?php echo esc_attr(avocado55_animation_class(4)); ?>"
          >
            <?php echo esc_html($link_text); ?>
          </a>
        </div>
      <?php endif; ?>

    </div>
  </div>
</div>
