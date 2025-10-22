  <footer class="my-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="w-full mb-16">
        <?php if ($logo = get_field('logo_footer', 'option')) { ?>
          <img src="<?php echo $logo['url']; ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" style="max-width: 268px; max-height: 51px;" />
        <?php } ?>
      </div>

      <div class="flex flex-col sm:flex-row space-y-12 sm:space-y-0">
        <div class="flex-initial w-48 h-48">
          <ul class="flex flex-col space-y-4">
            <?php
            $menu_name = 'footer_menu';
            if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
              $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
              $menu_items = wp_get_nav_menu_items($menu->term_id);

              foreach ((array) $menu_items as $key => $menu_item) {
                echo '<li><a href="' . $menu_item->url . '" title="' . esc_attr($menu_item->title) . '">' . $menu_item->title . '</a></li>';
              }
            }
            ?>
          </ul>
        </div>

        <div class="flex-1">
          <h4><strong>Memberships</strong></h4>

          <div class="flex flex-col sm:flex-row space-y-8 sm:space-y-0 sm:space-x-8 mt-4 items-center">
            <?php if ($memberships = get_field('memberships', 'option')) { ?>
              <?php foreach ($memberships as $membership) { ?>
                <a href="<?php echo $membership['link']; ?>" target="_blank"><img src="<?php echo $membership['image']['url']; ?>" class="w-auto h-auto" style="max-height: 100px; max-width: 100px" /></a>
              <?php } ?>
            <?php } ?>
          </div>
        </div>

        <div class="flex-initial w-96 space-y-2">
          <h4><strong>Connect</strong></h4>

          <ul class="!my-4 flex space-x-8">
            <?php if ($social = get_field('instagram', 'option')) { ?>
              <li>
                <a href="<?php echo $social; ?>" target="_blank" rel="nofollow" title="Connect with us on Instagram">
                  <span class="social-icon social-icon--instagram"></span>
                </a>
              </li>
            <?php } ?>

            <?php if ($social = get_field('twitter', 'option')) { ?>
              <li>
                <a href="<?php echo $social; ?>" target="_blank" rel="nofollow" title="Connect with us on Twitter">
                  <span class="social-icon social-icon--twitter"></span>
                </a>
              </li>
            <?php } ?>

            <?php if ($social = get_field('linkedin', 'option')) { ?>
              <li>
                <a href="<?php echo $social; ?>" target="_blank" rel="nofollow" title="Connect with us on LinkedIn">
                  <span class="social-icon social-icon--linkedin"></span>
                </a>
              </li>
            <?php } ?>

            <?php if ($social = get_field('vimeo', 'option')) { ?>
              <li>
                <a href="<?php echo $social; ?>" target="_blank" rel="nofollow" title="Connect with us on Vimeo">
                  <span class="social-icon social-icon--vimeo"></span>
                </a>
              </li>
            <?php } ?>
          </ul>

          <?php if ($address = get_field('address', 'option')) { ?>
            <address class="not-italic"><?php echo $address; ?></address>
          <?php } ?>

          <?php if ($telephone = get_field('phone_number', 'option')) { ?>
            <p><a href="tel:<?php echo $telephone; ?>"><?php echo $telephone; ?></a></p>
          <?php } ?>

          <?php if ($email = get_field('email', 'option')) { ?>
            <p><a href="mailto:<?php echo $email; ?>" class="text-red"><?php echo $email; ?></a></p>
          <?php } ?>
        </div>
      </div>

      <div class="mt-12 w-full text-center text-sm">
        &copy; Copyright 2024. All Rights Reserved, Experience12 &nbsp; | &nbsp; <a href="/modern-slavery-statement/" title="Modern Slavery Statement" class="text-red underline">Modern Slavery Statement</a> | &nbsp; <a href="/privacy-policy/" title="Privacy Policy" class="text-red underline">Privacy Policy</a>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>

</body>
</html>
