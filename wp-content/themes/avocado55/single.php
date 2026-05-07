<?php
get_header();

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    
    $post_id = get_the_ID();
    $title = get_the_title();
    $featured_image = get_the_post_thumbnail_url($post_id, 'featured_image');
    $featured_image_alt = avocado55_image_alt(get_post_thumbnail_id($post_id), $title);
    $date = get_the_date('d M Y');
    $author_id = get_the_author_meta('ID');
    $author_profile = avocado55_get_author_profile_data($author_id);
    $author_name = $author_profile['name'];
    $author_avatar = $author_profile['avatar'];
    $author_bio_url = !empty($author_profile['url']) ? $author_profile['url'] : get_author_posts_url($author_id);
    $author_bio = get_the_author_meta('description');
    $author_role = $author_profile['role'];
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
            <?php if (!empty($author_bio_url)) : ?>
              <a href="<?php echo esc_url($author_bio_url); ?>" class="text-sm font-medium text-brand-green hover:underline"><?php echo esc_html($author_name); ?></a>
            <?php else : ?>
              <span class="text-sm font-medium text-brand-green"><?php echo esc_html($author_name); ?></span>
            <?php endif; ?>
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
            alt="<?php echo esc_attr($featured_image_alt); ?>" 
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

      <?php if (!empty($author_bio_url)) : ?>
        <a href="<?php echo esc_url($author_bio_url); ?>" class="button button--brand-cta self-start">
          Read bio
        </a>
      <?php endif; ?>
      
    </div>
  </div>
</section>

<!-- Share Section -->
<?php
    $share_url = urlencode( get_permalink( $post_id ) );
    $share_title = urlencode( $title );
    $share_linkedin = 'https://www.linkedin.com/sharing/share-offsite/?url=' . $share_url;
    $share_twitter = 'https://twitter.com/intent/tweet?url=' . $share_url . '&text=' . $share_title;
    $share_facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $share_url;
?>
<section class="bg-white py-8 border-b border-gray-200">
  <div class="mx-auto max-w-3xl px-6 lg:px-8">
    <div class="flex items-center justify-between">
      
      <p class="text-sm font-medium text-gray-900">SHARE THIS ARTICLE</p>

      <div class="flex items-center gap-3">
        <a href="<?php echo esc_url( $share_linkedin ); ?>" target="_blank" rel="noopener noreferrer" class="w-9 h-9 border border-gray-300 rounded flex items-center justify-center hover:border-brand-green transition-colors" aria-label="Share on LinkedIn">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-linkedin.png" alt="" class="w-4 h-4" />
        </a>
        <a href="<?php echo esc_url( $share_twitter ); ?>" target="_blank" rel="noopener noreferrer" class="w-9 h-9 border border-gray-300 rounded flex items-center justify-center hover:border-brand-green transition-colors" aria-label="Share on X">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-x.png" alt="" class="w-4 h-4" />
        </a>
        <a href="<?php echo esc_url( $share_facebook ); ?>" target="_blank" rel="noopener noreferrer" class="w-9 h-9 border border-gray-300 rounded flex items-center justify-center hover:border-brand-green transition-colors" aria-label="Share on Facebook">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-facebook.png" alt="" class="w-4 h-4" />
        </a>
      </div>
      
    </div>
  </div>
</section>

<!-- Related Posts -->
<section class="py-16 lg:py-24">
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

    <!-- Posts Grid - Latest Posts -->
    <?php
    $related_query = new WP_Query([
      'post_type'      => 'post',
      'post_status'    => 'publish',
      'posts_per_page' => 3,
      'post__not_in'   => [$post_id],
      'orderby'        => 'date',
      'order'          => 'DESC',
    ]);

    if ($related_query->have_posts()) : ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
          <?php get_template_part('partials/news-post', null, ['post_id' => get_the_ID()]); ?>
        <?php endwhile;
        wp_reset_postdata();
        ?>
      </div>
    <?php endif; ?>

  </div>
</section>

<?php
  }
}

get_footer();
