<?php
/**
 * Template part for logged in news section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */
$logged_in_news_headline = get_field('news_header');
$left_button_text        = get_field('video_button_text');
$right_button_text       = get_field('news_button_text');
$left_button_link        = get_field('video_page_link');
$right_button_link       = get_field('news_page_link');
?>
<div class="logged-in-latest-news__container">
	<section class="flex-content fifty-fifty container logged-in-latest-news">
		<div class="section-intro">
			<h2><?php echo $logged_in_news_headline; ?></h2>
		</div>
		<div class="fifty-fifty_blocks">
			<!-- Left Side -->
			<div class="fifty-fifty-left videos">
				<?php	$the_query = new WP_Query( array(
							'post_type' => 'video',
							'posts_per_page' => 1,
							'tax_query' => array(
								array(
									'taxonomy' => 'video-category',
									'field' => 'slug',
									'terms' => 'featured',
								),
							),

					) ); ?>

						<?php while ( $the_query->have_posts() ) :
							$the_query->the_post(); ?>

							<div class="video">

								<?php setup_postdata($post);
								$videoEmbed = get_field('embed_code');
								$videoDescription = get_field('video_description');

								?>

								<div class="video_wrapper">
									<?php echo $videoEmbed; ?>
								</div>

								<div class="video_content">
									<?php
										$terms = get_the_terms( $post->ID , 'video-category' );
										$terms = wp_list_filter($terms, array('slug'=>'featured'),'NOT');
									?>
									<h4>
										<?php foreach ( $terms as $term ) { ?>
											<span><?php echo $term->name;?> </span>
										<?php } ?>
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h4>

									<?php if ($videoDescription) : ?>
										<?php echo mb_strimwidth($videoDescription, 0, 250, "..."); ?> <a href="<?php the_permalink(); ?>">Read More »</a>
									<?php endif; ?>
								</div>

							</div>

							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>

				<a href="<?php echo $left_button_link; ?>" class="button">View All Videos</a>
			</div>

			<div class="fifty-fifty-right news">

			<?php 	$the_query = new WP_Query( array(
						'post_type' => 'post',
						'posts_per_page' => 5,
						'tax_query' => array(
							'0' => array(
								'taxonomy' => 'category',
								'field' => 'slug',
								'terms' => 'featured',
							),
						),

				) ); ?>

				<ul>
					<?php while ( $the_query->have_posts() ) :
						$the_query->the_post();
						$do_not_duplicate[] = $post->ID; ?>
						<li>
							<?php
								$terms = get_the_terms( $post->ID , 'category' );
								$terms = wp_list_filter($terms, array('slug'=>'featured'),'NOT');

							?>

							<h4>
								<?php foreach ( $terms as $term ) { ?>
									<span><?php echo $term->name;?> </span>
								<?php } ?>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h4>
							<p><?php echo mb_strimwidth(get_the_excerpt(), 0, 60, "..."); ?> <a href="<?php the_permalink(); ?>">Read More »</a></p>

						</li>
					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

					<?php
						$ppp = 5 - count($the_query->posts);
						$counted_query = new WP_Query( array(
								'post_type' => 'post',
								'posts_per_page' => $ppp,
								'post__not_in' => $do_not_duplicate,
						) );

						if( $counted_query->have_posts() ):

							while( $counted_query->have_posts() ): $counted_query->the_post(); ?>

							<li>
								<?php $terms = get_the_terms( $post->ID , 'category' ); ?>
								<h4>
									<?php foreach ( $terms as $term ) { ?>
										<span><?php echo $term->name;?> </span>
									<?php } ?>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h4>
								<p><?php echo mb_strimwidth(get_the_excerpt(), 0, 80, "..."); ?></p>

							</li>

							<?php	endwhile;
							wp_reset_postdata();
						endif;
					?>


				</ul>
				<a href="<?php echo $right_button_link; ?>" class="button">View All News</a>
			</div>
		</div>
	</section>
</div>
