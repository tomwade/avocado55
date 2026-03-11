<?php
/**
 * Text Block
 * 
 * Displays a full-width text content section with title, 
 * excerpt, and optional call to action button.
 */

$title = get_sub_field('title');
$excerpt = get_sub_field('excerpt');
$link = get_sub_field('link');
$background_color = get_sub_field('background_color') ?: 'white';
$text_alignment = get_sub_field('text_alignment') ?: 'left';
$content_width = get_sub_field('content_width') ?: 'regular';

// Background color class
$bg_class = $background_color === 'brand-light' ? 'bg-brand-light' : 'bg-white';

// Text alignment classes
$alignment_classes = [
  'left' => 'text-left',
  'center' => 'text-center mx-auto',
  'right' => 'text-right ml-auto',
];
$align_class = $alignment_classes[$text_alignment] ?? 'text-left';

// Content width: Full (no class), Wide (max-w-4xl), Regular (max-w-2xl), Small (max-w-xl)
$width_classes = [
  'full' => '',
  'wide' => 'max-w-4xl',
  'regular' => 'max-w-2xl',
  'small' => 'max-w-xl',
];
$width_class = $width_classes[$content_width] ?? 'max-w-2xl';
?>

<section class="<?php echo esc_attr($bg_class); ?> py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="max-w-5xl space-y-6 <?php echo esc_attr($align_class); ?>">
      
      <?php if ($title) : ?>
        <h2 class="text-2xl <?php if ($excerpt) : ?>lg:text-5xl<?php else : ?>lg:text-4xl<?php endif; ?> font-semibold text-brand-green leading-tight <?php echo esc_attr(avocado55_animation_class(1)); ?>">
          <?php echo esc_html($title); ?>
        </h2>
      <?php endif; ?>

      <?php if ($excerpt) : ?>
        <div class="page-content <?php echo $width_class ? esc_attr($width_class) . ' ' : ''; ?><?php echo $text_alignment == 'center' ? 'mx-auto ' : ''; ?>text-gray-600 leading-relaxed <?php echo esc_attr(avocado55_animation_class(2)); ?>">
          <?php echo avocado55_render_content( $excerpt ); ?>
        </div>
      <?php endif; ?>

      <?php if ($link) : ?>
        <div class="pt-2 <?php echo esc_attr(avocado55_animation_class(3)); ?>">
          <a 
            href="<?php echo esc_url($link['url']); ?>" 
            target="<?php echo esc_attr($link['target'] ?: '_self'); ?>" 
            class="button button--brand-green"
          >
            <?php echo esc_html($link['title']); ?>
          </a>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>
