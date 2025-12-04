<?php
// Query services post type
$services_query = new WP_Query([
  'post_type' => 'service',
  'posts_per_page' => -1, // Get all services, or set a limit
  'post_status' => 'publish',
  'orderby' => 'menu_order',
  'order' => 'ASC',
]);
?>

<?php if ($services_query->have_posts()): ?>
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
      
      <?php while ($services_query->have_posts()): $services_query->the_post(); ?>
        
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
          
          <?php if (has_post_thumbnail()): ?>
            <div class="w-full">
              <img 
                src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" 
                alt="<?php echo esc_attr(get_the_title()); ?>"
                class="w-full h-auto object-cover"
              />
            </div>
          <?php endif; ?>

          <div class="p-6 lg:p-8">
            <?php if (get_the_title()): ?>
              <h3 class="text-xl font-medium text-gray-900 mb-3">
                <?php echo esc_html(get_the_title()); ?>
              </h3>
            <?php endif; ?>

            <?php if (get_the_excerpt() || get_the_content()): ?>
              <p class="text-gray-600 leading-relaxed">
                <?php 
                $excerpt = get_the_excerpt();
                if ($excerpt) {
                  echo esc_html($excerpt);
                } else {
                  echo esc_html(wp_trim_words(get_the_content(), 20));
                }
                ?>
              </p>
            <?php endif; ?>
          </div>

        </div>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>

    </div>
  </div>
<?php endif; ?>

