<?php if ($images = get_sub_field('images')) { ?>
  <?php if (get_sub_field('style') != 'inline') { ?>
    <img src="<?php echo $images[0]['url']; ?>" />
  <?php } else { ?>
    <div class="bg-white py-20 overflow-hidden bg-white text-neutral-800">
      <div class="container max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8 relative">
        <?php if (count($images) > 1) { ?>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pagination-left.svg" width="44" height="44" class="swiper-prev absolute top-1/2 transform -translate-y-1/2" style="left: -30px" />
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pagination-right.svg" width="44" height="44" class="swiper-next absolute top-1/2 transform -translate-y-1/2" style="right: -30px" />
        <?php } ?>

        <div class="swiper-gallery mx-auto overflow-hidden">
          <div class="swiper-wrapper">
            <?php foreach ($images as $i => $image) { ?>
              <div class="swiper-slide relative">
                <img src="<?php echo $image['url']; ?>" class="rounded-2xl" style="max-height: 40rem; margin: 0 auto">
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

    </div>

  <?php } ?>
<?php } ?>
