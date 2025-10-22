<?php
get_header();

function abl1035_alx_embed_html( $html ) {
  
  return '<div class="video-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'abl1035_alx_embed_html', 10, 3 );

$title = get_the_title();

$categories = get_the_category();
if ( ! empty( $categories ) ) {
	$subtitle = esc_html($categories[0]->name);
}

include(get_template_directory() . '/partials/archive-header.php');

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    ?>

	<?php if ($thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'featured_image')) { ?>
        <img src="<?php echo $thumbnail; ?>" class="max-w-screen-lg w-full mx-auto -mt-36 rounded-2xl relative z-30 !p-0" />
        <div class="py-20">
    <?php } else { ?>
        <div class="pt-40 pb-20">
    <?php } ?>

      <div class="container max-w-screen-md mx-auto px-4 sm:px-6 lg:px-8">

        <div class="post-content post-content-intro">
          <?php the_content(); ?>
        </div>

      </div>
    </div>

    <style>
.wp-embed-responsive .wp-block-embed__wrapper:before {
  padding-top: 0 !important;
}

.video-container { 
  font-size: 1.3125rem;
  line-height: 1.9375rem;
  position: relative; 
  padding-bottom: 56.25%; 
  height: 0; 
  overflow: hidden;
  max-width: 100%;
  margin: 0 auto 2rem;
}
  
.video-container iframe, .video-container object, .video-container embed, .video-container video { 
  position: absolute; 
  top: 0; 
  left: 0; 
  right: 0;
  width: 100%;
  height: 100%;
}

    .post-content audio, .post-content canvas, .post-content embed, .post-content iframe, .post-content object, .post-content svg, .post-content video {
        margin-left: auto;
        margin-right: auto;
        border-radius: 1rem;
    }

    #curve-related {
      margin: 0 0 -6.25rem 0;
      transform: rotate(180deg);
    }

    #curve-related path {
      fill: #fff;
    }
    </style>

    <div id="curve-related" class="curve">
      <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z"></path>
      </svg>
    </div>

    <div class="bg-offwhite pt-36 pb-24">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="text-4xl font-medium mb-12">Related News</h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
          <?php foreach (wp_get_recent_posts(['post_status' => 'publish', 'numberposts' => 3]) as $i => $post) { ?>
            <article class="swiper-slide relative">
              <a href="<?php echo get_the_permalink($post['ID']); ?>" title="<?php echo esc_attr(get_the_title($post['ID'])); ?>" class="absolute inset-0 z-10"></a>

              <div class="relative w-full">
                <img src="<?php echo get_the_post_thumbnail_url($post['ID'], 'full'); ?>" alt="" class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
              </div>
              <div class="max-w-xl">
                <div class="leading-7 group relative">
                  <h3 class="mt-4 mb-1 text-xl font-medium text-gray-900"><?php echo get_the_title($post['ID']); ?></h3>
                  <time datetime="2020-03-16" class="text-lg text-gray-400"><?php echo get_the_date('M j, Y', $post['ID']); ?></time>
                </div>
              </div>
            </article>
          <?php } ?>
        </div>
      </div>
    </div>

  <?php
  }
}

get_footer();
