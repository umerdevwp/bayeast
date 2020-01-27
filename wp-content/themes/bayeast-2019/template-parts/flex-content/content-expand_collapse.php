<?php
/**
*
* Simple component which spans the entire width of the page and allows for a WYSIWYG field.
*
*
**/


?>

<section class="flex-content expand-collapse">
		<div class="container">
			<?php
			$sectionHeadline = get_sub_field('expand_collapse_section_headline');
			?>

			<?php if ($sectionHeadline) : ?>
				<h2><?php echo $sectionHeadline; ?></h2>
			<?php endif; ?>

			<?php

				// check if the repeater field has rows of data
				if( have_rows('expand_collapse_item') ):

				 	// loop through the rows of data
				    while ( have_rows('expand_collapse_item') ) : the_row();


 					 				?>
 					 			<?php // vars
 					 			$itemLabel = get_sub_field('expand_collapse_label');
 					 			$itemContent = get_sub_field('expand_collapse_content');
 					 			?>

 					 			<?php if($itemLabel) : ?>
 					 				<div class="collapsible">
										<?php echo $itemLabel; ?>
										<i class="far fa-chevron-down"></i>

									</div>
 					 			<?php endif; ?>

 					 				<div class="content">
										<div class="content-container">
										<?php echo $itemContent; ?>

										<?php
										  // check if the repeater field has rows of data
										  if( have_rows('quick_link_repeater') ): ?>

										    <div class="quick-links">

										      <?php // loop through the rows of data
										        while ( have_rows('quick_link_repeater') ) : the_row();
										        $linkLabel = get_sub_field('link_label');
										        $linkURL = get_sub_field('link_url'); ?>

										        <?php if ( get_sub_field('link_behavior') == 'standard-link' ) : ?>

										          <?php if ($linkLabel) : ?>
										            <a href="<?php echo $linkURL; ?>" class="quick-link"><?php echo $linkLabel; ?></a>
										          <?php endif; ?>

										        <?php elseif ( get_sub_field('link_behavior') == 'pdf-download' ) : ?>

										          <?php if ($linkLabel) : ?>
										            <a href="<?php echo $linkURL; ?>" class="quick-link" download ><?php echo $linkLabel; ?><i class="fas fa-download"></i></a>
										          <?php endif; ?>

										        <?php elseif ( get_sub_field('link_behavior') == 'new-tab' ) : ?>

										          <?php if ($linkLabel) : ?>
										            <a href="<?php echo $linkURL; ?>" class="quick-link" target="_blank"><?php echo $linkLabel; ?><i class="fas fa-external-link-alt"></i></a>
										          <?php endif; ?>

										        <?php endif; ?>

										      <?php endwhile; ?>

										    </div>

										  <?php else :

										      // no rows found

										  endif; ?>

										</div>

									</div>


				    <?php endwhile;

				else :

				    // no rows found

				endif; ?>
		</div>
</section>
