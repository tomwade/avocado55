<?php
/**
 * Archive template for Story post type
 * 
 * Displays stories in a vertical list format with optional featured story header.
 */

get_header();

// Get featured story from options
$featured_story_id = get_field('featured_story', 'option');
$featured_story = $featured_story_id ? get_post($featured_story_id) : null;

// Display featured story header if set
if ($featured_story) :
  // Use featured_story_image if set, otherwise fall back to featured image
  $featured_story_image = get_field('featured_story_image', $featured_story_id);
  $background_image = $featured_story_image ? $featured_story_image['url'] : get_the_post_thumbnail_url($featured_story_id, 'full');
  $client = get_field('client', $featured_story_id);
  $story_title = get_the_title($featured_story_id);
  $story_url = get_permalink($featured_story_id);
  
  get_template_part('partials/feature-header', null, [
    'background_image' => $background_image,
    'badge' => 'Featured',
    'subtitle' => $client,
    'title' => $story_title,
    'link_url' => $story_url,
    'link_text' => 'Read story'
  ]);
endif;
?>

<!-- Intro Text Section -->
<section class="bg-brand-light py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="max-w-5xl space-y-6">
      <h2 class="text-3xl lg:text-4xl font-semibold text-brand-green leading-tight <?php echo esc_attr(avocado55_animation_class(1)); ?>">
        Trusted by leading contact centres across finance, retail, and telecoms. Lorem ipsum dolor sit amet consecteur.
      </h2>
    </div>
  </div>
</section>

<!-- Stories List -->
<section class="bg-brand-light pb-16 lg:pb-24">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">

    <?php if (have_posts()) : ?>
      <div class="space-y-8">
        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('partials/story-card', null, ['story_id' => get_the_ID()]); ?>
        <?php endwhile; ?>
      </div>

      <!-- Pagination -->
      <?php 
      $paged = get_query_var('paged') ?: 1;
      $pages = $wp_query->max_num_pages;
      if ($pages > 1) :
        get_template_part('partials/pagination', null, [
          'paged' => $paged, 
          'pages' => $pages, 
          'showitems' => 5
        ]);
      endif;
      ?>

    <?php else : ?>
      <p class="text-gray-600">No stories found.</p>
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>
