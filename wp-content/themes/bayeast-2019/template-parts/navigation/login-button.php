<?php
/**
 * Template part for a log in button
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */

?>
<?php if (!is_user_logged_in()): ?>
	<a href="<?php echo wp_login_url( get_permalink() ); ?>" class="login-button" role="button">Login</a>
<?php endif; ?>
