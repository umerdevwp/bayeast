(function($) {


  //============= ACCOUNT PAGE HOVER ACTIVE HIGHLIGHT
  //===============================================================
  // var memAcc = jQuery("#mem-account-main-nav .menu-item");
  // memAcc.click(function () {
  //   jQuery(this).addClass('active');
  // });

  $('#member-menu .menu-item-has-children').find("> a").on("click", function(e) {
    e.preventDefault();
    var parent = $(this).parent();
    if (parent.children('.sub-menu').length > 0) {
      parent.children('.sub-menu').slideToggle();
      parent.toggleClass('open');
    }
    return false;
  });


  //--------------Operating System Detection

  // This script sets OSName variable as follows:
  // "Windows"    for all versions of Windows
  // "MacOS"      for all versions of Macintosh OS
  // "Linux"      for all versions of Linux
  // "UNIX"       for all other UNIX flavors
  // "Unknown OS" indicates failure to detect the OS

  jQuery(".ybox").click(function(e) {

      var OSName="Unknown OS";
      if (navigator.appVersion.indexOf("Win")!== -1) { OSName="Windows"; }
      if (navigator.appVersion.indexOf("Mac")!== -1) { OSName="MacOS"; }
      if (navigator.appVersion.indexOf("X11")!== -1) { OSName="UNIX"; }
      if (navigator.appVersion.indexOf("Linux")!== -1) { OSName="Linux"; }

      if(OSName === "Windows"){
          jQuery( "#windialog" ).openModal();
          e.preventDefault();  //stop the browser from following
          window.location.href = 'https://download.teamviewer.com/download/version_10x/TeamViewerQS_en-idcd2wjyd5.exe';
      }else if (OSName === "MacOS") {
          jQuery( "#macdialog" ).openModal();
          e.preventDefault();  //stop the browser from following
          window.location.href = 'http://download.teamviewer.com/download/version_9x/TeamViewerQS.dmg';
      }else {
          jQuery( "#nodialog" ).openModal();
      }
  });


  //============= ACCOUNT PAGE HOVER ACTIVE HIGHLIGHT
  //===============================================================
  var trainClasses = jQuery(".training");
  trainClasses.click(function () {
      for ( var i=0; i<=trainClasses.length; i++) {
          trainClasses.removeClass('active');
          jQuery(this).toggleClass('active');
      }
  });



  //============= REGISTER CLASS CALENDAR
  //===============================================================
  jQuery(".register-class").click(function () {
      var classUrl = '/member-menu/account/?page=ClassRegistration.html';
      var classId = jQuery(this).attr('data-classid');
      var classHref = jQuery(this).attr('href');

      if (typeof classId === 'undefined' && classHref !== '' && jQuery.isNumeric(classHref)) {
          classId = classHref;
      }

      var fullUrl = classUrl + '&classid=' + classId;
      jQuery(".register-class").attr("href", fullUrl);
  });

  // If the reg. link is missing both data-classid & href, remove the button
  jQuery('.register-class').each(function() {
    if (typeof jQuery(this).attr('data-classid') == 'undefined' && typeof jQuery(this).attr('href') == 'undefined') {
      jQuery(this).parent().remove();
    }
  });

  //============= ACCOUNT NAME BADGE
  //===============================================================
  var colors = ['#85bf3f', '#29a4db', '#e55d5a'];
  var random_color = colors[Math.floor(Math.random() * colors.length)];
  jQuery('.account-initials').css('background-color', random_color);






})(jQuery);
