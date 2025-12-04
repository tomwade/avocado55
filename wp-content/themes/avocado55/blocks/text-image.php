<?php
$image = get_sub_field('image');
$headline = get_sub_field('headline');
$text = get_sub_field('text');
$image_position = get_sub_field('image_position'); // 'left' or 'right'
$image_position = $image_position ?: 'left'; // Default to left if not set

// Determine flex direction classes based on image position
// On mobile: always stack image on top (flex-col)
// On desktop: image-left = flex-row, image-right = flex-row-reverse
$container_classes = 'flex flex-col md:flex-row gap-8 lg:gap-12 items-center';
$image_classes = $image_position === 'right' ? 'md:order-2' : 'md:order-1';
$text_classes = $image_position === 'right' ? 'md:order-1' : 'md:order-2';
?>

<?php if ($image || $headline || $text): ?>
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
    <div class="<?php echo esc_attr($container_classes); ?>">
      
      <?php if ($image): ?>
        <div class="<?php echo esc_attr($image_classes); ?> w-full md:w-1/2">
          <img 
            src="<?php echo esc_url($image['url']); ?>" 
            alt="<?php echo esc_attr($image['alt'] ?: $headline); ?>"
            class="w-full h-auto rounded-lg object-cover"
          />
        </div>
      <?php endif; ?>

      <?php if ($headline || $text): ?>
        <div class="<?php echo esc_attr($text_classes); ?> w-full md:w-1/2">
          <?php if ($headline): ?>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-medium tracking-tight text-gray-900 mb-6">
              <?php echo esc_html($headline); ?>
            </h2>
          <?php endif; ?>

          <?php if ($text): ?>
            <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed">
              <?php echo wp_kses_post($text); ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>

    </div>
  </div>
<?php endif; ?>

