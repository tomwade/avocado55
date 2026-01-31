<?php
/**
 * Grid Block
 * 
 * Displays a grid of items with icons and text.
 * Supports white or brand-light backgrounds with adaptive card colors.
 */

$title = get_sub_field('title');
$text = get_sub_field('text');
$link = get_sub_field('link');
$background_color = get_sub_field('background_color') ?: 'white';
$grid_items = get_sub_field('grid_items');

// Set classes based on background color
$bg_class = $background_color === 'brand-light' ? 'bg-brand-light' : 'bg-white';
$card_bg_class = $background_color === 'brand-light' ? 'bg-white' : 'bg-brand-light';
$text_class = 'text-brand-green';

// Determine grid columns based on item count
$item_count = $grid_items ? count($grid_items) : 0;
$grid_cols = 'lg:grid-cols-4'; // Default to 4 columns
if ($item_count === 3) {
  $grid_cols = 'lg:grid-cols-3';
} elseif ($item_count === 2) {
  $grid_cols = 'lg:grid-cols-2';
} elseif ($item_count === 1) {
  $grid_cols = 'lg:grid-cols-1';
}
?>

<section class="<?php echo esc_attr($bg_class); ?> py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    
    <!-- Header -->
    <div class="max-w-3xl mx-auto text-center mb-12">
      <?php if ($title) : ?>
        <h2 class="text-3xl lg:text-4xl font-semibold text-brand-green leading-tight mb-6">
          <?php echo esc_html($title); ?>
        </h2>
      <?php endif; ?>

      <?php if ($text) : ?>
        <p class="text-gray-600 leading-relaxed">
          <?php echo $text; ?>
        </p>
      <?php endif; ?>

      <?php if ($link) : ?>
        <div class="mt-6">
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

    <!-- Grid -->
    <?php if ($grid_items) : ?>
      <div class="grid grid-cols-1 sm:grid-cols-2 <?php echo esc_attr($grid_cols); ?> gap-6">
        <?php foreach ($grid_items as $item) : 
          $icon = $item['icon'];
          $item_text = $item['text'];
        ?>
          <div class="<?php echo esc_attr($card_bg_class); ?> rounded-xl p-6 lg:p-8">
            <!-- Icon -->
            <?php if ($icon) : ?>
              <div class="w-14 h-14 bg-brand-green rounded-xl flex items-center justify-center mb-6">
                <img 
                  src="<?php echo esc_url($icon['url']); ?>" 
                  alt="" 
                  class="w-8 h-8 object-contain"
                  aria-hidden="true"
                />
              </div>
            <?php endif; ?>

            <!-- Text -->
            <?php if ($item_text) : ?>
              <p class="<?php echo esc_attr($text_class); ?> font-medium leading-relaxed">
                <?php echo $item_text; ?>
              </p>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
