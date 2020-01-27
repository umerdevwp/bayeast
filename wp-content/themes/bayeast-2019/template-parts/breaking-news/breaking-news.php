<?php
/**
 * Template part for breaking news ticker
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */

?>
<?php if (!empty(get_field('breaking_news_message', 'option'))): ?>
	<div class="breaking-news">
		<i class="fas fa-exclamation-circle breaking-news__icon"></i>
		<span class="breaking-news__message">
			<?php the_field('breaking_news_message', 'option'); ?>
		</span>
		<?php if (!empty(get_field('breaking_news_link', 'option'))): ?>
			<a class="breaking-news__link" href="<?php the_field('breaking_news_link', 'option'); ?>">
				Read More
			</a>
		<?php endif; ?>
	</div>
<?php endif; ?>
