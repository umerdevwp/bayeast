<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bay_East_2019
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main post-detail container">
		<div class="news-detail_main">
			<a href="<?php echo esc_url( home_url( '/' ) );?>/news" class="back-to">Back to All News</a>

			<header class="entry-header">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) :
					?>
					<?php
					$terms = wp_get_post_terms( get_the_ID(), 'category' );
					$terms = wp_list_filter($terms, array('slug'=>'featured'),'NOT');
					foreach( $terms as $term ) { ?>
						<span class="post-category"><?php echo $term->name;?></span>
					<?php } ?>

					<div class="entry-meta">
						<?php
						bayeast_2019_posted_on();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				//the_post_navigation();

				// // If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

			endwhile; // End of the loop.
			?>

	</div>
		<div class="news-detail_sidebar">
			<div class="sidebar-content">
				<h3>Related Posts</h2>
				<?php
					// Default arguments
					$args = array(
						'posts_per_page' => 5, // How many items to display
						'post__not_in'   => array( get_the_ID() ), // Exclude current post
						'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
					);

					// Check for current post category and add tax_query to the query arguments
					$cats = wp_get_post_terms( get_the_ID(), 'category' );
					$cats_ids = array();
					foreach( $cats as $related_cat ) {
						$cats_ids[] = $related_cat->term_id;
					}
					if ( ! empty( $cats_ids ) ) {
						$args['category__in'] = $cats_ids;
					}

					// Query posts
					$cat_query = new wp_query( $args );

					if ( $cat_query->have_posts() )
					{
						while($cat_query->have_posts()) : $cat_query->the_post(); ?>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php endwhile;
					}
					else {
						echo  '<p>Sorry, no related posts were found</p>';
					}
				?>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
