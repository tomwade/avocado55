<?php
$style = 'my-20 bg-white';
if (get_sub_field('style') == 'offwhite') {
  $style = 'py-20 bg-offwhite';
} else if (get_sub_field('style') == 'dark') {
  $style = 'py-20 bg-dark-100';
}
?>
<div class="<?php echo $style; ?> overflow-hidden">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <?php if ($title = get_sub_field('title')) { ?>
      <h2 class="mb-12 font-medium text-4xl highlight-red leading-tight"><?php echo $title; ?></h2>
    <?php } ?>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">
      <?php foreach (get_sub_field('pages') as $page) { ?>
        <?php $image = ($page['image']) ? $page['image']['url'] : get_the_post_thumbnail_url($page['page']->ID); ?>
        <div class="flex h-96 bg-center bg-cover group relative rounded-2xl overflow-hidden p-10" style="background-image: url('<?php echo $image; ?>')">
          <a href="<?php echo get_the_permalink($page['page']->ID); ?>" class="absolute inset-0" style="background: linear-gradient(180deg, #030303 0%, rgba(36, 36, 36, 0) 100%); transform: rotate(180deg);"></a>
          <h4 class="w-full self-end font-semibold text-xl text-white relative z-10">
            <?php echo ($page['title']) ? $page['title'] : get_the_title($page['page']->ID); ?>
            <span class="opacity-0 group-hover:opacity-100 absolute right-0 top-2 transition-opacity duration-500">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.5685e-05 10.6316L4.57764e-05 8.79956L18.3203 8.79956L18.3203 10.6316L4.5685e-05 10.6316Z" fill="#C2C2C2"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.32284 18.1361L18.0386 8.42041L19.334 9.71582L9.61825 19.4316L8.32284 18.1361Z" fill="#C2C2C2"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.32284 1.29541L9.61825 -3.72252e-07L19.334 9.71573L18.0386 11.0111L8.32284 1.29541Z" fill="#C2C2C2"/>
              </svg>
            </span>
          </h4>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
