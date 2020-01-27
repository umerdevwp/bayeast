<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bay_East_2019
 */

get_header();
$videoIframe = get_field('embed_code');
$videoDescription = get_field('video_description');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="video-detail">
				<div class="container">
					<a href="<?php echo esc_url( home_url( '/' ) );?>/videos" class="back-to">Back to All Videos</a>

					<div class="video-detail_main">

						<div class="video_wrapper">
							<?php echo $videoIframe; ?>
						</div>

						<?php	the_title( '<h1 class="entry-title">', '</h1>' ); ?>

						<?php
							$terms = wp_get_post_terms( get_the_ID(), 'video-category' );
							$terms = wp_list_filter($terms, array('slug'=>'featured'),'NOT');
							foreach( $terms as $term ) { ?>
								<span class="post-category"><?php echo $term->name;?></span>
							<?php }
						?>

						<div class="entry-meta">
							<?php
							bayeast_2019_posted_on();
							?>
						</div><!-- .entry-meta -->

						<?php if ($videoDescription) :
							echo $videoDescription;
						endif; ?>
					</div>

			</div>
		</div>


		<div class="video-detail_related">
			<div class="container">
				<h2>Related Videos</h2>
				<?php
				//Get array of terms
				$terms = get_the_terms( $post->ID , 'video-category', 'string');
				//Pluck out the IDs to get an array of IDS
				$term_ids = wp_list_pluck($terms,'term_id');

				//Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
				//Chose 'AND' if you want to query for posts with all terms
				$second_query = new WP_Query( array(
						'post_type' => 'video',
						'tax_query' => array(
							array(
									'taxonomy' => 'video-category',
									'field' => 'id',
									'terms' => $term_ids,
									'operator'=> 'IN' //Or 'AND' or 'NOT IN'
							 )),
						'posts_per_page' => 6,
						'ignore_sticky_posts' => 1,
						'orderby' => 'rand',
						'post__not_in'=>array($post->ID)
				 ) );

					if ( $second_query->have_posts() ) { ?>
						<ul class="videos">
							<?php	while($second_query->have_posts()) : $second_query->the_post(); ?>
								<?php
									$RvideoEmbed = get_field('embed_code');
									$RvideoDescription = get_field('video_description');
								?>
								<div class="video">
										<div class="video_wrapper">
											<?php echo $RvideoEmbed; ?>
										</div>

										<div class="video_content">
											<?php $terms = get_the_terms( $post->ID , 'video-category' ); ?>
											<h4>
												<?php foreach ( $terms as $term ) { ?>
													<span><?php echo $term->name;?> </span>
												<?php } ?>
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h4>

											<?php if ($RvideoDescription) : ?>
												<?php echo mb_strimwidth($RvideoDescription, 0, 125, "..."); ?>
												<a href="<?php the_permalink(); ?>">Read More »</a>
											<?php endif; ?>
										</div>
								</div>

							<?php endwhile; ?>
						</ul>
					<?php } else {
						echo  '<p>Sorry, no related videos were found</p>';
					}
				?>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
