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
      class="absolute inset-0 -z-10 h-full w-full object-cover object-center"
    >
    <div class="absolute inset-0 -z-10 bg-black/50"></div>
  <?php endif; ?>

  <div class="relative z-2 mx-auto max-w-7xl px-6 lg:px-8">
    <div class="max-w-2xl text-white space-y-6 py-24 sm:py-32">
      
      <?php if ($badge) : ?>
        <span class="inline-block bg-brand-cta text-white text-xs font-medium px-3 py-1.5 rounded">
          <?php echo esc_html($badge); ?>
        </span>
      <?php endif; ?>

      <?php if ($subtitle) : ?>
        <p class="text-sm uppercase tracking-wider text-white/80">
          <?php echo esc_html($subtitle); ?>
        </p>
      <?php endif; ?>

      <?php if ($title) : ?>
        <h1 class="text-4xl lg:text-6xl font-medium leading-tight">
          <?php echo esc_html($title); ?>
        </h1>
      <?php endif; ?>

      <?php if ($link_url) : ?>
        <a 
          href="<?php echo esc_url($link_url); ?>" 
          class="inline-flex items-center justify-center px-6 py-3 border border-white text-white font-medium rounded hover:bg-white hover:text-brand-green transition-colors"
        >
          <?php echo esc_html($link_text); ?>
        </a>
      <?php endif; ?>

    </div>
  </div>
</div>
