<?php
/**
 * Template part for the desktop main navigation
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */

?>
<nav id="site-navigation" class="main-navigation"> <!-- desktop navigation -->
	<?php
		if (is_user_logged_in()) {
			wp_nav_menu(array(
				'theme_location' => 'menu-logged-in',
				'menu_id'        => 'menu-logged-in',
			));
		} else {
			wp_nav_menu(array(
				'theme_location' => 'menu-logged-out',
				'menu_id'        => 'menu-logged-out',
			));
		}
	?>
	<?php get_template_part( 'template-parts/navigation/login-button' ); ?>
</nav> <!-- end of desktop navigation -->