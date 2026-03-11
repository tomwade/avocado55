<?php
/**
 * Functions and definitions.
 *
 * @package WordPress
 * @subpackage Avocado55
 * @since 0.0.1
 */

// Load our ACF configuration
require_once get_template_directory() . '/acf/config.php';

// Load our custom post types
require_once get_template_directory() . '/post-types/client.php';
require_once get_template_directory() . '/post-types/sector.php';
require_once get_template_directory() . '/post-types/service.php';
require_once get_template_directory() . '/post-types/story.php';
require_once get_template_directory() . '/post-types/team.php';


class Avocado55 {

  public function __construct() {
    // Set up our theme
    add_action('after_setup_theme', [$this, 'setup_theme']);

    // Add HTML5 theme support.
    add_action('after_setup_theme', [$this, 'html_theme_support']);

    // Enqueue scripts
    add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);

    // Set up our image sizes
    add_action('after_setup_theme', [$this, 'register_image_sizes']);

    // Customise the login page
    add_action('login_enqueue_scripts', [$this, 'my_login_stylesheet']);
    add_filter('login_headerurl', [$this, 'my_login_logo_url']);
    add_filter('login_headertext', [$this, 'my_login_logo_url_title']);

    // Disable emojis for load speed
    add_action('init', [$this, 'disable_emojis']);
  }

  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   *
   * @since 0.0.1
   */

  public function setup_theme() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * This theme does not use a hard-coded <title> tag in the document head,
     * WordPress will provide it for us.
     */
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1568, 9999 );

    // Register navigation menus
    register_nav_menus(
      array(
        'header_menu' => esc_html__( 'Header Menu', 'avocado55' ),
        'footer_menu' => esc_html__( 'Footer Menu', 'avocado55' ),
      )
    );

    // Add support for responsive embedded content.
    add_theme_support( 'responsive-embeds' );

    // Add support for custom line height controls.
    add_theme_support( 'custom-line-height' );

    // Add support for experimental link color control.
    add_theme_support( 'experimental-link-color' );

    // Add support for experimental cover block spacing.
    add_theme_support( 'custom-spacing' );
  }

  /**
   * Add HTML5 theme support.
   *
   * @since 0.0.1
   */
  public function html_theme_support() {
      add_theme_support('html5', ['search-form']);
  }

  /**
   * Enqueue scripts and styles.
   *
   * @since 0.0.1
   */
  public function enqueue_scripts() {
    # Set our version
    $ver = wp_get_theme()->get( 'Version' );

    # Include styles
    wp_enqueue_style( 'avocado55-app', get_template_directory_uri() . '/assets/css/output.css', [], $ver );
    wp_enqueue_style( 'avocado55-styles', get_template_directory_uri() . '/style.css', [], $ver );
    
    # Slick Carousel (CDN)
    wp_enqueue_style( 'slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', [], '1.8.1' );
    wp_enqueue_style( 'slick-carousel-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', ['slick-carousel'], '1.8.1' );

    # Enqueue jQuery (required for Slick)
    wp_enqueue_script( 'jquery' );
    
    # Slick Carousel JS
    wp_enqueue_script( 'slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], '1.8.1', true );

    # Add our scripts
    wp_enqueue_script( 'avocado55-app', get_template_directory_uri() . '/assets/js/app.js', ['jquery'], $ver, true);
  }

  /**
   * Register image sizes for the site.
   *
   * @since 0.0.1
   */
  public function register_image_sizes() {
      add_image_size( 'featured_image', 1200, 600, true );
      add_image_size( 'team_member', 540, 632, true );
      add_image_size( 'instagram', 600, 600, true );
  }

  public function my_login_stylesheet() {
      wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/assets/css/login.css' );
  }

  /**
   * Change the login logo URL to point to the site home.
   *
   * @since 0.0.1
   */
  public function my_login_logo_url() {
      return home_url();
  }

  /**
   * Change the login logo URL title.
   *
   * @since 0.0.1
   */
  public function my_login_logo_url_title() {
      return get_bloginfo('name');
  }

  public function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  }

}

new Avocado55;

/**
 * Get animation class if animations are enabled
 * 
 * @param int $delay Optional delay index for staggered animations (1-6)
 * @return string Animation class string or empty string
 */
function avocado55_animation_class($delay = 0) {
  static $animations_enabled = null;
  
  if ($animations_enabled === null) {
    $animations_enabled = get_field('enable_animation', 'option');
  }
  
  if (!$animations_enabled) {
    return '';
  }
  
  $class = 'animate-on-scroll';
  if ($delay > 0 && $delay <= 10) {
    $class .= ' animate-delay-' . intval($delay);
  }
  
  return $class;
}

