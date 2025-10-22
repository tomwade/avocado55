<?php
$bg       = (get_sub_field('style') == 'light') ? 'bg-white' : 'bg-dark-100';
$text     = (get_sub_field('style') == 'light') ? 'text-dark' : 'text-white';
$off_text = (get_sub_field('style') == 'light') ? 'text-offwhite' : 'text-black/80';
?>

<div class="bg-icons bg-icons-4 bg-icons-5 <?php echo $bg; ?> <?php echo $text; ?> relative pt-14">
  <div class="mx-auto max-w-7xl px-6 pt-32 sm:pt-40 lg:px-16 <?php if (get_sub_field('show_callout')) { ?>pb-0 mb-12<?php } else { ?>pb-32<?php } ?>">
    <?php if ($label = get_sub_field('label')) { ?>
      <h2 class="mt-12 mb-4 text-sm <?php echo $off_text; ?> font-semibold uppercase leading-tight tracking-subtitle"><?php echo $label; ?></h2>
    <?php } ?>

    <h2 class="highlight-red max-w-4xl text-5xl font-medium tracking-tight <?php echo $text; ?> sm:text-7xl lg:col-span-2 xl:col-auto"><?php echo get_sub_field('title'); ?></h2>

    <div class="flex gap-24 my-24">
      <div class="flex-1">&nbsp;</div>
      <div class="flex-1 space-y-6 leading-loose ' . $off_text . '">
        <?php echo get_sub_field('intro_text'); ?>
      </div>
    </div>

    <?php if (get_sub_field('show_callout')) { ?>
      <div class="flex gap-24">
        <div class="flex-1 text-center -mb-16 relative z-10">
          <?php if ($image = get_sub_field('callout_image')) { ?>
            <img src="<?php echo $image['url']; ?>" alt="" class="w-full rounded-2xl object-cover">
          <?php } ?>
        </div>
        <div class="flex-1 space-y-6">
          <?php
          function str_replace_first($search, $replace, $subject) {
            return preg_replace('/' . preg_quote($search, '/') . '/', $replace, $subject, 1);
          }

          // Replaces the first <p> to be a styled h3
          $content = get_sub_field('callout_text');
          $content = str_replace_first('<p>', '<h3 class="highlight-red max-w-4xl text-5xl leading-tight tracking-tight ' . $text . ' lg:col-span-2 xl:col-auto">', $content);
          $content = str_replace_first('</p>', '</h3>', $content);
          $content = str_replace('<p>', '<p class="leading-loose ' . $off_text . '">', $content);

          echo $content;
          ?>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
