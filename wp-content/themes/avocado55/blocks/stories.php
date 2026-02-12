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
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
      <?php if ($title) : ?>
        <h2 class="text-3xl lg:text-4xl max-w-2xl font-semibold text-brand-green leading-tight <?php echo esc_attr(avocado55_animation_class(1)); ?>">
          <?php echo esc_html($title); ?>
        </h2>
      <?php endif; ?>

      <?php if ($link) : ?>
        <a 
          href="<?php echo esc_url($link['url']); ?>" 
          target="<?php echo esc_attr($link['target'] ?: '_self'); ?>" 
          class="button button--brand-green shrink-0 self-start <?php echo esc_attr(avocado55_animation_class(2)); ?>"
        >
          <?php echo esc_html($link['title']); ?>
        </a>
      <?php endif; ?>
    </div>

    <!-- Carousel -->
    <?php if ($stories) : ?>
      <div class="relative <?php echo esc_attr(avocado55_animation_class(3)); ?>" id="<?php echo esc_attr($block_id); ?>">
        
        <!-- Slides Container -->
        <div class="overflow-hidden">
          <div class="stories-carousel flex transition-transform duration-500 ease-in-out" data-carousel="<?php echo esc_attr($block_id); ?>">
            <?php foreach ($stories as $index => $story) : ?>
              <div class="w-full flex-shrink-0 px-2">
                <?php get_template_part('partials/story-card', null, ['story_id' => $story->ID]); ?>
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
