<?php if ($posts = wp_get_recent_posts(['post_status' => 'publish'])) { ?>
  <div class="my-20 overflow-hidden">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="mb-9 grid grid-cols-2">
        <h2 class="font-medium text-4xl sm:text-5xl leading-tight"><?php echo get_sub_field('title'); ?></h2>
        <div class="flex justify-end">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pagination-left.svg" width="44" height="44" class="swiper-prev mr-5" />
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pagination-right.svg" width="44" height="44" class="swiper-next" />
        </div>
      </div>

      <div class="swiper mx-auto mt-12 overflow-visible">
        <div class="swiper-wrapper">
          <?php foreach ($posts as $i => $post) { ?>
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
  </div>

<?php } ?>
<?php wp_reset_postdata(); ?>
