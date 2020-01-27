<?php
/**
 * Created by PhpStorm.
 * User: wissilesogoyou
 * Date: 12/29/14
 * Time: 4:10 PM
 * Template Name: Account Page
 * Description: Page template to support logic and functionality this page requires
 */
?>
<?php get_header(); ?>
<div id="page-content" class="<?php echo $encodedId ?>">
    <?php //get_template_part('loop', 'support'); ?>
</div>


<?php

//valid page params for member portal
$account_page_whitelist = array(
    "MemberBilling.html",
    "brokerdetail.html",
    "PaymentHistory.html",
    "UpdateCard.html",
    "AutoPay.html",
    "MemberMaintenance.html",
    "ClassHistory.html",
    "ClassRegistration.html"
);

if ( is_user_logged_in() ) {
    /*  Wissile's code (11/08/13): determine if URL id is set then assign it to $destination
     *  Otherwise set $destination to billing=true as a default page landing
     */
        if ( is_user_logged_in() ) {
        //get user info
            $current_user = wp_get_current_user();
            //get user login ID (NRDS number) and strip out BE letters
            $fulluserlogin = $current_user->user_login;
            if ( strpos($fulluserlogin, "BE") ) {
                list($userlogin, $be) = explode("BE", $fulluserlogin);
            } else {
                $userlogin = $fulluserlogin;
            }
        }
        //look for which page to show if not set then default to Profile
        if (isset($_GET['page'])){
            $destination = $_GET['page'];
        } else {
            $destination = "MemberMaintenance.html";
        }
        if(isset($_GET['classid'])) {
            $classID = $_GET['classid'];
        } else {
          $classID = '';
        }
        //*****************************************************************************
        //********** New Encryption method using DES **********************************
        //*****************************************************************************

        // TESTING ONLY
        // $userlogin = '206510186';

        $key = '12345678901234567890123456789012';
        $ivArray = array(18, 52, 86, 120, 144, 171, 205, 239, 18, 52, 86, 120, 144, 171, 205, 239);

        $iv = null;
        foreach ($ivArray as $element)
        $iv .= chr($element);

        //$hashed_password = mcrypt_encrypt(MCRYPT_DES, $key, $userlogin, MCRYPT_MODE_CBC, $iv);
        $hashed_password = openssl_encrypt($userlogin, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);

        //$hashed_password_encoded = base64_encode($hashed_password);
        $hashed_password_encoded = base64_encode($hashed_password);

        //*****************************************************************************
        //********** New Encryption method using DES **********************************
        //*****************************************************************************

        // TESTING ONLY
        // $userlogin = '206510186';

        // $key = '2013;[pn';
        // $ivArray = array(18, 52, 86, 120, 144, 171, 205, 239);

        // $iv = null;
        // foreach ($ivArray as $element)
        // $iv .= chr($element);

        // $hashed_password = mcrypt_encrypt(MCRYPT_DES, $key, $userlogin, MCRYPT_MODE_CBC, $iv);
        // $hashed_password_encoded = base64_encode($hashed_password);

    /*  Wissile's code (11/08/13): dynamically set the url and store in var $PHPportal
     *  $passy is decrypted password variable
     *  $URLPassword is encrypted password variable and URLEncoded (in antonioc/urlPassword.php)
     */
      // IMPORTANT: USE /portalau and /webportal IN PRODUCTION
      // Check site's wp-config.php file for LOCAL, STAGING, or PRODUCTION flag (PHP Constants)

      $PHPportal = "";
      $migrationMessage = null;
      $webapi_url = "";

      if ( function_exists('is_wpe') ) {
        switch ($destination){
            case 'MemberBilling.html':
                $webapi_url = get_field_object('prod_member_billing_api_url', 'option')['value'];
                $migrationMessage = get_field_object('prod_member_billing_migration_message', 'option')['value'];
                $PHPportal = $webapi_url . "/#/billing/" . bin2hex($hashed_password_encoded);
                break;
            case 'brokerdetail.html':
                $webapi_url = get_field_object('prod_broker_detail_api_url', 'option')['value'];
                $migrationMessage = get_field_object('prod_broker_detail_migration_message', 'option')['value'];
                if(strpos($webapi_url,'au') !== false)
                    $PHPportal = $PHPportal = $webapi_url . "/#/brokerdetail/" . bin2hex($hashed_password_encoded);
                else
                    $PHPportal = $webapi_url . "/" . $destination . '?id=' . $hashed_password_encoded;
                break;
            case 'MemberMaintenance.html':
                $webapi_url = get_field_object('prod_member_maintenance_api_url', 'option')['value'];
                $migrationMessage = get_field_object('prod_member_maintenance_migration_message', 'option')['value'];
                if(strpos($webapi_url,'au') !== false)
                    $PHPportal = $webapi_url  . "/#/membermaintenance/" . bin2hex($hashed_password_encoded);
                else
                    $PHPportal = $webapi_url . "/" . $destination . '?id=' . $hashed_password_encoded;
                break;
            case 'PaymentHistory.html':
                $webapi_url = get_field_object('prod_payment_history_api_url', 'option')['value'];
                $migrationMessage = get_field_object('prod_payment_history_migration_message', 'option')['value'];
                if(strpos($webapi_url,'au') !== false)
                    $PHPportal = $webapi_url  . "/#/paymenthistory/" . bin2hex($hashed_password_encoded);
                else
                    $PHPportal = $webapi_url . "/" . $destination . '?id=' . $hashed_password_encoded;
                break;
            case 'UpdateCard.html':
                $webapi_url = get_field_object('prod_update_card_api_url', 'option')['value'];
                $migrationMessage = get_field_object('prod_update_card_migration_message', 'option')['value'];
                if(strpos($webapi_url,'au') !== false)
                    $PHPportal = $webapi_url  . "/#/updatecard/" . bin2hex($hashed_password_encoded);
                else
                    $PHPportal = $webapi_url . "/" . $destination . '?id=' . $hashed_password_encoded;
            break;
            case 'AutoPay.html':
                $webapi_url = get_field_object('prod_auto_pay_api_url', 'option')['value'];
                $migrationMessage = get_field_object('prod_auto_pay_migration_message', 'option')['value'];
                if(strpos($webapi_url,'au') !== false)
                    $PHPportal = $webapi_url  . "/#/autopay/" . bin2hex($hashed_password_encoded);
                else
                    $PHPportal = $webapi_url . "/" . $destination . '?id=' . $hashed_password_encoded;
            break;
            case 'ClassHistory.html':
                $webapi_url = get_field_object('prod_class_history_api_url', 'option')['value'];
                $migrationMessage = get_field_object('prod_class_history_migration_message', 'option')['value'];
                if(strpos($webapi_url,'au') !== false)
                    $PHPportal = $webapi_url  . "/#/classhistory/" . bin2hex($hashed_password_encoded);
                else
                    $PHPportal = $webapi_url . "/" . $destination . '?id=' . $hashed_password_encoded;
            break;
            case 'ClassRegistration.html':
                $webapi_url = get_field_object('prod_class_registration_api_url', 'option')['value'];
                $migrationMessage = get_field_object('prod_class_registration_migration_message', 'option')['value'];
                if(strpos($webapi_url,'au') !== false)
                    $PHPportal = $webapi_url  . "/#/classregistration/" . bin2hex($hashed_password_encoded) . "/" . $classID ;
                else
                    $PHPportal = $webapi_url . "/" . $destination . '?id=' . $hashed_password_encoded . '&classid=' . $classID;;
            break;
        }
      }

      if ( function_exists('is_wpe_snapshot')) {

          switch ($destination){
            case 'MemberBilling.html':
                $webapi_url = get_field_object('member_billing_api_url', 'option')['value'];
                $migrationMessage = get_field_object('member_billing_migration_message', 'option')['value'];
                $PHPportal = $webapi_url . "/#/billing/" . bin2hex($hashed_password_encoded);
                break;
            case 'brokerdetail.html':
            $webapi_url = get_field_object('broker_detail_api_url', 'option')['value'];
            $migrationMessage = get_field_object('broker_detail_migration_message', 'option')['value'];
            if(strpos($webapi_url,'au') !== false)
                $PHPportal = $PHPportal = $webapi_url . "/#/brokerdetail/" . bin2hex($hashed_password_encoded);
            else
                $PHPportal = $webapi_url . "/" . $destination . '?id=' . $hashed_password_encoded;
            break;
            case 'MemberMaintenance.html':
                $webapi_url = get_field_object('member_maintenance_api_url', 'option')['value'];
                $migrationMessage = get_field_object('member_maintenance_migration_message', 'option')['value'];
                if(strpos($webapi_url,'au') !== false)
                    $PHPportal = $webapi_url  . "/#/membermaintenance/" . bin2hex($hashed_password_encoded);
                else
                    $PHPportal = $webapi_url . "/" . $destination . '?id=' . $hashed_password_encoded;
                break;
            case 'PaymentHistory.html':
                $webapi_url = get_field_object('payment_history_api_url', 'option')['value'];
                $migrationMessage = get_field_object('payment_history_migration_message', 'option')['value'];
                if(strpos($webapi_url,'au') !== false)
                    $PHPportal = $webapi_url  . "/#/paymenthistory/" . bin2hex($hashed_password_encoded);
                else
                    $PHPportal = $webapi_url . "/" . $destination . '?id=' . $hashed_password_encoded;
                break;
            case 'UpdateCard.html':
                $webapi_url = get_field_object('update_card_api_url', 'option')['value'];
                $migrationMessage = get_field_object('update_card_migration_message', 'option')['value'];
                if(strpos($webapi_url,'au') !== false)
                    $PHPportal = $webapi_url  . "/#/updatecard/" . bin2hex($hashed_password_encoded);
                else
                    $PHPportal = $webapi_url . "/" . $destination . '?id=' . $hashed_password_encoded;
            break;
            case 'AutoPay.html':
                $webapi_url = get_field_object('auto_pay_api_url', 'option')['value'];
                $migrationMessage = get_field_object('auto_pay_migration_message', 'option')['value'];
                if(strpos($webapi_url,'au') !== false)
                    $PHPportal = $webapi_url  . "/#/autopay/" . bin2hex($hashed_password_encoded);
                else
                    $PHPportal = $webapi_url . "/" . $destination . '?id=' . $hashed_password_encoded;
            break;
            case 'ClassHistory.html':
                $webapi_url = get_field_object('class_history_api_url', 'option')['value'];
                $migrationMessage = get_field_object('class_history_migration_message', 'option')['value'];
                if(strpos($webapi_url,'au') !== false)
                    $PHPportal = $webapi_url  . "/#/classhistory/" . bin2hex($hashed_password_encoded);
                else
                    $PHPportal = $webapi_url . "/" . $destination . '?id=' . $hashed_password_encoded;
            break;
            case 'ClassRegistration.html':
                $webapi_url = get_field_object('class_registration_api_url', 'option')['value'];
                $migrationMessage = get_field_object('class_registration_migration_message', 'option')['value'];
                if(strpos($webapi_url,'au') !== false)
                    $PHPportal = $webapi_url  . "/#/classregistration/" . bin2hex($hashed_password_encoded) . "/" . $classID ;
                else
                    $PHPportal = $webapi_url . "/" . $destination . '?id=' . $hashed_password_encoded . '&classid=' . $classID;;
            break;

          }
        }

      ?>

    <script>
        /*  Wissile's code (11/08/13): onload method that detect page loading and execute function
         *  Capture php var $PHPportal and store in JavaScript var
         *  Dynamically set iframe source
         */
        window.onload = function () {
            var portal = "<?php echo $PHPportal; ?>";
            document.getElementById("portalIframe").src = portal;
        };
        function resizeWhiteLabelApp(height){
            document.getElementById('portalIframe').style.height = height + 'px';
        }
        // Resize iframe to full height
        function resizeIframe(height)
        {
            // "+60" is a general rule of thumb to allow for differences in
            // IE & and FF height reporting, can be adjusted as required..
            var frameHeight = parseInt(height);
            document.getElementById('portalIframe').height = frameHeight;
            document.getElementById('memberRecordNotice').className = ' hidden';
        }
    </script>
    <div id="mem-account-container">
        <div id="account-nav-container">
            <div id="account-name-div">
                <?php
                $current_user = wp_get_current_user();
                echo '<div class="account-initials small">' . substr($current_user->user_firstname, 0, 1) . substr($current_user->user_lastname, 0, 1) . '</div>' .
                    '<h4 id="account-name">' . $current_user->user_firstname . ' ' . $current_user->user_lastname .
                    '<span>' . get_user_meta( $current_user->ID, 'member_status', true ) . ' member' . '</span>' . '</h4>';
                ;?>
            </div>

            <?php
              wp_nav_menu(array(
                'theme_location'     => 'member-menu',
                'menu_id' 		     => 'member-menu',
              ));
            ?>
            <!-- <ul class="panel" id="mem-account-main-nav">
              <li class="menu-item">
                <a href="?page=MemberMaintenance.html">
                  <i class="fas fa-user"></i>
                  My Profile
                </a>
              </li>
              <ul class="sub-mem-account-nav collapse drop-content" id="memacc-profile">
                  <li><a href="?page=MemberMaintenance.html">General Information</a></li>
              </ul>

              <li class="menu-item collapsible">
                <a href="#"><i class="far fa-money-bill-wave"></i>Payment</a>
              </li>
              <ul>
                  <li><a href="?page=BillingInfo.html">Billing Information</a></li>
                  <li><a href="?page=MemberBilling.html">Member Billing</a></li>
                  <li><a href="?page=PaymentHistory.html">Payment History</a></li>
                  <li><a href="?page=UpdateCard.html">Update CC</a></li>
                  <li><a href="?page=AutoPay.html">Auto Pay</a></li>
                  <li><a href="?page=brokerdetail.html">Broker View</a></li>
              </ul>

              <li class="menu-item collapsible">
                <a href="#"><i class="far fa-graduation-cap"></i>Classes</a>
              </li>
              <ul>
                  <li><a href="?page=ClassHistory.html">Class History</a></li>
              </ul>
            </ul> -->
        </div>

    <div id="account-info-container">
            <!-- <div class="pre-loader">
                <div class="preloader-wrapper big active">
                    <div class="spinner-layer spinner-blue-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <div class="preload-msg">Retrieving your information...</div>
            </div> -->

      <?php if (isset($_GET['page']) && $_GET['page'] == 'BillingInfo.html'){

      echo"<div class=\"billing-info\" style=\"padding: 30px 30px 50px 30px\">";
      echo "<h1>2018-2019 Billing Information</h1>";
      echo "<p>Bay East invoices will be generated to your online account the week of May 21, 2018.  Once the invoices have been generated, the Billing Department will email a notice to log into <a href=\"http:www.bayeast.org\">www.bayeast.org</a> and access your annual invoice.</p>";

      echo "<p>Once you have logged in to pay or view your invoice, you may add the following optional items: Education Advantage - $39 and a Foundation contribution - $35.</p>";
      echo "<p>Please note, a voluntary REALTOR® Action Fund (RAF) contribution in the amount of $50 will be automatically added to your bill.  You may remove this contribution by selecting the “REMOVE” checkbox on the billing screen.</p>";

      echo "<h2>REALTORS®:  Changes for 2018-2019</h2>";
      echo "<p>The Bay East local dues allocation has increased by $20, from $275 to $295 annually.</p>";
      echo "<p>C.A.R. – At this time, it is not known whether C.A.R. will extend the $100 Issues Fund into 2019.  The $100 is paid with the December installment. If C.A.R. discontinues or decreases the $100 Issues Fund, your December payment will be adjusted accordingly.</p>";
      echo "<p>NAR – At the upcoming NAR meetings in May, the Board will vote on whether to increase NAR dues allocation by $30 making the 2019 total $185.</p>";
      echo "<p>Please note:  Rate changes may not apply to Honorary members.</p>";


      echo "<h2>MLS Participant & Subscribers: Changes for 2018-2019</h2>";
      echo "<p>MLS Fees will remain $520.</p>";
      echo "<p>SupraKey Fees will be increased based on the type of Key:  eKey will be $225 and XpressKey will be $250 annually.</p>";
      echo "<p>These changes cover the increasing costs of technology, data security, and new programs designed to expand your MLS & Key access. We are working with BAREIS MLS, San Francisco MLS, Metrolist MLS, Nevada County and CRMLS to expand access to their data within the Paragon MLS system. Likewise, we are working with surrounding MLSs and Associations to expand your Supra Key area access.</p>";

      echo "<h2>Affiliates:  Changes for 2018-2019</h2>";
      echo "<p>Exciting News!  All Affiliates will now be Platinum Affiliates with the same <a href=\"https://bayeast.org/membership/become-a-member/#affiliate\">member benefits</a> beginning July 1.  The annual fee for all Affiliates will be $95.</p>";
      echo "<p>A task force of Affiliate members recommended one level of Affiliate membership and establishing an Affiliate committee, which was approved and formed in October 2017.  The committee is working on implementing a wide range of benefits and services including:</p>";

      echo "<ul>";
      echo "<li>Affiliate marketing piece to be distributed to new Bay East members</li>";
      echo "<li>Outreach program to make REALTORS® aware of Bay East Affiliate services</li>";
      echo "<li>Affiliate welcome kit</li>";
      echo "<li>Affiliate information, networking and recruiting event</li>";
      echo "<li>Affiliate education plan</li>";
      echo "</ul>";

      // echo "<p style=\"font-size: 14px\">These are in addition to the <a href=\"https://bayeast.org/membership/become-a-member/#affiliate\">current benefits</a> for Platinum members, which all Affiliate members will enjoy starting July 1.</p>";
      echo "<br/>";
      echo "<h2>Payment Plan Options:</h2>";
      echo "<h3>REALTORS® and REALTORS® with MLS/Keys:</h3>";
      echo "<p>Have the option to pay in 2 or 4 installments.</p>";
      echo "<p><span style=\"text-decoration:underline;\">2 Installments:</span> Payments due June 16 and December 16.  The majority of dues and fees are included and paid by June 16 and the C.A.R. allocations are paid by December 16.</p>";
      echo "<p><span style=\"text-decoration:underline;\">4 Installments:</span> Payments are due June 16, September 16, December 16 and March 16 (2019).  Payment amounts are made as even as possible for the first 3 installments with the final installment being the smallest.</p>";

      echo "<h3>MLS/Key Only Participants & Subscribers:</h3>";
      echo "<p>Have the option to pay in full or in 4 installments.</p>";
      echo "<p><span style=\"text-decoration:underline;\">Payments full:</span> Payment is due June 16.</p>";
      echo "<p><span style=\"text-decoration:underline;\">4 Installments:</span> Payments are due June 16, September 16, December 16 and March 16 (2019).</p>";

      echo "<h3>Affiliates:</h3>";
      echo "<p>Total of $95 is due and payable, in full, by June 16.</p>";

      echo "<h2>NEW Billing Policy Change:</h2>";
      echo "<p>Effective June 16, 2018:  If your REALTOR® or MLS services are suspended due to non-payment, there will be a $100 reinstatement fee.</p>";

      echo "<h2>Questions:</h2>";
      echo "<p>Contact the Billing Department in Pleasanton at 925.730.1070 or in Alameda at 510.871.4201.</p>";
      echo "<a class='button' href=\"http://bayeast.org/member-menu/account/?page=MemberBilling.html\">Pay your Bill</a>";


      echo "</div>";
      } else {
      ?>


            <?php if (!$migrationMessage) { ?>
              <iframe id="portalIframe" scrolling="yes" src="<?php echo $PHPportal; ?>" <?php
               if ($destination == 'MemberBilling.html') { ?>
                 height="1000"
                 <?php } elseif ( $destination == 'brokerdetail.html' ) { ?>
                   height="1500"
                 <?php } elseif ( $destination == 'ClassHistory.html' ) { ?>
                   height="1800"
                 <?php } else { ?>
                   height="1000"
                 <?php }
               ?>></iframe>
            <?php } else { ?>
              <h5><?php echo $migrationMessage; ?></h5>
            <?php }


      }
      ?>
    </div>
</div>
    <?php } else {
      //if we're trying to directly access a member portal page, check to see if page is in whitelist
      //if page is in whitelist, pass url params along so we can redirect to correct page after login
      $url = get_permalink() . '?';
      if(!empty($_GET["page"])){
          $found = array_search(strtolower($_GET["page"]), array_map('strtolower', $account_page_whitelist));
          $params = array();
          if($found !== false){
              foreach($_GET as $key => $value){
                  array_push($params, $key . '=' . $value);
              }
              $url .= implode('&', $params);
          }
      }
      header( 'Location:' . wp_login_url($url));
    }
  if ($destination !== 'MemberBilling.html'){ ?>
  <script src="<?php echo get_bloginfo('template_url') . '/js/vendor/iframeResizer.min.js'; ?>"></script>
<?php }
get_footer(); ?>
