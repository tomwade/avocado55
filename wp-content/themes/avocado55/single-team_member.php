<?php
/**
 * Single Team Member Template
 *
 * Public bio page used for author/entity linking and SEO.
 */

get_header();

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();

    $member_id = get_the_ID();
    $name = get_field( 'name', $member_id ) ?: get_the_title( $member_id );
    $role = get_field( 'role', $member_id );
    $phone = get_field( 'phone', $member_id );
    $email = get_field( 'email', $member_id );
    $linkedin = get_field( 'linkedin', $member_id );
    $booking_link = get_field( 'booking_link', $member_id );
    $modal_content = get_field( 'modal_content', $member_id );
    $linked_user_id = (int) get_field( 'wordpress_user', $member_id );
    $profile_image = get_field( 'modal_image', $member_id );
    $featured_image = get_the_post_thumbnail_url( $member_id, 'large' );
    $profile_image_url = ! empty( $profile_image['url'] ) ? $profile_image['url'] : $featured_image;

    // Pull latest blog posts for team members linked to a WP author account.
    $latest_posts_query = null;
    if ( $linked_user_id > 0 ) {
      $latest_posts_query = new WP_Query(
        array(
          'post_type'      => 'post',
          'post_status'    => 'publish',
          'author'         => $linked_user_id,
          'posts_per_page' => 3,
          'orderby'        => 'date',
          'order'          => 'DESC',
        )
      );
    }
    ?>

    <section class="bg-brand-light py-16 lg:py-24">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-12">
          <aside class="lg:col-span-1">
            <?php if ( $profile_image_url ) : ?>
              <div class="rounded-2xl overflow-hidden mb-6">
                <img src="<?php echo esc_url( $profile_image_url ); ?>" alt="<?php echo esc_attr( $name ); ?>" class="w-full h-auto object-cover" />
              </div>
            <?php endif; ?>

            <h1 class="text-3xl lg:text-4xl font-semibold text-brand-green"><?php echo esc_html( $name ); ?></h1>
            <?php if ( $role ) : ?>
              <p class="mt-2 text-gray-700"><?php echo esc_html( $role ); ?></p>
            <?php endif; ?>

            <div class="mt-6 space-y-2 text-sm text-gray-700">
              <?php if ( $phone ) : ?>
                <p>T: <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>" class="hover:text-brand-green"><?php echo esc_html( $phone ); ?></a></p>
              <?php endif; ?>
              <?php if ( $email ) : ?>
                <p>E: <a href="mailto:<?php echo esc_attr( $email ); ?>" class="hover:text-brand-green"><?php echo esc_html( $email ); ?></a></p>
              <?php endif; ?>
            </div>

            <div class="mt-6 flex items-center gap-3">
              <?php if ( $linkedin ) : ?>
                <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer" class="w-9 h-9 border border-gray-300 rounded flex items-center justify-center hover:border-brand-green transition-colors" aria-label="<?php echo esc_attr( $name . ' LinkedIn profile' ); ?>">
                  <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/social-linkedin.png' ); ?>" alt="" class="w-4 h-4" />
                </a>
              <?php endif; ?>
              <?php if ( $booking_link ) : ?>
                <a href="<?php echo esc_url( $booking_link ); ?>" class="button button--brand-cta">Book a call</a>
              <?php endif; ?>
            </div>
          </aside>

          <article class="lg:col-span-2 bg-white rounded-2xl p-8 lg:p-10">
            <?php if ( ! empty( $modal_content ) ) : ?>
              <div class="page-content">
                <h1 class="text-2xl lg:text-3xl font-semibold text-brand-green mb-8">About <?php echo esc_html( $name ); ?></h1>

                <?php echo wp_kses_post( wpautop( $modal_content ) ); ?>
              </div>
            <?php endif; ?>

            <?php if ( ! empty( get_the_content() ) ) : ?>
              <div class="page-content <?php echo ! empty( $modal_content ) ? 'mt-8' : ''; ?>">
                <?php echo avocado55_render_content( get_the_content() ); ?>
              </div>
            <?php endif; ?>

          </article>
        </div>

        <?php if ( $latest_posts_query && $latest_posts_query->have_posts() ) : ?>
          <section class="mt-16 lg:mt-24">
            <h2 class="text-2xl lg:text-3xl font-semibold text-brand-green mb-8">
              Latest posts by <?php echo esc_html( $name ); ?>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
              <?php while ( $latest_posts_query->have_posts() ) : $latest_posts_query->the_post(); ?>
                <?php get_template_part( 'partials/news-post', null, array( 'post_id' => get_the_ID() ) ); ?>
              <?php endwhile; ?>
            </div>
          </section>
        <?php endif; ?>
      </div>
    </section>

    <?php
    if ( $latest_posts_query instanceof WP_Query ) {
      wp_reset_postdata();
    }
  }
}

get_footer();
