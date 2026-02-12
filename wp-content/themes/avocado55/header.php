<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

  <header class="bg-white relative z-10" style="box-shadow: 0px 6px 24.3px 0px #00000050;">
    <nav aria-label="Global" class="mx-auto flex max-w-7xl items-center justify-between py-4 px-6 lg:px-8">
      <div class="flex lg:flex-1">
        <a href="<?php echo home_url(); ?>" class="-m-1.5 p-1.5">
          <span class="sr-only">Avocado 55</span>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Avocado 55" class="h-8 w-auto" />
        </a>
      </div>

      <div class="flex lg:hidden">
        <button type="button" id="mobile-menu-open" class="inline-flex items-center justify-center rounded-lg p-2.5 bg-brand-cta text-white">
          <span class="sr-only">Open main menu</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" class="size-6">
            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </div>

      <div class="hidden lg:flex lg:gap-x-6">
        <?php
          wp_nav_menu([
            'theme_location' => 'header_menu',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'fallback_cb'    => false,
            'walker'         => new Avocado55_Header_Nav_Walker(),
          ]);
        ?>
      </div>

      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="/contact-us/" class="button button--brand-cta">Contact us</a>
      </div>
    </nav>
  </header>

  <!-- Mobile Menu Overlay -->
  <div id="mobile-menu" class="mobile-menu fixed inset-0 z-50 hidden">
    <div class="mobile-menu-content flex flex-col h-full bg-white">
      <!-- Header -->
      <div class="flex items-center justify-between py-4 px-6">
        <a href="<?php echo home_url(); ?>" class="-m-1.5 p-1.5">
          <span class="sr-only">Avocado 55</span>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Avocado 55" class="h-8 w-auto" />
        </a>
        <button type="button" id="mobile-menu-close" class="inline-flex items-center justify-center rounded-lg p-2.5 bg-brand-cta text-white">
          <span class="sr-only">Close menu</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" class="size-6">
            <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </div>

      <!-- Menu Items -->
      <nav class="flex-grow px-6 pt-6">
        <?php
          wp_nav_menu([
            'theme_location' => 'header_menu',
            'container'      => false,
            'menu_class'     => 'mobile-menu-items space-y-4',
            'fallback_cb'    => false,
            'walker'         => new Avocado55_Mobile_Nav_Walker(),
          ]);
        ?>
      </nav>

      <!-- CTA Box -->
      <div class="px-6 pb-8 mt-auto">
        <div class="bg-brand-green rounded-2xl p-6 text-white text-center">
          <h3 class="text-xl font-medium mb-4">Let's start with a conversation</h3>
          <a href="/contact-us/" class="button button--brand-cta w-full justify-center">Contact us</a>
        </div>
      </div>
    </div>
  </div>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const mobileMenu = document.getElementById('mobile-menu');
    const openBtn = document.getElementById('mobile-menu-open');
    const closeBtn = document.getElementById('mobile-menu-close');
    const menuItems = mobileMenu.querySelectorAll('.mobile-menu-items > li');

    function openMenu() {
      mobileMenu.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
      
      // Animate menu items with staggered delay
      menuItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(10px)';
        setTimeout(() => {
          item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
          item.style.opacity = '1';
          item.style.transform = 'translateY(0)';
        }, 100 + (index * 80));
      });
    }

    function closeMenu() {
      mobileMenu.classList.add('hidden');
      document.body.style.overflow = '';
    }

    openBtn.addEventListener('click', openMenu);
    closeBtn.addEventListener('click', closeMenu);

    // Close on escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
        closeMenu();
      }
    });
  });
  </script>
