<?php
$headline = get_sub_field('headline');
$text = get_sub_field('text');
$contact_form_7_shortcode = get_sub_field('contact_form_7_shortcode'); // Contact Form 7 shortcode
?>

<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
    
    <!-- Left Section: Text Content -->
    <div class="flex flex-col justify-center">
      <?php if ($headline): ?>
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-medium tracking-tight text-gray-900 mb-6 <?php echo esc_attr(avocado55_animation_class(1)); ?>">
          <?php echo esc_html($headline); ?>
        </h2>
      <?php endif; ?>

      <?php if ($text): ?>
        <div class="text-gray-600 text-lg leading-relaxed <?php echo esc_attr(avocado55_animation_class(2)); ?>">
          <?php echo wp_kses_post($text); ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- Right Section: Form -->
    <div class="<?php echo esc_attr(avocado55_animation_class(3)); ?>">
      <?php if ($contact_form_7_shortcode): ?>
        <!-- Contact Form 7 -->
        <div class="bg-gray-50 rounded-lg p-6 lg:p-8">
          <?php echo do_shortcode($contact_form_7_shortcode); ?>
        </div>
      <?php else: ?>
        <!-- Fallback Form Fields -->
        <form class="bg-gray-50 rounded-lg p-6 lg:p-8 space-y-6" method="post" action="">
          
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
            <input 
              type="text" 
              id="name" 
              name="name" 
              required
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
            />
          </div>

          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input 
              type="email" 
              id="email" 
              name="email" 
              required
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
            />
          </div>

          <div>
            <label for="company" class="block text-sm font-medium text-gray-700 mb-2">Company</label>
            <input 
              type="text" 
              id="company" 
              name="company"
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
            />
          </div>

          <div>
            <label for="service_area" class="block text-sm font-medium text-gray-700 mb-2">Service area</label>
            <select 
              id="service_area" 
              name="service_area"
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent bg-white"
            >
              <option value="">Select a service area</option>
              <option value="service1">Service 1</option>
              <option value="service2">Service 2</option>
              <option value="service3">Service 3</option>
            </select>
          </div>

          <div>
            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
            <textarea 
              id="message" 
              name="message" 
              rows="5"
              required
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
            ></textarea>
          </div>

          <div>
            <button 
              type="submit" 
              class="w-full px-6 py-3 border border-gray-300 rounded-lg bg-white text-gray-700 font-medium hover:bg-gray-50 transition-colors"
            >
              Start the conversation
            </button>
          </div>

        </form>
      <?php endif; ?>
    </div>

  </div>
</div>