/**
 * Custom Walker for Header Navigation
 * Outputs menu items with Tailwind CSS classes and active states.
 * Renders the Services dropdown (desktop only) when enabled in ACF Options.
 */
class Avocado55_Header_Nav_Walker extends Walker_Nav_Menu {

  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    $is_services = ( stripos( $item->title, 'Services' ) !== false || strpos( $item->url, '/services' ) !== false );
    $show_dropdown = $is_services && $depth === 0 && get_field( 'show_services_dropdown', 'option' );
    $services = $show_dropdown ? get_field( 'services_dropdown_services', 'option' ) : array();
    $heading = $show_dropdown ? get_field( 'services_dropdown_heading', 'option' ) : '';
    $link_arr = $show_dropdown ? get_field( 'services_dropdown_link', 'option' ) : null;

    if ( $show_dropdown && ( ! empty( $services ) || $heading || $link_arr ) ) {
      $output .= $this->render_services_dropdown( $item, $heading, $link_arr, $services );
      return;
    }

    $is_active = false;
    if ( in_array( 'current-menu-item', $item->classes ) ||
         in_array( 'current-menu-ancestor', $item->classes ) ||
         in_array( 'current-menu-parent', $item->classes ) ) {
      $is_active = true;
    }
    $blog_page_id = get_option( 'page_for_posts' );
    if ( $item->object_id == $blog_page_id && ( is_home() || is_singular( 'post' ) || is_category() || is_tag() ) ) {
      $is_active = true;
    }
    $item_url = $item->url;
    if ( strpos( $item_url, '/stories' ) !== false && ( is_post_type_archive( 'story' ) || is_singular( 'story' ) ) ) {
      $is_active = true;
    }
    if ( $item->object === 'page' && is_page() ) {
      $current_page_id = get_queried_object_id();
      $ancestors = get_post_ancestors( $current_page_id );
      if ( in_array( $item->object_id, $ancestors ) ) {
        $is_active = true;
      }
    }

    $link_classes = 'text-sm/6 font-medium text-gray-900 px-3 py-3 inline-flex items-center h-10';
    $container_classes = 'nav-item relative flex items-center';
    if ( $is_active ) {
      $container_classes .= ' nav-item--active';
    }
    $output .= sprintf(
      '<div class="%s"><a href="%s" class="%s">%s</a></div>',
      esc_attr( $container_classes ),
      esc_url( $item->url ),
      esc_attr( $link_classes ),
      esc_html( $item->title )
    );
  }

  private function render_services_dropdown( $item, $heading, $link_arr, $services ) {
    $link_url = is_array( $link_arr ) && ! empty( $link_arr['url'] ) ? $link_arr['url'] : '/services/';
    $link_title = is_array( $link_arr ) && ! empty( $link_arr['title'] ) ? $link_arr['title'] : 'All services';
    $link_target = is_array( $link_arr ) && ! empty( $link_arr['target'] ) ? $link_arr['target'] : '_self';

    ob_start();
    ?>
    <div class="nav-item relative services-dropdown-wrapper flex items-center">
      <button type="button" class="services-dropdown-trigger text-sm/6 font-medium text-gray-900 px-3 py-3 inline-flex items-center h-10 bg-transparent border-0 cursor-pointer" aria-expanded="false" aria-haspopup="true" aria-controls="services-dropdown-panel">
        <?php echo esc_html( $item->title ); ?>
        <svg class="services-dropdown-chevron w-4 h-4 ml-0.5 opacity-70 transition-transform duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>
      <div id="services-dropdown-panel" class="services-dropdown-panel fixed left-0 right-0 w-full opacity-0 invisible transition-all duration-150 z-50 bg-white shadow-xl border-t border-gray-100" role="menu">
        <div class="max-w-6xl mx-auto py-8">
          <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12">
            <div class="flex flex-col justify-center lg:col-span-2">
              <?php if ( $heading ) : ?>
                <p class="text-brand-green font-medium text-[28px] leading-snug mb-6"><?php echo esc_html( $heading ); ?></p>
              <?php endif; ?>
              <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener" class="button button--brand-green self-start">
                <?php echo esc_html( $link_title ); ?>
              </a>
            </div>
            <?php if ( ! empty( $services ) ) : ?>
              <div class="grid grid-cols-2 gap-4 lg:col-span-3">
                <?php foreach ( $services as $service ) :
                  if ( ! is_object( $service ) || empty( $service->ID ) ) continue;
                  get_template_part( 'partials/service-link', null, array( 'service_id' => $service->ID ) );
                endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <?php
    return ob_get_clean();
  }

  public function end_el( &$output, $item, $depth = 0, $args = null ) {
    // No closing tag needed
  }
}

