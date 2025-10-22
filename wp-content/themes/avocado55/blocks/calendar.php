<?php
// Define our months and get our events
$months = ['', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
$base_events = get_sub_field('events');

// See if we have specified a tag
$filter_tag = $_GET['tag'];

// Validate that the filter tag is legit
$filter_tag_object = false;
if ($filter_tag) {
  $filter_tag_object = get_term($filter_tag, 'post_tag');
  if (!$filter_tag_object) {
    $filter_tag = false;
  }
}

// Capture a list of tags
$tags = [];

// Split the events into chronological months
$events = [];
foreach ($base_events as $event) {
  // Ensure we have a valid date format
  $split_date = @explode('/', $event['date']);
  if (count($split_date) != 3) {
    continue;
  }

  // Check for tags to list
  $event_tags = (array) $event['event_tags'];
  if ($event_tags && $event_tags[0] != 0) {
    $tags = array_merge($event_tags, $tags);
  }

  // If we have a tag filter, then we need to make sure this event is valid
  if ($filter_tag && !in_array($filter_tag, $event_tags)) {
    continue;
  }

  // Add our event to the month
  $events[ltrim($split_date[1], '0')][] = $event;
}

// Order our events by the first array key (month)
ksort($events, SORT_NUMERIC);

// Ensure we remove duplicate tags
$tags = array_unique($tags);
?>

<?php if ($events) { ?>

  <div class="my-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

      <div class="flex justify-center">
        <div class="relative inline-block text-left mx-3 mb-12 dropdown dropdown-closed">
          <div>
            <button type="button" class="border-0 inline-flex w-full justify-between items-center text-lg rounded-lg bg-gray-100 px-6 py-5 min-w-[300px] text-sm font-semibold text-gray-900 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
              Jump to Month
              <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"></path>
              </svg>
            </button>
          </div>

          <div class="dropdown-options overflow-hidden absolute right-0 z-30 mt-2 min-w-[300px] origin-top-left rounded-md bg-gray-100 border-0" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
            <?php foreach ($events as $month => $month_events) { ?>
              <a href="#<?php echo strtolower($months[$month]); ?>" class="text-gray-700 hover:bg-gray-200 block px-6 py-4 text-md font-medium" role="menuitem" tabindex="-1" id="menu-item-0"><?php echo $months[$month]; ?></a>
            <?php } ?>
          </div>
        </div>

        <?php if ($tags) { ?>
        <div class="relative inline-block text-left mx-3 mb-12 dropdown dropdown-closed">
          <div>
            <button type="button" class="border-0 inline-flex w-full justify-between items-center text-lg rounded-lg bg-gray-100 px-6 py-5 min-w-[300px] text-sm font-semibold text-gray-900 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
              <?php echo ($filter_tag) ? ucwords($filter_tag_object->name) . ' Events' : 'Event Tags'; ?>
              <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"></path>
              </svg>
            </button>
          </div>

          <div class="dropdown-options overflow-hidden absolute right-0 z-30 mt-2 min-w-[300px] origin-top-left rounded-md bg-gray-100 border-0" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
            <a href="<?php echo get_the_permalink(); ?>" class="text-gray-700 hover:bg-gray-200 block px-6 py-4 text-md font-medium" role="menuitem" tabindex="-1" id="menu-item-<?php echo $i; ?>">All Events</a>
            <?php foreach ($tags as $i => $tag_id) { ?>
              <?php $tag_object = get_term($tag_id, 'post_tag'); ?>
              <a href="<?php echo add_query_arg(['tag' => $tag_id], get_the_permalink()); ?>" class="text-gray-700 hover:bg-gray-200 block px-6 py-4 text-md font-medium" role="menuitem" tabindex="-1" id="menu-item-<?php echo $i; ?>"><?php echo ucwords($tag_object->name); ?></a>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php } ?>

      <?php foreach ($events as $month => $month_events) { ?>
        <a name="<?php echo strtolower($months[$month]); ?>"></a>
        <h3 class="text-4xl font-medium tracking-tight" style="margin-bottom: 3rem"><?php echo $months[$month]; ?></h3>

        <ul role="list" class="columns-1 sm:columns-2 md:columns-3 gap-16 xl:gap-20">
          <?php foreach ($month_events as $event) { ?>
            <li class="group relative mb-12 break-inside-avoid">
              <?php if ($event['website']) { ?>
                <a href="<?php echo $event['website']; ?>" class="absolute inset-0 z-2"></a>
              <?php } ?>

              <div class="relative w-full overflow-hidden rounded-xl" style="aspect-ratio: 4/3;">
                <?php if ($event['website']) { ?>
                  <a href="<?php echo $event['website']; ?>" target="_blank" class="play absolute inset-0 hidden group-hover:block"></a>
                <?php } ?>

                <?php $acf_image = $event['image']['sizes']['post-thumbnail']; ?>
                <?php if ($acf_image) { ?>
                  <img src="<?php echo $acf_image; ?>" alt="<?php echo esc_attr($event['title']); ?>" class="calendar__image">
                <?php } else if ($event['website']) { ?>
                    <?php set_transient(md5($event['website']), ''); ?>
                  <?php if (get_transient(md5($event['website']))) { ?>
                    <img src="<?php echo $image; ?>" alt="<?php echo esc_attr($event['title']); ?>" class="calendar__image">
                  <?php } else if ($event['website']) { ?>
                    <?php preg_match('~<\s*meta\s+property="og:image"\s+content="([^"]*)~i', file_get_contents($event['website']), $matches); ?>
                    <?php $social_image = ($matches) ? $matches[1] : ''; ?>
                    <?php if ($social_image) { ?>
                      <img src="<?php echo $social_image; ?>" alt="<?php echo esc_attr($event['title']); ?>" class="calendar__image">
                    <?php } ?>

                    <?php set_transient(md5($event['website']), $social_image); ?>
                  <?php } ?>
                <?php } ?>
              </div>

              <hgroup class="text-center">
                <h4 class="mt-5 block truncate text-sm font-semibold text-gray-400 uppercase leading-tight tracking-subtitle">
                  <?php
                  echo $event['location'];

                  if ($event['is_date_tbd']) {
                    echo ($event['location']) ? '<br />Date TBD' : 'Date TBD';
                  } else {
                    echo ($event['location'] && $event['date']) ? '<br />' : '';
                    echo $event['date'];
                    echo ($end_date = $event['end_date']) ? ' - ' . $end_date : '';
                  }
                  ?>
                </h4>
                <h3 class="mt-2 block truncate text-2xl font-medium text-gray-900"><?php echo $event['title']; ?></h3>
              </hgroup>
            </li>
          <?php } ?>
        </ul>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      <?php } ?>
    </div>
  </div>

  <style>html{scroll-behavior:smooth} .calendar__image { transform: translate(-50%, -50%); left: 50%; top: 50%; position: absolute; max-width: 100%; width: auto !important; }</style>

<?php } ?>
