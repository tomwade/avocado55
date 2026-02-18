  <?php get_template_part('partials/footer-callout'); ?>

  <footer class="bg-white border-t border-gray-200">
    <!-- Main Footer -->
    <div class="mx-auto max-w-7xl py-12 lg:py-16 px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        
        <!-- Logo & Social Column -->
        <div class="lg:col-span-3">
          <!-- Logo -->
          <a href="<?php echo home_url(); ?>" class="inline-block mb-8">
            <span class="text-2xl font-bold text-brand-green">Avocado55</span>
          </a>

          <!-- Social Icons -->
          <?php
          $linkedin_url = get_field('linkedin_url', 'option');
          $twitter_url = get_field('twitter_url', 'option');
          $facebook_url = get_field('facebook_url', 'option');
          $youtube_url = get_field('youtube_url', 'option');
          
          if ($linkedin_url || $twitter_url || $facebook_url || $youtube_url) :
          ?>
          <div class="flex items-center gap-3">
            <?php if ($linkedin_url) : ?>
            <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="nofollow" class="w-9 h-9 border border-gray-300 rounded flex items-center justify-center hover:border-brand-green transition-colors">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-linkedin.png" alt="LinkedIn" class="w-4 h-4" />
            </a>
            <?php endif; ?>
            <?php if ($twitter_url) : ?>
            <a href="<?php echo esc_url($twitter_url); ?>" target="_blank" rel="nofollow" class="w-9 h-9 border border-gray-300 rounded flex items-center justify-center hover:border-brand-green transition-colors">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-x.png" alt="X" class="w-4 h-4" />
            </a>
            <?php endif; ?>
            <?php if ($facebook_url) : ?>
            <a href="<?php echo esc_url($facebook_url); ?>" target="_blank" rel="nofollow" class="w-9 h-9 border border-gray-300 rounded flex items-center justify-center hover:border-brand-green transition-colors">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-facebook.png" alt="Facebook" class="w-4 h-4" />
            </a>
            <?php endif; ?>
            <?php if ($youtube_url) : ?>
            <a href="<?php echo esc_url($youtube_url); ?>" target="_blank" rel="nofollow" class="w-9 h-9 border border-gray-300 rounded flex items-center justify-center hover:border-brand-green transition-colors">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-youtube.png" alt="YouTube" class="w-4 h-4" />
            </a>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>

        <!-- Navigation Columns -->
        <div class="lg:col-span-9">
          <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-8">
            
            <?php 
            // Footer menu columns
            $footer_menus = [
              ['location' => 'footer_menu_1', 'heading_field' => 'footer_menu_1_heading'],
              ['location' => 'footer_menu_2', 'heading_field' => 'footer_menu_2_heading'],
              ['location' => 'footer_menu_3', 'heading_field' => 'footer_menu_3_heading'],
              ['location' => 'footer_menu_4', 'heading_field' => 'footer_menu_4_heading'],
              ['location' => 'footer_menu_5', 'heading_field' => 'footer_menu_5_heading'],
              ['location' => 'footer_menu_6', 'heading_field' => 'footer_menu_6_heading'],
            ];
            
            foreach ($footer_menus as $menu) :
              $heading = get_field($menu['heading_field'], 'option');
              if (has_nav_menu($menu['location']) || $heading) :
            ?>
              <div>
                <?php if ($heading) : ?>
                  <h3 class="text-sm font-semibold text-gray-900 mb-4"><?php echo esc_html($heading); ?></h3>
                <?php endif; ?>
                <?php
                  wp_nav_menu([
                    'theme_location' => $menu['location'],
                    'container'      => false,
                    'menu_class'     => 'space-y-3',
                    'fallback_cb'    => false,
                    'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                    'walker'         => new Avocado55_Footer_Nav_Walker(),
                  ]);
                ?>
              </div>
            <?php 
              endif;
            endforeach; 
            ?>

          </div>
        </div>

      </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-gray-200">
      <div class="mx-auto max-w-7xl px-6 lg:px-8 py-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
          <p class="text-xs text-gray-500 uppercase tracking-wide">
            AVOCADO55 &copy; <?php echo date('Y'); ?> ALL RIGHTS RESERVED
          </p>
          <div class="flex items-center gap-6">
            <a href="/privacy-policy/" class="text-xs text-gray-500 hover:text-brand-green">Privacy Policy</a>
            <a href="/terms-and-conditions/" class="text-xs text-gray-500 hover:text-brand-green">Terms and conditions</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>

  <?php if (get_field('enable_animation', 'option')) : ?>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const animatedElements = document.querySelectorAll('.animate-on-scroll');
    
    if (animatedElements.length === 0) return;
    
    const observerOptions = {
      root: null,
      rootMargin: '0px 0px -50px 0px',
      threshold: 0.1
    };
    
    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);
    
    animatedElements.forEach(function(el) {
      observer.observe(el);
    });
  });
  </script>
  <?php endif; ?>

</body>
</html>
