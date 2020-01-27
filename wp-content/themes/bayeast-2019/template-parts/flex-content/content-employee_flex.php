<?php
/**
*
* Simple component which spans the entire width of the page and allows for a WYSIWYG field.
*
*
**/
?>

<section class="flex-content employees">
	<?php

	// check if the repeater field has rows of data
	if( have_rows('employee_group') ): ?>



		<?php // loop through the rows of data
			while ( have_rows('employee_group') ) : the_row(); ?>

				<div class="employee-group">
					<div class="container">
						<?php $sectionHeadline = get_sub_field('section_headline');

						if ($sectionHeadline) : ?>
							<h2><?php echo $sectionHeadline; ?></h2>
						<?php endif; ?>

						<div class="employee-cards">
							<?php $post = get_sub_field('select_employees');

							if( $post ): ?>
								<ul>
								<?php foreach( $post as $post ): // variable must be called $post (IMPORTANT) ?>
										<?php setup_postdata($post);
										$employeeTitle = get_field('employee_title');
										$employeeEmail = get_field('employee_email');
										$employeePhone = get_field('employee_phone');
										$employeeCompany = get_field('employee_company');
										$employeeAddress = get_field('employee_address');
										$employeeImage = get_field('employee_image');
										$employeeVideo = get_field('employee_video_link');
										$size = 'thumbnail';?>
										<li class="employee-card">
												<div class="employee-card_image">
													<?php echo wp_get_attachment_image( $employeeImage, $size ); ?>
												</div>

												<div class="employee-card_content">
													<h3>
														<?php the_title(); ?><?php if ($employeeTitle) : ?>, <?php echo $employeeTitle; ?>
														<?php endif; ?>
													</h3>

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
										</li>
								<?php endforeach; ?>
								</ul>
							<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
						<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>

	<?php else :

			// no rows found

	endif;

	?>
</section>
