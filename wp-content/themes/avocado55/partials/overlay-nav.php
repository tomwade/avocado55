<nav id="main-navigation" class="nav-main">
  <?php if ($logo = get_field('menu_logo', 'option')) { ?>
    <div class="menu__logo absolute top-8 left-8 z-10">
      <a href="<?php echo site_url(); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
        <img src="<?php echo $logo['url']; ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" style="max-width: 268px; max-height: 44px;" />
      </a>
    </div>
  <?php } ?>

  <div class="grid grid-cols-1 sm:grid-cols-3 gap-12 w-full sm:max-w-5xl mx-auto">
    <ul class="menu text-4xl sm:text-6xl md:text-7xl font-semibold px-3 sm:p-0">
      <?php
      $menu_name = 'header_menu';
      if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        foreach ((array) $menu_items as $key => $menu_item) {
          echo '<li class="menu__item">';
          echo '<a class="menu__link" href="' . $menu_item->url . '" title="' . esc_attr($menu_item->title) . '">' . $menu_item->title . '</a>';
          echo '</li>';
        }
      }
      ?>
    </ul>

    <div></div>

    <div class="menu__meta flex-initial self-end space-y-2 text-white px-6 sm:p-0 sm:pb-4">
      <?php if ($telephone = get_field('phone_number', 'option')) { ?>
        <p><a href="tel:<?php echo $telephone; ?>"><?php echo $telephone; ?></a></p>
      <?php } ?>

      <?php if ($email = get_field('email', 'option')) { ?>
        <p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
      <?php } ?>

      <ul class="!mt-8 pt-8 flex space-x-8 sm:max-w-xs" style="border-top: solid 1px rgba(217, 217, 217, 0.4);">
        <?php if ($social = get_field('instagram', 'option')) { ?>
          <li>
            <a href="<?php echo $social; ?>" target="_blank" rel="nofollow" title="Connect with us on Instagram">
              <span class="social-icon-white social-icon--instagram"></span>
            </a>
          </li>
        <?php } ?>

        <?php if ($social = get_field('twitter', 'option')) { ?>
          <li>
            <a href="<?php echo $social; ?>" target="_blank" rel="nofollow" title="Connect with us on Twitter">
              <span class="social-icon-white social-icon--twitter"></span>
            </a>
          </li>
        <?php } ?>

        <?php if ($social = get_field('linkedin', 'option')) { ?>
          <li>
            <a href="<?php echo $social; ?>" target="_blank" rel="nofollow" title="Connect with us on LinkedIn">
              <span class="social-icon-white social-icon--linkedin"></span>
            </a>
          </li>
        <?php } ?>

        <?php if ($social = get_field('vimeo', 'option')) { ?>
          <li>
            <a href="<?php echo $social; ?>" target="_blank" rel="nofollow" title="Connect with us on Vimeo">
              <span class="social-icon-white social-icon--vimeo"></span>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
