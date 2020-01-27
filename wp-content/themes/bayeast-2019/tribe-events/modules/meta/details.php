<?php
/**
 * Single Event Meta (Details) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 */


$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

$start_datetime = tribe_get_start_date();
$start_date = tribe_get_start_date( null, false );
$start_time = tribe_get_start_date( null, false, $time_format );
$start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$end_datetime = tribe_get_end_date();
$end_date = tribe_get_display_end_date( null, false );
$end_time = tribe_get_end_date( null, false, $time_format );
$end_ts = tribe_get_end_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$time_formatted = null;
if ( $start_time == $end_time ) {
	$time_formatted = esc_html( $start_time );
} else {
	$time_formatted = esc_html( $start_time . $time_range_separator . $end_time );
}

$event_id = Tribe__Main::post_id_helper();

/**
 * Returns a formatted time for a single event
 *
 * @var string Formatted time string
 * @var int Event post id
 */
$time_formatted = apply_filters( 'tribe_events_single_event_time_formatted', $time_formatted, $event_id );

/**
 * Returns the title of the "Time" section of event details
 *
 * @var string Time title
 * @var int Event post id
 */
$time_title = apply_filters( 'tribe_events_single_event_time_title', __( 'Time:', 'the-events-calendar' ), $event_id );


$website = tribe_get_event_website_link();
?>


		<?php
		do_action( 'tribe_events_single_meta_details_section_start' );

		// All day (multiday) events
		if ( tribe_event_is_all_day() && tribe_event_is_multiday() ) :
			?>
			<div class="tribe-events-date" title="<?php esc_attr_e( $start_ts ) ?>">
				<div class="label"><?php esc_attr_e( $start_date ) ?> to <?php esc_attr_e( $end_date ) ?></div>
				<div class="tribe-events-time" title="<?php esc_attr_e( $start_time ) ?>">
					<?php echo $start_time; ?>
				</div>
			</div>

		<?php
		// All day (single day) events
		elseif ( tribe_event_is_all_day() ):
			?>

			<div class="tribe-events-date" title="<?php esc_attr_e( $start_ts ) ?>">
				<div class="label"><?php esc_html_e( $start_date ) ?></div>
			</div>

		<?php
		// Multiday events
		elseif ( tribe_event_is_multiday() ) :
			?>

			<div class="tribe-events-date" title="<?php esc_attr_e( $start_ts ) ?>">
				<div class="label">
					<?php esc_html_e( $start_date ) ?> to <?php esc_attr_e( $end_date ) ?>
				</div>
				<div class="tribe-events-time" title="<?php esc_attr_e( $start_ts ) ?>">
					<?php echo $time_formatted; ?>
				</div>
			</div>


		<?php
		// Single day events
		else :
			?>
			<div class="tribe-events-date" title="<?php esc_attr_e( $start_ts ) ?>">
				<div class="label"><?php esc_html_e( $start_date ) ?> </div>
				<div class="tribe-events-time" title="<?php esc_attr_e( $start_ts ) ?>">
					<?php echo $time_formatted; ?>
				</div>
			</div>
		<?php endif ?>


		<?php
		// Event Website
		if ( ! empty( $website ) ) : ?>
			<div class="tribe-events-website">
				<div class="label">Event Website</div>
				<div class="tribe-events-event-url"> <?php echo $website; ?> </div>
			</div>
		<?php endif ?>

		<?php do_action( 'tribe_events_single_meta_details_section_end' ) ?>
