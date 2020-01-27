<?php
/**
 * Single Event Meta (Organizer) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/organizer.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 */

$organizer_ids = tribe_get_organizer_ids();
$multiple = count( $organizer_ids ) > 1;

$phone = tribe_get_organizer_phone();
$email = tribe_get_organizer_email();
$website = tribe_get_organizer_website_link();
?>

<?php if ( tribe_get_organizer() ) : ?>
	<div class="tribe-events-organizer">
		<div>
			<?php
			do_action( 'tribe_events_single_meta_organizer_section_start' );

			foreach ( $organizer_ids as $organizer ) {
				if ( ! $organizer ) {
					continue;
				}

				?>
				<?php
			}

			if ( ! $multiple ) { // only show organizer details if there is one ?>

				<?php
				if ( ! empty( tribe_get_organizer( $organizer ) ) ) { ?>

					<div class="label"><?php echo tribe_get_organizer( $organizer ) ?></div>

				<?php
				}//end if ?>

				<?php
				if ( ! empty( $phone ) ) {
					?>
					<div class="tribe-organizer-tel">
						<a href="tel:<?php echo esc_html( $phone ); ?>"><?php echo esc_html( $phone ); ?></a>
					</div>
					<?php
				}//end if

				if ( ! empty( $email ) ) {
					?>
					<div class="tribe-organizer-email">
						<a href="mailto:<?php echo esc_html( $email ); ?>"><?php echo esc_html( $email ); ?></a>
					</div>
					<?php
				}//end if

				if ( ! empty( $website ) ) {
					?>
					<div class="tribe-organizer-url">
						<?php echo $website; ?>
					</div>
					<?php
				}//end if
			}//end if

			do_action( 'tribe_events_single_meta_organizer_section_end' );
			?>
		</div>
	</div>
<?php endif; ?>
