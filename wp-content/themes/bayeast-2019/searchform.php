<?php
/**
 * Custom search form
 */
?>
<form
	action="<?php echo esc_url(home_url('/')); ?>"
	class="collapsible-search"
	method="get"
	role="search"
	>
	<label class="screen-reader-text" for="s">
		<?php _e('Search for:', 'presentation'); ?>
	</label>
	<i class="collapsible-search__button fas fa-search"></i>
	<input
		class="collapsible-search__input"
		name="s"
		placeholder="<?php echo esc_attr('', 'presentation'); ?>"
		type="search"
		value="<?php echo esc_attr(get_search_query()); ?>"
		/>
	<!-- <input class="screen-reader-text" type="submit" id="search-submit" value="Search" /> -->
</form>
