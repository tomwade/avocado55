<?php
/**
 * Team Block
 * 
 * Displays team members in a carousel format linking to profile pages.
 * Uses Slick Carousel for the slider functionality.
 */

$title = get_sub_field('title');
$selected_members = get_sub_field('members');

// Use relationship order when set, otherwise all team members by menu_order
if (!empty($selected_members) && is_array($selected_members)) {
  $members = $selected_members;
} else {
  $team_query = new WP_Query([
    'post_type' => 'team_member',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post_status' => 'publish'
  ]);
  $members = $team_query->posts;
}
?>

<?php if (!empty($members)): ?>
<section class="bg-brand-light py-16 lg:py-24 overflow-hidden">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    
    <!-- Header -->
    <div class="flex items-center justify-between mb-12">
      <?php if ($title): ?>
        <h2 class="text-3xl lg:text-4xl font-semibold text-brand-green <?php echo esc_attr(avocado55_animation_class(1)); ?>">
          <?php echo esc_html($title); ?>
        </h2>
      <?php else: ?>
        <div></div>
      <?php endif; ?>
      
      <!-- Navigation Arrows -->
      <div class="flex items-center gap-2 <?php echo esc_attr(avocado55_animation_class(2)); ?>">
        <button type="button" class="cursor-pointer team-carousel-prev w-10 h-10 border border-brand-green rounded flex items-center justify-center hover:bg-brand-green hover:text-white transition-colors text-brand-green">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg>
        </button>
        <button type="button" class="cursor-pointer team-carousel-next w-10 h-10 border border-brand-green rounded flex items-center justify-center hover:bg-brand-green hover:text-white transition-colors text-brand-green">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </button>
      </div>
    </div>

  </div>

  <!-- Carousel Container - Full width overflow both sides -->
  <div class="team-carousel-wrapper px-6 lg:px-0 <?php echo esc_attr(avocado55_animation_class(3)); ?>">
    <div class="team-carousel">
      <?php foreach ($members as $member): 
        $member_id = $member->ID;
        $featured_image = get_the_post_thumbnail_url($member_id, 'large');
        $name = get_field('name', $member_id) ?: get_the_title($member_id);
        $role = get_field('role', $member_id);
        $profile_url = get_permalink($member_id);
      ?>
        <div class="team-slide px-2">
          <a href="<?php echo esc_url($profile_url); ?>" class="block group">
            
            <!-- Image -->
            <?php if ($featured_image): ?>
              <div class="aspect-[3/4] rounded-lg overflow-hidden mb-4">
                <img 
                  src="<?php echo esc_url($featured_image); ?>" 
                  alt="<?php echo esc_attr($name); ?>"
                  class="w-full h-full object-cover"
                />
              </div>
            <?php else: ?>
              <div class="aspect-[3/4] rounded-lg overflow-hidden mb-4 bg-gray-200 flex items-center justify-center">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
              </div>
            <?php endif; ?>
            
            <!-- Name & Role -->
            <h3 class="text-lg font-semibold text-brand-green mb-1">
              <?php echo esc_html($name); ?>
            </h3>
            <p class="text-sm text-gray-600 mb-3">
              <?php echo esc_html($role); ?>
            </p>
            
            <!-- Arrow Link -->
            <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-brand-cta text-white transition-transform group-hover:translate-x-1">
              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </span>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Initialize Slick Carousel
  if (typeof jQuery !== 'undefined' && jQuery.fn.slick) {
    jQuery('.team-carousel').slick({
      infinite: false,
      slidesToShow: 5,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      responsive: [
        {
          breakpoint: 1280,
          settings: {
            slidesToShow: 4
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1.2
          }
        }
      ]
    });

    // Custom navigation
    jQuery('.team-carousel-prev').on('click', function() {
      jQuery('.team-carousel').slick('slickPrev');
    });
    
    jQuery('.team-carousel-next').on('click', function() {
      jQuery('.team-carousel').slick('slickNext');
    });
  }
});
</script>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
