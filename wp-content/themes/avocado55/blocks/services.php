<?php if ($services = get_sub_field('services')) { ?>
  <div class="bg-offwhite">
    <div class="pb-24 sm:pb-32 lg:pb-40">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <dl class="mt-10 space-y-6">
          <?php foreach ($services as $i => $service) { ?>
            <div class="p-8 rounded-2xl bg-white">
              <dt>
                <!-- Expand/collapse question button -->
                <div type="button" class="flex w-full items-start justify-between text-left text-gray-900 items-center" aria-controls="service-<?php echo $i; ?>" aria-expanded="false">
                  <div class="flex items-center">
                    <img class="max-h-12 mr-5" src="<?php echo $service['icon']; ?>" alt="<?php echo esc_attr($service['title']); ?>">
                    <span class="text-2xl font-medium leading-7"><?php echo $service['title']; ?></span>
                  </div>
                  <span class="ml-6 flex h-7 items-center expanding cursor-pointer" data-service="service-<?php echo $i; ?>">
                    <!--
                      Icon when question is collapsed.

                      Item expanded: "hidden", Item collapsed: ""
                    -->
                    <svg id="open-service-<?php echo $i; ?>" class="h-10 w-10" viewBox="0 0 55 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g id="Group 54">
                        <circle id="Ellipse 7" cx="27.5" cy="27" r="27" transform="rotate(90 27.5 27)" fill="#D9D9D9"/>
                        <g id="Group">
                          <path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M26.7247 14.7277L28.9731 14.7277L28.9731 37.2117L26.7247 37.2117L26.7247 14.7277Z" fill="black"/>
                          <path id="Vector_2" fill-rule="evenodd" clip-rule="evenodd" d="M17.5146 24.9416L29.4385 36.8655L27.8487 38.4553L15.9248 26.5315L17.5146 24.9416Z" fill="black"/>
                          <path id="Vector_3" fill-rule="evenodd" clip-rule="evenodd" d="M38.1831 24.9416L39.7729 26.5315L27.8491 38.4553L26.2593 36.8655L38.1831 24.9416Z" fill="black"/>
                        </g>
                      </g>
                    </svg>

                    <!--
                      Icon when question is expanded.

                      Item expanded: "", Item collapsed: "hidden"
                    -->
                    <svg id="close-service-<?php echo $i; ?>" class="hidden h-10 w-10" viewBox="0 0 55 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g id="Group 55">
                        <circle id="Ellipse 7" cx="27.5" cy="27" r="27" transform="rotate(-90 27.5 27)" fill="#D9D9D9"/>
                        <g id="Group">
                          <path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M28.2753 39.2723L26.0269 39.2723L26.0269 16.7883L28.2753 16.7883L28.2753 39.2723Z" fill="black"/>
                          <path id="Vector_2" fill-rule="evenodd" clip-rule="evenodd" d="M37.4854 29.0584L25.5615 17.1345L27.1513 15.5447L39.0752 27.4685L37.4854 29.0584Z" fill="black"/>
                          <path id="Vector_3" fill-rule="evenodd" clip-rule="evenodd" d="M16.8169 29.0584L15.2271 27.4685L27.1509 15.5447L28.7407 17.1345L16.8169 29.0584Z" fill="black"/>
                        </g>
                      </g>
                    </svg>
                  </span>
                </div>
              </dt>
              <dd class="service mt-6 overflow-hidden transition-all duration-500" id="service-<?php echo $i; ?>">
                <div class="grid grids-cols-1 sm:grid-cols-2 gap-8">
                  <img src="<?php echo $service['image']['url']; ?>" class="rounded-2xl" />
                  <div class="post-content">
                    <?php echo $service['content']; ?>

                    <?php if ($service['button_link'] && $service['button_text']) { ?>
                      <a href="<?php echo $service['button_link']['url']; ?>" class="mt-6 button slide arrow"><?php echo $service['button_text']; ?></a>
                    <?php } ?>
                  </div>
                </div>
              </dd>
            </div>
          <?php } ?>
        </dl>
      </div>
    </div>
  </div>
<?php } ?>
