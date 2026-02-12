<?php
/**
 * Latest News Block
 * 
 * Displays the latest posts in a card grid format.
 */

$title = get_sub_field('title') ?: 'Latest insights';
$link = get_sub_field('link');
$posts_count = get_sub_field('posts_count') ?: 3;

// Query latest posts
$args = [
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => $posts_count,
  'orderby' => 'date',
  'order' => 'DESC',
];

$posts_query = new WP_Query($args);
?>

<section class="bg-white py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-12">
      <?php if ($title) : ?>
        <h2 class="text-3xl lg:text-4xl font-semibold text-brand-green leading-tight <?php echo esc_attr(avocado55_animation_class(1)); ?>">
          <?php echo esc_html($title); ?>
        </h2>
      <?php endif; ?>

      <?php if ($link) : ?>
        <a 
          href="<?php echo esc_url($link['url']); ?>" 
          target="<?php echo esc_attr($link['target'] ?: '_self'); ?>" 
          class="button button--brand-green shrink-0 self-start <?php echo esc_attr(avocado55_animation_class(2)); ?>"
        >
          <?php echo esc_html($link['title']); ?>
        </a>
      <?php endif; ?>
    </div>

    <!-- Posts Grid -->
    <?php if ($posts_query->have_posts()) : ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php $post_index = 3; while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
          <?php get_template_part('partials/news-post', null, ['post_id' => get_the_ID(), 'animation_delay' => $post_index]); ?>
        <?php $post_index++; endwhile; ?>
      </div>
      <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <p class="text-gray-600">No posts found.</p>
    <?php endif; ?>

  </div>
</section>
