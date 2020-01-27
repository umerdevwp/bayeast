<?php


add_filter( 'tribe-events-bar-filters', 'add_to_filter_bar', 1000, 1 );

function add_to_filter_bar( $filters ) {
	// Rearrange
	$newfilters = array(
		'tribe-bar-date' => $filters['tribe-bar-date'],
		'tribe-bar-search' => $filters['tribe-bar-search'],
		'tribe-bar-categories' => $filters['tribe-bar-categories'],
		'tribe-bar-offices' => $filters['tribe-bar-offices'],
	);

	return $newfilters;
}




add_filter( 'tribe-events-bar-filters', 'setup_categories_in_bar', 1, 1 );
function setup_categories_in_bar( $filters ) {

//	$terms = get_terms( 'tribe_events_cat' );

	$terms = get_terms( TribeEvents::TAXONOMY, array(
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'exclude' => array( 10, 18, 36 ),
	) );

	ob_start();

	// $iscategoryPage;
	//
	// if (strpos($_SERVER['REQUEST_URI'],'/events/?tribe-bar-categories-select=') !== false) {
	//     $iscategoryPage = true;
	// } else {
	//     $iscategoryPage = false;
	// }

	$tokens = explode('/', $_SERVER['REQUEST_URI']);
	?>
	<input type="text" name="tribe-bar-categories" id="tribe-bar-categories" style="display: none;">
	<select name="tribe-bar-categories-select" id="tribe-bar-categories-select" class="selectboxit  selectboxit-enabled selectboxit-btn">
		<option value="">Select a Category</option>
		<?php foreach( $terms as $term ) : ?>

			<option
			<?php if (strpos($_SERVER['REQUEST_URI'], $term->slug) !== false){ ?>
			 selected
		 <?php } ?>
			value="<?php echo $term->slug; ?>" <?php checked( $term->term_id, ( isset( $_REQUEST['tribe-bar-categories'] ) ? $_REQUEST['tribe-bar-categories'] : '' ), true ); ?>><?php echo $term->name; ?></option>
		<?php endforeach; ?>
	</select>
	<?php
	$html = ob_get_clean();

	$filters['tribe-bar-categories'] = array(
		'name' => 'tribe-bar-categories',
		'caption' => 'Categories',
		'html' => $html,
	);

	return $filters;
}

add_filter( 'tribe_events_pre_get_posts', 'setup_categories_in_query', 10, 1 );

function setup_categories_in_query( $query ) {
	if ( ! empty( $_REQUEST['tribe-bar-categories-select'] ) ) {
		$tax_query = array(
			'taxonomy' => 'tribe_events_cat',
			'field'    => 'slug',
			'terms'    => (array) $_REQUEST['tribe-bar-categories-select'],
		);

		if ( empty( $query->query_vars['tax_query'] ) ) {
			$query->set( 'tax_query', array( $tax_query ) );
		}else {
			$query->query_vars['tax_query'][] = $tax_query;
		}
	}

	return $query;
}





add_filter( 'tribe-events-bar-filters', 'setup_offices_in_bar', 1, 1 );
function setup_offices_in_bar( $filters ) {

	$terms = get_terms( 'event-office' );

	ob_start();

	$isOfficePage;

	if (strpos($_SERVER['REQUEST_URI'],'/events/office/') !== false) {
	    $isOfficePage = true;
	} else {
	    $isOfficePage = false;
	}
	$tokens = explode('/', $_SERVER['REQUEST_URI']);
	?>
	<input type="text" name="tribe-bar-offices" id="tribe-bar-offices" style="display: none;">
	<select name="tribe-bar-offices-select" id="tribe-bar-offices-select" class="selectboxit  selectboxit-enabled selectboxit-btn">
		<option value="">Select a Location</option>
		<?php foreach( $terms as $term ) :
			if ($isOfficePage) {
				if ($term->slug == $tokens[sizeof($tokens)-2]){ ?>
					<option selected value="<?php echo $term->term_id; ?>" <?php checked( $term->term_id, ( isset( $_REQUEST['tribe-bar-offices'] ) ? $_REQUEST['tribe-bar-offices'] : '' ), true ); ?>><?php echo $term->name; ?></option>
				<?php }
			} ?>
		<option value="<?php echo $term->term_id; ?>" <?php checked( $term->term_id, ( isset( $_REQUEST['tribe-bar-offices'] ) ? $_REQUEST['tribe-bar-offices'] : '' ), true ); ?>><?php echo $term->name; ?></option>
		<?php endforeach; ?>
	</select>
	<?php
	$html = ob_get_clean();

	$filters['tribe-bar-offices'] = array(
		'name' => 'tribe-bar-offices',
		'caption' => 'Offices',
		'html' => $html,
	);

	return $filters;
}

add_filter( 'tribe_events_pre_get_posts', 'setup_offices_in_query', 10, 1 );

function setup_offices_in_query( $query ) {
	if ( ! empty( $_REQUEST['tribe-bar-offices-select'] ) ) {
		$tax_query = array(
			'taxonomy' => 'event-office',
			'field'    => 'id',
			'terms'    => (array) $_REQUEST['tribe-bar-offices-select'],
		);

		if ( empty( $query->query_vars['tax_query'] ) ) {
			$query->set( 'tax_query', array( $tax_query ) );
		}else {
			$query->query_vars['tax_query'][] = $tax_query;
		}
	}

	return $query;
}


?>