/**
 * Custom Walker for Mobile Navigation
 * Outputs menu items with large text styling for mobile overlay
 */
class Avocado55_Mobile_Nav_Walker extends Walker_Nav_Menu {
  
  public function start_lvl( &$output, $depth = 0, $args = null ) {
    $output .= '<ul class="pl-4 mt-2 space-y-2">';
  }

  public function end_lvl( &$output, $depth = 0, $args = null ) {
    $output .= '</ul>';
  }
  
  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    $is_active = in_array('current-menu-item', $item->classes) || 
                 in_array('current-menu-ancestor', $item->classes);
    
    $text_size = $depth === 0 ? 'text-2xl' : 'text-lg';
    $text_color = $is_active ? 'text-brand-cta' : 'text-brand-green';
    
    $link_classes = "$text_size font-medium $text_color hover:text-brand-cta transition-colors";
    
    // Check if item has children
    $has_children = in_array('menu-item-has-children', $item->classes);
    
    $output .= '<li>';
    $output .= sprintf(
      '<a href="%s" class="%s">%s</a>',
      esc_url( $item->url ),
      esc_attr( $link_classes ),
      esc_html( $item->title )
    );
    
    if ($has_children && $depth === 0) {
      $output .= '<span class="ml-1 text-brand-green text-sm">›</span>';
    }
  }

  public function end_el( &$output, $item, $depth = 0, $args = null ) {
    $output .= '</li>';
  }
}

/**
 * Custom Walker for Footer Navigation
 * Outputs simple menu items with footer styling
 */
class Avocado55_Footer_Nav_Walker extends Walker_Nav_Menu {
  
  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    $output .= '<li>';
    $output .= sprintf(
      '<a href="%s" class="text-sm text-gray-600 hover:text-brand-green">%s</a>',
      esc_url( $item->url ),
      esc_html( $item->title )
    );
  }

  public function end_el( &$output, $item, $depth = 0, $args = null ) {
    $output .= '</li>';
  }
}

/**
 * Use linked team member's featured image as user avatar when available.
 * Hook: get_avatar_url — overwrites the avatar URL for users who have a team member
 * connected via the wordpress_user ACF field and that team member has a featured image.
 *
 * @param string $url         Default avatar URL.
 * @param mixed  $id_or_email  User ID, email, or WP_User object.
 * @param array  $args         Avatar args (e.g. 'size').
 * @return string Avatar URL (team member featured image or original $url).
 */
function avocado55_avatar_url_from_team_member( $url, $id_or_email, $args ) {
  $user_id = null;
  if ( is_numeric( $id_or_email ) ) {
    $user_id = (int) $id_or_email;
  } elseif ( is_string( $id_or_email ) && is_email( $id_or_email ) ) {
    $user = get_user_by( 'email', $id_or_email );
    $user_id = $user ? $user->ID : 0;
  } elseif ( $id_or_email instanceof WP_User ) {
    $user_id = $id_or_email->ID;
  }
  if ( ! $user_id ) {
    return $url;
  }

  $team = new WP_Query( array(
    'post_type'      => 'team_member',
    'posts_per_page' => 1,
    'post_status'    => 'publish',
    'fields'         => 'ids',
    'meta_query'     => array(
      array(
        'key'   => 'wordpress_user',
        'value' => $user_id,
        'compare' => '=',
      ),
    ),
  ) );

  if ( empty( $team->posts ) ) {
    return $url;
  }

  $member_id = $team->posts[0];
  $size = isset( $args['size'] ) ? (int) $args['size'] : 96;
  $thumb = get_the_post_thumbnail_url( $member_id, array( $size, $size ) );

  wp_reset_postdata();

  return $thumb ? $thumb : $url;
}
add_filter( 'get_avatar_url', 'avocado55_avatar_url_from_team_member', 10, 3 );

/**
 * Run content through the_content filters (wpautop, shortcodes, Calendly → booking card, etc.).
 * Use this when outputting ACF or other stored HTML so it gets the same processing as post content.
 *
 * @param string $content Raw content (e.g. from get_field).
 * @return string Filtered content.
 */
function avocado55_render_content( $content ) {
  if ( ! is_string( $content ) || $content === '' ) {
    return '';
  }
  return apply_filters( 'the_content', $content );
}

/**
 * Get the Calendly "base" URL (scheme + host + first path segment) for matching.
 * e.g. https://calendly.com/twade-slab/30min?x=1 -> https://calendly.com/twade-slab
 *
 * @param string $url Full Calendly URL (with or without query string).
 * @return string Base URL or empty string if not parseable.
 */
