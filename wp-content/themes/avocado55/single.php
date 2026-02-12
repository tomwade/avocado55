<?php
get_header();

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    
    $post_id = get_the_ID();
    $title = get_the_title();
    $featured_image = get_the_post_thumbnail_url($post_id, 'large');
    $date = get_the_date('d M Y');
    $author_id = get_the_author_meta('ID');
    $author_name = get_the_author();
    $author_avatar = get_avatar_url($author_id, ['size' => 64]);
    $author_bio = get_the_author_meta('description');
    $author_role = get_the_author_meta('job_title') ?: 'Author';
    
    // Get primary category
    $categories = get_the_category();
    $category = !empty($categories) ? $categories[0] : null;
    
    // Check if this author has a linked team member
    $author_team_member = null;
    $team_member_query = new WP_Query([
      'post_type' => 'team_member',
      'posts_per_page' => 1,
      'post_status' => 'publish',
      'meta_query' => [
        [
          'key' => 'wordpress_user',
          'value' => $author_id,
          'compare' => '='
        ]
      ]
    ]);
    
    if ($team_member_query->have_posts()) {
      $author_team_member = $team_member_query->posts[0];
      $tm_id = $author_team_member->ID;
      $tm_name = get_field('name', $tm_id) ?: get_the_title($tm_id);
      $tm_role = get_field('role', $tm_id);
      $tm_featured_image = get_the_post_thumbnail_url($tm_id, 'large');
      $tm_modal_image = get_field('modal_image', $tm_id);
      $tm_phone = get_field('phone', $tm_id);
      $tm_email = get_field('email', $tm_id);
      $tm_linkedin = get_field('linkedin', $tm_id);
      $tm_modal_content = get_field('modal_content', $tm_id);
      $tm_modal_img_url = $tm_modal_image ? $tm_modal_image['url'] : $tm_featured_image;
    }
    wp_reset_postdata();
?>

<!-- Hero Section -->
<section class="relative bg-brand-light overflow-hidden">
  <div class="mx-auto max-w-7xl px-6 lg:px-8 py-16 lg:py-24">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      
      <!-- Content -->
      <div>
        <!-- Meta: Date & Author -->
        <div class="flex items-center gap-4 mb-6">
          <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="text-xs font-medium text-gray-500 uppercase tracking-wide">
            <?php echo esc_html(strtoupper(get_the_date('d M Y'))); ?>
          </time>
          
          <div class="flex items-center gap-2">
            <?php if ($author_avatar) : ?>
              <img src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr($author_name); ?>" class="w-6 h-6 rounded-full object-cover" />
            <?php endif; ?>
            <span class="text-sm font-medium text-brand-green"><?php echo esc_html($author_name); ?></span>
          </div>
        </div>

        <!-- Title -->
        <h1 class="text-3xl lg:text-5xl font-semibold text-brand-green leading-tight">
          <?php echo esc_html($title); ?>
        </h1>
      </div>

      <!-- Featured Image -->
      <?php if ($featured_image) : ?>
        <div class="relative">
          <img 
            src="<?php echo esc_url($featured_image); ?>" 
            alt="<?php echo esc_attr($title); ?>" 
            class="w-full h-auto rounded-2xl object-cover aspect-[4/3]"
          />
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>

<!-- Article Content -->
<article class="bg-white py-16 lg:py-24">
  <div class="mx-auto max-w-5xl px-6 lg:px-8">
    
    <div class="post-content prose prose-lg max-w-none">
      <?php the_content(); ?>
    </div>

  </div>
</article>

