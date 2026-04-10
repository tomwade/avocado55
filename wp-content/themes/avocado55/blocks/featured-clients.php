<?php
/**
 * Featured Clients Block
 *
 * Displays a continuously scrolling marquee of featured client logos.
 */

$title = get_sub_field( 'title' );

// Normalise client rows so we support both image array and image ID return formats.
$normalized_clients = array();
if ( have_rows( 'clients' ) ) {
  while ( have_rows( 'clients' ) ) {
    the_row();

    // Pull values directly from each repeater row to avoid partial array payloads.
    $client_title = (string) get_sub_field( 'title' );
    $client_image = get_sub_field( 'image' );
    $image_url = '';
    $image_alt = '';

    if ( is_array( $client_image ) ) {
      $image_url = isset( $client_image['url'] ) ? (string) $client_image['url'] : '';
      $image_alt = isset( $client_image['alt'] ) ? (string) $client_image['alt'] : '';

      if ( $image_url === '' && ! empty( $client_image['ID'] ) ) {
        $image_id = (int) $client_image['ID'];
        $image_url = wp_get_attachment_image_url( $image_id, 'large' ) ?: '';
        $image_alt = $image_alt ?: ( get_post_meta( $image_id, '_wp_attachment_image_alt', true ) ?: '' );
      }
    } elseif ( is_numeric( $client_image ) ) {
      $image_id = (int) $client_image;
      $image_url = wp_get_attachment_image_url( $image_id, 'large' ) ?: '';
      $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ) ?: '';
    } elseif ( is_string( $client_image ) ) {
      $image_url = trim( $client_image );
    }

    if ( $image_url === '' ) {
      continue;
    }

    $normalized_clients[] = array(
      'title' => $client_title,
      'image_url' => $image_url,
      'image_alt' => $image_alt,
    );
  }
}

if ( empty( $normalized_clients ) ) {
  return;
}

// Repeat small client sets so the carousel always has enough items to feel continuous.
$render_clients = $normalized_clients;
$min_render_items = 14;
$client_count = count( $normalized_clients );
if ( $client_count > 0 && $client_count < $min_render_items ) {
  $i = 0;
  while ( count( $render_clients ) < $min_render_items ) {
    $render_clients[] = $normalized_clients[ $i % $client_count ];
    $i++;
  }
}

$block_id = 'featured-clients-' . wp_unique_id();
?>

<section class="bg-white py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <?php if ( ! empty( $title ) ) : ?>
      <h2 class="text-3xl lg:text-4xl font-semibold text-brand-green mb-16 text-center <?php echo esc_attr( avocado55_animation_class(1) ); ?>">
        <?php echo esc_html( $title ); ?>
      </h2>
    <?php endif; ?>
  </div>

  <div id="<?php echo esc_attr( $block_id ); ?>" class="featured-clients-slider <?php echo esc_attr( avocado55_animation_class(2) ); ?>">
    <?php foreach ( $render_clients as $client ) : ?>
      <article class="px-3 text-center mx-6">
        <img
          src="<?php echo esc_url( $client['image_url'] ); ?>"
          alt="<?php echo esc_attr( $client['image_alt'] ?: $client['title'] ); ?>"
          loading="lazy"
          class="h-24 w-auto object-contain mx-auto"
        />
      </article>
    <?php endforeach; ?>
  </div>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    if (typeof jQuery === 'undefined' || !jQuery.fn.slick) {
      return;
    }

    // Use Slick for smooth, autoplaying logo carousel.
    jQuery('#<?php echo esc_js( $block_id ); ?>').slick({
      arrows: false,
      dots: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 0,
      speed: 3000,
      cssEase: 'linear',
      slidesToShow: 1,
      slidesToScroll: 1,
      variableWidth: true,
      pauseOnHover: false,
      pauseOnFocus: false,
      swipe: false,
      draggable: false,
      touchMove: false
    });
  });
  </script>


</section>