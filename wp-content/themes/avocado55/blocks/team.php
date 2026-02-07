<?php
/**
 * Team Block
 * 
 * Displays team members in a carousel format with modal popups.
 * Uses Slick Carousel for the slider functionality.
 */

$title = get_sub_field('title');

// Query all team members ordered by menu_order
$team_query = new WP_Query([
  'post_type' => 'team_member',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'order' => 'ASC',
  'post_status' => 'publish'
]);

$members = $team_query->posts;
?>

<?php if (!empty($members)): ?>
<section class="bg-brand-light py-16 lg:py-24 overflow-hidden">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    
    <!-- Header -->
    <div class="flex items-center justify-between mb-12">
      <?php if ($title): ?>
        <h2 class="text-3xl lg:text-4xl font-semibold text-brand-green">
          <?php echo esc_html($title); ?>
        </h2>
      <?php else: ?>
        <div></div>
      <?php endif; ?>
      
      <!-- Navigation Arrows -->
      <div class="flex items-center gap-2">
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
  <div class="team-carousel-wrapper px-6 lg:px-0">
    <div class="team-carousel">
      <?php foreach ($members as $member): 
        $member_id = $member->ID;
        $featured_image = get_the_post_thumbnail_url($member_id, 'large');
        $name = get_field('name', $member_id) ?: get_the_title($member_id);
        $role = get_field('role', $member_id);
        $modal_image = get_field('modal_image', $member_id);
        $phone = get_field('phone', $member_id);
        $email = get_field('email', $member_id);
        $linkedin = get_field('linkedin', $member_id);
        $modal_content = get_field('modal_content', $member_id);
        
        // Use modal image if available, otherwise featured image
        $modal_img_url = $modal_image ? $modal_image['url'] : $featured_image;
      ?>
        <div class="team-slide px-2">
          <div class="team-card cursor-pointer" 
               data-member-id="<?php echo esc_attr($member_id); ?>"
               data-name="<?php echo esc_attr($name); ?>"
               data-role="<?php echo esc_attr($role); ?>"
               data-image="<?php echo esc_attr($modal_img_url); ?>"
               data-phone="<?php echo esc_attr($phone); ?>"
               data-email="<?php echo esc_attr($email); ?>"
               data-linkedin="<?php echo esc_attr($linkedin); ?>"
               data-content="<?php echo esc_attr($modal_content); ?>">
            
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
            <button type="button" class="team-card-trigger inline-flex items-center justify-center w-5 h-5 rounded-full bg-brand-cta text-white transition-transform hover:translate-x-1">
              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </button>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Team Member Modal -->
<div id="team-modal" class="team-modal fixed inset-0 z-50 hidden">
  <!-- Backdrop -->
  <div class="team-modal-backdrop absolute inset-0 bg-black/60"></div>
  
  <!-- Modal Content -->
  <div class="team-modal-container absolute inset-0 flex items-center justify-center p-4 lg:p-8">
    <div class="team-modal-content relative bg-white rounded-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto shadow-2xl">
      
      <!-- Close Button -->
      <button type="button" class="team-modal-close absolute top-4 right-4 w-10 h-10 rounded-full bg-brand-green flex items-center justify-center hover:bg-brand-cta transition-colors z-10">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>
      
      <div class="p-6 lg:p-8">
        <!-- Top Section: Image & Info -->
        <div class="flex flex-col md:flex-row gap-6 mb-8">
          <!-- Image -->
          <div class="w-full md:w-64 flex-shrink-0">
            <div class="aspect-[3/4] rounded-lg overflow-hidden bg-gray-100">
              <img id="modal-image" src="" alt="" class="w-full h-full object-cover" />
            </div>
          </div>
          
          <!-- Info -->
          <div class="flex-grow">
            <h3 id="modal-name" class="text-2xl lg:text-3xl font-semibold text-brand-green mb-2"></h3>
            <p id="modal-role" class="text-gray-600 mb-6"></p>
            
            <!-- Contact Info -->
            <div id="modal-contact" class="space-y-2 mb-4">
              <p id="modal-phone" class="text-gray-700"></p>
              <a id="modal-email" href="" class="block text-brand-green hover:underline"></a>
            </div>
            
            <!-- LinkedIn -->
            <div id="modal-linkedin-container" class="hidden">
              <a id="modal-linkedin" href="" target="_blank" rel="noopener" class="inline-flex items-center justify-center w-10 h-10 border border-gray-300 rounded hover:border-brand-green transition-colors">
                <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                </svg>
              </a>
            </div>
          </div>
        </div>
        
        <!-- Content -->
        <div id="modal-content" class="prose prose-gray max-w-none text-gray-600 leading-relaxed"></div>
      </div>
    </div>
  </div>
</div>

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

  // Modal functionality
  const modal = document.getElementById('team-modal');
  const modalBackdrop = modal.querySelector('.team-modal-backdrop');
  const modalClose = modal.querySelector('.team-modal-close');
  
  // Open modal on card click
  document.querySelectorAll('.team-card').forEach(card => {
    card.addEventListener('click', function() {
      const data = this.dataset;
      
      // Populate modal
      document.getElementById('modal-image').src = data.image || '';
      document.getElementById('modal-image').alt = data.name || '';
      document.getElementById('modal-name').textContent = data.name || '';
      document.getElementById('modal-role').textContent = data.role || '';
      
      // Phone
      const phoneEl = document.getElementById('modal-phone');
      if (data.phone) {
        phoneEl.textContent = data.phone;
        phoneEl.classList.remove('hidden');
      } else {
        phoneEl.classList.add('hidden');
      }
      
      // Email
      const emailEl = document.getElementById('modal-email');
      if (data.email) {
        emailEl.textContent = data.email;
        emailEl.href = 'mailto:' + data.email;
        emailEl.classList.remove('hidden');
      } else {
        emailEl.classList.add('hidden');
      }
      
      // LinkedIn
      const linkedinContainer = document.getElementById('modal-linkedin-container');
      const linkedinEl = document.getElementById('modal-linkedin');
      if (data.linkedin) {
        linkedinEl.href = data.linkedin;
        linkedinContainer.classList.remove('hidden');
      } else {
        linkedinContainer.classList.add('hidden');
      }
      
      // Content
      document.getElementById('modal-content').innerHTML = data.content || '';
      
      // Show modal
      modal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    });
  });
  
  // Close modal
  function closeModal() {
    modal.classList.add('hidden');
    document.body.style.overflow = '';
  }
  
  modalBackdrop.addEventListener('click', closeModal);
  modalClose.addEventListener('click', closeModal);
  
  // Close on escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
      closeModal();
    }
  });
});
</script>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
