<?php
$title = get_sub_field('title'); // Title field
$team_members = get_sub_field('team_members'); // Post Object field (multiple values) - array of team member post IDs

// Get the selected team member posts
$members = [];
if ($team_members) {
  // If it's an array of post IDs, use them
  if (is_array($team_members)) {
    $members = $team_members;
  } else {
    // If it's a single post, convert to array
    $members = [$team_members];
  }
}
?>

<?php if (!empty($members)): ?>
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
    
    <?php if ($title): ?>
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-medium tracking-tight text-gray-900 mb-12 text-center">
        <?php echo esc_html($title); ?>
      </h2>
    <?php endif; ?>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
      
      <?php foreach ($members as $member_id): ?>
        <?php
        $member_post = get_post($member_id);
        if (!$member_post) continue;
        
        // Get ACF fields from the team member post
        $image_id = get_post_thumbnail_id($member_id);
        $image = $image_id ? wp_get_attachment_image_src($image_id, 'team_member') : null;
        $role = get_field('role', $member_id);
        $name = get_the_title($member_id);
        $description = get_field('description', $member_id);
        if (!$description) {
          $member_post_obj = get_post($member_id);
          if ($member_post_obj) {
            $description = $member_post_obj->post_excerpt ?: wp_trim_words($member_post_obj->post_content, 20);
          }
        }
        ?>
        
        <div class="bg-white rounded-lg">
          
          <?php if ($image): ?>
            <div class="w-full mb-4">
              <img 
                src="<?php echo esc_url($image[0]); ?>" 
                alt="<?php echo esc_attr($name); ?>"
                class="w-full h-auto rounded-lg object-cover"
              />
            </div>
          <?php endif; ?>

          <div class="px-4 pb-4">
            <?php if ($name): ?>
              <h3 class="text-xl font-medium text-gray-900 mb-2">
                <?php echo esc_html($name); ?>
              </h3>
            <?php endif; ?>

            <?php if ($role): ?>
              <div class="text-sm text-gray-600 mb-3">
                <?php echo esc_html($role); ?>
              </div>
            <?php endif; ?>

            <?php if ($description): ?>
              <p class="text-gray-600 text-sm leading-relaxed">
                <?php echo esc_html($description); ?>
              </p>
            <?php endif; ?>
          </div>

        </div>

      <?php endforeach; ?>

    </div>
  </div>
<?php endif; ?>

