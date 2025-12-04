<?php
get_header();

$title = 'Pop culture thought leaders';
$subtitle = 'Insights';

if (($term = get_queried_object()) && $term->name != 'post') {
  $title = $term->name . ' Insights';
}

include(get_template_directory() . '/partials/archive-header.php');
?>

<div class="py-20 bg-white">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Category Selector - Top Right -->
    <div class="flex justify-end mb-12">
      <?php
      $categories = [];
      // Add "All" option that links to blog home
      $categories['All'] = home_url();
      foreach (get_categories(['hide_empty' => true]) as $category) {
        $categories[$category->name] = get_category_link($category->term_id);
      }
      get_template_part('partials/dropdown', null, ['label' => 'Category', 'items' => $categories]);
      ?>
    </div>

    <?php if ( have_posts() ) { ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">

        <?php while ( have_posts() ) { the_post(); 
          $post_categories = get_the_category();
          $first_category = !empty($post_categories) ? $post_categories[0] : null;
          $author_name = get_the_author();
          $post_date = get_the_date('M j, Y');
        ?>

          <article class="flex flex-col">
            <!-- Image with Category Label -->
            <div class="relative w-full mb-4">
              <?php if (has_post_thumbnail()): ?>
                <img 
                  src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" 
                  alt="<?php echo esc_attr(get_the_title()); ?>"
                  class="w-full aspect-[4/3] rounded-lg object-cover bg-gray-100"
                />
              <?php else: ?>
                <div class="w-full aspect-[4/3] rounded-lg bg-gray-200"></div>
              <?php endif; ?>
              
              <?php if ($first_category): ?>
                <div class="absolute top-3 left-3">
                  <span class="bg-gray-900 text-white text-xs font-medium px-3 py-1 rounded">
                    <?php echo esc_html($first_category->name); ?>
                  </span>
                </div>
              <?php endif; ?>
            </div>

            <!-- Metadata: Author | Date -->
            <div class="text-sm text-gray-500 mb-2">
              <?php echo esc_html($author_name); ?> | <?php echo esc_html($post_date); ?>
            </div>

            <!-- Title -->
            <h3 class="text-xl font-medium text-gray-900 mb-4">
              <a href="<?php echo esc_url(get_the_permalink()); ?>" class="hover:text-gray-700">
                <?php echo esc_html(get_the_title()); ?>
              </a>
            </h3>

            <!-- Read More Link -->
            <div class="mt-auto">
              <a 
                href="<?php echo esc_url(get_the_permalink()); ?>" 
                class="text-sm text-gray-900 underline hover:text-gray-700"
              >
                Read more
              </a>
            </div>

          </article>

        <?php } ?>

      </div>

      <?php get_template_part('partials/pagination', null, ['paged' => get_query_var('paged'), 'pages' => $wp_query->max_num_pages, 'showitems' => 5]); ?>
    <?php } ?>

  </div>
</div>

<?php
get_footer();
