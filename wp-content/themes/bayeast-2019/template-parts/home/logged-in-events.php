<?php
/**
 * Template part for logged in events panel
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 *
 */
?>

<section class="logged-in-events container">


	<?php

		// check if the repeater field has rows of data
		if( have_rows('featured_events') ):

		 	// loop through the rows of data
		    while ( have_rows('featured_events') ) : the_row(); ?>

				<?php
				$term = get_sub_field('select_event_category');

				$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
				$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

				$start_date = tribe_get_start_date( null, false );
				$start_time = tribe_get_start_date( null, false, $time_format );

				$end_date = tribe_get_display_end_date( null, false );
				$end_time = tribe_get_end_date( null, false, $time_format );

				$time_formatted = null;
				if ( $start_time == $end_time ) {
					$time_formatted = esc_html( $start_time );
				} else {
					$time_formatted = esc_html( $start_time . $time_range_separator . $end_time );
				} ?>

				<div class="featured-event-cat event-category-<?php echo $term->slug ?>">
					<div class="event_cat-content">
					<?php if( $term ): ?>
						<h3><?php echo $term->name; ?></h3>
					<?php endif;


						$the_query = new WP_Query( array(
						    'post_type' => 'tribe_events',
								'posts_per_page' => 3,
								'tax_query' => array(
									'0' => array(
										'taxonomy' => 'tribe_events_cat',
										'field' => 'slug',
										'terms' => 'featured',
									),
									'1' => array(
										'taxonomy' => 'tribe_events_cat',
										'field' => 'slug',
										'terms' => $term,
									),

									'relation' => 'IN',
								),

						) ); ?>

						<ul>
							<?php while ( $the_query->have_posts() ) :
								$the_query->the_post();
								$do_not_duplicate[] = $post->ID; ?>

								 	<li>
									   <h4><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
										 <?php if ($term->slug == 'other') : ?>

											 <div class="event-meta">
												 <span class="event-date"><?php echo tribe_get_start_date( null, false, 'F j' );?></span>
												 <?php if ( tribe_get_start_time() ) : ?>
												 	 <span class="event-start-time"><?php echo tribe_get_start_time();?></span>
											 	 <?php endif; ?>
												 <?php if ( tribe_get_end_time() ) : ?>
													  <span class="event-end-time">- <?php echo tribe_get_end_time();?></span>
												 <?php endif; ?>
												 <?php if ( tribe_get_venue() ) : ?>
													  <span class="event-venue"><?php echo tribe_get_venue(); ?></span>
												 <?php endif; ?>
											 </div>

											 <span class="event-excerpt"><p><?php echo mb_strimwidth(get_the_excerpt(), 0, 60, "..."); ?> <a href="<?php the_permalink(); ?>">Read More »</a></p></span>

										 <?php else : ?>
										 	 <div class="event-meta">
												 <span class="event-date"><?php echo tribe_get_start_date( null, false, 'F j' );?></span>
												 <?php if ( tribe_get_start_time() ) : ?>
												 	 <span class="event-start-time"><?php echo tribe_get_start_time();?></span>
											 	 <?php endif; ?>
												 <?php if ( tribe_get_end_time() ) : ?>
													  <span class="event-end-time">- <?php echo tribe_get_end_time();?></span>
												 <?php endif; ?>
											 </div>

										 <?php endif; ?>
									 </li>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>


							<?php	$ppp = 3 - count($the_query->posts);

								$counted_query = new WP_Query( array(
										'post_type' => 'tribe_events',
										'posts_per_page' => $ppp,
										'post__not_in' => $do_not_duplicate,
										'tax_query' => array(
											array(
												'taxonomy' => 'tribe_events_cat',
												'field' => 'slug',
												'terms' => $term,
											),
										),

								) );

								if( $counted_query->have_posts() ):

									while( $counted_query->have_posts() ): $counted_query->the_post(); ?>

									<li>
										 <h4><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
										 <?php if ($term->slug == 'other') : ?>

											 <div class="event-meta">
												 <span class="event-date"><?php echo tribe_get_start_date( null, false, 'F j' );?></span>
												 <?php if ( tribe_get_start_time() ) : ?>
													 <span class="event-start-time"><?php echo tribe_get_start_time();?></span>
												 <?php endif; ?>
												 <?php if ( tribe_get_end_time() ) : ?>
														<span class="event-end-time">- <?php echo tribe_get_end_time();?></span>
												 <?php endif; ?>
												 <?php if ( tribe_get_venue() ) : ?>
														<span class="event-venue"><?php echo tribe_get_venue(); ?></span>
												 <?php endif; ?>
											 </div>

											 <span class="event-excerpt"><p><?php echo mb_strimwidth(get_the_excerpt(), 0, 60, "..."); ?> <a href="<?php the_permalink(); ?>">Read More »</a></p></span>

										<?php else : ?>

											 <div class="event-meta">
												 <span class="event-date"><?php echo tribe_get_start_date( null, false, 'F j' );?></span>
												 <?php if ( tribe_get_start_time() ) : ?>
													 <span class="event-start-time"><?php echo tribe_get_start_time();?></span>
												 <?php endif; ?>
												 <?php if ( tribe_get_end_time() ) : ?>
														<span class="event-end-time">- <?php echo tribe_get_end_time();?></span>
												 <?php endif; ?>
											 </div>

										 <?php endif; ?>
									 </li>

									<?php	endwhile;
									wp_reset_postdata();
									endif;
							?>


						</ul>
					</div>





					<?php if ($term->slug == 'other')  : ?>
						<a href="events/?tribe-bar-categories-select=<?php echo $term->slug; ?>" class="view-all">View All <?php echo $term->name; ?> »</a>
					<?php else : ?>
						<a href="events/?tribe-bar-categories-select=<?php echo $term->slug; ?>" class="view-all">View All <?php echo $term->name; ?> Events »</a>
					<?php endif; ?>

				</div>


				<?php endwhile;

			else :

		    // no rows found

		endif;

	?>



</section>

<a href="/events" class="button event-all">View All Event Categories</a>
