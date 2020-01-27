<?php
/**
 * Template part for Homepage Quick Links
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */
$prefix = (is_user_logged_in() ? "logged_in_" : "logged_out_"); ?>
	<section class="home-quick-links container">
	<?php
		if (have_rows($prefix . 'quick_links_repeater')): while(have_rows($prefix . 'quick_links_repeater')) :the_row(); ?>
			<a class="home-quick-links__link button" href="<?php the_sub_field($prefix . 'quick_link_button_link'); ?>">
					<span> <?php the_sub_field($prefix . 'quick_links_button_label'); ?></span>
					<?php the_sub_field($prefix . 'quick_link_button_caption'); ?>
			</a>
		<?php endwhile; endif; ?>
	</section>
