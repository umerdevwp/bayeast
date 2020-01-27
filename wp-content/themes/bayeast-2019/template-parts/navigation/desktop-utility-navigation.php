<?php
/**
 * Template part for desktop utility navigation
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */

?>
<nav class="utility-navigation container">

	<?php
		wp_nav_menu(array(
			'theme_location'     => 'menu-utility',
			'menu_id' 		     => 'menu-utility',
		));
	?>
	<?php get_search_form(); ?>
	<?php get_template_part( 'template-parts/navigation/user-menu' ); ?>
</nav>
