/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var container, button, menu, links, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( container ) {
		var touchStartFn, i,
			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode, i;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( container ) );
} )();


jQuery(document).ready(function($) {
	$('.menu-logged-in-menu-container li.menu-item-has-children > a').removeAttr("href").css("cursor","pointer");
	$('.member-portal-menu .dropdown-toggle').removeAttr("href").css("cursor","pointer");
	$('#mobile-menu-logged-in li.menu-item-has-children').append('<i class="far fa-chevron-down"></i>');

	$("#mobile-menu-logged-in li > i").on("click", function () {
		$(this).parent().toggleClass("active");
	});


		// We are using sidr to handle our menu JS
		// https://www.berriart.com/sidr/
	var sidrName = "sidr-main";

	$('.mobile-navigation .main-menu').sidr({
		name: sidrName,
		side: "right",
		source: ".main-navigation, .utility-navigation",
		renaming: false,
			onOpen: function() {
				$('.main-menu #mobile-menu-toggle').addClass('menu-open');
			 	$('#page').on("click.sidr", function(e) {
					$.sidr("close", sidrName);
			 	});

			},
			onClose: function() {
				$(window).off("click.sidr");
				$('.main-menu #mobile-menu-toggle').removeClass('menu-open');
			}
	});

	var sidr2Name = "sidr-2-main";


	$('.mobile-navigation .user-menu').sidr({
		name: sidr2Name,
		side: "right",
		source: "#user-menu",
		renaming: false,
			onOpen: function() {
				$('#page').on("click.sidr", function(e) {
					$.sidr("close", sidr2Name);
				});
				$('.dropdown-toggle').hide();

			},
			onClose: function() {
				$(window).off("click.sidr");
				$('.dropdown-toggle').show();
			}
		});


		// Don't you dare close me out!
		$('#' + sidrName).on("click.sidr", function(e) {
			e.stopPropagation();
		});
		// Don't you dare close me out!
		$('#' + sidr2Name).on("click.sidr", function(e) {
			e.stopPropagation();
		});




		$('.sidr').find('.menu-item-has-children').eq(1).addClass('second');
		var HTML = $('.sidr .second').children('a:first-child').html();
		var Link = $('.sidr .second').children('a:first-child').attr('href');
		$('.sidr .second').children('.sub-menu').prepend(
		'<li class="menu-item parent-page"><a href="' +
		Link +
		'">' +
		HTML +
		"</a></li>"
		);
		$('.sidr .current-menu-item').find('.sub-menu').find('.parent-page').addClass('current-menu-item');
		$('.sidr .current-menu-item').find('.sub-menu').parent('li').addClass('current-menu-parent');
		$('.sidr .current_page_item').children('.sub-menu').parent('li').removeClass('current-menu-item');

		// Mega-menu functionality
		$('.sidr .menu-item-has-children').find("> a").on("click", function(e) {
			e.preventDefault();
			var parent = $(this).parent();
			if (parent.children('.sub-menu').length > 0) {
				parent.children('.sub-menu').slideToggle();
			}
			return false;
		});

    function positionFooter(){
      //  var $containerHeight = $(window).height();
        var footerHeight = $('.site-footer').outerHeight();
        $('.site').css("padding-bottom", footerHeight);
    }

    $(document).ready(function () {
        positionFooter();//run when page first loads
    });

    $(window).resize(function () {
        positionFooter();//run on every window resize
    });

});
