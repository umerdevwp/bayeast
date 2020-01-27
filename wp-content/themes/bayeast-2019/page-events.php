<?php
/**
 * Template Name: Event Calendar
 *
 * This template displays all flexible content pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */

get_header();
?>

<?php
$heroHeadline = get_field('events_page_hero_headline', 'options');
$heroContent = get_field('events_page_hero_content', 'options');
$heroImage = get_field('events_page_hero_image', 'options')

?>

	<?php
	if ( ! is_single() ) { ?>
		<div class="hero-area" style="background-image: url('<?php echo $heroImage; ?>')">
			<div class="container">
				<div class="hero-area_hero-content">
					<h1><?php echo $heroHeadline; ?></h1>
					<?php if ($heroContent) :
						echo $heroContent;
					endif;?>
				</div>
			</div>
			<div class="hero-overlay"></div>
		</div><!-- .hero-area -->
	<?php }?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
