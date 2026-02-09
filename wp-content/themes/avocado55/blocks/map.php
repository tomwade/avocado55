<?php
$map_embed_url = get_sub_field('google_maps_embed_url'); // Google Maps embed URL or iframe src
$map_link = get_sub_field('google_maps_link'); // Link to Google Maps for directions
$title = get_sub_field('title'); // Optional title for contact details section
$address = get_sub_field('address'); // Address field
$phone = get_sub_field('phone'); // Phone number
$email = get_sub_field('email'); // Email address
?>

<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
    
    <!-- Left Section: Contact Details -->
    <div class="<?php echo esc_attr(avocado55_animation_class(1)); ?>">
      <?php if ($title): ?>
        <h2 class="text-3xl sm:text-4xl font-medium tracking-tight text-gray-900 mb-6">
          <?php echo esc_html($title); ?>
        </h2>
      <?php endif; ?>

      <div class="space-y-6 text-gray-600 text-lg leading-relaxed">
        <?php if ($address): ?>
          <p>
            <?php echo nl2br(esc_html($address)); ?>
            <?php if ($map_link): ?>
              <br />
              <a href="<?php echo esc_url($map_link); ?>" target="_blank" class="text-red hover:underline">
                Get directions
              </a>
            <?php endif; ?>
          </p>
        <?php endif; ?>

        <?php if ($phone): ?>
          <p>
            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="hover:text-gray-900">
              T: <?php echo esc_html($phone); ?>
            </a>
          </p>
        <?php endif; ?>

        <?php if ($email): ?>
          <p>
            <a href="mailto:<?php echo esc_attr($email); ?>" class="text-red hover:underline">
              E: <?php echo esc_html($email); ?>
            </a>
          </p>
        <?php endif; ?>
      </div>
    </div>

    <!-- Right Section: Google Maps -->
    <div class="<?php echo esc_attr(avocado55_animation_class(2)); ?>">
      <?php if ($map_embed_url): ?>
        <div class="relative w-full h-full min-h-[400px] rounded-2xl overflow-hidden">
          <iframe 
            src="<?php echo esc_url($map_embed_url); ?>" 
            width="100%" 
            height="100%" 
            style="border:0; min-height: 400px;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"
            class="absolute inset-0 w-full h-full"
          ></iframe>
        </div>
      <?php else: ?>
        <!-- Placeholder if no map URL provided -->
        <div class="w-full h-full min-h-[400px] bg-gray-200 rounded-2xl flex items-center justify-center">
          <p class="text-gray-500">Map will appear here</p>
        </div>
      <?php endif; ?>
    </div>

  </div>
</div>

