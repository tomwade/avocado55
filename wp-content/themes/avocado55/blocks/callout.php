<?php
$text = get_sub_field('text');
$text_alignment = get_sub_field('text_alignment'); // 'left', 'right', or 'center'
$text_alignment = $text_alignment ?: 'left'; // Default to left if not set
$button = get_sub_field('button'); // ACF Link field

// Text alignment classes: always left on mobile, then apply alignment on desktop
$text_align_classes = 'text-left';
if ($text_alignment === 'center') {
  $text_align_classes .= ' md:text-center';
} elseif ($text_alignment === 'right') {
  $text_align_classes .= ' md:text-right';
}
// left is already handled by default text-left
?>

<?php if ($text || $button): ?>
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
    <div class="<?php echo esc_attr($text_align_classes); ?> max-w-4xl mx-auto">
      
      <?php if ($text): ?>
        <div class="text-gray-700 text-lg leading-relaxed mb-6 <?php echo esc_attr(avocado55_animation_class(1)); ?>">
          <?php echo wp_kses_post($text); ?>
        </div>
      <?php endif; ?>

      <?php if ($button): ?>
        <a 
          href="<?php echo esc_url($button['url']); ?>" 
          <?php if ($button['target']): ?>target="<?php echo esc_attr($button['target']); ?>"<?php endif; ?>
          class="inline-block px-6 py-3 border border-gray-300 rounded-lg bg-white text-gray-700 font-medium hover:bg-gray-50 transition-colors <?php echo esc_attr(avocado55_animation_class(2)); ?>"
        >
          <?php echo esc_html($button['title']); ?>
        </a>
      <?php endif; ?>

    </div>
  </div>
<?php endif; ?>