<!-- Author Bar -->
<section class="bg-brand-light py-8">
  <div class="mx-auto max-w-3xl px-6 lg:px-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
      
      <div class="flex items-center gap-4">
        <?php if ($author_avatar) : ?>
          <img src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr($author_name); ?>" class="w-14 h-14 rounded-full" />
        <?php endif; ?>
        <div>
          <p class="font-semibold text-gray-900"><?php echo esc_html($author_name); ?></p>
          <p class="text-sm text-gray-600"><?php echo esc_html($author_role); ?></p>
        </div>
      </div>

      <?php if ($author_team_member) : ?>
        <!-- Team modal trigger -->
        <button 
          type="button"
          class="team-card button button--brand-cta cursor-pointer self-start"
          data-member-id="<?php echo esc_attr($tm_id); ?>"
          data-name="<?php echo esc_attr($tm_name); ?>"
          data-role="<?php echo esc_attr($tm_role); ?>"
          data-image="<?php echo esc_attr($tm_modal_img_url); ?>"
          data-phone="<?php echo esc_attr($tm_phone); ?>"
          data-email="<?php echo esc_attr($tm_email); ?>"
          data-linkedin="<?php echo esc_attr($tm_linkedin); ?>"
          data-content="<?php echo esc_attr($tm_modal_content); ?>"
        >
          Read bio
        </button>
      <?php else : ?>
        <a href="<?php echo get_author_posts_url($author_id); ?>" class="button button--brand-cta self-start">
          Read bio
        </a>
      <?php endif; ?>
      
    </div>
  </div>
</section>

<!-- Share Section -->
<section class="bg-white py-8 border-b border-gray-200">
  <div class="mx-auto max-w-3xl px-6 lg:px-8">
    <div class="flex items-center justify-between">
      
      <p class="text-sm font-medium text-gray-900">SHARE THIS ARTICLE</p>

      <div class="flex items-center gap-3">
        <span class="w-9 h-9 border border-gray-300 rounded flex items-center justify-center hover:border-brand-green transition-colors cursor-pointer">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-linkedin.png" alt="LinkedIn" class="w-4 h-4" />
        </span>
        <span class="w-9 h-9 border border-gray-300 rounded flex items-center justify-center hover:border-brand-green transition-colors cursor-pointer">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-x.png" alt="X" class="w-4 h-4" />
        </span>
        <span class="w-9 h-9 border border-gray-300 rounded flex items-center justify-center hover:border-brand-green transition-colors cursor-pointer">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-facebook.png" alt="Facebook" class="w-4 h-4" />
        </span>
      </div>
      
    </div>
  </div>
</section>

<!-- Related Posts -->
<section class="bg-white py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-12">
      <h2 class="text-2xl lg:text-3xl font-semibold text-brand-green leading-tight">
        You might also be interested in...
      </h2>

      <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url()); ?>" class="button button--brand-green shrink-0 self-start">
        View all
      </a>
    </div>

    <!-- Posts Grid - Same Category -->
    <?php
    // Get category IDs for the current post
    $category_ids = [];
    if ($category) {
      $category_ids[] = $category->term_id;
    }
    
    $related_args = [
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => 3,
      'post__not_in' => [$post_id],
      'orderby' => 'date',
      'order' => 'DESC',
    ];
    
    // Add category filter if we have a category
    if (!empty($category_ids)) {
      $related_args['category__in'] = $category_ids;
    }
    
    $related_query = new WP_Query($related_args);
    
    // If not enough posts in same category, get any posts
    if ($related_query->post_count < 3 && !empty($category_ids)) {
      $exclude_ids = [$post_id];
      foreach ($related_query->posts as $related_post) {
        $exclude_ids[] = $related_post->ID;
      }
      
      $fallback_args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3 - $related_query->post_count,
        'post__not_in' => $exclude_ids,
        'orderby' => 'date',
        'order' => 'DESC',
      ];
      $fallback_query = new WP_Query($fallback_args);
    }
    
    if ($related_query->have_posts() || (isset($fallback_query) && $fallback_query->have_posts())) : ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php 
        // Show category-matched posts first
        while ($related_query->have_posts()) : $related_query->the_post(); ?>
          <?php get_template_part('partials/news-post', null, ['post_id' => get_the_ID()]); ?>
        <?php endwhile; 
        wp_reset_postdata();
        
        // Show fallback posts if needed
        if (isset($fallback_query) && $fallback_query->have_posts()) :
          while ($fallback_query->have_posts()) : $fallback_query->the_post(); ?>
            <?php get_template_part('partials/news-post', null, ['post_id' => get_the_ID()]); ?>
          <?php endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    <?php endif; ?>

  </div>
</section>

<?php 
  // Include team modal if author has linked team member
  if ($author_team_member) {
    get_template_part('partials/team-modal');
  }
?>

<?php
  }
}

get_footer();
