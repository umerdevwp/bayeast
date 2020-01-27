<?php
/**
 * Template Name: Committees
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

			<div class="page-content container">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

				endwhile; // End of the loop.
				?>

				<?php
				$introHeadline = get_field('introduction_heading');
				$introContent = get_field('introduction_content');
				$linkLabel = get_field('link_label');
				$linkURL = get_field('link_url'); ?>


				<?php if ( ($introHeadline) || ($introContent) || ($linkLabel) ) : ?>

					<div class="mobile_intro">
						<?php if ($introHeadline) : ?>
							<h2><?php echo $introHeadline; ?></h2>
						<?php endif; ?>
						<?php if ($introContent) : ?>
							<?php echo $introContent; ?>
						<?php endif; ?>

						<?php if ( get_field('intro_link_behavior') == 'standard-link' ) : ?>

							<?php if ($linkLabel) : ?>
								<a href="<?php echo $linkURL; ?>" class="button"><?php echo $linkLabel; ?></a>
							<?php endif; ?>

						<?php elseif ( get_field('intro_link_behavior') == 'pdf-download' ) : ?>

							<?php if ($linkLabel) : ?>
								<a href="<?php echo $linkURL; ?>" class="button" download ><?php echo $linkLabel; ?><i class="fas fa-download"></i></a>
							<?php endif; ?>

						<?php elseif ( get_field('intro_link_behavior') == 'new-tab' ) : ?>

							<?php if ($linkLabel) : ?>
								<a href="<?php echo $linkURL; ?>" class="button" target="_blank"><?php echo $linkLabel; ?><i class="fas fa-external-link-alt"></i></a>
							<?php endif; ?>

						<?php endif; ?>

					</div>

				<?php endif; ?>

				<div class="jump-to_main">

					<?php if ( ($introHeadline) || ($introContent) || ($linkLabel) ) : ?>

					<div class="main_intro">
						<?php if ($introHeadline) : ?>
							<h2><?php echo $introHeadline; ?></h2>
						<?php endif; ?>
						<?php if ($introContent) : ?>
							<?php echo $introContent; ?>
						<?php endif; ?>


												<?php if ( get_field('intro_link_behavior') == 'standard-link' ) : ?>

													<?php if ($linkLabel) : ?>
														<a href="<?php echo $linkURL; ?>" class="button"><?php echo $linkLabel; ?></a>
													<?php endif; ?>
		        <?php elseif ( get_field('link_behavior') == 'pdf-download' ) : ?>
		          <?php if ($linkLabel) : ?>
		            <a href="<?php echo $linkURL; ?>" class="button" download ><?php echo $linkLabel; ?><i class="fas fa-download"></i></a>
		          <?php endif; ?>
		        <?php elseif ( get_field('link_behavior') == 'new-tab' ) : ?>
		          <?php if ($linkLabel) : ?>
		            <a href="<?php echo $linkURL; ?>" class="button" target="_blank"><?php echo $linkLabel; ?><i class="fas fa-external-link-alt"></i></a>
		          <?php endif; ?>
		        <?php endif; ?>

					</div>

				<?php endif; ?>

					<div class="main_content">
						<?php
						if( have_rows('add_committees') ): ?>
							<ul>
						   <?php while ( have_rows('add_committees') ) : the_row(); ?>
								<li id="<?php the_sub_field('anchor');?>" class="content-section">
	 							 	<h2><?php the_sub_field('committee_name'); ?></h2>
									<?php the_sub_field('committee_description');


									// Roster PDF
									$file = get_sub_field('roster_pdf');
									if( $file ): ?>
										<a href="<?php echo $file['url']; ?>" target="_blank" class="roster-link"><i class="fas fa-users"></i>Roster</a>
									<?php endif;

									// Roster PDF
									$file2 = get_sub_field('executive_roster_pdf');
									if( $file2 ): ?>
										<a href="<?php echo $file2['url']; ?>" target="_blank" class="executive-roster-link"><i class="fas fa-user-tie"></i>Executive Roster</a>
									<?php endif;

									// Committee Meetings
									$posts = get_sub_field('committee_meetings');
									if( $posts ): ?>
										<span class="committees-meetings-link"><i class="fas fa-calendar-alt"></i>Committee Meetings</span>
									    <div class="committees-meetings-modal">
												<span class="close-modal"><i class="fas fa-times"></i></span>
										    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
										        <?php setup_postdata($post); ?>
										        <div>
										            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
																<div class="event-meta">
																	<span class="event-date"><?php echo tribe_get_start_date( null, false, 'F j' );?></span>
																	<?php if ( tribe_get_start_time() ) : ?>
																		<span class="event-start-time"><?php echo tribe_get_start_time();?></span>
																	<?php endif; ?>
																	<?php if ( tribe_get_end_time() ) : ?>
																		 <span class="event-end-time">- <?php echo tribe_get_end_time();?></span>
																	<?php endif; ?>
																</div>
										        </div>
										    <?php endforeach; ?>
											</div>
											<div class="modal-overlay"></div>

									    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
									<?php endif;

									// Committee Meetings
									$posts = get_sub_field('executive_committee_meetings');
									if( $posts ): ?>
										<span class="committees-meetings-link"><i class="fas fa-briefcase"></i>Executive Committee Meetings</span>
											<div class="committees-meetings-modal">
												<span class="close-modal"><i class="fas fa-times"></i></span>
												<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
														<?php setup_postdata($post); ?>
														<div>
																<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
																<div class="event-meta">
																	<span class="event-date"><?php echo tribe_get_start_date( null, false, 'F j' );?></span>
																	<?php if ( tribe_get_start_time() ) : ?>
																		<span class="event-start-time"><?php echo tribe_get_start_time();?></span>
																	<?php endif; ?>
																	<?php if ( tribe_get_end_time() ) : ?>
																		 <span class="event-end-time">- <?php echo tribe_get_end_time();?></span>
																	<?php endif; ?>
																</div>
														</div>
												<?php endforeach; ?>
											</div>
											<div class="modal-overlay"></div>

											<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
									<?php endif; ?>



								 <div id="demoTab">

										<?php	if( have_rows('tabs') ): ?>
											<ul class="tabs">
												<?php
													$i = 1;
												  while ( have_rows('tabs' ) ) : the_row();
														echo '<li rel="tab-' . $i . '">' . get_sub_field( "tab_title" ) . '</li>';
												    $i++;
												  endwhile;
												?>
											</ul>
										  <?php $i = 1; ?>


											<div class="tab_container">


											  <?php while ( have_rows('tabs') ) : the_row();

												  echo '<span class="tab_drawer_heading" rel="tab-' . $i . '">' . get_sub_field( "tab_title") .'</span>';

													echo '<div id="tab-' . $i . '" class="tab_content">';

														$employeeCard = get_sub_field('employee_card');
														$tabContent = get_sub_field('tab_content'); ?>


															<?php echo $tabContent; ?>

															<?php if( $employeeCard ):
															$post = $employeeCard;
															setup_postdata( $post );
															$employeeTitle = get_field('employee_title');
															$employeeEmail = get_field('employee_email');
															$employeePhone = get_field('employee_phone');
															$employeeCompany = get_field('employee_company');
															$employeeAddress = get_field('employee_address');
															$employeeImage = get_field('employee_image');
															$employeeVideo = get_field('employee_video_link');
															$size = 'thumbnail';?>

															<div class="employee-card">
																	<div class="employee-card_image">
																		<?php echo wp_get_attachment_image( $employeeImage, $size ); ?>
																	</div>

																	<div class="employee-card_content">
																		<h3><?php the_title(); ?><?php if ($employeeTitle) : ?>, <?php echo $employeeTitle; ?><?php endif; ?></h3>

																		<?php if (($employeeEmail) || ($employeePhone)) : ?>
																			<div class="employee-card_contact">
																				<?php if ($employeeEmail) : ?>
																					<a href="mailto:<?php echo $employeeEmail; ?>"><i class="fas fa-envelope"></i>Email</a>
																				<?php endif; ?>

																				<?php if ($employeePhone) : ?>
																					<a href="tel:<?php echo $employeePhone; ?>"><i class="fas fa-phone"></i><?php echo $employeePhone; ?></a>
																				<?php endif; ?>
																			</div>
																		<?php endif; ?>

																		<?php if ($employeeCompany) : ?>
																			<div class="employee-card_company">
																				<i class="fas fa-building"></i><h5><?php echo $employeeCompany; ?></h5>
																			</div>
																		<?php endif; ?>

																		<?php if ($employeeAddress) : ?>
																			<div class="employee-card_address">
																				<i class="fas fa-map-marker-alt"></i><p><?php echo $employeeAddress; ?></p>
																			</div>
																		<?php endif; ?>

																		<?php if ($employeeVideo) : ?>
																			<a href="<?php echo $employeeVideo; ?>" class="employee-card_video"><i class="fas fa-video"></i>Watch Welcome Video</a>
																		<?php endif; ?>
																	</div>
															</div>

															<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
														<?php endif; ?>


													<?php echo '</div>';
											  	$i++;
											  endwhile; ?>
											</div>

										<?php else :
										    // no rows found
										endif;?>
								</div>



								</li>
						   <?php endwhile; ?>
						 </ul>
					 <?php	else :
						endif;
						?>
					</div>

				</div>

				<div class="jump-to_sidebar">

					<div class="sidebar_container">

						<div class="sidebar_menu-desktop">

							<?php
							if( have_rows('add_committees') ): ?>

							<h4>Jump To...</h4>

								 <?php while ( have_rows('add_committees') ) : the_row(); ?>

										<a href="#<?php the_sub_field('anchor');?>" class="scrollLink"><?php the_sub_field('committee_name'); ?></a>

								 <?php endwhile; ?>

						 <?php	else :
							endif;
							?>

						</div>


						<div class="sidebar_menu-mobile">

							<?php
							$rows = get_field('add_committees');
							if($rows)
							{ ?>
								<h4>Jump To...</h4>
								<?php echo '<div class="select"><select><option selected value="#">Select a section</option>';

								foreach($rows as $row)
								{
									echo '<option value="#' . $row['anchor'] . '">' . $row['committee_name'] . '</option>';
								}

								echo '</select></div>';
							}?>

						</div>

					</div>
				</div>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php

get_footer();
