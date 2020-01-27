<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single">
	<div class="tribe-events-main-content">

		<p class="tribe-events-back">
			<a href="<?php echo esc_url( tribe_get_events_link() ); ?>" class="back-to">Back to All Events</a>
		</p>

		<!-- Notices -->
		<?php tribe_the_notices() ?>

		<?php the_title( '<h1 class="tribe-events-single-event-title">', '</h1>' ); ?>

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

		<?php while ( have_posts() ) :  the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- Event featured image, but exclude link -->
				<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>

				<div class="tribe-events-single-event-description tribe-events-content">
					<!-- Event content -->
					<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
					<?php the_content(); ?>
					<!-- .tribe-events-single-event-description -->
					<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
				</div>
			</div> <!-- #post-x -->
			<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
		<?php endwhile; ?>

		<!-- Event footer -->
		<div id="tribe-events-footer">

		</div>
		<!-- #tribe-events-footer -->
	</div>

	<!-- Event meta -->
	<div class="tribe-events-sidebar">
		<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
		<?php tribe_get_template_part( 'modules/meta' ); ?>
		<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
	</div>

</div><!-- #tribe-events-content -->
