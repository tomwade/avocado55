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
            
            <!-- Services Column -->
            <div>
              <h3 class="text-sm font-semibold text-gray-900 mb-4">Services</h3>
              <ul class="space-y-3">
                <li><a href="/services/consulting/" class="text-sm text-gray-600 hover:text-brand-green">Service goes here</a></li>
                <li><a href="/services/training/" class="text-sm text-gray-600 hover:text-brand-green">Service goes here</a></li>
                <li><a href="/services/support/" class="text-sm text-gray-600 hover:text-brand-green">Service goes here</a></li>
                <li><a href="/services/analytics/" class="text-sm text-gray-600 hover:text-brand-green">Service goes here</a></li>
              </ul>
            </div>

            <!-- Partnerships Column -->
            <div>
              <h3 class="text-sm font-semibold text-gray-900 mb-4">Partnerships</h3>
              <ul class="space-y-3">
                <li><a href="/partnerships/" class="text-sm text-gray-600 hover:text-brand-green">Our Partners</a></li>
                <li><a href="/partnerships/become-a-partner/" class="text-sm text-gray-600 hover:text-brand-green">Become a Partner</a></li>
              </ul>
            </div>

            <!-- Sectors Column -->
            <div>
              <h3 class="text-sm font-semibold text-gray-900 mb-4">Sectors</h3>
              <ul class="space-y-3">
                <li><a href="/sectors/financial-services/" class="text-sm text-gray-600 hover:text-brand-green">Financial Services</a></li>
                <li><a href="/sectors/healthcare/" class="text-sm text-gray-600 hover:text-brand-green">Healthcare</a></li>
                <li><a href="/sectors/retail/" class="text-sm text-gray-600 hover:text-brand-green">Retail</a></li>
              </ul>
            </div>

            <!-- Client Stories Column -->
            <div>
              <h3 class="text-sm font-semibold text-gray-900 mb-4">Client Stories</h3>
              <ul class="space-y-3">
                <li><a href="/stories/" class="text-sm text-gray-600 hover:text-brand-green">All Stories</a></li>
                <li><a href="/stories/case-studies/" class="text-sm text-gray-600 hover:text-brand-green">Case Studies</a></li>
              </ul>
            </div>

            <!-- About Us Column -->
            <div>
              <h3 class="text-sm font-semibold text-gray-900 mb-4">About Us</h3>
              <ul class="space-y-3">
                <li><a href="/about/" class="text-sm text-gray-600 hover:text-brand-green">Our Story</a></li>
                <li><a href="/about/team/" class="text-sm text-gray-600 hover:text-brand-green">Our Team</a></li>
                <li><a href="/about/careers/" class="text-sm text-gray-600 hover:text-brand-green">Careers</a></li>
              </ul>
            </div>

            <!-- Insights Column -->
            <div>
              <h3 class="text-sm font-semibold text-gray-900 mb-4">Insights</h3>
              <ul class="space-y-3">
                <li><a href="/insights/" class="text-sm text-gray-600 hover:text-brand-green">All Insights</a></li>
                <li><a href="/insights/blog/" class="text-sm text-gray-600 hover:text-brand-green">Blog</a></li>
                <li><a href="/insights/resources/" class="text-sm text-gray-600 hover:text-brand-green">Resources</a></li>
              </ul>
            </div>

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
