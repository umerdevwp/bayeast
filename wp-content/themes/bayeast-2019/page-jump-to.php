<?php
/**
 * Template Name: Jump-To Side Menu
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

						<?php if ( get_field('link_behavior') == 'standard-link' ) : ?>
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

				<div class="jump-to_main">

					<?php if ( ($introHeadline) || ($introContent) || ($linkLabel) ) : ?>

					<div class="main_intro">
						<?php if ($introHeadline) : ?>
							<h2><?php echo $introHeadline; ?></h2>
						<?php endif; ?>
						<?php if ($introContent) : ?>
							<?php echo $introContent; ?>
						<?php endif; ?>

		        <?php if ( get_field('link_behavior') == 'standard-link' ) : ?>
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
						if( have_rows('page_sections') ): ?>
							<ul>
						   <?php while ( have_rows('page_sections') ) : the_row(); ?>
								<li id="<?php the_sub_field('anchor');?>" class="content-section">
 							 	<h2><?php the_sub_field('section_heading'); ?></h2>
								<?php the_sub_field('section_content'); ?>
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
							if( have_rows('page_sections') ): ?>

							<h4>Jump To...</h4>

								 <?php while ( have_rows('page_sections') ) : the_row(); ?>

										<a href="#<?php the_sub_field('anchor');?>" class="scrollLink"><?php the_sub_field('section_heading'); ?></a>

								 <?php endwhile; ?>

						 <?php	else :
							endif;
							?>

						</div>


						<div class="sidebar_menu-mobile">

							<?php
							$rows = get_field('page_sections');
							if($rows)
							{ ?>
								<h4>Jump To...</h4>
								<?php echo '<div class="select"><select><option selected value="#">Select a section</option>';

								foreach($rows as $row)
								{
									echo '<option value="#' . $row['anchor'] . '">' . $row['section_heading'] . '</option>';
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