function avocado55_calendly_base_url( $url ) {
  $parsed = parse_url( $url );
  if ( empty( $parsed['host'] ) || strpos( $parsed['host'], 'calendly.com' ) === false ) {
    return '';
  }
  $base = ( isset( $parsed['scheme'] ) ? $parsed['scheme'] . '://' : '' ) . $parsed['host'];
  $path = isset( $parsed['path'] ) ? trim( $parsed['path'], '/' ) : '';
  if ( $path !== '' ) {
    $first_segment = strpos( $path, '/' ) !== false ? substr( $path, 0, strpos( $path, '/' ) ) : $path;
    $base .= '/' . $first_segment;
  }
  return $base;
}

/**
 * Build booking card HTML for a Calendly URL (looks up team member by base URL).
 *
 * @param string $url       Full Calendly URL.
 * @param string $link_text Button label (optional).
 * @return string Card HTML or empty string if URL invalid.
 */
function avocado55_calendly_booking_card_html( $url, $link_text = 'Book' ) {
  $content_base = avocado55_calendly_base_url( $url );
  if ( $content_base === '' ) {
    return '';
  }
  $name = '';
  $role = '';
  $avatar_url = null;
  $team = new WP_Query( array(
    'post_type'      => 'team_member',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'meta_query'     => array(
      array(
        'key'     => 'booking_link',
        'value'   => 'calendly.com',
        'compare' => 'LIKE',
      ),
    ),
  ) );
  foreach ( $team->posts as $member ) {
    $stored_url = get_field( 'booking_link', $member->ID );
    if ( empty( $stored_url ) ) {
      continue;
    }
    $stored_base = avocado55_calendly_base_url( $stored_url );
    if ( $stored_base !== '' && $stored_base === $content_base ) {
      $name = get_field( 'name', $member->ID ) ?: get_the_title( $member->ID );
      $role = get_field( 'role', $member->ID ) ?: '';
      $avatar_url = get_the_post_thumbnail_url( $member->ID, 'thumbnail' );
      break;
    }
  }
  wp_reset_postdata();
  ob_start();
  get_template_part( 'partials/booking-card', null, array(
    'name'          => $name,
    'role'          => $role,
    'avatar_url'    => $avatar_url,
    'booking_url'   => $url,
    'booking_label' => $link_text ?: 'Book',
  ) );
  return '<div class="avocado55-booking-card my-4">' . ob_get_clean() . '</div>';
}

/**
 * Replace Calendly links and plain pasted Calendly URLs in post content with a stylised booking card.
 * Uses placeholders so the card HTML (which contains a Calendly link) is never re-processed.
 *
 * @param string $content Post content.
 * @return string Filtered content.
 */
function avocado55_content_calendly_to_booking_card( $content ) {
  if ( ! is_string( $content ) || strpos( $content, 'calendly' ) === false ) {
    return $content;
  }

  $placeholders = array();
  $placeholder_prefix = '{{AVOCADO55_CALENDLY_';

  // Pass 1: plain pasted URLs — replace with placeholder
  $plain_pattern = '/(^|[\s\n.,;:!?)]|>)(https?:\/\/[^\s<>"\']*calendly\.com[^\s<>"\']*)([\s\n.,;:!?(<]|$)/i';
  $content = preg_replace_callback( $plain_pattern, function ( $m ) use ( &$placeholders, $placeholder_prefix ) {
    $prefix = $m[1];
    $url = $m[2];
    $suffix = $m[3];
    $card = avocado55_calendly_booking_card_html( $url, 'Book' );
    if ( $card === '' ) {
      return $m[0];
    }
    $key = count( $placeholders );
    $placeholders[ $key ] = $card;
    return $prefix . $placeholder_prefix . $key . '}}' . $suffix;
  }, $content );

  // Pass 2: anchor tags with Calendly href — replace with placeholder
  $anchor_pattern = '/<a\s[^>]*href=["\'](https?:\/\/[^"\']*calendly\.com[^"\']*)["\'][^>]*>([^<]*)<\/a>/i';
  $content = preg_replace_callback( $anchor_pattern, function ( $m ) use ( &$placeholders, $placeholder_prefix ) {
    $url = $m[1];
    $link_text = trim( $m[2] );
    $card = avocado55_calendly_booking_card_html( $url, $link_text ?: 'Book' );
    if ( $card === '' ) {
      return $m[0];
    }
    $key = count( $placeholders );
    $placeholders[ $key ] = $card;
    return $placeholder_prefix . $key . '}}';
  }, $content );

  // Pass 3: substitute placeholders with card HTML (card links are never seen by the patterns above)
  foreach ( $placeholders as $key => $card ) {
    $content = str_replace( $placeholder_prefix . $key . '}}', $card, $content );
  }

  return $content;
}
add_filter( 'the_content', 'avocado55_content_calendly_to_booking_card', 15 );
