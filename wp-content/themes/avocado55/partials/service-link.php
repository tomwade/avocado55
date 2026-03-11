<?php
/**
 * Service Link Partial (compact for dropdowns)
 *
 * Displays a small service card: icon + title + arrow link.
 *
 * Expected $args:
 * - service_id: The service post ID
 */

$service_id = $args['service_id'] ?? 0;
if ( ! $service_id ) {
  return;
}

$service_title = get_the_title( $service_id );
$icon = get_field( 'icon', $service_id );
$url = get_permalink( $service_id );
?>

<a href="<?php echo esc_url( $url ); ?>" class="flex items-center gap-4 bg-brand-light rounded-2xl p-4 hover:bg-brand-light/90 transition-colors group">
  <?php if ( $icon && ! empty( $icon['url'] ) ) : ?>
    <div class="w-12 h-12 bg-brand-green rounded-xl flex items-center justify-center shrink-0">
      <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="" class="w-6 h-6 object-contain" aria-hidden="true" />
    </div>
  <?php else : ?>
    <div class="w-12 h-12 bg-brand-green rounded-xl flex items-center justify-center shrink-0">
      <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
      </svg>
    </div>
  <?php endif; ?>
  <span class="text-base font-semibold text-brand-green flex-grow"><?php echo esc_html( $service_title ); ?></span>
  <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-brand-cta text-white transition-transform group-hover:translate-x-0.5 shrink-0">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
    </svg>
  </span>
</a>
