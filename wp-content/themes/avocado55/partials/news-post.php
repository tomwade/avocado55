<?php
/**
 * News Post Card Partial
 * 
 * Displays a single post in card format with featured image,
 * category badge, date, author, title, and read more link.
 * 
 * Expected $args:
 * - post_id: The post ID to display
 */

$post_id = $args['post_id'] ?? get_the_ID();
$animation_delay = $args['animation_delay'] ?? 0;
$post = get_post($post_id);

if (!$post) return;

// Get post data
$title = get_the_title($post_id);
$permalink = get_permalink($post_id);
$featured_image = get_the_post_thumbnail_url($post_id, 'news_card');
$featured_image_alt = avocado55_image_alt(get_post_thumbnail_id($post_id), $title);
$date = get_the_date('d M Y', $post_id);
$author_id = $post->post_author;
$author_profile = avocado55_get_author_profile_data($author_id);
$author_name = $author_profile['name'];
$author_avatar = $author_profile['avatar'];
$author_url = !empty($author_profile['url']) ? $author_profile['url'] : get_author_posts_url($author_id);

$animation_class = avocado55_animation_class($animation_delay);
?>

<article class="group <?php echo esc_attr($animation_class); ?>">
  <!-- Image Container -->
  <a href="<?php echo esc_url($permalink); ?>" class="block relative aspect-[4/3] rounded-xl overflow-hidden mb-4">
    <?php if ($featured_image) : ?>
      <img 
        src="<?php echo esc_url($featured_image); ?>" 
        alt="<?php echo esc_attr($featured_image_alt); ?>" 
        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
      />
    <?php else : ?>
      <div class="w-full h-full bg-gray-200"></div>
    <?php endif; ?>
  </a>

  <!-- Meta: Date & Author -->
  <div class="flex items-center gap-4 mb-3">
    <time datetime="<?php echo get_the_date('Y-m-d', $post_id); ?>" class="text-xs font-medium text-gray-500 uppercase tracking-wide">
      <?php echo esc_html(strtoupper($date)); ?>
    </time>
    
    <div class="flex items-center gap-2">
      <?php if ($author_avatar) : ?>
        <img 
          src="<?php echo esc_url($author_avatar); ?>" 
          alt="<?php echo esc_attr($author_name); ?>" 
          class="w-6 h-6 rounded-full object-cover"
        />
      <?php endif; ?>
      <a href="<?php echo esc_url($author_url); ?>" class="text-xs text-gray-600 hover:text-brand-green hover:underline"><?php echo esc_html($author_name); ?></a>
    </div>
  </div>

  <!-- Title -->
  <h3 class="text-lg font-semibold text-gray-900 leading-snug mb-4 group-hover:text-brand-green transition-colors">
    <a href="<?php echo esc_url($permalink); ?>">
      <?php echo esc_html($title); ?>
    </a>
  </h3>

  <!-- Read More Link -->
  <a href="<?php echo esc_url($permalink); ?>" class="inline-flex items-center gap-2 text-sm font-medium text-gray-900 group/link">
    Read more
    <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-brand-cta text-white transition-transform group-hover/link:translate-x-1">
      <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
      </svg>
    </span>
  </a>
</article>
