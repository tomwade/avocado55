<?php
$label = $args['label'] ?? 'Category';
$items = $args['items'] ?? [];
$current_category = get_queried_object();
$current_value = 'All';
$is_category_page = false;

if ($current_category && isset($current_category->taxonomy) && $current_category->taxonomy === 'category') {
  $current_value = $current_category->name;
  $is_category_page = true;
}
?>

<div class="relative inline-block">
  <label for="category-select" class="sr-only"><?php echo esc_html($label); ?></label>
  <select 
    id="category-select" 
    class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent cursor-pointer"
    onchange="if (this.value) window.location.href = this.value;"
  >
    <?php foreach ($items as $name => $url): ?>
      <option value="<?php echo esc_url($url); ?>" <?php selected($current_value, $name); ?>>
        <?php echo esc_html($name); ?>
      </option>
    <?php endforeach; ?>
  </select>
  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
    </svg>
  </div>
</div>

