<?php
/**
*
* Simple component which spans the entire width of the page and allows for a WYSIWYG field.
*
*
**/

?>

<section class="flex-content fifty-fifty <?php the_sub_field('50_50_background_color'); ?>">
	<div class="container">

	<?php $section_headline = get_sub_field('50_50_section_headline'); ?>
	<?php $section_intro_content = get_sub_field('50_50_section_intro'); ?>

	<?php if ( ($section_headline) || ($section_intro_content) ) : ?>
		<div class="section-intro">
			<?php if ($section_headline) : ?>
				<h2><?php echo $section_headline; ?></h2>
			<?php endif; ?>
			<?php if ($section_intro_content) : ?>
				<p><?php echo $section_intro_content; ?></p>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="fifty-fifty_blocks">

		<!-- Left Side -->
		<?php if( have_rows('50_50_left') ):
			while( have_rows('50_50_left') ): the_row();
				// vars
				$left_headline = get_sub_field('50_50_left_headline');
				$left_content = get_sub_field('50_50_left_content');
				$left_btn_label = get_sub_field('50_50_left_button_label');
				$left_btn_url = get_sub_field('50_50_left_button_url');
				?>

				<div class="fifty-fifty-left">
					<?php if($left_headline) : ?>
						<h3><?php echo $left_headline; ?></h3>
					<?php endif; ?>

					<?php if($left_content) : ?>
						<?php echo $left_content; ?>
					<?php endif; ?>

					<?php if ( get_sub_field('link_behavior') == 'standard-link' ) : ?>

						<?php if ($left_btn_label) : ?>
							<a href="<?php echo $left_btn_url; ?>" class="button"><?php echo $left_btn_label; ?></a>
						<?php endif; ?>

					<?php elseif ( get_sub_field('link_behavior') == 'pdf-download' ) : ?>

						<?php if ($left_btn_label) : ?>
							<a href="<?php echo $left_btn_url; ?>" class="button" download ><?php echo $left_btn_label; ?><i class="fas fa-download"></i></a>
						<?php endif; ?>

					<?php elseif ( get_sub_field('link_behavior') == 'new-tab' ) : ?>

						<?php if ($left_btn_label) : ?>
							<a href="<?php echo $left_btn_url; ?>" class="button" target="_blank"><?php echo $left_btn_label; ?><i class="fas fa-external-link-alt"></i></a>
						<?php endif; ?>

					<?php endif; ?>

				</div>

			<?php endwhile; ?>
		<?php endif; ?>


		<!-- Right Side -->
		<?php if( have_rows('50_50_right') ):
			while( have_rows('50_50_right') ): the_row();

				// vars
				$right_headline = get_sub_field('50_50_right_headline');
				$right_content = get_sub_field('50_50_right_content');
				$right_btn_label = get_sub_field('50_50_right_button_label');
				$right_btn_url = get_sub_field('50_50_right_button_url');
				?>

				<div class="fifty-fifty-right">
					<?php if($right_headline) : ?>
						<h3><?php echo $right_headline; ?></h3>
					<?php endif; ?>

					<?php if($right_content) : ?>
						<?php echo $right_content; ?>
					<?php endif; ?>

					<?php if ( get_sub_field('link_behavior') == 'standard-link' ) : ?>

						<?php if ($right_btn_label) : ?>
							<a href="<?php echo $right_btn_url; ?>" class="button"><?php echo $right_btn_label; ?></a>
						<?php endif; ?>

					<?php elseif ( get_sub_field('link_behavior') == 'pdf-download' ) : ?>

						<?php if ($right_btn_label) : ?>
							<a href="<?php echo $right_btn_url; ?>" class="button" download ><?php echo $right_btn_label; ?><i class="fas fa-download"></i></a>
						<?php endif; ?>

					<?php elseif ( get_sub_field('link_behavior') == 'new-tab' ) : ?>

						<?php if ($right_btn_label) : ?>
							<a href="<?php echo $right_btn_url; ?>" class="button" target="_blank"><?php echo $right_btn_label; ?><i class="fas fa-external-link-alt"></i></a>
						<?php endif; ?>

					<?php endif; ?>
				</div>

			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>
</section>

<?php $divider = get_sub_field('50_50_section_divider');
if( $divider && in_array('yes', $divider) ): ?>
		<hr />
<?php endif; ?>
