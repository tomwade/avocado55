<?php
/**
 * Single Story Template
 * 
 * Uses the same flexible content approach as page.php
 * to allow clients to build custom story pages.
 */

get_header();

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    
    $story_id = get_the_ID();
    $client = get_field('client');
    $title = get_the_title();
    $featured_image = get_the_post_thumbnail_url($story_id, 'full');
    $service = get_field('service');
    $sector = get_field('sector');
    $result = get_field('result');
    
    // Get expert name from post author
    $expert_name = get_the_author();
    ?>

<!-- Story Header -->
<section class="bg-brand-green">
  <div class="grid grid-cols-1 lg:grid-cols-2">
    
    <!-- Left Column - Content -->
    <div class="px-6 lg:px-12 xl:px-16 py-16 lg:py-24 flex flex-col justify-center">
      <div class="max-w-xl">
        
        <?php if ($client) : ?>
          <p class="text-sm uppercase tracking-wider text-white/80 mb-4 <?php echo esc_attr(avocado55_animation_class(1)); ?>">
            <?php echo esc_html($client); ?>
          </p>
        <?php endif; ?>

        <h1 class="text-3xl lg:text-4xl xl:text-5xl font-medium text-white leading-tight mb-10 <?php echo esc_attr(avocado55_animation_class(2)); ?>">
          <?php echo esc_html($title); ?>
        </h1>

        <!-- Meta Grid -->
        <div class="grid grid-cols-2 gap-x-8 gap-y-6">
          
          <?php if ($service) : ?>
            <div class="<?php echo esc_attr(avocado55_animation_class(3)); ?>">
              <p class="text-xs uppercase tracking-wider text-white/60 mb-1">Service Delivered</p>
              <p class="text-white text-sm"><?php echo esc_html($service); ?></p>
            </div>
          <?php endif; ?>

          <?php if ($expert_name) : ?>
            <div class="<?php echo esc_attr(avocado55_animation_class(4)); ?>">
              <p class="text-xs uppercase tracking-wider text-white/60 mb-1">Expert: SME</p>
              <p class="text-white text-sm flex items-center gap-2">
                <?php echo esc_html($expert_name); ?>
              </p>
            </div>
          <?php endif; ?>

          <?php if ($sector) : ?>
            <div class="<?php echo esc_attr(avocado55_animation_class(5)); ?>">
              <p class="text-xs uppercase tracking-wider text-white/60 mb-1">SME</p>
              <p class="text-white text-sm"><?php echo esc_html($sector); ?></p>
            </div>
          <?php endif; ?>

          <?php if ($result) : ?>
            <div class="<?php echo esc_attr(avocado55_animation_class(6)); ?>">
              <p class="text-xs uppercase tracking-wider text-white/60 mb-1">Result</p>
              <p class="text-white text-sm"><?php echo esc_html($result); ?></p>
            </div>
          <?php endif; ?>

        </div>
        
      </div>
    </div>

    <!-- Right Column - Image -->
    <?php if ($featured_image) : ?>
      <div class="relative min-h-[300px] lg:min-h-[500px] <?php echo esc_attr(avocado55_animation_class(2)); ?>">
        <img 
          src="<?php echo esc_url($featured_image); ?>" 
          alt="<?php echo esc_attr($title); ?>" 
          class="absolute inset-0 w-full h-full object-cover"
        />
      </div>
    <?php endif; ?>

  </div>
</section>

<?php
    if ( have_rows( 'page_content' ) ) {
        while ( have_rows( 'page_content' ) ) {
          the_row();

          $block_name = strtolower( str_replace( '_', '-', get_row_layout() ) );
          get_template_part('blocks/' . $block_name);
        }
    }
  }
}

get_footer();
