jQuery(function($) {
  $(document).ready(function() {

      if ($(window).width() <= 550){
          $("#find-realtor-actionBox").attr("action", "/find-realtor/#results");
      }

      $( "a.scrollLink" ).click(function( event ) {
          event.preventDefault();
          $(this).addClass('active');
          $(this).siblings().removeClass('active');
          $("html, body").animate({ scrollTop: $($(this).attr("href")).offset().top - 97 }, 500);
      });

      $( ".sidebar_menu-mobile select" ).change(function( event ) {
          event.preventDefault();
          $("html, body").animate({ scrollTop: $($(this).attr("value")).offset().top - 250 }, 500);
      });

      var nav = $('.sidebar_menu-desktop');
      var footerTop = $('footer').offset().top;
      var navHeight = $('.sidebar_menu-desktop').outerHeight();
      var headerHeight = $('header').outerHeight(true);
      var heroHeight = $('.hero-area').outerHeight();
      var breakingNewsHeight = $('.breaking-news').outerHeight();
      var topofScroll = headerHeight + heroHeight + breakingNewsHeight - headerHeight;
      var stopPoint = footerTop - navHeight;

      console.log(topofScroll);

      $(window).scroll(function () {
          if ($(this).scrollTop() >= topofScroll) {
              nav.addClass("sidebar-fixed");
              $('.sidebar-fixed').css('top', headerHeight);
          } else {
              nav.removeClass("sidebar-fixed");
          }
          if ($(this).scrollTop() >= stopPoint) {
              nav.addClass("sidebar-stop");
              nav.removeClass("sidebar-fixed");
              $('.sidebar-stop').css('top', 'auto' );
          } else {
              nav.removeClass("sidebar-stop");
          }
      });

      var mobileNav = $('.sidebar_menu-mobile');
      var mobileNavHeight = $('.sidebar_menu-mobile').outerHeight();
      var introHeight = $('.mobile_intro').outerHeight();
      var topofMobileScroll = headerHeight + heroHeight + breakingNewsHeight + introHeight - headerHeight;
      var stopMobilePoint = footerTop;

      console.log(topofMobileScroll);

      $(window).scroll(function () {
          if ($(this).scrollTop() >= topofMobileScroll) {
              mobileNav.addClass("sidebar-fixed");
              $('.sidebar-fixed').css('top', headerHeight);


              if ($(window).width() <= 1024){
                $('.jump-to_main').css('margin-top', mobileNavHeight);
              }

          } else {
              mobileNav.removeClass("sidebar-fixed");

              if ($(window).width() <= 1024){
                $('.jump-to_main').css('margin-top', 'auto');
              }
          }

          if ($(this).scrollTop() >= stopMobilePoint) {
              mobileNav.addClass("sidebar-stop");
              mobileNav.removeClass("sidebar-fixed");
              $('.sidebar-stop').css('top', 'auto' );

              if ($(window).width() <= 1024){
                $('.jump-to_main').css('top', 'auto');
              }
          } else {
              mobileNav.removeClass("sidebar-stop");
          }
      });



      $('.content-area .committees-meetings-link').click(function() {
          $(this).next('.committees-meetings-modal').addClass('open');
          $('.modal-overlay').addClass('open');
      });

      $('.committees-meetings-modal .close-modal').click(function() {
          $('.committees-meetings-modal').removeClass('open');
          $('.modal-overlay').removeClass('open');
      });

      $('.modal-overlay').click(function() {
          $('.committees-meetings-modal').removeClass('open');
          $('.modal-overlay').removeClass('open');
      });

      // tabbed content
     // http://www.entheosweb.com/tutorials/css/tabs.asp
     $(".tab_content").hide();
     $(".tab_content:first-of-type").show();

     $("ul.tabs > li:first-child").addClass("active");
     $(".tab_drawer_heading:first-of-type").addClass("d_active");


     /* if in tab mode */
       $("ul.tabs li").click(function() {
         $(this).parent().parent().find(".tab_content").hide();
         var activeTab = $(this).attr("rel");
         $(this).parent().parent().find("#"+activeTab).fadeIn();

         $(this).parent().parent().find("ul.tabs li").removeClass("active");
         $(this).addClass("active");

         $(".tab_drawer_heading").removeClass("d_active");
         $(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");
       });

       /* if in drawer mode */
			 /* if in drawer mode */
			 $(".tab_drawer_heading").click(function() {
						var d_activeTab = $(this).attr("rel");

						if ($(this).hasClass("d_active")) {

							$(this).parent().find("#"+d_activeTab).hide();
							$(this).removeClass("d_active");

						} else {

							$(this).addClass("d_active");
							$(this).parent().find(".tab_content").hide();
							$(this).parent().find("#"+d_activeTab).fadeIn();
							$(this).parent().find(".tab_drawer_heading").removeClass("d_active");
							$(this).addClass("d_active");
							$("ul.tabs li").removeClass("active");
							$("ul.tabs li[rel^='"+d_activeTab+"']").addClass("active");

						}
				});


         /* Extra class "tab_last"
            to add border to right side
            of last tab */
      $('ul.tabs li').last().addClass("tab_last");


	});

});
