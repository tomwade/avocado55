<?php
/**
 * Text with Image Block
 * 
 * Displays a two-column layout with text content on one side
 * and an image on the other. Image position can be left or right.
 */

$title = get_sub_field('title');
$excerpt = get_sub_field('excerpt');
$link = get_sub_field('link');
$image = get_sub_field('image');
$image_position = get_sub_field('image_position') ?: 'right';
$background_color = get_sub_field('background_color') ?: 'white';

// Background color class
switch ($background_color) {
  case 'light_green':
    $bg_class = 'bg-brand-light';
    break;
  case 'dark_green':
    $bg_class = 'bg-brand-green';
    break;
  case 'white':
  default:
    $bg_class = 'bg-white';
    break;
}

// On mobile: text always first (order-1), image always second (order-2)
// On desktop: respect the image_position setting
$image_order = $image_position === 'left' ? 'order-2 lg:order-1' : 'order-2 lg:order-2';
$text_order = $image_position === 'left' ? 'order-1 lg:order-2' : 'order-1 lg:order-1';
?>

<section class="<?php echo esc_attr($bg_class); ?> py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
      
      <!-- Text Column -->
      <div class="<?php echo esc_attr($text_order); ?> space-y-6">
        <?php if ($title) : ?>
          <h2 class="text-3xl lg:text-5xl font-semibold text-brand-green leading-none <?php echo esc_attr(avocado55_animation_class(1)); ?>">
            <?php echo esc_html($title); ?>
          </h2>
        <?php endif; ?>

        <?php if ($excerpt) : ?>
          <p class="text-gray-600 leading-relaxed <?php echo esc_attr(avocado55_animation_class(2)); ?>">
            <?php echo $excerpt; ?>
          </p>
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

      <!-- Image Column -->
      <div class="<?php echo esc_attr($image_order); ?> <?php echo esc_attr(avocado55_animation_class(2)); ?>">
        <?php if ($image) : ?>
          <img 
            src="<?php echo esc_url($image['url']); ?>" 
            alt="<?php echo esc_attr($image['alt'] ?: $title); ?>" 
            class="w-full h-auto rounded-lg object-cover"
          />
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>
