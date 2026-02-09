<?php
$feature_type = get_sub_field('feature_type');
$show_chevron = get_sub_field('show_chevron');
$background_color = get_sub_field('background_color');

// Determine background class
$bg_class = 'bg-brand-green'; // Default
if ($feature_type == 'solid' && $background_color) {
  switch ($background_color) {
    case 'white':
      $bg_class = 'bg-white';
      break;
    case 'light_green':
      $bg_class = 'bg-[#cdfc7f]';
      break;
    case 'dark_green':
    default:
      $bg_class = 'bg-brand-green';
      break;
  }
}

// Determine text color class based on background
$text_class = 'text-white'; // Default for dark green
$text_muted_class = 'text-white/80';
if ($feature_type == 'solid' && ($background_color == 'white' || $background_color == 'light_green')) {
  $text_class = 'text-brand-green';
  $text_muted_class = 'text-gray-600';
}

// Determine chevron image
$chevron_image = 'avacado-mark.png'; // Default
if ($feature_type == 'solid' && $background_color == 'light_green') {
  $chevron_image = 'avocado-mark-light.png';
}
?>

<div class="relative overflow-hidden <?php echo esc_attr($bg_class); ?>">
  <?php if ($feature_type == 'video') { ?>
    <?php if ($video = get_sub_field('background_video')) { ?>
      <?php if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $video, $regs)) { ?>
        <div class="vimeo-wrapper">
          <iframe title="vimeo-player" src="//player.vimeo.com/video/<?php echo $regs[3]; ?>?portrait=0&amp;color=FF1F2E&amp;autoplay=1&amp;loop=1&amp;title=0&amp;byline=0&amp;background=1&amp;muted=1" allow="autoplay; fullscreen" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" class="absolute inset-0 -z-10 w-auto min-w-full min-h-full max-w-none object-cover object-right md:object-center"></iframe>
        </div>
      <?php } ?>

      <?php if (preg_match('%^https:\/\/www.youtube.com\/watch?v=(.*)$%im', $video, $regs)) { ?>
        <iframe src="https://www.youtube.com/embed/<?php echo $regs[0]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="absolute inset-0 -z-10 w-auto min-w-full min-h-full max-w-none object-cover object-right md:object-center"></iframe>
      <?php } ?>
    <?php } ?>
  <?php } else if ($feature_type == 'image' && $image = get_sub_field('background_image')) { ?>
    <img src="<?php echo $image['url']; ?>" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center">
  <?php } ?>

  <div class="relative z-2 mx-auto max-w-7xl px-6 lg:px-8">
    <!-- Chevron Image -->
    <?php if ($show_chevron) : ?>
      <div class="hidden lg:block absolute -top-4 bottom-0 right-0 pointer-events-none">
        <img 
          src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($chevron_image); ?>" 
          alt="" 
          class="w-auto h-full"
          aria-hidden="true"
        />
      </div>
    <?php endif; ?>

    <div class="max-w-2xl <?php echo esc_attr($text_class); ?> space-y-6 py-24 sm:py-32">
      <h1 class="text-5xl <?php echo is_front_page() ? 'lg:text-7xl' : 'lg:text-6xl'; ?> font-medium <?php echo esc_attr(avocado55_animation_class(1)); ?>"><?php echo get_sub_field('title'); ?></h1>
      <p class="text-lg <?php echo esc_attr($text_muted_class); ?> <?php echo esc_attr(avocado55_animation_class(2)); ?>"><?php echo get_sub_field('text'); ?></p>

      <?php if ($link = get_sub_field('link')) { ?>
        <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="button button--brand-cta <?php echo esc_attr(avocado55_animation_class(3)); ?>"><?php echo $link['title']; ?></a>
      <?php } ?>
    </div>
  </div>
</div>
