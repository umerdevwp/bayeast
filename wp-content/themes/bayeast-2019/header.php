<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bay_East_2019
 */

;?>
<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head();?>

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#003581">
	<meta name="msapplication-TileColor" content="#f6f6f6">
	<meta name="theme-color" content="#ffffff">
</head>

<body <?php body_class();?>>
<div class="fix-footer">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'bayeast-2019');?></a>
	<header id="masthead" class="site-header">
		<div class="header container">
			<div class="site-branding">
				<?php the_custom_logo();?>
			</div><!-- .site-branding -->
			<div class="site-nav">
				<?php get_template_part( 'template-parts/navigation/desktop-utility-navigation'); ?>
				<?php get_template_part( 'template-parts/navigation/desktop-main-navigation' ); ?>
				<?php get_template_part( 'template-parts/navigation/mobile-main-navigation'); ?>
			</div>
		</div>
	</header><!-- #masthead -->
	<?php get_template_part( 'template-parts/breaking-news/breaking-news' ); ?>


	<?php
	$breaking_news= get_field('breaking_news_message', 'option');?>

	<div id="content" class="site-content <?php if  ($breaking_news) : ?> has-breaking-news <?php endif; ?>">
