<?php if ($video = get_sub_field('video_url')) { ?>

  <?php $vimeo_settings = get_sub_field('vimeo_settings'); ?>

  <?php if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $video, $regs)) { ?>
    <?php if (!in_array('controls', $vimeo_settings)) { ?>
      <div class="h-screen w-full overflow-hidden relative">
        <div class="vimeo-wrapper">
          <iframe title="vimeo-player" src="//player.vimeo.com/video/<?php echo $regs[3]; ?>?portrait=0&amp;color=FF1F2E&amp;autoplay=<?php echo (int) in_array('autoplay', $vimeo_settings); ?>&amp;loop=<?php echo (int) in_array('loop', $vimeo_settings); ?>&amp;title=0&amp;byline=0&amp;background=1&amp;muted=<?php echo (int) in_array('muted', $vimeo_settings); ?>" allow="autoplay; fullscreen" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" class="absolute inset-0 -z-10 w-auto min-w-full min-h-full max-w-none object-cover object-right md:object-center"></iframe>
        </div>
      </div>
    <?php } else { ?>
      <div style="position: relative; padding-bottom: 56.25%; overflow: hidden; max-width: 100%;">
        <iframe title="vimeo-player" src="//player.vimeo.com/video/<?php echo $regs[3]; ?>?portrait=0&amp;color=FF1F2E&amp;autoplay=<?php echo (int) in_array('autoplay', $vimeo_settings); ?>&amp;loop=<?php echo (int) in_array('loop', $vimeo_settings); ?>&amp;title=0&amp;byline=0&amp;background=0&amp;muted=<?php echo (int) in_array('muted', $vimeo_settings); ?>" allow="autoplay; fullscreen" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" class="absolute inset-0 w-auto min-w-full min-h-full max-w-none object-cover object-right md:object-center"></iframe>
      </div>
    <?php } ?>
  <?php } ?>

  <?php if (preg_match('%^https:\/\/www.youtube.com\/watch\?v=(.*)$%im', $video, $regs)) { ?>
    <div style="position: relative; padding-bottom: 56.25%; overflow: hidden; max-width: 100%;">
      <iframe src="https://www.youtube.com/embed/<?php echo $regs[1]; ?>?controls=<?php echo (int) in_array('controls', $vimeo_settings); ?>&amp;autoplay=<?php echo (int) in_array('autoplay', $vimeo_settings); ?>&amp;loop=<?php echo (int) in_array('loop', $vimeo_settings); ?>&amp;muted=<?php echo (int) in_array('muted', $vimeo_settings); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; fullscreen; gyroscope; picture-in-picture; web-share" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" class="absolute inset-0 w-auto min-w-full min-h-full max-w-none object-cover object-right md:object-center"></iframe>
    </div>
  <?php } ?>

<?php } ?>
