<?php
/**
 * Stories Block
 * 
 * Displays a carousel of client stories with quotes and images.
 * Stories are referenced from the Story post type.
 */

$title = get_sub_field('title');
$link = get_sub_field('link');
$stories = get_sub_field('stories'); // Returns array of post objects
$block_id = 'stories-' . uniqid();
?>

<section class="bg-brand-light py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-12">
      <?php if ($title) : ?>
        <h2 class="text-3xl lg:text-4xl font-semibold text-brand-green leading-tight">
          <?php echo esc_html($title); ?>
        </h2>
      <?php endif; ?>

      <?php if ($link) : ?>
        <a 
          href="<?php echo esc_url($link['url']); ?>" 
          target="<?php echo esc_attr($link['target'] ?: '_self'); ?>" 
          class="button button--brand-green shrink-0"
        >
          <?php echo esc_html($link['title']); ?>
        </a>
      <?php endif; ?>
    </div>

    <!-- Carousel -->
    <?php if ($stories) : ?>
      <div class="relative" id="<?php echo esc_attr($block_id); ?>">
        
        <!-- Slides Container -->
        <div class="overflow-hidden">
          <div class="stories-carousel flex transition-transform duration-500 ease-in-out" data-carousel="<?php echo esc_attr($block_id); ?>">
            <?php foreach ($stories as $index => $story) : 
              // Get data from the Story post type
              $story_id = $story->ID;
              $image = get_the_post_thumbnail_url($story_id, 'large');
              $image_alt = get_post_meta(get_post_thumbnail_id($story_id), '_wp_attachment_image_alt', true);
              $client = get_field('client', $story_id);
              $headline = get_field('headline', $story_id);
              $quote_text = get_field('quote_text', $story_id);
              $quote_person = get_field('quote_person', $story_id);
              $story_url = get_permalink($story_id);
            ?>
              <div class="w-full flex-shrink-0 px-2">
                <div class="bg-white rounded-2xl overflow-hidden">
                  <div class="grid grid-cols-1 lg:grid-cols-2">
                    
                    <!-- Image Column -->
                    <div class="relative aspect-[4/3] lg:aspect-auto min-h-[300px]">
                      <?php if ($image) : ?>
                        <img 
                          src="<?php echo esc_url($image); ?>" 
                          alt="<?php echo esc_attr($image_alt ?: $client); ?>" 
                          class="absolute inset-0 w-full h-full object-cover"
                        />
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-brand-green/30"></div>
                      <?php endif; ?>

                      <?php if ($headline) : ?>
                        <div class="absolute bottom-0 left-0 p-6">
                          <p class="text-brand-cta text-2xl lg:text-3xl font-bold"><?php echo esc_html($headline); ?></p>
                        </div>
                      <?php endif; ?>
                    </div>

                    <!-- Content Column -->
                    <div class="p-6 lg:p-10 flex flex-col justify-center">
                      <?php if ($client) : ?>
                        <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">
                          <?php echo esc_html($client); ?>
                        </p>
                      <?php endif; ?>

                      <?php if ($quote_text) : ?>
                        <blockquote class="text-xl lg:text-2xl font-light text-brand-green italic leading-relaxed mb-4">
                          "<?php echo esc_html($quote_text); ?>"
                        </blockquote>
                      <?php endif; ?>

                      <?php if ($quote_person) : ?>
                        <p class="text-sm text-gray-600 mb-6">
                          <?php echo esc_html($quote_person); ?>
                        </p>
                      <?php endif; ?>

                      <a 
                        href="<?php echo esc_url($story_url); ?>" 
                        class="inline-flex items-center gap-2 text-sm font-medium text-gray-900 group"
                      >
                        Read story
                        <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-brand-cta text-white transition-transform group-hover:translate-x-1">
                          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                          </svg>
                        </span>
                      </a>
                    </div>

                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Pagination Dots -->
        <?php if (count($stories) > 1) : ?>
          <div class="flex justify-center gap-2 mt-8">
            <?php foreach ($stories as $index => $story) : ?>
              <button 
                type="button"
                class="stories-dot w-8 h-2 rounded-full transition-colors <?php echo $index === 0 ? 'bg-brand-green' : 'bg-gray-300'; ?>"
                data-carousel="<?php echo esc_attr($block_id); ?>"
                data-slide="<?php echo $index; ?>"
                aria-label="Go to slide <?php echo $index + 1; ?>"
              ></button>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

      </div>

      <!-- Carousel Script -->
      <script>
        (function() {
          const blockId = '<?php echo esc_js($block_id); ?>';
          const container = document.querySelector('[data-carousel="' + blockId + '"]');
          const dots = document.querySelectorAll('.stories-dot[data-carousel="' + blockId + '"]');
          const slideCount = <?php echo count($stories); ?>;
          let currentSlide = 0;

          function goToSlide(index) {
            currentSlide = index;
            container.style.transform = 'translateX(-' + (index * 100) + '%)';
            
            dots.forEach((dot, i) => {
              dot.classList.toggle('bg-brand-green', i === index);
              dot.classList.toggle('bg-gray-300', i !== index);
            });
          }

          dots.forEach(dot => {
            dot.addEventListener('click', () => {
              const slideIndex = parseInt(dot.dataset.slide, 10);
              goToSlide(slideIndex);
            });
          });

          // Auto-advance every 6 seconds
          setInterval(() => {
            const nextSlide = (currentSlide + 1) % slideCount;
            goToSlide(nextSlide);
          }, 6000);
        })();
      </script>
    <?php endif; ?>

  </div>
</section>
