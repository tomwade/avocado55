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
?>

<!-- Hero Section -->
<section class="relative bg-brand-green overflow-hidden">
  <div class="mx-auto max-w-7xl px-6 lg:px-8 py-16 lg:py-24">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      
      <!-- Content -->
      <div class="text-white">
        <!-- Category Badge -->
        <?php if ($category) : ?>
          <span class="inline-block bg-white/20 text-white text-xs font-medium px-3 py-1.5 rounded mb-6">
            <?php echo esc_html($category->name); ?>
          </span>
        <?php endif; ?>

        <!-- Meta -->
        <div class="flex items-center gap-4 mb-6">
          <?php if ($author_avatar) : ?>
            <img src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr($author_name); ?>" class="w-10 h-10 rounded-full" />
          <?php endif; ?>
          <div class="flex items-center gap-2 text-sm text-white/80">
            <span><?php echo esc_html($author_name); ?></span>
            <span>&bull;</span>
            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo esc_html($date); ?></time>
          </div>
        </div>

        <!-- Title -->
        <h1 class="text-3xl lg:text-5xl font-semibold leading-tight">
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
  <div class="mx-auto max-w-3xl px-6 lg:px-8">
    
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

      <a href="<?php echo get_author_posts_url($author_id); ?>" class="button button--brand-cta">
        Read bio
      </a>
      
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

      <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="button button--brand-green shrink-0">
        View all
      </a>
    </div>

    <!-- Posts Grid -->
    <?php
    $related_args = [
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => 3,
      'post__not_in' => [$post_id],
      'orderby' => 'date',
      'order' => 'DESC',
    ];
    $related_query = new WP_Query($related_args);
    
    if ($related_query->have_posts()) : ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
          <?php get_template_part('partials/news-post', null, ['post_id' => get_the_ID()]); ?>
        <?php endwhile; ?>
      </div>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>

  </div>
</section>

<!-- CTA Section -->
<section class="relative bg-brand-cta py-16 lg:py-24 overflow-hidden">
  <!-- Background Avocado Mark -->
  <div class="absolute top-1/2 right-0 -translate-y-1/2 translate-x-1/4 w-80 lg:w-[500px] opacity-20 pointer-events-none">
    <img 
      src="<?php echo get_template_directory_uri(); ?>/assets/images/avacado-mark.png" 
      alt="" 
      class="w-full h-auto"
      aria-hidden="true"
    />
  </div>

  <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
    <div class="max-w-2xl">
      <h2 class="text-3xl lg:text-4xl font-semibold text-white leading-tight mb-4">
        Ready to find your best way forward? Let's start with a conversation.
      </h2>
      <p class="text-white/80 mb-8">
        Get in touch, we're here to help you make the leap.
      </p>
      <a href="/contact/" class="button bg-white text-brand-cta hover:bg-gray-100">
        Contact us
      </a>
    </div>
  </div>
</section>

<?php
  }
}

get_footer();
