<?php
/**
 * Created by PhpStorm.
 * User: wissilesogoyou
 * Date: 7/30/15
 * Time: 2:07 PM
 * Template Name: Find Affiliate Template
 * Description: Page template to support logic and functionality this page requires
 */
 ?>

<?php get_header(); ?>


<?php get_template_part( 'template-parts/hero' );?>
<?php get_template_part('loop', 'page'); ?>


<?php
//if (isset($_GET['page']) && ($_GET['page']) != '' ) {
//    $affiliateDestination = $_GET['page'];
//    $affiliateUrl = "https://bayeastweb1.bayeast.org/PortalTest/LoginPages/AutoLogin.aspx?" . $affiliateDestination;
//    $affiliate
//} else {
//    $affiliateDestination = 'affiliatemember=true';
//}

// IMPORTANT: USE /portalau and /webportal IN PRODUCTION
// Check site's wp-config.php file for LOCAL, STAGING, or PRODUCTION flag (PHP Constants)

$affiliateUrl = "";
$migrationMessage = null;

if ($_GET['page'] == 'affiliatemember=true'){
  //$affiliateUrl = 'https://bayeastweb2/webportaltest/affiliatemembersearch.html';
  $affiliateUrl = get_field_object('find_an_affiliate_api_url', 'option')['value'] . "/affiliatemembersearch.html" . bin2hex($hashed_password_encoded);
  $migrationMessage = get_field_object('find_an_affiliate_migration_message', 'option')['value'];
} else if ($_GET['page'] == 'affiliatefirm=true') {
  //$affiliateUrl = 'https://bayeastweb2/webportaltest/affiliatefirmsearch.html';
  $affiliateUrl = get_field_object('find_an_affiliate_api_url', 'option')['value'] . "/affiliatefirmsearch.html" . bin2hex($hashed_password_encoded);
  $migrationMessage = get_field_object('find_an_affiliate_migration_message', 'option')['value'];
}
?>
<?php if (!$migrationMessage) { ?>
  <iframe class="memtools-iframe" src="<?php echo $affiliateUrl; ?>" align="middle" frameborder="0" width="100%" height="1000" seamless></iframe>
<?php } else { ?>
  <h5><?php echo $migrationMessage; ?></h5>
<?php } ?>

<?php get_footer(); ?>
