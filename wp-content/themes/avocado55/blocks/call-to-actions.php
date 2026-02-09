<?php
/**
 * Call To Actions Block
 * 
 * Displays a grid of partner/CTA cards in a 2-column layout.
 * Each card can have an optional background image with overlay.
 */

$title = get_sub_field('title');
$excerpt = get_sub_field('excerpt');
$partners = get_sub_field('partners');
?>

<section class="py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    
    <?php if ($title || $excerpt) : ?>
      <div class="text-center mx-auto mb-12 max-w-3xl">
        <?php if ($title) : ?>
          <h2 class="text-3xl lg:text-4xl font-semibold text-brand-green leading-tight <?php echo esc_attr(avocado55_animation_class(1)); ?>">
            <?php echo esc_html($title); ?>
          </h2>
        <?php endif; ?>
        
        <?php if ($excerpt) : ?>
          <p class="mt-4 text-gray-600 leading-relaxed <?php echo esc_attr(avocado55_animation_class(2)); ?>">
            <?php echo $excerpt; ?>
          </p>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ($partners) : ?>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php $partner_index = 3; foreach ($partners as $partner) : ?>
          <?php 
          get_template_part('partials/partner-card', null, [
            'logo' => $partner['logo'],
            'title' => $partner['title'],
            'excerpt' => $partner['excerpt'],
            'link' => $partner['link'],
            'background_image' => $partner['background_image'],
            'animation_delay' => $partner_index
          ]); 
          $partner_index++;
          ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
