(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type    function
*  @date    8/11/2013
*  @since   4.3.0
*
*  @param   $el (jQuery element)
*  @return  n/a
*/

function new_map( $el ) {

    // var
    var $markers = $el.find('.marker');

    // vars
    var args = {
        zoom        : 9,
        center      : new google.maps.LatLng(37.703771, -122.432845),
        mapTypeId   : google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        streetViewControl: false,
        fullscreenControl: false,
        zoomControl: false,
        scaleControl: false,
      gestureHandling: 'cooperative',
        styles: [{"featureType": "water","elementType": "geometry","stylers": [{"color": "#e9e9e9"},{"lightness": 17}]},{"featureType": "landscape","elementType": "geometry","stylers": [{"color": "#f5f5f5"},{"lightness": 20}]},{"featureType": "road.highway","elementType": "geometry.fill","stylers": [{"color": "#ffffff"},{"lightness": 17}]},{"featureType": "road.highway","elementType": "geometry.stroke","stylers": [{"color": "#ffffff"},{"lightness": 29},{"weight": 0.2}]},{"featureType": "road.arterial","elementType": "geometry","stylers": [{"color": "#ffffff"},{"lightness": 18}]},{"featureType": "road.local","elementType": "geometry","stylers": [{"color": "#ffffff"  },{"lightness": 16}]},{"featureType": "poi","elementType": "geometry","stylers": [{"color": "#f5f5f5"},{"lightness": 21}]},{"featureType": "poi.park","elementType": "geometry","stylers": [{"color": "#dedede"},{"lightness": 21}]},{"elementType": "labels.text.stroke","stylers": [{"visibility": "on"},{"color": "#ffffff"},{"lightness": 16}]},{"elementType": "labels.text.fill","stylers": [{"saturation": 36},{"color": "#333333"},{"lightness": 40}]},{"elementType": "labels.icon","stylers": [{"visibility": "off"}]},{"featureType": "transit","elementType": "geometry","stylers": [{"color": "#f2f2f2"},{"lightness": 19}]},{"featureType": "administrative","elementType": "geometry.fill","stylers": [{"color": "#fefefe"},{"lightness": 20}]},{"featureType": "administrative","elementType": "geometry.stroke","stylers": [{"color": "#fefefe"},{"lightness": 17},{"weight": 1.2}]}]
    };


    // create map
    var map = new google.maps.Map( $el[0], args);


    // add a markers reference
    map.markers = [];

    var bounds = new google.maps.LatLngBounds();
    if (map.markers.length>0) {
        for (var i = 0; i < map.markers.length; i++) {
           bounds.extend(map.markers[i].getPosition());
          }
          map.fitBounds(bounds);
    }



    // add markers
    $markers.each(function(){

        add_marker( $(this), map );

        function add_marker( $marker, map ) {
            // var

            var marker;
            var activeMarker;
            var lat = $marker.attr('data-lat');
            var lng = $marker.attr('data-lng');
            var latlng = new google.maps.LatLng( lat, lng );
            var iconDefault = '../../wp-content/themes/bayeast-2019/images/gray-marker.png';
            var iconSelected = '../../wp-content/themes/bayeast-2019/images/blue-marker.png';


            marker = new google.maps.Marker({
              position: latlng,
              map: map,
              icon: iconDefault
            });

            var $info = $marker.find('.community-info h2').html();

            var infowindow = new google.maps.InfoWindow({
                content: $info
            });

            marker.addListener('mouseover', function() {
                 infowindow.open(map, marker);
            });
            marker.addListener('mouseout', function() {
                 infowindow.close();
            });


            for (i = 0; i < $markers.length; i++) {



              google.maps.event.addListener(marker, 'click', (function(marker, i) {

                return function() {
                  for (var j = 0; j < map.markers.length; j++) {
                    map.markers[j].setIcon(iconDefault);


                                  var $info = $marker.find('.community-info').html();
                                  $('.community-info').css("display", "block");
                                  $('.community-content').html($info);

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

                                  $('ul.tabs li').last().addClass("tab_last");


                  }
                  marker.setIcon(iconSelected);
                };
              })(marker, i));


            }

            // add to array
            map.markers.push( marker );

        }

    });

    // return
    return map;

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type    function
*  @date    8/11/2013
*  @since   4.3.0
*
*  @param   map (Google Map object)
*  @return  n/a
*/

function center_map( map ) {

    // vars
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each( map.markers, function( i, marker ){

        var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

        bounds.extend( latlng );

    });

    // only 1 marker?
    if( map.markers.length == 1 )
    {
        // set center of map
        map.setCenter( bounds.getCenter() );
        map.setZoom( 16 );
    }
    else
    {
        // fit to bounds
        map.fitBounds( bounds );
    }

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type    function
*  @date    8/11/2013
*  @since   5.0.0
*
*  @param   n/a
*  @return  n/a
*/
// global var
var map = null;

$(document).ready(function(){

    $('.acf-map').each(function(){

        // create map
        map = new_map( $(this) );


    });

            //zoom
            google.maps.event.addListener( map, 'zoom_changed', function( e ) {

            var zoom = map.getZoom();

             if(zoom!= 5)
             {
            var bounds = map.getBounds();

               myLatLngss = [];
                $.each( map.markers, function( i, marker ){
            var myLatLng = new google.maps.LatLng(marker.position.lat(), marker.position.lng() );

            if(bounds.contains(myLatLng)===true) {
                     myLatLngss.push( myLatLng );
                    }
                    else {

                    }
            });
               if(myLatLngss.length > 0)
               {
                 document.cookie = "coordn="+myLatLngss;
                 $("#customzm").load(location.href + " #customzm");
               }
            }

           });
           google.maps.event.addListener(map, 'dragend', function() {
             //alert('map dragged');
             var bounds = map.getBounds();

                  myLatLngss = [];
                $.each( map.markers, function( i, marker ){

            var myLatLng = new google.maps.LatLng(marker.position.lat(), marker.position.lng() );

            if(bounds.contains(myLatLng)===true) {
                     myLatLngss.push( myLatLng );
                    }
                    else {

                    }
           if(myLatLngss.length > 0)
               {
                 document.cookie = "coordn="+myLatLngss;
                 $("#customzm").load(location.href + " #customzm");
               }
            });

 } );


});

})(jQuery);
