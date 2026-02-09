<?php
/**
 * Template Name: Contact
 * 
 * Contact page template with form, experts carousel, and contact details.
 */

get_header();

// Get page fields
$form_title = get_field('form_title') ?: "Have a challenge you'd like to tackle?";
$form_text = get_field('form_text') ?: "Whether it's improving team performance, streamlining processes, or just talking through options, we're here to help.";
$form_shortcode = get_field('contact_form_shortcode');
$experts_title = get_field('experts_title') ?: 'Talk to an expert';
$experts_subtitle = get_field('experts_subtitle') ?: 'Select a specialist';

// Query all team members who have a booking link set
$experts_query = new WP_Query([
  'post_type' => 'team_member',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'order' => 'ASC',
  'post_status' => 'publish',
  'meta_query' => [
    [
      'key' => 'booking_link',
      'value' => '',
      'compare' => '!='
    ]
  ]
]);
$experts = $experts_query->posts;

// Get contact details from options
$address = get_field('contact_address', 'option');
$telephone = get_field('contact_telephone', 'option');
$email = get_field('contact_email', 'option');
?>

<!-- Hero Section with Form -->
<section class="bg-brand-green py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
      
      <!-- Left Column: Title & Text -->
      <div class="text-white flex flex-col justify-center">
        <h1 class="text-4xl lg:text-5xl font-semibold leading-tight mb-6">
          <?php echo esc_html($form_title); ?>
        </h1>
        <p class="text-lg text-white/80 mr-8">
          <?php echo $form_text; ?>
        </p>
      </div>

      <!-- Right Column: Form -->
      <div class="bg-white rounded-2xl p-6 lg:p-8 shadow-xl">
        <?php if ($form_shortcode) : ?>
          <div class="contact-form">
            <?php echo do_shortcode($form_shortcode); ?>
          </div>
        <?php else : ?>
          <p class="text-gray-500">Please add a Contact Form 7 shortcode in the page settings.</p>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>

<!-- Talk to an Expert & Our Details Section -->
<section class="py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
      
      <!-- Left Column: Talk to an Expert -->
      <div class="bg-brand-light rounded-2xl p-8 lg:p-12">
        <h2 class="text-2xl lg:text-3xl font-semibold text-brand-green mb-2">
          <?php echo esc_html($experts_title); ?>
        </h2>
        <p class="text-gray-600 mb-8">
          <?php echo esc_html($experts_subtitle); ?>
        </p>

        <?php if ($experts && count($experts) > 0) : ?>
          <!-- Experts Carousel -->
          <div class="experts-carousel-wrapper">
            <div class="experts-carousel">
              <?php foreach ($experts as $expert) : 
                $expert_id = $expert->ID;
                $name = get_field('name', $expert_id) ?: get_the_title($expert_id);
                $role = get_field('role', $expert_id);
                $avatar = get_the_post_thumbnail_url($expert_id, 'thumbnail');
                $booking_link = get_field('booking_link', $expert_id);
              ?>
                <div class="expert-slide px-2">
                  <div class="flex items-center gap-4 bg-white rounded-xl p-4 shadow-sm">
                    <!-- Avatar -->
                    <?php if ($avatar) : ?>
                      <img src="<?php echo esc_url($avatar); ?>" alt="<?php echo esc_attr($name); ?>" class="w-14 h-14 rounded-full object-cover flex-shrink-0" />
                    <?php else : ?>
                      <div class="w-14 h-14 rounded-full bg-gray-200 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                      </div>
                    <?php endif; ?>
                    
                    <!-- Info -->
                    <div class="flex-grow min-w-0">
                      <h3 class="font-semibold text-gray-900 truncate"><?php echo esc_html($name); ?></h3>
                      <p class="text-sm text-gray-600 truncate"><?php echo esc_html($role); ?></p>
                    </div>
                    
                    <!-- Book Button -->
                    <a href="<?php echo esc_url($booking_link); ?>" target="_blank" rel="noopener" class="flex-shrink-0 inline-flex items-center justify-center px-4 py-2 bg-brand-green text-white text-sm font-medium rounded hover:bg-brand-cta transition-colors">
                      Book
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            
            <!-- Navigation Arrows -->
            <?php if (count($experts) > 1) : ?>
              <div class="flex items-center justify-center gap-2 mt-6">
                <button type="button" class="experts-carousel-prev w-8 h-8 border border-gray-300 rounded flex items-center justify-center hover:border-brand-green transition-colors text-gray-600 hover:text-brand-green">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                  </svg>
                </button>
                <button type="button" class="experts-carousel-next w-8 h-8 border border-gray-300 rounded flex items-center justify-center hover:border-brand-green transition-colors text-gray-600 hover:text-brand-green">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                  </svg>
                </button>
              </div>
            <?php endif; ?>
          </div>
        <?php else : ?>
          <p class="text-gray-500">No experts available for booking.</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>

      <!-- Right Column: Our Details -->
      <div class="flex flex-col justify-center">
        <h2 class="text-2xl lg:text-3xl font-semibold text-brand-green mb-8 text-center">
          Our details
        </h2>

        <div class="text-center space-y-2">
          <?php if ($address) : ?>
            <div class="text-gray-700">
              <?php echo $address; ?>
            </div>
          <?php endif; ?>
          
          <?php if ($telephone) : ?>
            <p class="text-gray-700">
              T: <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $telephone)); ?>" class="hover:text-brand-green"><?php echo esc_html($telephone); ?></a>
            </p>
          <?php endif; ?>
          
          <?php if ($email) : ?>
            <p class="text-gray-700">
              E: <a href="mailto:<?php echo esc_attr($email); ?>" class="text-brand-green hover:underline"><?php echo esc_html($email); ?></a>
            </p>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Initialize Experts Carousel
  if (typeof jQuery !== 'undefined' && jQuery.fn.slick) {
    jQuery('.experts-carousel').slick({
      infinite: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false
    });

    // Custom navigation
    jQuery('.experts-carousel-prev').on('click', function() {
      jQuery('.experts-carousel').slick('slickPrev');
    });
    
    jQuery('.experts-carousel-next').on('click', function() {
      jQuery('.experts-carousel').slick('slickNext');
    });
  }
});
</script>

<?php get_footer(); ?>
