<?php
$images = get_sub_field('images'); // ACF Repeater field
$carousel_id = 'carousel-' . uniqid(); // Unique ID for this carousel instance
?>

<?php if ($images && have_rows('images')): ?>
  <div class="carousel-block w-full overflow-hidden py-12 lg:py-16">
    <div class="swiper carousel-images relative w-full" id="<?php echo esc_attr($carousel_id); ?>">
      <div class="swiper-wrapper">
        
        <?php while (have_rows('images')): the_row(); ?>
          <?php $image = get_sub_field('image'); ?>
          
          <?php if ($image): ?>
            <div class="swiper-slide">
              <img 
                src="<?php echo esc_url($image['url']); ?>" 
                alt="<?php echo esc_attr($image['alt'] ?: 'Carousel image'); ?>"
                class="w-full h-auto object-cover"
              />
            </div>
          <?php endif; ?>

        <?php endwhile; ?>

      </div>
      
      <!-- Navigation arrows -->
      <button class="swiper-button-prev carousel-prev absolute left-4 top-1/2 -translate-y-1/2 z-10 w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center hover:bg-gray-50 transition-colors" aria-label="Previous image">
        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>
      <button class="swiper-button-next carousel-next absolute right-4 top-1/2 -translate-y-1/2 z-10 w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center hover:bg-gray-50 transition-colors" aria-label="Next image">
        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </button>
    </div>
  </div>

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
            navigation: {
              nextEl: carouselEl.querySelector('.swiper-button-next'),
              prevEl: carouselEl.querySelector('.swiper-button-prev'),
            },
          });
        }
      });
    })();
  </script>
<?php endif; ?>

