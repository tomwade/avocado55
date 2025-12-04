<?php
$quote = get_sub_field('quote'); // Quote text
$attribution = get_sub_field('attribution'); // Attribution text
?>

<?php if ($quote): ?>
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
    <div class="max-w-4xl mx-auto text-center">
      
      <blockquote class="text-2xl sm:text-3xl lg:text-4xl font-medium text-gray-900 leading-tight mb-6">
        "<?php echo esc_html($quote); ?>"
      </blockquote>

      <?php if ($attribution): ?>
        <div class="text-gray-500 text-lg">
          <?php echo esc_html($attribution); ?>
        </div>
      <?php endif; ?>

    </div>
  </div>
<?php endif; ?>

