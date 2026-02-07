<?php
/**
 * Service Card Partial
 * 
 * Displays a single service in card format with icon, title, and description.
 * 
 * Expected $args:
 * - service_id: The service post ID
 */

$service_id = $args['service_id'] ?? get_the_ID();

if (!$service_id) return;

// Get service data
$service_title = get_the_title($service_id);
$icon = get_field('icon', $service_id);
$description = get_field('description', $service_id);
$url = get_permalink($service_id);
?>

<div class="bg-brand-light rounded-2xl p-6 lg:p-8">
  <!-- Header: Icon + Title -->
  <div class="flex items-center gap-4 mb-4">
    <!-- Icon -->
    <?php if ($icon) : ?>
      <div class="w-14 h-14 bg-brand-green rounded-xl flex items-center justify-center shrink-0">
        <img 
          src="<?php echo esc_url($icon['url']); ?>" 
          alt="" 
          class="w-8 h-8 object-contain"
          aria-hidden="true"
        />
      </div>
    <?php else : ?>
      <div class="w-14 h-14 bg-brand-green rounded-xl flex items-center justify-center shrink-0">
        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
        </svg>
      </div>
    <?php endif; ?>

    <!-- Title -->
    <?php if ($service_title) : ?>
      <h3 class="text-xl lg:text-2xl font-semibold text-brand-green">
        <?php echo esc_html($service_title); ?>
      </h3>
    <?php endif; ?>
  </div>

  <!-- Description -->
  <?php if ($description) : ?>
    <div class="text-gray-700 leading-relaxed">
      <?php echo $description; ?>
    </div>
  <?php endif; ?>
</div>
