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
require_once get_template_directory() . '/post-types/partner.php';
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
        'footer_menu' => __( 'Footer Menu', 'avocado55' ),
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
 * Outputs menu items with Tailwind CSS classes and active states
 */
class Avocado55_Header_Nav_Walker extends Walker_Nav_Menu {
  
  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    $is_active = false;
    
    // Check WordPress's built-in current classes
    if (in_array('current-menu-item', $item->classes) || 
        in_array('current-menu-ancestor', $item->classes) ||
        in_array('current-menu-parent', $item->classes)) {
      $is_active = true;
    }
    
    // Check for blog/insights - active when on blog archive or single post
    $blog_page_id = get_option('page_for_posts');
    if ($item->object_id == $blog_page_id && (is_home() || is_singular('post') || is_category() || is_tag())) {
      $is_active = true;
    }
    
    // Check for Client Stories - active when on stories archive or single story
    $item_url = $item->url;
    if (strpos($item_url, '/stories') !== false && (is_post_type_archive('story') || is_singular('story'))) {
      $is_active = true;
    }
    
    // Check for current page ancestors (child pages)
    if ($item->object === 'page' && is_page()) {
      $current_page_id = get_queried_object_id();
      $ancestors = get_post_ancestors($current_page_id);
      if (in_array($item->object_id, $ancestors)) {
        $is_active = true;
      }
    }
    
    $link_classes = 'text-sm/6 font-medium text-gray-900 p-3';
    $container_classes = 'nav-item relative';
    
    if ($is_active) {
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

  public function end_el( &$output, $item, $depth = 0, $args = null ) {
    // No closing tag needed
  }
}
