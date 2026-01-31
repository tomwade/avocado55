<div class="relative overflow-hidden bg-[#416257]">
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

  <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:px-16">
    <div class="max-w-2xl text-white space-y-6">
      <h1 class=" text-6xl" ><?php echo get_sub_field('title'); ?></h1>
      <p><?php echo get_sub_field('text'); ?></p>

      <?php if ($link = get_sub_field('link')) { ?>
        <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="button button--brand-cta"><?php echo $link['title']; ?></a>
      <?php } ?>
    </div>
  </div>
</div>
