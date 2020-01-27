<?php
/**
 * The template for displaying all single marketing groups
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bay_East_2019
 */

get_header();

$day = get_field('day');
$time = get_field('time');
$admissionPrice = get_field('admission_price');
$president = get_field('president');
$locationName = get_field('location_name');
$locationAddress = get_field('location_address');
$email = get_field('email_address');
$phone = get_field('phone_number');
$facebook = get_field('facebook_url');
$brokerTour = get_field('broker_tour');
$extraContent = get_field('extra_content');

$postType = get_post_type();
$parent_link = get_post_type_archive_link( $post_type );


?>

	<?php get_template_part( 'template-parts/hero' );?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="marketing-group_details container">
				<div class="details_main">
					<a href="<?php echo esc_url( home_url( '/' ) );?>/marketing-groups" class="back-to">Back to Marketing Groups</a>

					<div class="details_main-quick-info">

						<?php if ( ($time) || ($day) ) : ?>
							<div class="day_time">
								<h5><i class="far fa-clock"></i><?php echo $day; ?></h5>
								<span><?php echo $time; ?></span>
							</div>
						<?php endif; ?>

						<?php if ($admissionPrice) : ?>
							<div class="admission">
								<h5><i class="fas fa-dollar-sign"></i>Admission</h5>
								<span><?php echo $admissionPrice; ?></span>
							</div>
						<?php endif; ?>

						<?php if ($president) : ?>
							<div class="president">
								<h5><i class="fas fa-user"></i>President</h5>
								<span><?php echo $president; ?></span>
							</div>
						<?php endif; ?>
					</div>

					<?php if ( ($locationAddress) || ($locationName) ) : ?>
						<div class="details_main-location">
							<h5><i class="fas fa-map-marker-alt"></i><?php echo $locationName; ?></h5>
							<span><?php echo $locationAddress; ?></span>
						</div>
					<?php endif; ?>

					<?php if ($brokerTour) : ?>
						<div class="details_main-broker-tour">
							<h5><i class="fas fa-headphones"></i>Broker Tour</h5>
							<?php echo $brokerTour; ?>
						</div>
					<?php endif; ?>

					<div class="details_main-links">
						<?php if ($email) : ?>
							<a href="mailto:<?php echo $email; ?>"><i class="fas fa-envelope"></i> Email</a>
						<?php endif; ?>
						<?php if ($phone) : ?>
							<a href="tel:<?php echo $phone; ?>"><i class="fas fa-phone"></i> <?php echo $phone; ?></a>
						<?php endif; ?>
						<?php if ($facebook) : ?>
							<a href="<?php echo $facebook; ?>" target="_blank"><i class="fab fa-facebook"></i> View on Facebook</a>
						<?php endif; ?>
					</div>

					<div class="details_main-additional-content">
						<?php echo $extraContent; ?>
					</div>


				</div>
				<div class="details_sidebar">
					<div class="sidebar_events">
						<h3>Upcoming Events</h3>
						<?php

						$posts = get_field('upcoming_events');

						if( $posts ): ?>

						    <ul>
						    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
						        <?php setup_postdata($post); ?>
						        <li>
						            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
												<span><i class="far fa-calendar-alt"></i><?php echo tribe_get_start_date(); ?></span>
						        </li>
						    <?php endforeach; ?>
						    </ul>

						  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
						<?php else : ?>
							<span class="no-events-msg">There are no upcoming events.</span>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<?php get_template_part( 'template-parts/payment-portal' );?>


			<?php

				// check if the repeater field has rows of data
				if( have_rows('sponsors_repeater') ): ?>

					<div class="marketing-group_sponsers">
						<div class="container">
							<h2>Sponsors</h2>

							<ul>
							 	<?php while ( have_rows('sponsors_repeater') ) : the_row(); ?>
								<li>
							   	<h4><?php the_sub_field('sponsor_name'); ?></h4>
									<span><?php the_sub_field('company');?></span>
									<a href="tel:<?php the_sub_field('phone_number');?>"><?php the_sub_field('phone_number');?></a>
									<a href="mailto:<?php the_sub_field('email_address');?>"><?php the_sub_field('email_address');?></a>
								</li>
							 <?php endwhile; ?>
						 </ul>
					 </div>
					</div>
				<?php else :

				    // no rows found

				endif; ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
