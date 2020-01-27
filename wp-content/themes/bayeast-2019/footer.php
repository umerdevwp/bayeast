<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bay_East_2019
 */

$fields = 0;
$soc[0] = get_field('facebook_url', 'option');
$soc[1] = get_field('twitter_url', 'option');
$soc[2] = get_field('instagram_url', 'option');
$soc[3] = get_field('youtube_url', 'option');
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-footer__logo-etc">
				<?php
					the_custom_logo();
				?>
				<span class="site-footer__logo-etc--copyright">
					<?php the_field('footer_copyright_text', 'option'); ?>
				</span>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'menu-footer-utility',
						'menu_id'        => 'menu-footer-utility',
					));
				?>

			</div>
			<?php if( have_rows('footer_addresses', 'option') ):
				while(have_rows('footer_addresses', 'option') ):
					the_row();
					$fields++; ?>
					<div class="site-footer__address address-<?php echo $fields; ?>">
						<?php the_sub_field('address', 'option') ?>
					</div>
				<?php endwhile;
			endif; ?>
			<div class="site-footer__footer-menu">
				<?php
					wp_nav_menu(array(
						'theme_location' => 'menu-footer',
						'menu_id'        => 'menu-footer',
					));
				?>
			</div>
			<div class="site-footer__social">
				<?php
					for ($i = 0; $i <= 3; $i++):
						if (!empty($soc[$i])):
							switch ($i) {
								case 0:
									$network = 'facebook';
									$network_glyph = 'fab fa-facebook-f';
									break;
								case 1:
									$network = 'twitter';
									$network_glyph = 'fab fa-twitter';
									break;
								case 2:
									$network = 'instagram';
									$network_glyph = 'fab fa-instagram';
									break;
								case 3:
									$network = 'youtube';
									$network_glyph = 'fab fa-youtube';
									break;
							}?>
						<a class="site-footer__social--icon" href="<?php echo $soc[$i]; ?>" alt="<?php echo ucfirst($network); ?> Link" target="_blank">
							<i class="<?php echo $network_glyph; ?>" aria-hidden="true" title="<?php echo ucfirst($network); ?> Link"></i>
						</a>
				<?php endif; endfor;?>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</div>
</body>
</html>
