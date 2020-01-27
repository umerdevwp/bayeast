<?php
/**
 * Template part for higher order template partial for logged out homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */
get_template_part('template-parts/home/logged-out-hero');
get_template_part('template-parts/home/quicklink-repeater');

if (have_rows('flexible_content', get_the_ID())):
	while (have_rows('flexible_content')): the_row();
		include locate_template('template-parts/flex-content/content-' . get_row_layout() . '.php');
	endwhile;
endif;
?>
