//Blog/Stories list view ajax loading
(function($) {
    var pageNumber;
    var defaultPPP;
    var hasSetFilterHTML;
    var listContainer;
    var filterContainer;
    //var paginationContainer;

    var currentCategory = null;
    var currentSearch = "";

    function load_blog_list(search, filter, page, ppp, clearPagination){

      ppp = ppp || defaultPPP;
      clearPagination = clearPagination && true;
      pageNumber = page;

      var data = {
        search: search,
        filter: filter,
        page: pageNumber,
        ppp: ppp,
        clearPagination: clearPagination
      }

      console.log( 'output search term', page );

      $.ajax({
        url: FaqHelper.faq_endpoint,
        type: "POST",
        dataType: "html",
        data: data,
        cache: false,
        beforeSend: function(xhr){
            xhr.setRequestHeader( 'X-WP-Nonce', rest_object.api_nonce );
            $('.loading_spinner').addClass('active');
          },
        success : function( response ) {
          var parsedResponse = $.parseJSON(response);

          if(!hasSetFilterHTML){
            var filterHTML = parsedResponse["faq_data"]["filter_html"];
            filterContainer.append(filterHTML);

            //bind filter change event after filters have been created
            $("#select-filter-blogs").change(OnChangeStyle);

            $("#select-filter-search").change(OnChangeSearch);

            $('.blog-filter-clear').css("display","none");

            $('.blog-filter-clear').on('click', function(e){
               e.preventDefault();
               clearVars();
               $("#select-filter-blogs").val("all");
               $("#select-filter-search").val("");
               load_blog_list(currentSearch, currentCategory, pageNumber, defaultPPP, true);
               $('.blog-filter-clear').css("display","none");
            });

            //filter values may have been passed by url, update filters if that's the case
            if(currentCategory){
              setFilterValueFromParam('#select-filter-blogs', currentCategory);
            }

            //filter values may have been passed by url, update filters if that's the case
            if(currentSearch){
              setFilterValueFromParam('#select-filter-search', currentSearch);
            }

            hasSetFilterHTML = true;
          }

          var blogHTML = parsedResponse["faq_data"]["faq_html"];
          listContainer.html(blogHTML);
          //
          // var paginationHTML = parsedResponse["faq_data"]["pagination_html"];
          // paginationContainer.html(paginationHTML);
          //
          //
          // $('.pagination_link.disabled').removeAttr('href');

          pageNumber++;

          $('.faq > .collapsible').on('click', function(e){
            e.preventDefault();
            $(this).toggleClass('active');

            $(this).parent().find('.content').slideToggle();
          })
        },
        fail : function( response ) {
          console.log('fail!');
          console.log(response);

          listContainer.append('<p>Sorry, no posts can be loaded.</p>');
        },
        complete : function(){
          $('.loading_spinner').removeClass('active');
        }
      });
    }

    function OnChangeStyle(){
      pageNumber = 1;
      previousCount = -1;
      currentCategory = $(this).val();
      load_blog_list(currentSearch, currentCategory, pageNumber, defaultPPP, true);
      $('.blog-filter-clear').css("display","block");
    }

    function OnChangeSearch(){
      pageNumber = 1;
      previousCount = -1;
      currentSearch = $(this).val();
      load_blog_list(currentSearch, currentCategory, pageNumber, defaultPPP, true);
      $('.blog-filter-clear').css("display","block");
    }

    // function onClickPagination(item){
    //   pageNumber = $(item).data('page');
    //   load_blog_list(currentSearch, currentCategory, pageNumber, defaultPPP, true);
    // }

    function setFilterValueFromParam(selector, param){
      if($(selector + " option[value='" + param + "']").length > 0){
        $(selector).val(param);
      }
    }

    function clearVars(){
      currentSearch = "";
      currentCategory = null;
      pageNumber = 1;
      previousCount = -1;
    }

    function parseQueryParams(){
      var match
      var pl = /\+/g  // Regex for replacing addition symbol with a space
      var search = /([^&=]+)=?([^&]*)/g
      var decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); }
      var query  = window.location.search.substring(1)
      var urlParams = {}

      if(query){
        while (match = search.exec(query)){
          urlParams[decode(match[1])] = decode(match[2])
        }
      }

      return urlParams
    }

    $(document).ready(function(){
      pageNumber = 1;
      defaultPPP = 99999;
      hasSetFilterHTML = false;
      listContainer = $(".posts-listing_container");
      filterContainer = $(".posts-filter_container");
      paginationContainer = $(".posts-pagination_container");

      //parseQueryParams may throw an error if the url is malformed
      try{
        var queryParams = parseQueryParams();
        if(queryParams.filter){
          currentCategory = queryParams.filter;
        }

        if(queryParams.search ){
          currentSearch = queryParams.search;
        }
      }catch(e){
        console.log(e)
      }

      load_blog_list(currentSearch, currentCategory, pageNumber);

    })

  })(jQuery);
