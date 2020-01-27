<?php
/**
 * Template Name: Find A Realtor
 *
 * This template displays all flexible content pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */

get_header();
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/HZpagination.js"></script>
<script type="text/javascript" src="https://bayeast.org/wp-content/themes/bayeast/js/HZpagination.js"></script>
	<?php get_template_part( 'template-parts/hero' );?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="find-realtor_form">
				<div class="container">
					<form role="search" id="find-realtor-actionBox" method="get" action="<?php echo home_url( '/' ); ?>find-realtor/">
							<input class="find-realtor-main-search" type="text" name="firstname" id="firstname" placeholder="First Name"
									<?php if(is_search()) { ?> value="<?php the_search_query(); ?>" <?php } else { ?> value=""
											onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"<?php } ?>/>
							<input class="find-realtor-main-search" type="text" name="lastname" id="lastname" placeholder="Last Name"
									<?php if(is_search()) { ?> value="<?php the_search_query(); ?>" <?php } else { ?> value=""
											onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"<?php } ?>/>
							<input class="find-realtor-main-search" type="text" name="firmname" id="firmname" placeholder="Firm Name"
									<?php if(is_search()) { ?> value="<?php the_search_query(); ?>" <?php } else { ?> value=""
											onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"<?php } ?>/>
							<input class="find-realtor-main-search" type="text" name="city" id="city" placeholder="City"
									<?php if(is_search()) { ?> value="<?php the_search_query(); ?>" <?php } else { ?> value=""
											onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"<?php } ?>/>
							<input class="search-realtor-button" type="submit" value="Search" />
					</form>
				</div>
			</div>

			<div id="results">

						<?php
						if (    (isset($_GET['firstname']) && ($_GET['firstname']) != '' ) ||
						        (isset($_GET['lastname']) && ($_GET['lastname']) != '' ) ||
						        (isset($_GET['firmname']) && ($_GET['firmname']) != '' ) ||
						        (isset($_GET['city']) && ($_GET['city']) != '' )
						) {

						// get method to use it as search params
						$firstName = $_GET['firstname'];
						$lastName = $_GET['lastname'];
						$firmName = $_GET['firmname'];
						$city = $_GET['city'];


						// The number of records to display on a page
						    $display_count = 100;

						// We need to get the number of the current page we're on.
						// This is useful for calculating the proper offset
						    $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

						// After that, calculate the offset
						    $offset = ( $page - 1 ) * $display_count;


						$meta_query = array();
						if (!empty($firstName)) {
						    $meta_query[] = array(
						        'key' => 'first_name',
						        'value' => $firstName,
						        'compare' => 'LIKE'
						    );
						}
						if (!empty($lastName)) {
						    $meta_query[] = array(
						        'key' => 'last_name',
						        'value' => $lastName,
						        'compare' => 'LIKE'
						    );
						}
						if (!empty($firmName)) {
						    $meta_query[] = array(
						        'key' => 'firm_name',
						        'value' => $firmName,
						        'compare' => 'LIKE'
						    );
						}
						if (!empty($city)) {
						    $meta_query[] = array(
						        'key' => 'city',
						        'value' => $city,
						        'compare' => 'LIKE'
						    );
						}
						// Make sure the users are realtors
						    $meta_query[] = array(
						        'key' => 'member_type',
						        'value' => 'realtor' ,
						        'compare' => 'LIKE'
						    );

						  $meta_query[] = array(
						        'key' => 'member_status',
						        'value' => 'inactive' ,
						        'compare' => '!='
						    );

						// and so on for each of your keys, then
						$args = array(

						    'post_type' => 'post',
						    'relation' => 'AND',
						    'orderby'    =>    'registered',
						    'order'      =>    'ASC',
						    'number'     =>    $display_count,
						    'offset'     =>    $offset,
						    'meta_query' => $meta_query
						);
						$users = new WP_User_Query($args); ?>



				
				<!-------------------- Sort Filter Start -------------------->
							<div class="wrapper-sort">
								<div class="wrapper-inner"></div>
								<div class="wrapper-inner">
									<div class="wrapper-sub-inner">
										<div class="inner-addon left-addon">
												<div class="dropdown">
												  <button class="btn btn-secondary dropdown-toggle btnSort dropdown-link" type="button" id="dropdownMenuButton" data-toggle="dropdown-container" aria-haspopup="true" aria-expanded="false">
														Sort Realtors By &nbsp; <i class="fa fa-fw fa-sort"></i>
													</button>
													<div class="dropdown-container" style="display: none;">
													  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<li class="dropdown-item"><a id="btnSortName" href="#">By Name</a></li>
														<li class="dropdown-item"><a id="btnSortCompany" href="#">By Company Name</a></li>
														<li class="dropdown-item"><a id="btnSortAddress" href="#">By City</a></li>  
													  </ul>
													</div>
												</div>
										</div>
									</div>
								</div>
							</div>
				
				<!-------------------- Sort Filter End -------------------->

					<?php 	// store wp user results
						$users_found = $users->get_results();

						if($users_found != null) { ?>

						<div class="find-realtor_cards employee-cards container">

						        <ul id="ulSuperHeroes" class="paginationList list-group">
						        <?php // Show all users with same name
						        foreach ($users_found as $user) {
											 $fullEmail = esc_html($user->user_email);
											$username = be_sanitize_member_number($user->user_login);

											// logic to accept duplicate email in the db but then strips out the unicode
											if ( strpos($fullEmail, "~*") ) {
													list($uniqid, $email) = explode("~*", $fullEmail);
											} else {
													$email = $fullEmail;
											} ?>

													<li class="employee-card" class="listItem">
														<!-- <div class="employee-card_initials">
																<?php //echo '<div class="account-initials large">' . substr($user->first_name, 0, 1) . substr($user->last_name, 0, 1) . '</div>'?>
														</div> -->

														<div class="employee-card_content">
																<h3 class="employee-card_name"><?php echo esc_html($user->first_name) . ' ' . esc_html($user->last_name); ?></h3>
																<div class="employee-card_contact">

																		<a class="contact" href="mailto:<?php echo esc_html($email); ?>"><i class="fas fa-envelope"></i>Email</a>
																		<a class="contact" href="tel:<?php echo esc_html(get_user_meta( $user->ID, 'phone', true )); ?>"><i class="fas fa-phone"></i><?php echo esc_html(get_user_meta( $user->ID, 'phone', true )); ?></a>

																</div>

																<div class="employee-card_company">
																	<i class="fas fa-building"></i><h5><?php echo esc_html(get_user_meta( $user->ID, 'firm_name', true )); ?></h5>
																</div>

																<div class="employee-card_address">
																	<i class="fas fa-map-marker-alt"></i>
																	<p>
																		<?php echo esc_html(get_user_meta( $user->ID, 'address1', true )) . ' ' . esc_html(get_user_meta( $user->ID, 'address2', true ))  ?><br/>
																		<span class="employee-card_city_state"><?php echo esc_html(get_user_meta( $user->ID, 'city', true )) . ', ' . esc_html(get_user_meta( $user->ID, 'state', true )) . ' ' . esc_html(get_user_meta( $user->ID, 'zip', true )) ?></span>
																	</p>
																</div>

																<a href="http://www.realtor.com/realestateagents/agent?nrdsid=<?php echo esc_html($username) ?>"
																	 data-rupp-nrds="<?php echo esc_html($username) ?>" class="button" target="_blank">View Profile</a>

														</div>




													</li>


						       <?php }
						        ?>
						        </ul>
							
							
							<div class="wrapper-sort">
							    <div class="wrapper-inner"></div>
							    <div class="wrapper-inner">
								<div class="wrapper-sub-inner">
								    <div id="pagination-container">
									<p class='paginacaoCursor' id="beforePagination"><</p>
									<p class='paginacaoCursor' id="afterPagination">></p>
								    </div>
								</div>
							    </div>
							</div>
							
							
						</div>
						<?php
						    // Error handling with message for non existing user submitted
							} else { ?>
								<div class="find-realtor-error-message container">
									<div class="alert" role="alert">
										<i class="far fa-exclamation-circle"></i>
										Sorry this Agent does not exist in our database, please try again or contact our
										<a href="/support/">support team</a>
									</div>
								</div>
						   <?php }

						// Error handling with message for blank field submitted
					} else { ?>
						<div class="find-realtor-error-message container">
							<div class="alert" role="alert">
								<i class="far fa-exclamation-circle"></i>
								Please Enter Agent Name or Brokerage
							</div>
						</div>
					<?php	}?>

				</div>



		</main><!-- #main -->
	</div><!-- #primary --> 


<style>
/*====== Find Relator Sort Filter Styles Start ========= */ 
.btnSort {
    background-color: #FFF;
    color: #333;
    display: block;
    margin: 0;
    /*height: 30px;*/
    border: none;
    margin-top: 15px;
    border: solid 1px #ccc;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
    font-size: 12px;
}
.btnSort:hover {
    outline: none;
    background-color: #039be5;
    color: #fff;
}
.btnSort:focus {
    outline: none;
    background-color: #039be5;
    color: #fff;
}
.inner-addon .dropdown-menu{
	min-width: 197px;
	padding: 5px 0;
	border-radius: 0 0 5px 5px;
}
.inner-addon .dropdown-menu .dropdown-item{
    display: block;
    width: 100%;
    padding: .25rem 1.5rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
	font-size:14px;
}


.inner-addon .dropdown-item:focus, .inner-addon .dropdown-item:hover {
    color: #212529;
    text-decoration: none;
    background-color: #d9d9d97d;
}
.inner-addon .dropdown-item.active, .inner-addon .dropdown-item:active {
    color: #212529;
    text-decoration: none;
    background-color: #d9d9d97d;
}

.search-wrapper {
    width: 40%;
    margin: 50px auto;
  }
/* enable absolute positioning */
.inner-addon { 
    position: relative; 
}

/* style icon */
.inner-addon .fa-sort {
    padding: 0px 10px;
    pointer-events: none;
    color: #333;
    font-size: 12px;
}
.btnSort:hover .fa-sort, .btnSort:focus .fa-sort {
    color: #fff;
}

/* align icon */
.left-addon  { left:  0px;}
.right-addon { right: 0px;}

/* add padding  */
.left-addon input  { padding-left:  30px; }
.right-addon input { padding-right: 30px; }  

    .customPagination, .paginacaoCursor{
      margin: 20px -1px;
      padding: 5px 10px;
      color: #333;
      background: #FFF;
      border: solid 1px #ccc;
      cursor: pointer;
    }
    .activePagination {
        color: #FFF;
    }
    #beforePagination {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    #afterPagination {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    .wrapper-sort {
        width: 100%;
        text-align: center;
    }
    .wrapper-inner {
     	display: inline-block;
    	width: 38.5%;
    	margin: 0 10px 20px 10px;
    }    
    .wrapper-sub-inner {
        float: right;
    }
    .find-realtor-cards {
        margin: 5px auto 0px auto;
    }
.dropdown ul li a{
	color: #333;
}
.inner-addon .dropdown-menu {
    min-width: 197px;
    padding: 5px 0;
    border-radius: 0 0 5px 5px;
    border-bottom: 2px solid;
    border-left: 1px solid;
    border-right: 1px solid;
    border-color: rgba(0, 0, 0, 0.05);
    border: none;
    box-shadow: none;
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    float: left;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}

/*====== Find Relator Sort Filter Styles End ========= */ 	
</style>
<script type="text/javascript">
//DropDown Filter Options
jQuery(function ($)  {

  $('div.dropdown').each(function() {
    var $dropdown = $(this);
    $(".dropdown-link", $dropdown).click(function(e) {
      e.preventDefault();
      $div = $("div.dropdown-container", $dropdown);
      $div.toggle();
      $("div.dropdown-container").not($div).hide();
      return false;
    });

});
	
  $('html').click(function(){
    $("div.dropdown-container").hide();
  });    
});
</script>
<?php  
get_footer();
