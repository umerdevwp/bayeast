<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// Venue microformats
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>


<div class="tribe-event-details-wrapper">

	<!-- Event Title -->
	<?php do_action( 'tribe_events_before_the_event_title' ) ?>
	<h2 class="tribe-events-list-event-title entry-title summary">
		<a class="url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
			<?php the_title() ?>
		</a>
	</h2>

	<?php do_action( 'tribe_events_after_the_event_title' ) ?>

	<!-- Event Meta -->
	<?php do_action( 'tribe_events_before_the_meta' ) ?>
	<div class="tribe-events-event-meta">
		<!-- Event Categories -->
		<?php
			echo substr(tribe_get_event_categories(
				get_the_id(), array(
					'before'       => '',
					'sep'          => ', ',
					'after'        => '',
					'label'        => '', // An appropriate plural/singular label will be provided
					'label_before' => '',
					'label_after'  => '',
					'wrap_before'  => '<div class="tribe-events-event-categories">',
					'wrap_after'   => '</div>'
				)
			), 1);
		?>
		<div class="venue">
			<?php   // Get terms for post
			 $terms = get_the_terms( $post->ID , 'event-office' );
			 // Loop over each item since it's an array
			 if ( $terms != null ){
				 foreach( $terms as $term ) {
					 // Print the name method from $term which is an OBJECT
					 print $term->name ;
					 // Get rid of the other data stored in the object, since it's not needed
					 unset($term);
				 }
			 } ?>
			<?php if ( $venue_details ) : ?>
				<div class="tribe-events-venue-details">
					<?php echo tribe_get_venue(); ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="updated published time-details">
			<?php echo tribe_events_event_schedule_details() ?>
		</div>

	</div>
	<?php do_action( 'tribe_events_after_the_meta' ) ?>

	<!-- Event Content -->
	<?php do_action( 'tribe_events_before_the_content' ); ?>
	<div class="tribe-events-list-event-description tribe-events-content description entry-summary">
		<?php echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ); ?>
		<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more" rel="bookmark"><?php esc_html_e( 'Find out more', 'the-events-calendar' ) ?> &raquo;</a>
	</div><!-- .tribe-events-list-event-description -->
	<?php
	do_action( 'tribe_events_after_the_content' );
