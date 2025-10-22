<div class="overflow-hidden <?php echo (get_sub_field('style') == 'light') ? 'my-20 bg-white text-neutral-800' : 'py-20 bg-dark-100 text-white'; ?>">
  <div class="container max-w-screen-<?php echo get_sub_field('content_width'); ?> mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 sm:grid-cols-<?php echo get_sub_field('number_of_columns'); ?> gap-8">
      <?php foreach (get_sub_field('columns') as $column) { ?>
        <div class="space-y-6 leading-loose text-neutral-500 text-xl post-content">
          <?php echo $column['content']; ?>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
