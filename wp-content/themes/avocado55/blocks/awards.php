<?php
$bg   = (get_sub_field('style') == 'white') ? '#fff' : '#ff1f2e';
$text = (get_sub_field('style') == 'white') ? 'text-white' : 'text-red';
?>

<div class="py-20 bg-icons bg-icons-5" style="background-color: <?php echo $bg; ?>">
  <div class="my-12 text-center container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
      <h3 class="<?php echo $text; ?> mb-12 text-3xl font-semibold leading-tight"><?php echo get_sub_field('title'); ?></h3>
      <?php if ($subtitle = get_sub_field('subtitle')) { ?>
        <p class="<?php echo $text; ?> mb-12 text-xl leading-loose"><?php echo $subtitle; ?></p>
      <?php } ?>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 gap-12">
      <?php foreach (get_sub_field('awards') as $award) { ?>
        <img src="<?php echo $award['url']; ?>" />
      <?php } ?>
    </div>
  </div>
</div>
