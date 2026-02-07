<?php
/**
 * Blog Archive Template
 * 
 * Loads ACF page_content from the Posts page (set in Settings > Reading),
 * then displays blog posts in a grid.
 */

get_header();

// Get the Posts page ID (set in Settings > Reading)
$posts_page_id = get_option('page_for_posts');

// Load ACF flexible content from the Posts page
if ($posts_page_id && have_rows('page_content', $posts_page_id)) {
  while (have_rows('page_content', $posts_page_id)) {
    the_row();
    $block_name = strtolower(str_replace('_', '-', get_row_layout()));
    get_template_part('blocks/' . $block_name);
  }
}
?>

<section class="bg-white py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">

    <!-- Posts Grid -->
    <?php if (have_posts()) : ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('partials/news-post', null, ['post_id' => get_the_ID()]); ?>
        <?php endwhile; ?>
      </div>
      
      <!-- Pagination -->
      <?php 
      $paged = get_query_var('paged') ?: 1;
      $pages = $GLOBALS['wp_query']->max_num_pages;
      if ($pages > 1) :
        get_template_part('partials/pagination', null, [
          'paged' => $paged, 
          'pages' => $pages, 
          'showitems' => 5
        ]);
      endif;
      ?>

    <?php else : ?>
      <p class="text-gray-600">No posts found.</p>
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>
