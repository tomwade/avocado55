<?php if($items = get_sub_field('items')) { ?>
  <div class="bg-white my-20 overflow-hidden leading-loose text-neutral-500 text-xl">
    <div class="container max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8">
      <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12">
        <?php foreach ($items as $item) { ?>
          <li>
            <strong class="text-red text-5xl block mb-3"><?php echo $item['stat']; ?></strong>
            <?php echo $item['label']; ?>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
<?php } ?>
