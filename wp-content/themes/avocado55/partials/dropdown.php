<div class="relative inline-block text-left mx-3 -mt-12 mb-12 dropdown dropdown-closed">
  <div>
    <button type="button" class="border-0 inline-flex w-full justify-between items-center text-lg rounded-lg bg-gray-100 px-6 py-5 min-w-[300px] text-sm font-semibold text-gray-900 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
      <?php echo $args['label']; ?>
      <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
      </svg>
    </button>
  </div>

  <div class="dropdown-options overflow-hidden absolute right-0 z-10 mt-2 min-w-[300px] origin-top-left rounded-md bg-gray-100 border-0" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
    <?php foreach ($args['items'] as $label => $url) { ?>
      <a href="<?php echo $url; ?>" class="text-gray-700 hover:bg-gray-200 block px-6 py-4 text-md font-medium" role="menuitem" tabindex="-1" id="menu-item-0"><?php echo $label; ?></a>
    <?php } ?>
  </div>
</div>
