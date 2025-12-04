<?php
$grid_columns = get_sub_field('grid_columns'); // Number of columns (1-4)
$grid_columns = $grid_columns ?: 2; // Default to 2 columns if not set
$cards = get_sub_field('cards'); // ACF Repeater field

// Map grid columns to Tailwind grid classes
$grid_classes = [
  1 => 'grid-cols-1',
  2 => 'grid-cols-1 md:grid-cols-2',
  3 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3',
  4 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-4',
];

$grid_class = isset($grid_classes[$grid_columns]) ? $grid_classes[$grid_columns] : $grid_classes[2];
?>

<?php if ($cards && have_rows('cards')): ?>
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
    <div class="grid <?php echo esc_attr($grid_class); ?> gap-6 lg:gap-8">
      
      <?php while (have_rows('cards')): the_row(); ?>
        <?php
        $image = get_sub_field('image');
        $title = get_sub_field('title');
        $subtitle = get_sub_field('subtitle');
        ?>
        
        <div class="bg-white rounded-lg shadow-sm p-6 lg:p-8">
          
          <?php if ($image): ?>
            <div class="mb-4">
              <img 
                src="<?php echo esc_url($image['url']); ?>" 
                alt="<?php echo esc_attr($image['alt'] ?: $title); ?>"
                class="w-12 h-12 object-cover"
              />
            </div>
          <?php endif; ?>

          <?php if ($title): ?>
            <h3 class="text-xl font-medium text-gray-900 mb-3">
              <?php echo esc_html($title); ?>
            </h3>
          <?php endif; ?>

          <?php if ($subtitle): ?>
            <p class="text-gray-600 leading-relaxed">
              <?php echo esc_html($subtitle); ?>
            </p>
          <?php endif; ?>

        </div>

      <?php endwhile; ?>

    </div>
  </div>
<?php endif; ?>

