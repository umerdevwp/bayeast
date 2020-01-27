<?php
/**
 * Template Name: Front Page
 *
 * This template displays the front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */
get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
	<?php
		if (is_user_logged_in()) {
			get_template_part('template-parts/home/logged-in');
		} else {
			get_template_part('template-parts/home/logged-out');
		}
	?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>
