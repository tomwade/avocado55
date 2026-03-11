<?php
/**
 * Booking Card Partial
 *
 * Displays a stylised card with avatar, name, role, and a booking (e.g. Calendly) link.
 * Used on the contact page experts carousel and when Calendly links appear in content.
 *
 * Expected $args:
 * - name (string): Display name
 * - role (string): Job title / role
 * - avatar_url (string|null): Image URL for avatar
 * - booking_url (string): URL for the booking link (required)
 * - booking_label (string): Button text, default "Book"
 */

$name = $args['name'] ?? '';
$role = $args['role'] ?? '';
$avatar_url = $args['avatar_url'] ?? null;
$booking_url = $args['booking_url'] ?? '';
$booking_label = $args['booking_label'] ?? 'Book';

if ( empty( $booking_url ) ) {
  return;
}
?>

<div class="avocado55-booking-card-inner flex items-center gap-4 bg-white rounded-xl p-4 shadow-sm text-base leading-normal [&_h3]:!text-base [&_h3]:!my-0 [&_h3]:!font-semibold [&_h3]:!text-black [&_p]:!text-sm [&_p]:!my-0 [&_a]:!text-white [&_a]:no-underline [&_a:hover]:!text-white">
  <?php if ( $avatar_url ) : ?>
    <img src="<?php echo esc_url( $avatar_url ); ?>" alt="<?php echo esc_attr( $name ); ?>" class="w-14 h-14 rounded-full object-cover flex-shrink-0" />
  <?php else : ?>
    <div class="w-14 h-14 rounded-full bg-gray-200 flex items-center justify-center flex-shrink-0">
      <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
      </svg>
    </div>
  <?php endif; ?>

  <div class="flex-grow min-w-0 flex flex-col gap-0.5">
    <?php if ( $name ) : ?>
      <h3 class="text-base font-semibold text-black truncate m-0"><?php echo esc_html( $name ); ?></h3>
    <?php endif; ?>
    <?php if ( $role ) : ?>
      <p class="text-sm text-gray-600 truncate m-0"><?php echo esc_html( $role ); ?></p>
    <?php endif; ?>
  </div>

  <a href="<?php echo esc_url( $booking_url ); ?>" target="_blank" rel="noopener" class="flex-shrink-0 inline-flex items-center justify-center px-4 py-2 text-sm font-medium rounded bg-brand-green text-white no-underline hover:bg-brand-cta hover:text-white transition-colors">
    <?php echo esc_html( $booking_label ); ?>
  </a>
</div>
