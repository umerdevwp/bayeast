<?php
/**
*
* Simple component which spans the entire width of the page and allows for a WYSIWYG field.
*
*
**/
?>

<section class="flex-content videos-callout">
	<div class="container">
		<div class="section-intro">
			<?php
				$sectionTitle = get_sub_field('flex_video_headline');
				$sectionIntro = get_sub_field('flex_video_intro');
			?>

			<?php if ($sectionTitle) : ?>
				<h2><?php echo $sectionTitle; ?> </h2>
			<?php endif; ?>

			<?php if ($sectionIntro) : ?>
				<p><?php echo $sectionIntro; ?> </p>
			<?php endif; ?>

		</div>

		<?php
			$post = get_sub_field('select_videos');
			if( $post ): ?>
				<ul class="videos">
				<?php foreach( $post as $post ): // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post);
						$videoEmbed = get_field('embed_code');
						$videoDescription = get_field('video_description');

						?>
						<li class="video">
								<div class="video_wrapper">
									<?php echo $videoEmbed; ?>
								</div>

								<div class="video_content">
									<?php $terms = get_the_terms( $post->ID , 'video-category' ); ?>


									<h4>
										<?php foreach ( $terms as $term ) { ?>
											<span><?php echo $term->name;?> </span>
										<?php } ?>
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h4>

									<?php if ($videoDescription) : ?>
										<?php echo mb_strimwidth($videoDescription, 0, 125, "..."); ?>
										<a href="<?php the_permalink(); ?>">Read More »</a>
									<?php endif; ?>


								</div>
						</li>
				<?php endforeach; ?>
				</ul>
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; ?>

		<?php $videoButtonLabel = get_sub_field('video_button_label'); ?>

		<?php $videoLink = get_sub_field('video_page_link'); ?>

		<?php if ($videoButtonLabel) : ?>
			<a href="<?php echo $videoLink; ?>" class="button"><?php echo $videoButtonLabel; ?> </a>
		<?php endif; ?>
	</div>

</section>
