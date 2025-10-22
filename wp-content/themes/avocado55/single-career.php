<?php
get_header();

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();

    $title = get_the_title();
    $subtitle = 'Careers';

    include(get_template_directory() . '/partials/archive-header.php');
    ?>

    <div class="bg-white py-20">
      <div class="container max-w-screen-md mx-auto px-4 sm:px-6 lg:px-8">

        <div class="post-content post-content-intro">
          <?php the_content(); ?>
        </div>

        <?php if ($cta_text = get_field('apply_cta_text', 'option')) { ?>
          <div class="bg-red text-white mt-12 rounded-2xl p-8 pb-10 bg-icons bg-icons-3 !bg-right-top" style="background-size: 350px;">
            <h5 class="text-2xl font-semibold mb-4">Apply</h5>
            <p class="text-lg font-normal"><?php echo $cta_text; ?></p>
          </div>
        <?php } ?>

      </div>
    </div>

  <?php
  }
}

get_footer();
