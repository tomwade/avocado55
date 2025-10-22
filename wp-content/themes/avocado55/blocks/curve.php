<?php
$unique_id = uniqid();

$bottom = get_sub_field('bottom_colour');
$rgba = 'rgba(' . $bottom["red"] . ',' . $bottom["green"] . ',' . $bottom["blue"] . ',' . $bottom["alpha"] . ')';

$padding = (get_sub_field('overwrite_padding') != '') ? get_sub_field('overwrite_padding') : false;

$margin = [0, 0, -6.25, 0];
if (get_sub_field('overwrite_margin')) {
  $margin = explode(',', get_sub_field('overwrite_margin'));
}
?>

<style>
#curve-<?php echo $unique_id; ?> {
  margin: <?php echo implode('rem ', $margin); ?>rem;
  <?php if (get_sub_field('direction') == 'up') { ?>
    border-bottom: solid 6.25rem <?php echo $rgba; ?>;
    transform: rotate(180deg);
  <?php } ?>
}

#curve-<?php echo $unique_id; ?> path {
  <?php if ($bottom['alpha']) { ?>
    fill: <?php echo $rgba; ?>;
  <?php } ?>
}

#curve-<?php echo $unique_id; ?> + * {
  <?php if ($padding !== false) { ?>
    padding-top: <?php echo $padding; ?>rem;
  <?php } else { ?>
    padding-top: calc(5rem + 100px);
  <?php } ?>
}
</style>

<?php if (get_sub_field('direction') == 'up') { ?>
  <div id="curve-<?php echo $unique_id; ?>" class="curve">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z"></path>
    </svg>
  </div>
<?php } else { ?>
  <div id="curve-<?php echo $unique_id; ?>" class="curve">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path d="M0,0V7.23C0,65.52,268.63,112.77,600,112.77S1200,65.52,1200,7.23V0Z"></path>
    </svg>
  </div>
<?php } ?>
