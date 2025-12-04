<?php
$enable_carousel = get_sub_field('enable_carousel'); // Boolean field
$selected_stories = get_sub_field('stories'); // Post Object field (multiple values) - array of story post IDs
$carousel_id = 'stories-carousel-' . uniqid(); // Unique ID for carousel instance

// Get the selected story posts
$stories = [];
if ($selected_stories) {
  // If it's an array of post IDs, query them
  if (is_array($selected_stories)) {
    $stories = $selected_stories;
  } else {
    // If it's a single post, convert to array
    $stories = [$selected_stories];
  }
}
?>

<?php if (!empty($stories)): ?>
  
  <?php if ($enable_carousel): ?>
    <!-- Carousel Layout -->
    <div class="stories-block w-full overflow-hidden py-12 lg:py-16">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="swiper stories-carousel relative" id="<?php echo esc_attr($carousel_id); ?>">
          <div class="swiper-wrapper">
            
            <?php foreach ($stories as $story_id): ?>
              <?php
              $story_post = get_post($story_id);
              if (!$story_post) continue;
              
              // Get ACF fields from the story post
              $image = get_field('image', $story_id); // ACF Image field
              $metric_value = get_field('metric_value', $story_id);
              $metric_label = get_field('metric_label', $story_id);
              $business_name = get_field('business_name', $story_id);
              $quote = get_field('quote', $story_id);
              $attribution = get_field('attribution', $story_id);
              $link = get_field('link', $story_id); // ACF Link field
              ?>
              
              <div class="swiper-slide">
                <div class="bg-white rounded-lg shadow-sm overflow-hidden flex flex-col md:flex-row">
                  
                  <!-- Left Section: Image with Metric -->
                  <?php if ($image): ?>
                    <div class="relative w-full md:w-1/2">
                      <img 
                        src="<?php echo esc_url($image['url']); ?>" 
                        alt="<?php echo esc_attr($image['alt'] ?: get_the_title($story_id)); ?>"
                        class="w-full h-full object-cover"
                      />
                      <?php if ($metric_value || $metric_label): ?>
                        <div class="absolute bottom-4 left-4">
                          <?php if ($metric_value): ?>
                            <div class="text-4xl font-bold text-white mb-1">
                              <?php echo esc_html($metric_value); ?>
                            </div>
                          <?php endif; ?>
                          <?php if ($metric_label): ?>
                            <div class="text-sm text-white/90">
                              <?php echo esc_html($metric_label); ?>
                            </div>
                          <?php endif; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>

                  <!-- Right Section: Content -->
                  <div class="w-full md:w-1/2 p-6 lg:p-8 flex flex-col justify-between">
                    <div>
                      <?php if ($business_name): ?>
                        <div class="text-sm text-gray-400 mb-4 uppercase tracking-wide">
                          <?php echo esc_html($business_name); ?>
                        </div>
                      <?php endif; ?>

                      <?php if ($quote): ?>
                        <blockquote class="text-2xl lg:text-3xl font-medium text-gray-900 mb-6 leading-tight">
                          "<?php echo esc_html($quote); ?>"
                        </blockquote>
                      <?php endif; ?>

                      <?php if ($attribution): ?>
                        <div class="text-sm text-gray-500 mb-6">
                          <?php echo esc_html($attribution); ?>
                        </div>
                      <?php endif; ?>
                    </div>

                    <?php if ($link): ?>
                      <a 
                        href="<?php echo esc_url($link['url']); ?>" 
                        <?php if ($link['target']): ?>target="<?php echo esc_attr($link['target']); ?>"<?php endif; ?>
                        class="inline-flex items-center text-gray-700 font-medium hover:text-gray-900 transition-colors"
                      >
                        <?php echo esc_html($link['title'] ?: 'Read story'); ?>
                        <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                      </a>
                    <?php endif; ?>
                  </div>

                </div>
              </div>

            <?php endforeach; ?>

          </div>
          
          <!-- Pagination dots -->
          <div class="swiper-pagination mt-8 flex justify-center"></div>
        </div>
      </div>
    </div>

    <style>
      #<?php echo esc_attr($carousel_id); ?> .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background: #d1d5db;
        opacity: 1;
        margin: 0 4px;
      }
      #<?php echo esc_attr($carousel_id); ?> .swiper-pagination-bullet-active {
        background: #111827;
      }
    </style>

    <script>
      (function() {
        document.addEventListener('DOMContentLoaded', function() {
          const carouselEl = document.getElementById('<?php echo esc_js($carousel_id); ?>');
          if (carouselEl && typeof Swiper !== 'undefined') {
            new Swiper(carouselEl, {
              direction: 'horizontal',
              loop: false,
              slidesPerView: 1,
              spaceBetween: 0,
              centeredSlides: true,
              pagination: {
                el: carouselEl.querySelector('.swiper-pagination'),
                clickable: true,
                bulletClass: 'swiper-pagination-bullet',
                bulletActiveClass: 'swiper-pagination-bullet-active',
              },
            });
          }
        });
      })();
    </script>

  <?php else: ?>
    <!-- Vertical Stack Layout -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
      <div class="space-y-8">
        
        <?php foreach ($stories as $story_id): ?>
          <?php
          $story_post = get_post($story_id);
          if (!$story_post) continue;
          
          // Get ACF fields from the story post
          $image = get_field('image', $story_id); // ACF Image field
          $metric_value = get_field('metric_value', $story_id);
          $metric_label = get_field('metric_label', $story_id);
          $business_name = get_field('business_name', $story_id);
          $quote = get_field('quote', $story_id);
          $attribution = get_field('attribution', $story_id);
          $link = get_field('link', $story_id); // ACF Link field
          ?>
          
          <div class="bg-white rounded-lg shadow-sm overflow-hidden flex flex-col md:flex-row">
            
            <!-- Left Section: Image with Metric -->
            <?php if ($image): ?>
              <div class="relative w-full md:w-1/2">
                <img 
                  src="<?php echo esc_url($image['url']); ?>" 
                  alt="<?php echo esc_attr($image['alt'] ?: get_the_title($story_id)); ?>"
                  class="w-full h-full object-cover"
                />
                <?php if ($metric_value || $metric_label): ?>
                  <div class="absolute bottom-4 left-4">
                    <?php if ($metric_value): ?>
                      <div class="text-4xl font-bold text-white mb-1">
                        <?php echo esc_html($metric_value); ?>
                      </div>
                    <?php endif; ?>
                    <?php if ($metric_label): ?>
                      <div class="text-sm text-white/90">
                        <?php echo esc_html($metric_label); ?>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <!-- Right Section: Content -->
            <div class="w-full md:w-1/2 p-6 lg:p-8 flex flex-col justify-between">
              <div>
                <?php if ($business_name): ?>
                  <div class="text-sm text-gray-400 mb-4 uppercase tracking-wide">
                    <?php echo esc_html($business_name); ?>
                  </div>
                <?php endif; ?>

                <?php if ($quote): ?>
                  <blockquote class="text-2xl lg:text-3xl font-medium text-gray-900 mb-6 leading-tight">
                    "<?php echo esc_html($quote); ?>"
                  </blockquote>
                <?php endif; ?>

                <?php if ($attribution): ?>
                  <div class="text-sm text-gray-500 mb-6">
                    <?php echo esc_html($attribution); ?>
                  </div>
                <?php endif; ?>
              </div>

              <?php if ($link): ?>
                <a 
                  href="<?php echo esc_url($link['url']); ?>" 
                  <?php if ($link['target']): ?>target="<?php echo esc_attr($link['target']); ?>"<?php endif; ?>
                  class="inline-flex items-center text-gray-700 font-medium hover:text-gray-900 transition-colors"
                >
                  <?php echo esc_html($link['title'] ?: 'Read story'); ?>
                  <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              <?php endif; ?>
            </div>

          </div>

        <?php endforeach; ?>

      </div>
    </div>
  <?php endif; ?>

<?php endif; ?>
