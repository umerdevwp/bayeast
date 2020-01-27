<?php
/**
*
* Simple component which spans the entire width of the page and allows for a WYSIWYG field.
*
*
**/

$fullWidth_textLayout = get_sub_field('full_width_alignment_options');
$fullWidth_backgroundColor = get_sub_field('full_width_background_color');

?>

<section class="flex-content full-width <?php echo $fullWidth_backgroundColor; ?>">
		<div class="container">
			<?php // vars
			$fullWidth_Headline = get_sub_field('full_width_headline');
			$fullWidth_Content = get_sub_field('full_width_content');
			?>

			<?php if($fullWidth_Headline) : ?>
				<h2><?php echo $fullWidth_Headline; ?></h2>
			<?php endif; ?>

			<?php if($fullWidth_Content) : ?>
				<div class="full-width_content <?php echo $fullWidth_textLayout; ?>"><?php echo $fullWidth_Content; ?></div>
			<?php endif; ?>

			<?php
				// check if the repeater field has rows of data
				if( have_rows('button_repeater') ): ?>

					<div class="full-width_buttons">

					 	<?php // loop through the rows of data
					    while ( have_rows('button_repeater') ) : the_row();
							$btnLabel = get_sub_field('button_label');
							$btnURL = get_sub_field('button_link');
							$btnPDF = get_sub_field('pdf_download'); ?>

							<?php if ( get_sub_field('link_behavior') == 'standard-link' ) : ?>

								<?php if ($btnLabel) : ?>
									<a href="<?php echo $btnURL; ?>" class="button"><?php echo $btnLabel; ?></a>
								<?php endif; ?>

							<?php elseif ( get_sub_field('link_behavior') == 'pdf-download' ) : ?>

								<?php if ($btnLabel) : ?>
									<a href="<?php echo $btnURL; ?>" class="button" download ><?php echo $btnLabel; ?><i class="fas fa-download"></i></a>
								<?php endif; ?>

							<?php elseif ( get_sub_field('link_behavior') == 'new-tab' ) : ?>

								<?php if ($btnLabel) : ?>
									<a href="<?php echo $btnURL; ?>" class="button" target="_blank"><?php echo $btnLabel; ?><i class="fas fa-external-link-alt"></i></a>
								<?php endif; ?>

							<?php endif; ?>

						<?php endwhile; ?>

					</div>

				<?php else :

				    // no rows found

				endif; ?>
		</div>
</section>
