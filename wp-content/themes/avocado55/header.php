<!doctype html>
<html <?php language_attributes(); ?> style="overflow-x: hidden">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <?php wp_head(); ?>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158120081-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-158120081-1');
  </script>

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-PTP2ZTR');</script>
  <!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?> style="overflow-x: hidden">
	<?php wp_body_open(); ?>

  <?php if ($logo = get_field('logo', 'option')) { ?>
    <div class="absolute top-8 left-8 z-10">
      <a href="<?php echo site_url(); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
        <img src="<?php echo $logo['url']; ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" style="max-width: 268px; max-height: 44px;" />
      </a>
    </div>
  <?php } ?>

  <input type="checkbox" id="main-navigation-toggle" class="btn btn--close" title="Toggle main navigation" />
  <label for="main-navigation-toggle" class="absolute top-8 right-8 p-3 py-4 space-y-1 bg-white rounded-full z-50">
      <span class="block w-6 h-0.5 bg-slate-900"></span>
      <span class="block w-6 h-0.5 bg-slate-900"></span>
      <span class="block w-6 h-0.5 bg-slate-900"></span>
  </label>

  <?php include(get_template_directory() . '/partials/overlay-nav.php'); ?>
