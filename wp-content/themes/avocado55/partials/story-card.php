<?php
/**
 * Story Card Partial
 * 
 * Displays a single story in card format with image, quote, and link.
 * Used by both the stories block and archive-story template.
 * 
 * Expected $args:
 * - story_id: The story post ID
 */

$story_id = $args['story_id'] ?? get_the_ID();

if (!$story_id) return;

// Get story data
$image = get_the_post_thumbnail_url($story_id, 'large');
$image_alt = get_post_meta(get_post_thumbnail_id($story_id), '_wp_attachment_image_alt', true);
$client = get_field('client', $story_id);
$quote_text = get_field('quote_text', $story_id);
$quote_person = get_field('quote_person', $story_id);
$story_url = get_permalink($story_id);
?>

<div class="bg-white rounded-2xl overflow-hidden">
  <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-stretch">
    
    <!-- Image Column with 20px padding -->
    <div class="p-5 <?php echo esc_attr(avocado55_animation_class(1)); ?>">
      <div class="rounded-xl overflow-hidden">
        <?php if ($image) : ?>
          <img 
            src="<?php echo esc_url($image); ?>" 
            alt="<?php echo esc_attr($image_alt ?: $client); ?>" 
            class="w-full h-auto"
          />
        <?php endif; ?>
      </div>
    </div>

    <!-- Content Column -->
    <div class="p-6 lg:p-10 flex flex-col justify-center">
      <?php if ($client) : ?>
        <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4 <?php echo esc_attr(avocado55_animation_class(2)); ?>">
          <?php echo esc_html($client); ?>
        </p>
      <?php endif; ?>

      <?php if ($quote_text) : ?>
        <blockquote class="font-raleway text-xl lg:text-3xl font-medium text-brand-green leading-tight mb-4 <?php echo esc_attr(avocado55_animation_class(3)); ?>">
          "<?php echo esc_html($quote_text); ?>"
        </blockquote>
      <?php endif; ?>

      <?php if ($quote_person) : ?>
        <p class="text-sm text-gray-600 mb-6 <?php echo esc_attr(avocado55_animation_class(4)); ?>">
          <?php echo esc_html($quote_person); ?>
        </p>
      <?php endif; ?>

      <a 
        href="<?php echo esc_url($story_url); ?>" 
        class="inline-flex items-center gap-2 text-sm font-medium text-gray-900 group <?php echo esc_attr(avocado55_animation_class(5)); ?>"
      >
        Read story
        <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-brand-cta text-white transition-transform group-hover:translate-x-1">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </span>
      </a>
    </div>

  </div>
</div>
