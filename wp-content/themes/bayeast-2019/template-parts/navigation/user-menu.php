<?php
/**
 * Template part for the user menu
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bay_East_2019
 */

?>
<nav id="user-menu">
	<?php if ( is_user_logged_in() ) {
		$current_user = wp_get_current_user(); ?>

	<!-------------------------------->
	<!-- Member Menu DropDown Start -->
	<!-------------------------------->

	<span id="usrf_space">
		<ul class="member-portal-menu">
			<li class="dropdown">
				<a href="#" title="My Bay East" class="dropdown-toggle" id="memberMenu" data-toggle="dropdown">
					<i class="fas fa-user"></i>
					My Bay East
					<i class="far fa-angle-down"></i>
				</a>

				<ul class="dropdown-menu" aria-labelledby="memberMenu">
					<li><a href="/account" title="My Bay East"><i class="fas fa-desktop"></i> Member Portal</a></li>
					<li><a href="/wp-login.php?action=logout" title="Logout"><i class="fas fa-cog"></i> Logout</a></li>
					<span class="divider"></span>
					<li>
						<?php
							$groups = $wpdb->get_results( $wpdb->prepare("SELECT * from `wp_ps_group_relationships` WHERE `grel_user_id` = %s", get_current_user_id()));
						?>
						<ul class="groups-menu">
							<?php
								foreach ($groups as $key =>  $group) {

									 if ($group->grel_group_id == 3) {
										 $navMenu[$key] = array( 
											"text" => "YPN", 
											"url" => "/ypn/", 
										);  
									 }
									 if ($group->grel_group_id == 4) {
										$navMenu[$key] = array( 
										   "text" => "Board of Directors", 
										   "url" => "/board-of-directors-2/", 
									   );  
									}
									if ($group->grel_group_id == 5) {
										$navMenu[$key] = array( 
										   "text" => "C.A.R./NAR Directors", 
										   "url" => "/car-directors/", 
									   );  
									}
									if ($group->grel_group_id == 6) {
										$navMenu[$key] = array( 
										   "text" => "Chair / Vice Chair", 
										   "url" => "/chair-vice-chair/", 
									   );  
									}
									if ($group->grel_group_id == 7) {
										$navMenu[$key] = array( 
										   "text" => "Executive", 
										   "url" => "/executive/", 
									   );  
									}
									if ($group->grel_group_id == 8) {
										$navMenu[$key] = array( 
										   "text" => "Foundation", 
										   "url" => "/foundation-2/", 
									   );  
									}
									if ($group->grel_group_id == 9) {
										 $navMenu[$key] = array( 
											"text" => "Housing Opportunities", 
											"url" => "/housing-opportunities/", 
										);  
									 }
									 if ($group->grel_group_id == 10) {
										 $navMenu[$key] = array( 
											"text" => "Investment Advisory", 
											"url" => "/investment-advisory/", 
										);  
									 }
									 if ($group->grel_group_id == 11) {
										 $navMenu[$key] = array( 
											"text" => "Leadership Development", 
											"url" => "/leadership-development/", 
										);  
									 }
									 if ($group->grel_group_id == 12) {
										$navMenu[$key] = array( 
										   "text" => "Leadership Resources", 
										   "url" => "/leadership-resources/", 
									   );  
									}
									if ($group->grel_group_id == 14) {
										 $navMenu[$key] = array( 
											"text" => "Marketing Groups", 
											"url" => "/marketing-groups-2/", 
										);  
									 }
									 if ($group->grel_group_id == 15) {
										 $navMenu[$key] = array( 
											"text" => "Mls", 
											"url" => "/mls-2/", 
										);  
									 }
									 if ($group->grel_group_id == 16) {
										 $navMenu[$key] = array( 
											"text" => "Past Presidents", 
											"url" => "/past-presidents-2/", 
										);  
									 }
									 if ($group->grel_group_id == 17) {
										 $navMenu[$key] = array( 
											"text" => "Professional Standards", 
											"url" => "/professional-standards/", 
										);  
									 }
									 if ($group->grel_group_id == 22) {
										 $navMenu[$key] = array( 
											"text" => "Leadership Evaluation &amp; Selection", 
											"url" => "/leadership-evaluation/", 
										);  
									 }
									 if ($group->grel_group_id == 23) {
										$navMenu[$key] = array( 
										   "text" => "Foundation Executive", 
										   "url" => "/foundation-executive/", 
									   );  
									}
									if ($group->grel_group_id == 24) {
										 $navMenu[$key] = array( 
											"text" => "Property Management", 
											"url" => "/property-management/", 
										);  
									 }
									 if ($group->grel_group_id == 25) {
										$navMenu[$key] = array( 
										   "text" => "Corporate Center Information", 
										   "url" => "/corporate-center-information/", 
									   );  
									}
									 if ($group->grel_group_id == 26) {
										 $navMenu[$key] = array( 
											"text" => "Chapter Leadership Alameda", 
											"url" => "/chapter-alameda-leadership/", 
										);  
									 }
									 if ($group->grel_group_id == 27) {
										 $navMenu[$key] = array( 
											"text" => "Local Government Relations Alameda", 
											"url" => "/alameda-local-government-relations/", 
										);  
									 }
									 if ($group->grel_group_id == 28) {
										$navMenu[$key] = array( 
										   "text" => "Local Community Relations", 
										   "url" => "/local-community-relations/", 
									   );  
									}
									 if ($group->grel_group_id == 29) {
										 $navMenu[$key] = array( 
											"text" => "Affiliate & INFORUM Alameda", 
											"url" => "/alameda-affiliates-inforum/", 
										);  
									 }
									 if ($group->grel_group_id == 30) {
										 $navMenu[$key] = array( 
											"text" => "Affiliate Committee", 
											"url" => "/affiliate-committee/", 
										);  
									 }
									 if ($group->grel_group_id == 31) {
										 $navMenu[$key] = array( 
											"text" => "Local Candidate Recommendation", 
											"url" => "/local-candidate-recommendation/", 
										);  
									 }
									 if ($group->grel_group_id == 31) {
										 $navMenu[$key] = array( 
											"text" => "Local Government Relations", 
											"url" => "/local-government-relations/", 
										);  
									 } 

									 if ($group->grel_group_id == 32) {
										 $navMenu[$key] = array( 
											"text" => "Staff Information", 
											"url" => "/staff-information/", 
										);  
									 }		
							 } 
							 //function compare_text($a, $b)
							//	{
							//	}
							function sortByName($a, $b)
								{
									$a = $a['text'];
									$b = $b['text'];

									if ($a == $b) return 0;
									return ($a < $b) ? -1 : 1;
								} 
								
							// sort alphabetically by name
							usort($navMenu, 'sortByName');
							
							// List Navigation Menu By Allowed Groups
							 foreach ($navMenu as $navList) {
							 echo '<li><a href="'. $navList['url'] .'"><span>'. $navList['text'] .'</span></a></li>';
							 }
							 ?>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
	</span>

	<!------------------------------>
	<!-- Member Menu DropDown End -->
	<!------------------------------>

<?php } ?>
</nav>
