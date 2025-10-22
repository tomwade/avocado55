<?php if ($careers = get_sub_field('careers')) { ?>
  <div class="bg-offwhite">
    <div class="pb-24 sm:pb-32 lg:pb-40">
      <div class="container max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <?php if ($label = get_sub_field('label')) { ?>
            <h4 class="mt-12 mb-4 text-sm text-dark opacity-30 font-semibold uppercase leading-tight tracking-subtitle"><?php echo $label; ?></h4>
          <?php } ?>

          <h3 class="highlight-red text-xl font-medium tracking-tight text-dark sm:text-5xl"><?php echo get_sub_field('title'); ?></h3>
        </div>

        <div class="mt-10 space-y-6">
          <?php foreach ($careers as $i => $career) { ?>
            <div class="p-8 rounded-2xl bg-white">
              <a href="<?php echo get_the_permalink($career->ID); ?>" title="<?php echo esc_attr(get_the_title($career->ID)); ?>" class="flex w-full items-start justify-between text-left text-gray-900">
                <span class="text-2xl font-medium leading-7"><?php echo get_the_title($career->ID); ?></span>
                <span class="ml-6 flex h-7 items-center" data-service="service-<?php echo $i; ?>">
                  <svg class="h-10 w-10" viewBox="0 0 55 54" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(-90deg);">
                    <g id="Group 54">
                      <circle id="Ellipse 7" cx="27.5" cy="27" r="27" transform="rotate(90 27.5 27)" fill="#D9D9D9"/>
                      <g id="Group">
                        <path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M26.7247 14.7277L28.9731 14.7277L28.9731 37.2117L26.7247 37.2117L26.7247 14.7277Z" fill="black"/>
                        <path id="Vector_2" fill-rule="evenodd" clip-rule="evenodd" d="M17.5146 24.9416L29.4385 36.8655L27.8487 38.4553L15.9248 26.5315L17.5146 24.9416Z" fill="black"/>
                        <path id="Vector_3" fill-rule="evenodd" clip-rule="evenodd" d="M38.1831 24.9416L39.7729 26.5315L27.8491 38.4553L26.2593 36.8655L38.1831 24.9416Z" fill="black"/>
                      </g>
                    </g>
                  </svg>
                </span>
              </a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
