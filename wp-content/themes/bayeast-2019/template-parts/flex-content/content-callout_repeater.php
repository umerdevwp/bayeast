<?php
/**
*
* Simple component which spans the entire width of the page and allows for a WYSIWYG field.
*
*
**/

?>

<section class="flex-content callout-repeater">
		<div class="container">

			<?php
			$calloutSectionHeadline = get_sub_field('callout_section_headline');

			if ($calloutSectionHeadline) : ?>
				<div class="section-intro">
					<h2><?php echo $calloutSectionHeadline; ?></h2>
				</div>
			<?php endif; ?>


			<?php if( have_rows('callout') ): ?>

					<div class="callout-repeater_callouts">

			  	<?php	while ( have_rows('callout') ) : the_row();

					//vars
					$calloutSmallHeadline = get_sub_field('callout_small_headline');
					$calloutLargeHeadline = get_sub_field('callout_large_headline');
					$calloutContent = get_sub_field('callout_content'); ?>

					<div class="callout">
						<?php if ($calloutSmallHeadline) : ?>
						<h3><?php echo $calloutSmallHeadline; ?></h3>
						<?php endif; ?>

						<?php if ($calloutLargeHeadline) : ?>
						<h2><?php echo $calloutLargeHeadline; ?></h2>
						<?php endif; ?>

						<?php if ($calloutContent) : ?>
						  <?php echo $calloutContent; ?>
						<?php endif; ?>
					</div>

				<?php endwhile; ?>
				 </div>

			<?php else :

			    // no rows found

			endif;

			?>
		</div>
</section>
