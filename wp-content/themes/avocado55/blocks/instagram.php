<?php if ($images = get_sub_field('images')) { ?>
  <div class="bg-white my-20 overflow-hidden">
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-0">
      <?php foreach ($images as $i => $image) { ?>
        <img src="<?php echo $image['sizes']['instagram']; ?>" class="w-auto">
      <?php } ?>
    </div>
  </div>
<?php } ?>
