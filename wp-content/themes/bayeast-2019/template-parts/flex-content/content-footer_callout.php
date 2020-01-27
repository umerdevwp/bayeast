<?php
/**
*
* Simple component which spans the entire width of the page and allows for a WYSIWYG field.
*
*
**/


?>

<section class="flex-content footer-callout">
		<div class="container">
			<?php // vars
			$footer_Headline = get_sub_field('footer_callout_headline');
			$footer_Content = get_sub_field('footer_callout_content');
			?>

			<?php if($footer_Headline) : ?>
				<h2><?php echo $footer_Headline; ?></h2>
			<?php endif; ?>

			<?php if($footer_Content) : ?>
				<?php echo $footer_Content; ?>
			<?php endif; ?>
		</div>
</section>
