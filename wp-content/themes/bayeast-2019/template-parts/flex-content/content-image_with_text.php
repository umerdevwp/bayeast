<?php
/**
*
* Simple component which spans the entire width of the page and allows for a WYSIWYG field.
*
*
**/

$imageText_Alignment = get_sub_field('image_text_alignment_options');
?>

<section class="flex-content image-with-text container <?php echo $imageText_Alignment; ?>">
		<?php // vars
		$imageText_Image = get_sub_field('image_text_image');
		$imageText_Headline = get_sub_field('image_text_headline');
		$imageText_Content = get_sub_field('image_text_content');
		?>

		<?php if($imageText_Image) : ?>
			<div class="image-with-text_image">
				<img src="<?php echo $imageText_Image; ?>" />
			</div>
		<?php endif; ?>

		<?php if( ($imageText_Headline) || ($imageText_Content) ) : ?>
			<div class="image-with-text_content">
				<?php if($imageText_Headline) : ?>
					<h3><?php echo $imageText_Headline; ?></h3>
				<?php endif; ?>

				<?php if($imageText_Content) : ?>
					<?php echo $imageText_Content; ?>
				<?php endif; ?>
				
				<?php get_template_part( 'template-parts/quick-links' );?>

			</div>
		<?php endif; ?>
</section>
