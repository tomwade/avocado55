<div class="h-screen relative isolate overflow-hidden bg-gradient-to-b from-indigo-100/20 pt-14 bg-[#FF1F2E]" style="min-height: 768px;">
  <div class="absolute inset-0 z-1" style="background: linear-gradient(90deg, #1A1A1A 12.92%, rgba(17, 17, 17, 0) 63.75%); opacity: 0.8;"></div>

  <?php if (get_sub_field('feature_type') == 'video') { ?>
    <?php if ($video = get_sub_field('background_video')) { ?>
      <?php if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $video, $regs)) { ?>
        <div class="vimeo-wrapper">
          <iframe title="vimeo-player" src="//player.vimeo.com/video/<?php echo $regs[3]; ?>?portrait=0&amp;color=FF1F2E&amp;autoplay=1&amp;loop=1&amp;title=0&amp;byline=0&amp;background=1&amp;muted=1" allow="autoplay; fullscreen" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" class="absolute inset-0 -z-10 w-auto min-w-full min-h-full max-w-none object-cover object-right md:object-center"></iframe>
        </div>
      <?php } ?>

      <?php if (preg_match('%^https:\/\/www.youtube.com\/watch?v=(.*)$%im', $video, $regs)) { ?>
        <iframe src="https://www.youtube.com/embed/<?php echo $regs[0]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="absolute inset-0 -z-10 w-auto min-w-full min-h-full max-w-none object-cover object-right md:object-center"></iframe>
      <?php } ?>
    <?php } ?>
  <?php } else if ($image = get_sub_field('background_image')) { ?>
    <img src="<?php echo $image['url']; ?>" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center">
  <?php } ?>

  <div class="absolute top-1/2 transform -translate-y-1/2 z-2">
    <div class="mx-auto max-w-7xl px-6 py-32 sm:py-40 lg:px-16">
      <h1 class="max-w-<?php echo get_sub_field('content_width'); ?> text-6xl font-medium tracking-tight text-white sm:text-7xl lg:col-span-2 xl:col-auto" style="text-shadow: 2px 2px rgba(0, 0, 0, 0.2);"><?php echo get_sub_field('title'); ?></h1>

      <div class="mt-6 max-w-xl lg:mt-0 xl:col-end-1 xl:row-start-1">
        <div class="mt-10 flex items-center gap-x-6">
          <?php if ($text = get_sub_field('button_text')) { ?>
            <a href="<?php echo get_sub_field('button_link'); ?>" class="button slide arrow"><?php echo $text; ?></a>
          <?php } ?>

          <?php if ($link = get_sub_field('showreel_link')) { ?>
            <a href="<?php echo $link; ?>" target="_blank" class="button play-button">&#9658;</a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
