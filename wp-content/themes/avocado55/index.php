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
    <div class="flex justify-center">
      <?php
      $categories = [];
      foreach (get_categories(['hide_empty' => true]) as $category) {
        $categories[$category->name] = get_category_link($category);
      }
      get_template_part('partials/dropdown', null, ['label' => 'Category', 'items' => $categories]);
      ?>
    </div>

    <?php if ( have_posts() ) { ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">

        <?php while ( have_posts() ) { the_post(); ?>

          <article class="relative">
            <a href="<?php echo get_the_permalink(); ?>" title="<?php echo esc_attr(get_the_title()); ?>" class="absolute inset-0 z-10"></a>

            <div class="relative w-full">
              <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="" class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
            </div>
            <div class="max-w-xl">
              <div class="leading-7 group relative">
                <h3 class="mt-4 mb-1 text-xl font-medium text-gray-900"><?php echo get_the_title(); ?></h3>
                <time datetime="2020-03-16" class="text-lg text-gray-400"><?php echo get_the_date('M j, Y'); ?></time>
              </div>
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
