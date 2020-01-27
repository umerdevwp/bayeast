<?php
/**
 * Template Name: Marketing Groups
 *
 * This template displays all flexible content pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */

get_header();
?>

	<?php get_template_part( 'template-parts/hero' );?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

				<?php
					$calendarImage = get_field('calendar_image');
					$size = 'full';
				?>
				<?php if ($calendarImage) :?>
					<div class="calendar_image container">
						<?php echo wp_get_attachment_image( $calendarImage, $size ); ?>
					</div>
				<?php endif; ?>


				<?php

				$posts = get_field('marketing_groups');

				if( $posts ): ?>
					<ul class="marketing-groups">
						<div class="container">

					    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
					        <?php setup_postdata($post);

									$day = get_field('day');
									$time = get_field('time');
									$admissionPrice = get_field('admission_price');
									$president = get_field('president');

									?>

					        <li class="marketing-group">
					            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<div class="day_time">
												<span><i class="far fa-clock"></i><?php echo $day; ?></span>
												<span><?php echo $time; ?></span>
											</div>
											<div class="admission">
												<span><i class="fas fa-dollar-sign"></i>Admission</span>
												<span><?php echo $admissionPrice; ?></span>
											</div>
											<div class="president">
												<span><i class="fas fa-user"></i>President</span>
												<span><?php echo $president; ?></span>
											</div>
											<a href="<?php the_permalink(); ?>" class="button">More Info</a>


					        </li>
					    <?php endforeach; ?>
							</div>
					   </ul>

				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>

				<?php get_template_part( 'template-parts/payment-portal' );?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
