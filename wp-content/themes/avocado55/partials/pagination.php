<nav class="flex items-center justify-between border-t border-gray-200 px-4 sm:px-0 mb-8 sm:mb-4 mt-20">
  <div class="-mt-px flex w-0 flex-1">
    <?php if($args['paged'] > 1) { ?>
      <a href="<?php echo get_pagenum_link($args['paged'] - 1); ?>" class="inline-flex items-center border-t-2 border-transparent pt-4 pr-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
        <!-- Heroicon name: mini/arrow-long-left -->
        <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M18 10a.75.75 0 01-.75.75H4.66l2.1 1.95a.75.75 0 11-1.02 1.1l-3.5-3.25a.75.75 0 010-1.1l3.5-3.25a.75.75 0 111.02 1.1l-2.1 1.95h12.59A.75.75 0 0118 10z" clip-rule="evenodd" />
        </svg>
        Previous
      </a>
    <?php } ?>
  </div>
  <div class="hidden md:-mt-px md:flex">
    <?php for ($i = 1; $i <= $args['pages']; ++$i) { ?>
      <?php if( $args['paged'] == $i || (!$args['paged'] && $i == 1) ) { ?>
        <a href="<?php echo get_pagenum_link($i); ?>" class="inline-flex items-center border-t-2 border-red px-4 pt-4 text-sm font-medium text-red" aria-current="page"><?php echo $i; ?></a>
      <?php } else { ?>
        <a href="<?php echo get_pagenum_link($i); ?>" class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"><?php echo $i; ?></a>
      <?php } ?>
    <?php } ?>
    <!-- <span class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500">...</span> -->
  </div>
  <div class="-mt-px flex w-0 flex-1 justify-end">
    <?php if ($args['paged'] < $args['pages']) { ?>
      <a href="<?php echo get_pagenum_link($args['paged'] + 1); ?>" class="inline-flex items-center border-t-2 border-transparent pt-4 pl-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
        Next
        <!-- Heroicon name: mini/arrow-long-right -->
        <svg class="ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd" />
        </svg>
      </a>
    <?php } ?>
  </div>
</nav>
