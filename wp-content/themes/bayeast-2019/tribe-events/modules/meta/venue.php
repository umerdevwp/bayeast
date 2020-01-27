<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

$phone = tribe_get_phone();
$website = tribe_get_venue_website_link();

?>

<?php if ( tribe_get_venue() ) : ?>
	<div class="tribe-events-venue">

			<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>

			<div class="label"> <?php echo strip_tags(tribe_get_venue() )?></div>

			<?php if ( tribe_address_exists() ) : ?>
				<address class="tribe-events-address">
					<?php echo tribe_get_full_address(); ?>

					<?php if ( tribe_show_google_map_link() ) : ?>
						<?php echo tribe_get_map_link_html(); ?>
					<?php endif; ?>
				</address>
			<?php endif; ?>

			<?php if ( ! empty( $phone ) ): ?>
				<a href="tel:<?php echo $phone ?> " class="tribe-venue-tel"> <?php echo $phone ?> </a>
			<?php endif ?>

			<?php if ( ! empty( $website ) ): ?>
				<div class="tribe-venue-url"> <?php echo $website ?> </div>
			<?php endif ?>

			<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>

	</div>
<?php endif; ?>
