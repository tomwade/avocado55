<?php
$header = get_sub_field('header'); // Optional heading
$body = get_sub_field('body'); // Required body text
$text_alignment = get_sub_field('text_alignment'); // 'left', 'center', or 'right'
$text_alignment = $text_alignment ?: 'left'; // Default to left if not set

// Text alignment classes
$text_align_classes = '';
if ($text_alignment === 'center') {
  $text_align_classes = 'text-center';
} elseif ($text_alignment === 'right') {
  $text_align_classes = 'text-right';
} else {
  $text_align_classes = 'text-left';
}
?>

<?php if ($body): ?>
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
    <div class="<?php echo esc_attr($text_align_classes); ?> max-w-4xl mx-auto">
      
      <?php if ($header): ?>
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-medium tracking-tight text-gray-900 mb-6">
          <?php echo esc_html($header); ?>
        </h2>
      <?php endif; ?>

      <div class="text-gray-700 text-lg leading-relaxed">
        <?php echo wp_kses_post($body); ?>
      </div>

    </div>
  </div>
<?php endif; ?>

