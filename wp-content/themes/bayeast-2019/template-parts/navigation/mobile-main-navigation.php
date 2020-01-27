<?php
/**
 * Template part for the mobile main navigation
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */

?>


<nav id="mobile-navigation" class="mobile-navigation"> <!-- mobile navigation -->
	<?php if (is_user_logged_in()) { ?>
		<div class="mobile_user__menuToggle">
				<div class="user-menu">
					<div id="mobile-menu-toggle" class="menu-toggle" aria-controls="user-menu" aria-expanded="false">
							<i class="fas fa-user"></i>
					</div><!-- .mobile-navigation -->
				</div>
		</div>
	<?php }?>


	<?php //get_template_part( 'template-parts/navigation/user-menu'); ?>

	<div class="mobile-navigation__menuToggle">
			<div class="main-menu">
				<div id="mobile-menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span></span>
						<span></span>
						<span></span>
				</div><!-- .mobile-navigation -->
			</div>

		</div>

</nav> <!-- end of mobile navigation -->
