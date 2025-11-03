<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
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
