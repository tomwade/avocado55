<?php
get_header();

$title = 'Our favourite projects';
$subtitle = 'Projects';

if (($term = get_queried_object()) && $term->name != 'project') {
  $title = $term->name . ' Projects';
}

include(get_template_directory() . '/partials/archive-header.php');
?>

<div class="py-20 bg-white">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-center">
      <?php
      $services = $industries = [];

      foreach (get_categories(['taxonomy' => 'project_service', 'hide_empty' => true]) as $category) {
        $services[$category->name] = get_category_link($category);
      }

      foreach (get_categories(['taxonomy' => 'project_industry', 'hide_empty' => true]) as $category) {
        $industries[$category->name] = get_category_link($category);
      }

      get_template_part('partials/dropdown', null, ['label' => 'Service', 'items' => $services]);
      get_template_part('partials/dropdown', null, ['label' => 'Industry', 'items' => $industries]);
      ?>
    </div>

    <?php if ( have_posts() ) { ?>
      <ul role="list" class="columns-1 sm:columns-2 gap-16 xl:gap-20">
        <?php while ( have_posts() ) { the_post(); ?>
          <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>

          <li class="group relative mb-12 break-inside-avoid">
            <a href="<?php echo get_the_permalink(); ?>" class="absolute inset-0 z-2"></a>
            <div class="relative w-full overflow-hidden rounded-xl">
              <a href="<?php echo get_the_permalink(); ?>" class="play absolute inset-0 hidden group-hover:block"></a>
              <img src="<?php echo $image[0]; ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full object-cover">
            </div>
            <hgroup class="text-center">
              <h4 class="mt-5 block truncate text-sm font-semibold text-gray-400 uppercase leading-tight tracking-subtitle"><?php echo get_field('client'); ?></h4>
              <h3 class="mt-2 block truncate text-2xl font-medium text-gray-900"><?php echo get_field('title'); ?></h3>
            </hgroup>
          </li>
        <?php } ?>
      </ul>

      <?php get_template_part('partials/pagination', null, ['paged' => get_query_var('paged'), 'pages' => $wp_query->max_num_pages, 'showitems' => 5]); ?>
    <?php } ?>
  </div>

</div>

<?php get_footer(); ?>
